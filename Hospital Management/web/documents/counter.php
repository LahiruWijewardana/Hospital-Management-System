<?php
$c_version="ezgenerator counter 1.46"; 
/*
	counter.php	ezgenerator counter
	http://www.ezgenerator.com
	Copyright (c) 2004-2012 Image-line
*/
include_once((isset($rel_path)?$rel_path:'../').'ezg_data/functions.php');
$c_db_dir=(isset($rel_path)?$rel_path:'../').$f_db_folder; 
$c_db_settings_fname=$c_db_dir.'centraladmin_conf.ezg.php';
$c_db_details_fname=$c_db_dir.'counter_db.ezg.php';
$c_db_totals_fname=$c_db_dir.'counter_totals_db.ezg.php';
$C_MAX_VISIT_LENGHT=1800; // 0=> Treat each single hit as unique
$C_NUMBER_OF_DIGITS=8;
$C_DISPLAY=0;// 1- page loads; 0- unique
$C_UNIQUE_START_COUNT=0;
$C_LOADS_START_COUNT=0;
$C_GRAPHICAL='1';  // 1= Graphical counter, 0= text counter
//--------------------------------
function c_return_counter_html($digits,$imaPath,$height,$width,$value)
{
	$line='<div style="padding:0;float:left;width:%spx;height:%spx;background:url(%s) %spx 0;"></div>';
	$result='<div style="width:'.($width*$digits).'px;height:'.$height.'px;">';
	$value_string=sprintf('%'.$digits.'d',$value);
	for($i=0;$i<($digits);$i++) $result.=sprintf($line,$width,$height,$imaPath,-($value_string[$i]*$width));
	$result.='</div>';
	return $result;
}

function c_write_stat($stat_detailed,$date_timestamp,$page_id,$uniq_flag,$firsttime_flag,$display,$loads_start_count,$unique_start_count,$rss_flag=false)
{
	global $c_db_details_fname,$c_db_totals_fname,$f_lf;
	
	$first_line='<?php echo "hi"; exit; /*';
	$total_loads=1;$total_unique=0;
	$chmod_err_msg='<em style="color: red;">ERROR in Counter: Database file does not have WRITE permissions</em><br>Connect to server through FTP and set file permissions manually. If server is LINUX, set CHMOD 666. If server is Windows, set WRITE permission.';

	if(!file_exists($c_db_details_fname) || !file_exists($c_db_totals_fname))
		$result='<em style="color: red;">ERROR in Counter: Missing Database file</em><br>To SOLVE the problem, go to EZGenerator >> Project Settings - Upload tab, press Re-upload Data button and then run Upload.';
	elseif(!$handle=@fopen($c_db_details_fname,'a+b')) $result=$chmod_err_msg;
	else 
	{
		$new_record='';  // record details 
		$fsize=filesize($c_db_details_fname);
		flock($handle,LOCK_EX);	
		$new_record.=($fsize==0)? $first_line.$f_lf.implode('|',$stat_detailed).$f_lf: implode('|',$stat_detailed).$f_lf;
		fwrite($handle,$new_record); 	
		flock($handle,LOCK_UN);
		fclose($handle);
	
		if(!$handle2=@fopen($c_db_totals_fname,'r+b')) $result=$chmod_err_msg;	 // record totals 
		else
		{
			$fsize2=filesize($c_db_totals_fname);
			
			flock($handle2, LOCK_EX);	
			if($fsize2>0) $file_contents=fread($handle2,$fsize2);
			else $file_contents=$first_line.'<totals> </totals>*/ ?>';
			
			if($rss_flag)
			{
				if(strpos($file_contents,'<rss_'.$page_id.'>')!==false)  //RSS total by page
				{
					$old=f_GFS($file_contents,'<rss_'.$page_id.'>','</rss_'.$page_id.'>');
					$file_contents=str_replace('<rss_'.$page_id.'>'.$old.'</rss_'.$page_id.'>','<rss_'.$page_id.'>'.($old+1).'</rss_'.$page_id.'>',$file_contents);
				}
				else $file_contents=str_replace('</totals>','<rss_'.$page_id.'>1</rss_'.$page_id.'>'.'</totals>',$file_contents);
				
				if(isset($_GET['fl']))
				{
					if(strpos($file_contents,'<flrss_'.$page_id.'>')!==false)  //RSS total by page
					{
						$old=f_GFS($file_contents,'<flrss_'.$page_id.'>','</flrss_'.$page_id.'>');
						$file_contents=str_replace('<flrss_'.$page_id.'>'.$old.'</flrss_'.$page_id.'>','<flrss_'.$page_id.'>'.($old+1).'</flrss_'.$page_id.'>',$file_contents);
					}
					else $file_contents=str_replace('</totals>','<flrss_'.$page_id.'>1</flrss_'.$page_id.'>'.'</totals>',$file_contents);
				}
			}
			else
			{
				if(strpos($file_contents,'<l_'.$page_id.'>')!==false)  //REGISTER total loads by page
				{
					$old=f_GFS($file_contents,'<l_'.$page_id.'>','</l_'.$page_id.'>');
					$file_contents=str_replace('<l_'.$page_id.'>'.$old.'</l_'.$page_id.'>','<l_'.$page_id.'>'.($old+1).'</l_'.$page_id.'>',$file_contents);
				}
				else $file_contents=str_replace('</totals>','<l_'.$page_id.'>1</l_'.$page_id.'>'.'</totals>',$file_contents);

				if(strpos($file_contents,'<loads>')!==false)  //REGISTER total loads 
				{
					$old=f_GFS($file_contents,'<loads>','</loads>');
					$total_loads=$old+1; 
					$file_contents=str_replace('<loads>'.$old.'</loads>','<loads>'.$total_loads.'</loads>', $file_contents);
				}
				else $file_contents=str_replace('</totals>', '<loads>'.$total_loads.'</loads>'.'</totals>', $file_contents);

				if(strpos($file_contents,'<unique>')!==false) $total_unique=f_GFS($file_contents,'<unique>','</unique>');

				if(strpos($file_contents,'<unique>')!==false && $uniq_flag==true)  //REGISTER unique visitor total
				{
					$file_contents=str_replace('<unique>'.$total_unique.'</unique>','<unique>'.($total_unique+1).'</unique>', $file_contents);
					$total_unique+=1;
				}
				elseif(strpos($file_contents,'<unique>')===false && $uniq_flag==true)
				{ 
					$file_contents=str_replace('</totals>','<unique>1</unique></totals>', $file_contents);
					$total_unique=1;
				}
				elseif(strpos($file_contents,'<unique>')===false) 
					$file_contents=str_replace('</totals>','<unique>0</unique></totals>', $file_contents);

				if(strpos($file_contents,'<first>')!==false && $uniq_flag==true && $firsttime_flag==true)  //REGISTER first time visitor total
				{
					$old=f_GFS($file_contents,'<first>','</first>');
					$file_contents=str_replace('<first>'.$old.'</first>','<first>'.($old+1).'</first>', $file_contents);
				}
				elseif(strpos($file_contents,'<first>')===false && $uniq_flag==true && $firsttime_flag==true) 
					$file_contents=str_replace('</totals>','<first>1</first></totals>', $file_contents);
				elseif(strpos($file_contents,'<first>')===false)
					$file_contents=str_replace('</totals>','<first>0</first></totals>', $file_contents); 

				if(strpos($file_contents,'<returning>')!==false && $uniq_flag==true && $firsttime_flag==false)  //REGISTER returning visitor total
				{
					$old=f_GFS($file_contents,'<returning>','</returning>');
					$file_contents=str_replace('<returning>'.$old.'</returning>','<returning>'.($old+1).'</returning>', $file_contents);
				}
				elseif(strpos($file_contents,'<returning>')===false && $uniq_flag==true && $firsttime_flag==false)  
					$file_contents=str_replace('</totals>','<returning>1</returning></totals>', $file_contents);
				elseif(strpos($file_contents,'<returning>')===false)
					$file_contents=str_replace('</totals>','<returning>0</returning></totals>', $file_contents);
			}

			ftruncate($handle2,0);
			fseek($handle2,0);
			fwrite($handle2,$file_contents); 
			flock($handle2,LOCK_UN);
			fclose($handle2);

			settype($loads_start_count,"integer");
			settype($unique_start_count,"integer");
			$result=($display==1)?($total_loads+$loads_start_count):($total_unique+$unique_start_count);
		}
	}
	return $result;	
}
function process_counter()
{
	global $f_counter_images,$c_version,$c_db_settings_fname,$c_db_totals_fname,$C_MAX_VISIT_LENGHT,$C_DISPLAY,$C_GRAPHICAL,$C_UNIQUE_START_COUNT, $C_LOADS_START_COUNT, $C_NUMBER_OF_DIGITS,$page_id;
	
	$action_id=isset($_REQUEST['action'])?f_strip_tags($_REQUEST['action']):'hit';
	$timestamp=time();
	$day_timestamp=mktime(0,0,0,date('n',$timestamp),date('j',$timestamp),date('Y',$timestamp));
	$page_id=(isset($_REQUEST['pid'])? intval($_REQUEST['pid']): $page_id);
	$firsttime_flag=false; $uniq_flag=false;
	$visible=(isset($_REQUEST['visible'])&& $_REQUEST['visible']==0?false:true);

	$settings=f_read_file($c_db_settings_fname);
	$display=f_GFS($settings,'<display>','</display>'); if($display=='') $display=$C_DISPLAY;
	$loads_start_count=f_GFS($settings,'<loads_start_value>','</loads_start_value>'); if($loads_start_count=='') $loads_start_count=$C_LOADS_START_COUNT;
	$unique_start_count=f_GFS($settings,'<unique_start_value>','</unique_start_value>'); if($unique_start_count=='') $unique_start_count=$C_UNIQUE_START_COUNT;	
	$cookie_suffix=f_GFS($settings,'<counter_cookie_suffix>','</counter_cookie_suffix>');	
	$rss_count=f_GFS($settings,'<rss_count>','</rss_count>'); if($rss_count=='') $rss_count='0';
	
	if($action_id=="version") echo $c_version;
	elseif($action_id=="rss")
	{ 
		if($rss_count=='1')
		{
			$stat_detailed=f_build_detailed_stat($timestamp,$page_id,$uniq_flag,$firsttime_flag,true);
			$rss_counts=c_write_stat($stat_detailed,$day_timestamp,$page_id,$uniq_flag,$firsttime_flag,$display,$loads_start_count,$unique_start_count,true);
		}
	}
	elseif($action_id=="hit")
	{
		if(isset($page_id) && !isset($_COOKIE['visit_from_admin']))
		{
			$max_visit_len=f_GFS($settings,'<max_visit_len>','</max_visit_len>'); if($max_visit_len=='') $max_visit_len=$C_MAX_VISIT_LENGHT;

			if(!isset($_COOKIE['u_mvl'.$cookie_suffix]))
			{
				setcookie('u_mvl'.$cookie_suffix, md5(uniqid(mt_rand(),true)),$timestamp+$max_visit_len);
				$uniq_flag=true;
			}
			if(!isset($_COOKIE['f_time'.$cookie_suffix]))
			{
				$expire_timestamp=mktime(23,59,59, date('n',$timestamp),date('j',$timestamp),2037);
				setcookie('f_time'.$cookie_suffix, md5(uniqid(mt_rand(),true)),$expire_timestamp);
				$firsttime_flag=true;
			}
			$stat_detailed=f_build_detailed_stat($timestamp, $page_id, $uniq_flag, $firsttime_flag);
			$counts=c_write_stat($stat_detailed,$day_timestamp,$page_id,$uniq_flag,$firsttime_flag,$display,$loads_start_count,$unique_start_count);
			if(strpos($counts, 'ERROR')!==false) { echo "\ndocument.write(' $counts ');\n";	exit;}
		}
		else 
		{
			$counter_stat=f_read_tagged_data($c_db_totals_fname,'totals');
			if($display==1)	{$tag='loads';settype($loads_start_count,"integer");$add=intval($loads_start_count);}
			else{$tag='unique';settype($unique_start_count,"integer");$add=intval($unique_start_count);}

			$counts=f_GFS($counter_stat,'<'.$tag.'>','</'.$tag.'>'); 
			settype($counts,"integer"); 
			$counts+=$add; 	
		}
		if($visible) 
		{
			$number_of_digits=f_GFS($settings,'<number_digits>','</number_digits>'); if($number_of_digits=='') $number_of_digits=$C_NUMBER_OF_DIGITS;
			$graphical=f_GFS($settings,'<graphical>','</graphical>');
			if($graphical=='') $graphical=$C_GRAPHICAL;

			if($graphical=='1')
			{	
				$id=f_GFS($settings,'<size>','</size>'); if($id=='') $id='1';
				$dir_pr=(isset($_REQUEST['root']) && ($_REQUEST['root']=='true'))?'':'../';
				$ipath=$dir_pr.'ezg_data/c'.intval($id).'.gif';	
				$wh=explode('|',$f_counter_images[$id-1]);
				$code=c_return_counter_html(intval($number_of_digits),$ipath,intval($wh[1]),intval($wh[0]),$counts);
				echo "document.write('".$code."');";
			}
			else 
			{
				$digits_string='';
				$max_d=strlen($counts);
				if($number_of_digits>$max_d){for($i=0;$i<($number_of_digits-$max_d); $i++) $digits_string.='0';}
				$digits_string.=$counts; 
				echo "\ndocument.write(' $digits_string ');\n";
			}
		}
	}
}
process_counter();
?>
