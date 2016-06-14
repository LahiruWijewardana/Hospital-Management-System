<?php
$version="EZGenerator Rss Reader 0.108";
/*
	rssReader.php
	http://www.ezgenerator.com
	Copyright (c) 2004-2013 Image-line
*/

$lang = array(
'NO' => array('Januar','Februar','Mars','April','Mai','Juni','July','August','September','Oktober','November','Desember','Søndag','Mandag','Tirsdag','Onsdag','Torsdag','Fredag','Lørdag','Sø','Ma','Ti','On','To','Fr','Lø','Les mere'),
'NL' => array('Januari','Februari','Maart','April','Mei','Juni','July','Augustus','September','October','November','December','Zondag','Maandag','Dinsdag','Woensdag','Donderdag','Vrijdag','Zaterdag','Zo','Ma','Di','Wo','Do','Vr','Za','Lees meer'),
'SL' => array('Januar','Februar','Marec','April','Maj','Junij','Julij','Avgust','September','Oktober','November','December','Nedelja','Ponedeljek','Torek','Sreda','Cetrtek','Petek','Sobota','Ne','Po','To','Sr','Ce','Pe','So','Read more'),
'PT' => array('Janeiro','Fevereiro','Marco','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro','domingo','segunda feira','terca feira','quarta feira','quinta feira','sexta feira','sabado','Dom','Seg','Ter','Qua','Qui','Sex','Sab','Read more'),
'FR' => array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre','Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Di','Lu','Ma','Me','Je','Ve','Sa','En savoir plus'),
'ES' => array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre','domingo','lunes','martes','miercoles','jueves','viernes','sabado','Do','Lu','Ma','Mi','Ju','Vi','Sa','Leer más'),
'CS' => array('leden','únor','březen','duben','květen','červen','červenec','srpen','září','říjen','listopad','prosinec','neděle','pondělí','úterý','středa','čtvrtek','pátek','sobota','ne','po','út','st','čt','pá','so','Read more'),
'RU' => array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь','Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Вс','Пн','Вт','Ср','Чт','Пт','Сб','читать далее'),
'DE' => array('Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember','Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag','So','Mo','Di','Mi','Do','Fr','Sa','Mehr lesen'),
'HE' => array('ינואר','פבואר','מרץ','אפריל','מאי','יוני','יולי','אוגוסט','ספטמבר','אוקטובר','נובמבר','דצמבר','ראשון','שני','שלישי','רביעי','חמישי','שישי','שבת','א\'','ב\'','ג\'','ד\'','ה\'','ו\'','שבת','Read more'),
'PL' => array('Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień','Niedziela','Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','N','Pn','Wt','Śr','Cz','Pt','So','Read more'),
'IT' => array('Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre','Domenica','Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato','Do','Lu','Ma','Me','Gi','Ve','Sa','Read more'),
'BG' => array('Януари','Февруари','Март','Април','Май','Юни','Юли','Август','Септември','Октомври','Ноември','Декември','Неделя','Понеделник','Вторник','Сряда','Четвъртък','Петък','Събота','Не','По','Вт','Ср','Че','Пе','Съ','Read more'),
'HU' => array('Január','Február','Március','Április','Május','Június','Július','Augusztus','Szeptember','Október','November','December','Vasárnap','Hétfő','Kedd','Szerda','Csütörtök','Péntek','Szombat','Va','Hé','Ke','Sz','Cs','Pé','Sz','Read more')
);


$buttonhtml='';
$page_charset='UTF-8';

function my_substr($string,$start,$stop,$utf_date_flag=false)
{
	$use_mb=function_exists('mb_strtolower');
	if($use_mb) return mb_substr($string, $start, $stop, 'UTF-8');
	else
	{
		$c=$string;$f=ord($c[0]);$nb=$stop;
		if($f>=0 && $f<=127)	$nb=$stop;
		if($f>=192 && $f<=223 && !$utf_date_flag)	$nb=$stop;
		if($f>=192 && $f<=223 && $utf_date_flag)	$nb=$stop*2;
		if($f>=224 && $f<=239 && $utf_date_flag) $nb=$stop*3;
		if($f>=240 && $f<=247 && $utf_date_flag) $nb=$stop*4;
		if($f>=248 && $f<=251 && $utf_date_flag) $nb=$stop*5;
		if($f>=252 && $f<=253 && $utf_date_flag) $nb=$stop*6;
		return substr($string,$start,$nb);
	}
}

class RSSCache
{
	var $BASEDIR='../innovaeditor/assets/';
	var $MA=3600;

	function set($url,$rss,$pg_root)
	{
		$cache_file=$this->file_name($url,$pg_root);
		$fp=@fopen($cache_file,'w');
		if(!$fp) return 0;
		$data=serialize($rss);
		fwrite($fp,$data);fclose($fp);
		return $cache_file;
	}

	function get($url,$pg_root)
	{
		$cache_file=$this->file_name($url,$pg_root);
		if(!file_exists($cache_file)) return 0;
		$fp=@fopen($cache_file,'r');
		if(!$fp)return 0;
		if($filesize=filesize($cache_file))
		{
			$data=fread($fp,filesize($cache_file));
			$rss=unserialize($data);
			return $rss;
		}
		return 0;
	}

	function check_cache($url,$pg_root)
	{
		$res='';
		$fname=$this->file_name($url,$pg_root);
		if(file_exists($fname))
		{
			$mtime=filemtime($fname);
			$age=time()-$mtime;
			if($this->MA>$age) $res='OK';
		}
		return $res;
	}

	function file_name($url,$pg_root)
	{
		$fname='cache_'.md5($url);
		$d=$this->BASEDIR;
		$d=($pg_root)?str_replace('../','',$d):$d;
		return join(DIRECTORY_SEPARATOR,array($d,$fname));
	}
	function clearall()
	{
		$files=array();
		if($handle=opendir($this->BASEDIR))
		{
			while(false!==($file=readdir($handle)))
			{
				if($file != "." && $file != ".." && strpos($file,'cache_')===0) $files[]=$file;
			}
		}
		closedir($handle);
		foreach($files as $k=>$v) unlink($this->BASEDIR.$v);
	}
}

function fstrip_tags($src,$len=0)
{
	$src=urldecode($src);
	$src=strip_tags($src);
	if($len!=0 && strlen(trim($src))>$len) $src='';
	return $src;
}

function gfs($src,$start,$stop)
{
	$src=is_array($src)?array_shift($src):$src;
	if($start=='') $res=$src;
	else if(strpos($src,$start)===false){$res='';return $res;}
	else $res=substr($src,strpos($src,$start)+strlen($start));
	if(($stop!='')&&(strpos($res,$stop)!==false)) $res=substr($res,0,strpos($res,$stop));
	return $res;
}

function gfsAbi($src,$start,$stop){$res2=gfs($src,$start,$stop);return $start.$res2.$stop;}

function gfsALL($src,$start,$stop)
{
	$res='';
	$src=is_array($src)?array_shift($src):$src;
	while(strpos($src,$start)!==false):
		$temp=gfs($src,$start,$stop);$src=str_replace($start.$temp,'',$src);$res.=$temp;
	endwhile;
	return $res;
}

function gfsAllAbi($src,$start,$stop,&$items)
{
	$src=is_array($src)?array_shift($src):$src;
	$res='';
	$temp=gfsAbi($src,'<items>','</items>');
	if($temp!=='')$src=str_replace($temp,'',$src);
	while(strpos($src,$start)!==false):
		$temp=gfsAbi($src,$start,$stop);$src=str_replace($temp,'',$src);$res.=$temp;$items[]=$temp;
	endwhile;
	return $res;
}

function page_navigation($total,$max,$max_page,$feed_id)
{
	if($total==0) return '';
	$output='';
	$total=$max>0?$max:$total;
	$pcount=ceil($total/$max_page);
	for($i=1;$i<$pcount+1;$i++)
  	$output.=' <span class="pg_nav'.($i==1?' nav_active':'').'" rel="'.$i.'" style="cursor:pointer;box-shadow: 0 0 0 2px rgba(0,0,0,0.4);background:'.($i==1?'#000':'#fff').';display:inline-block;width:8px;height:8px;border-radius:4px;margin-left:2px;" onclick="open_p('.$i.',this)"></span> ';

	return '<div class="user_nav nav_header" id="nav_header" style="margin: 4px 1px;text-align:center;">'.$output.'</div><script type="text/javascript">function open_p(pid,th){var feed=$(th).parents(".feed");$(feed).find(".rs").hide().filter("[rel="+pid+"]").show();if($(th).parent().hasClass("nav_footer")) {var top=$(feed).offset().top;if(top<$(window).scrollTop()) $("html,body").animate({scrollTop: top},"fast");} $(feed).find(".nav_active").removeClass("nav_active").css("background","#fff");$(feed).find(".pg_nav[rel="+pid+"]").addClass("nav_active").css("background","#000");};</script>';
}

class rssReader {
	var $ch_tags=array('title','link','description','language','copyright','managingEditor','webMaster','lastBuildDate','rating','docs');
	var $it_tags=array('title','link','description','author','category','comments','enclosure','guid','pubDate','source','media');
	var $ima_tags=array('title','link','url','width','height');
	var $ti_tags=array('title','link','description','name');

function parse($url,$do_caching,$pg_root)
{
	global $page_charset;
	$url=str_replace(array('-qm-','-htp-','-htps-'),array('?','http://','https://'),$url);
	if($do_caching)
	{
		$rcache=new RSSCache;
		$res=$rcache->check_cache($url,$pg_root);
	}

	if($do_caching && $res=='OK')$content=$rcache->get($url,$pg_root);
	else
	{
		$content='';
		if(strpos($url,'facebook.com')!==false) ini_set('user_agent','Mozilla/5.0 (Windows NT 6.0; rv:8.0) Gecko/20100101 Firefox/8.0');
		$content=file_get_contents($url);
		if($content==''){
			if ($fp=@fopen($url,'r')){while(!feof($fp))$content.=fgets($fp,4096);fclose($fp);}
			elseif(ini_get('allow_url_fopen')==0)
			{
				echo 'allow_url_fopen is disabled on your server. Either ask your provider to enable it or use "parse feed on ezgenerator.com" option!';
				exit;
			}
		}
	}

	if($content!=='')
	{
		if($do_caching && $res=='')$rcache->set($url,$content,$pg_root);
		$counter=0;$result['charset']='';$result['items']=array();
		$atom=strpos($content,'xmlns="http://www.w3.org/2005/Atom"')!==false;
		$cntmod=strpos($content,'xmlns:content="http://purl.org/rss/1.0/modules/content/')!==false;
		if($atom) $content=str_replace(array('<entry','</entry>','<content','</content','<published','</published'),array('<item','</item>','<description','</description','<pubDate','</pubDate'),$content);
		if($cntmod) $content=str_replace(array('<content:encoded','</content:encoded','<content','</content'),array('<description','</description','<description','</description'),$content);
		preg_match("'encoding=[\'\"](.*?)[\'\"]'si",$content,$matches);
		if(isset($matches[1])) $result['charset']=trim($matches[1]);
		$this->charset=($result['charset']!='')?$result['charset']:'UTF-8';

		if($page_charset=='UTF-8' && $result['charset']=='UTF-8')
			$content=preg_replace("/[\x{0340}-\x{0341}\x{17A3}\x{17D3}\x{2028}-\x{2029}\x{202A}-\x{202E}\x{206A}-\x{206B}\x{206C}-\x{206D}\x{206E}-\x{206F}\x{FFF9}-\x{FFFB}\x{FEFF}\x{FFFC}\x{1D173}-\x{1D17A}]+/u","",$content);

		$items=array();
		$content_items=gfsAllAbi($content,'<item','</item>',$items);
		$content=str_replace($content_items,'',$content);
		preg_match("'<channel.*?>(.*?)</channel>'si",$content,$res_channels);
		if(!isset($res_channels[1]))$res_channels[1]=gfsAbi($content,'<channel>','</channel>');
		if(isset($res_channels[1]))
		{
			foreach($this->ch_tags as $cht)
			{
				preg_match("'<$cht.*?>(.*?)</$cht>'si",$res_channels[1],$matches);
				if((isset($matches[1])) && ($matches[1] != '')) $result[$cht]=trim($matches[1]);
			}
		}

		preg_match("'<textinput(|[^>]*[^/])>(.*?)</textinput>'si",$content,$res_text);
		if(isset($res_text[2]))
		{
			foreach($this->ti_tags as $ti)
			{
				preg_match("'<$ti.*?>(.*?)</$ti>'si",$res_text[2],$matches);
				if((isset($matches[1]))&&($matches[1] != '')) $result['textinput_'.$ti]=trim($matches[1]);
			}
		}

		preg_match("'<image.*?>(.*?)</image>'si",$content,$res_image);
		if(isset($res_image[1]))
		{
			foreach($this->ima_tags as $it)
			{
				preg_match("'<$it.*?>(.*?)</$it>'si",$res_image[1],$matches);
				if((isset($matches[1]))&&($matches[1]!='')) $result['img_'.$it]=trim($matches[1]);
			}
		}

		foreach($items as $item)
		{
			foreach($this->it_tags as $itemtag)
			{
//check <tag> </tag> pattern
				preg_match("'<$itemtag.*?>(.*?)</$itemtag>'si",$item,$matches);
				if(isset($matches[1]))
				{
					$result['items'][$counter][$itemtag]=trim($matches[1]);
					continue; //skip next part, it's for <tag /> patterns only
				}

//check <tag /> pattern
				preg_match("'<$itemtag(.*?)/>'si",$item,$matches);
				if((isset($matches[1]))&&($matches[1]!=''))
				{
					preg_match_all('/( \\w{1,}="[^"]+"| \\w{1,}=\\w{1,}| \\w{1,})/i',$matches[0],$attr_res,PREG_PATTERN_ORDER);
					$attr_res=array_map('trim',$attr_res[0]);
					$result['items'][$counter][$itemtag]=$attr_res;
				}
			}
			$counter++;
		}

		$result['i_count']=$counter;
		return $result;
	}
	else return false;
}
} //end rssreader class

function encx($src,$q,$feed_chrset)
{
	global $page_charset;
	if($feed_chrset=='')$feed_chrset='UTF-8';
	$result=str_replace("\r\n"," ",$src);
	$result=str_replace("\n"," ",$result);
	$result=str_replace("\r"," ",$result);
	$result=str_replace("'","\'",$result);
	$result=str_replace("&amp;#","&#",$result);
	$result=str_replace("&amp;","&",$result);
	$result=str_replace("&#60;","<",$result);
	$result=str_replace("&lt;","<",$result);
	$result=str_replace("&gt;",">",$result);
	if($page_charset=='UTF-8')
	{
		if($feed_chrset=='iso-8859-1')$result=utf8_encode($result);
		elseif($feed_chrset!=='' && $feed_chrset!='UTF-8'){if(function_exists('iconv')) $result=iconv($feed_chrset,$page_charset,$result);}
	}
	elseif($page_charset=='iso-8859-1' && $feed_chrset=='UTF-8') $result=utf8_decode($result);
	if(strpos($result,'news.google.com')!==false)$result=str_replace(array('&quot;//',"&quot;"),array('"http://','"'),$result);
	return $result;
}

function getCdata($src)
{
	$result=is_array($src)?array_shift($src):$src;
	if(strpos($src,'CDATA[')!==false) $result=gfsALL($result,'CDATA[',']]');
	if(strpos($result,'<script')!==false){$script=gfsAbi($src,'<script','script>');$result=str_replace($script,'',$result);}
	return $result;
}

function show_feed2($req)
{
	global $lang,$buttonhtml;

	$rve_styles=array('0','4','12','20','28','36');
	$tic_h='';
	$rss=new rssReader;
	$urls=explode(';',strip_tags($req['url']));
	$etarget=(isset($req['etarget']))?fstrip_tags($req['etarget'],10):'_blank';
	$cache=(isset($req['cache']))?intval($req['cache']):1;
	$root=(isset($req['root']))?intval($req['root']):0;
	$df=(isset($req['df']))?fstrip_tags($req['df']):'';
	$loc=(isset($req['loc']))?fstrip_tags($req['loc']):'';if(!array_key_exists($loc,$lang))$loc='';
	$playlist=(isset($req['playlist']))?fstrip_tags($req['playlist']):'false';
	$desc_on=(isset($req['descon'])&&($req['descon']=='false'))?false:true;
	$media_on=isset($req['media'])?true:false;
	$appid=isset($req['ai'])?preg_replace("/[^0-9]/", "",$req['ai']):'202070823191961';
	$max=isset($req['max'])?intval($req['max']):0;
	$max_page=isset($req['max_page'])?intval($req['max_page']):0;
	if($max!=0 && $max<$max_page) $max_page=$max;
	$xwidth=isset($req['twidth'])?$req['twidth']:300;
	$no_vid_player=isset($req['novid'])&&$req['novid']=='1';
	$tawidth='width:'.((strpos($xwidth,'%')!==false)?intval($xwidth).'%':intval($xwidth).'px').';';

	for($i=0;$i<(count($urls));$i++)
	{
		if($i==0) $rs=$rss->parse($urls[$i],$cache,$root);
		else {$rs1=$rss->parse($urls[$i],$cache,$root);$rs['items']=array_merge($rs['items'],$rs1['items']);}
	}
	$tic_h_auto='0';
	$p_navigation='';

	$tic_id=(isset($req['tic_id'])&&($req['tic_id']!=''))?fstrip_tags($req['tic_id'],10):'';
	$feed_id='container_'.$tic_id;
	if(isset($rs['items']) && $max_page>0 && count($rs['items'])>$max_page)
		$p_navigation=page_navigation(count($rs['items']),$max,$max_page,$feed_id);

	if($rs===false || count($rs['items'])==0)$result='RSS feed not found or empty!';
	elseif($playlist!='false')
	{
		if(isset($rs['items'])&&(count($rs['items'])>0))
		{
			$rnd=isset($req['rand'])&&($req['rand']=='true');
			if($rnd)
			{
				$rs_keys=array_rand($rs['items'],($max>count($rs['items'])) ? count($rs['items']):$max);
				$temp_rs=array();
				foreach($rs_keys as $k=>$v) $temp_rs[]=$rs['items'][$v];
				$rs['items']=$temp_rs;
			}

			$counter=0;
			$itc=count($rs['items']);

			$pda=array();
			foreach($rs['items'] as $k=>$v) $pda[$k]=(isset($v['pubDate']))?strtotime($v['pubDate']):'';
			array_multisort($pda,SORT_DESC,SORT_NUMERIC,$rs['items']);
			if(isset($req['rev'])&&($req['rev']=='true'))$rs['items']=array_reverse($rs['items']);

			$result='';
			foreach($rs['items'] as $k=>$item)
			{
				$tit=getCdata($item['title']);$tit=encx($tit,false,$rs['charset']);
				$itemlink=getCdata($item['link']);

				if(isset($item['enclosure']))
				{
					$enc_src='';$enc_type='';$enc=$item['enclosure'];
					foreach($enc as $enc_attr)
					{
						if(strpos($enc_attr,'=')!==false)
						{
							list($enc_attr_name,$enc_attr_val)=explode('=',$enc_attr);
							if($enc_attr_name == 'url')
								$enc_src=($enc_attr_val[0] == '"')?substr($enc_attr_val,1,-1):$enc_atr_val;
							if($enc_attr_name == 'type')
								$enc_type=($enc_attr_val[0] == '"')?substr($enc_attr_val,1,-1):$enc_atr_val;
						}
					}
					if($enc_type == 'audio/mpeg')
					{
						if($desc_on && (isset($item['description'])))
						{
							$desc=$item['description'];
							if($no_vid_player) convert_vid_to_img($desc);
							if(strpos($desc,'CDATA[')!==false)
							{
								$desc=getCdata($desc);
								$desc=encx($desc,true,$rs['charset']);
							}
							else
								$desc=encx($desc,true,$rs['charset']);

							$result.='<li><a href="'.$enc_src.'">'.$tit.'</a><p class="desc">'.$desc.'</p></li>';
						}
						else $result.='<li><a href="'.$enc_src.'">'.$tit.'</a></li>';
					}
				}
				$counter++;
				if(($max>0)&&($max==$counter)) break;
			}
		}

		if($playlist=='playlist')
		{
			$r=($root?'':'../');
			$skins=array('blue','dark','il','page-player');
			$skin=isset($req['skin']) && array_search($req['skin'],$skins)?$req['skin']:'blue';
			$sc='<link rel="stylesheet" type="text/css" href="'.($root?'':'../').'extdocs/'.$skin.'.css" />'
			.'<script src="'.$r.'extdocs/soundmanager2.js"></script>'
			.'<script type="text/javascript">'
			.'var PP_CONFIG={';
			if(isset($req['ap'])) $sc.='autoStart:true,';
			if(isset($req['pn'])) $sc.='playNext:true,';
			$sc.='urlf:"'.$r.'extdocs"'
			.'}</script><script src="'.$r.'extdocs/'.$skin.'.js"></script>';
			$result=$sc.'<ul class="playlist" style="'.$tawidth.'">'.$result.'</ul>';
		}
		else
		{
			print $result;exit;
		}
	}
	else
	{
		$tic_c=(isset($req['tic_c'])&&($req['tic_c']!=''))?intval($req['tic_c']):'1';
		$tic_h='';
		if(isset($req['tic_h'])&&($req['tic_h']!=''))
		{
			$tic_h_auto=($req['tic_h']=='auto')?'1':'0';
			$tic_h=$tic_h_auto=='1'?' ':intval($req['tic_h']);
		}
		$tic_h2='';$tic_h3=$tic_h_auto=='1'?'auto':$tic_h;

		$tic_nb=isset($req['tic_nb']);
		$tic_d=(isset($req['tic_d'])&&($req['tic_d']!=''))?intval($req['tic_d']):'3';
		if($tic_d<10)$tic_d=$tic_d*1000;
		$tic_du=(isset($req['tic_du'])&&($req['tic_du']!=''))?intval($req['tic_du']):'1';
		if($tic_du<10)$tic_du=$tic_du*1000;
		$tic_dir=(isset($req['tic_dir'])&&($req['tic_dir']!=''))?intval($req['tic_dir']):0;
		$rows=($tic_h=='' && isset($req['rows'])&&($req['rows']!=''))?intval($req['rows']):'1';
		$rowh=($rows>1 && isset($req['e_h'])&&($req['e_h']!=''))?'height:'.intval($req['e_h']).'px;':'';

		if($rows>1)$tawidth='';

		$result='<div id="'.$feed_id.'" class="feed '.$feed_id.'" style="'.$tawidth;

//deprecated
		if(isset($req['bgcolor']) && $req['bgcolor']!=='none') $result.='background:#'.fstrip_tags($req['bgcolor'],6).';';
		if(isset($req['tbstyle']) && $req['tbstyle']!=='none') $result.=sprintf('border: %spx %s #%s;',intval($req['tbwidth'],8),fstrip_tags($req['tbstyle'],8),fstrip_tags($req['tbcolor'],6));
//end deprecated
		$result.= '">';
		if($p_navigation!='') $result.='<div>'.$p_navigation.'</div>';
		$ali=(isset($req['align']))?fstrip_tags($req['align'],10):0;
		$al=($ali>0)?'<p class="rvps'.$ali.'">':'';
		$ale=($ali>0)?'</p>':'';
		$link=isset($rs['link'])?getCdata($rs['link']):'';

		if(isset($req['headeron'])&&($req['headeron']=='true'))
		{
			$result.='<div>';
//main title
			$tit=(isset($rs['title']))?encx(getCdata($rs['title']),false,$rs['charset']):'';
			$imatit=(isset($rs['img_title']))?encx(getCdata($rs['img_title']),false,$rs['charset']):'';
			$result.=$al.'<a class="rvts'.$rve_styles[fstrip_tags($req['h'])].'" target="'.$etarget.'" href="'.$link.'">'.$tit.'</a><br>'.$ale;
//main image
			if(($req['ima']=='true')&&((isset($rs['img_url']))&&($rs['img_url']!= '')))
			{
				$imalink=getCdata($rs['img_link']);
				$result.='<a href="'.$imalink.'"><img src="'.$rs['img_url'].'" alt="'.$imatit.'"></a><br>';
			}

			if((isset($rs['description']))&&($rs['description']!==$rs['title']))
			{
				$desc=$rs['description'];
				if(strpos($desc,'CDATA[')!==false) {$desc=getCdata($desc);$result.=encx($desc,true,$rs['charset']);}
				else {$desc=encx($desc,true,$rs['charset']);$result.=$al.'<span class="rvts0">'.$desc.'</span>'.$ale;}
			}
			$result.='</div>';
		}

		if(isset($rs['items'])&&(count($rs['items'])>0))
		{
			$tic_id2=($tic_id!='')?'id="'.$tic_id.'"':'';
			$rnd=isset($req['rand'])&&($req['rand']=='true');
			if($rnd)
			{
				$mk=($max>count($rs['items']) || $max<1)?count($rs['items']):$max;
				$rs_keys=array_rand($rs['items'],$mk);
				$temp_rs=array();

				if(is_array($rs_keys))foreach($rs_keys as $k=>$v) $temp_rs[]=$rs['items'][$v];
				else $temp_rs[]=$rs['items'][$rs_keys];
				$rs['items']=$temp_rs;
			}

			$counter=0;

			$title_on=(isset($req['titleon'])&&($req['titleon']=='false'))?false:true;
			$titlelink=(isset($req['titlelink'])&&($req['titlelink']=='false'))?false:true;

			$itc=count($rs['items']);

			if(!isset($req['cbb'])) $req['cbb']='';
			if(!isset($req['cbwidth'])) $req['cbwidth']=0;
			$left_bo=strpos($req['cbb'],'l')!==false;
			$right_bo=strpos($req['cbb'],'r')!==false;
			$top_bo=strpos($req['cbb'],'t')!==false;
			$bot_bo=strpos($req['cbb'],'b')!==false;
			$bwidth=intval($req['cbwidth']);

			$inn_h='';
			if($tic_h!='' && $tic_h_auto=='0')
			{
				$tic_h2=$tic_h*$tic_c;$boffs=$bwidth*$tic_c;
				$inn_h='height:'.$tic_h.'px;';
				if($top_bo || $req['cbb']==''){$tic_h+=$boffs;$tic_h2+=$boffs;}
				if($bot_bo || $req['cbb']==''){$tic_h+=$boffs;$tic_h2+=$boffs;}
				$tic_h='height:'.$tic_h.'px;';
				$tic_h2='height:'.$tic_h2.'px;';
			}

			$tww=intval(count($rs['items'])*$xwidth);
			if($tww==0)$tww=2000;
			$result.='<div><div style="'.$tic_h2.'display:block;overflow:hidden;position:relative;'.((($tic_h!='') && $tic_dir==1)?$tawidth:'').'">'.
				'<ul '.$tic_id2.' style="'.$tic_h.'display:block;list-style:none;margin:0;padding:0;'.((($tic_h!='') && $tic_dir==1)?'width:'.$tww.'px;':'').'">';

			if(strpos($xwidth,'%')!==false)
			{
				$iwidth='auto';
				$rwidth=($rows>1)?intval(100/$rows).'%':$iwidth;
			}
			else
			{
				$iwidth=$xwidth-8;
				if($left_bo || $req['cbb']=='')$iwidth-=fstrip_tags($req['cbwidth']);
				if($right_bo || $req['cbb']=='')$iwidth-=fstrip_tags($req['cbwidth']);
				$rwidth=(($rows>1)?(intval($iwidth/$rows)-4):$iwidth).'px';
				$iwidth.='px';
			}

			$pda=array();
			foreach($rs['items'] as $k=>$v) $pda[$k]=(isset($v['pubDate']))?strtotime($v['pubDate']):'';
			if(!$rnd && count($urls)>1) array_multisort($pda,SORT_DESC,SORT_NUMERIC,$rs['items']);
			if(isset($req['rev'])&&($req['rev']=='true'))$rs['items']=array_reverse($rs['items']);

//enclosure preparation (not needed to be calculated each time in the loop)
			$enc_height = ($rwidth < 400)?$rwidth/1.23:$rwidth/1.65;

			foreach($rs['items'] as $k=>$item)
			{
				$pg=$max_page>0?ceil(($k+1)/$max_page):1;
				$clear=($rows>1 && (($counter%$rows)==0))?'clear:both;':'';
				if(isset($req['cbgcolor'])) //old code
				{
//deprecated
					$result.='<li class="rs" rel="'.$pg.'" style="'.($pg>1?'display:none;':'').$inn_h.';overflow:hidden;'.(($tic_dir==1)?'float:left;':'').'width:'.$rwidth.';'.$clear.$rowh;
					if(isset($req['cbgcolor']) && $req['cbgcolor']!=='none') $result .= 'background:#'.fstrip_tags($req['cbgcolor'],6).';';
					if(isset($req['cbstyle']) && $req['cbstyle']!=='none')
					{
						$result.=sprintf('border: %spx %s #%s;',$bwidth,fstrip_tags($req['cbstyle'],8),fstrip_tags($req['cbcolor'],6));
						if(isset($req['cbb'])&&($req['cbb']!==''))
						{
							if(!$top_bo)$result.='border-top-width:0px;';
							if(!$bot_bo)$result.='border-bottom-width:0px;';
							if(!$left_bo)$result.='border-left-width:0px;';
							if(!$right_bo)$result.='border-right-width:0px;';
						}
					}
					$result.='">';
//end deprecated
				}
				elseif(isset($req['xcss'])) $result.='<li class="rs" rel="'.$pg.'" style="'.($pg>1?'display:none;':'').'">';
				else $result.='<li class="rs" rel="'.$pg.'" style="'.($pg>1?'display:none;':'').$inn_h.';overflow:hidden;'.(($tic_dir==1)?'float:left;':'').'width:'.$rwidth.';'.$clear.$rowh.'">';

				$tit=getCdata($item['title']);$tit=encx($tit,false,$rs['charset']);
				$st=intval($req['style'])-4;
				$cnt='';
				if(isset($req['cnt']))
				{
					$cnts=intval(str_replace('true','1',$req['cnt']));
					if($cnts==1)$cnt='<span class="rvts'.$st.'">'.strval($counter+1).'.  </span>';
					elseif($cnts==2)$cnt='<img class="bullet" src="'.($root?'':'../').'images/bullet1.gif" alt="">';
					elseif($cnts==3)$cnt='<img class="bullet" src="'.($root?'':'../').'images/bullet2.gif" alt="">';
				}
				$itemlink=getCdata($item['link']);
				if($title_on)
				{
					$title=($titlelink)?'<a class="rvts'.intval($req['style']).'" target="'.$etarget.'" href="'.$itemlink.'">'.$tit.'</a>'
					:'<span class="rvts'.intval($req['style']).'">'.$tit.'</span>';
					$result.='<div class="rss_title">'.$al.$cnt.$title.$ale.'</div>';
				}
				else $result.=$cnt;
				if(($req['dateon']=='true')&&(isset($item['pubDate'])))
				{
					$pd=$item['pubDate'];
					$dtx=strtotime((string)($pd));
					$mm=strtolower(date('M',$dtx));
					if($df!=='')
					{
						if($loc!='')
						{
							$dfx=str_replace('l','%1%',$df); //full day
							$dfx=str_replace('D','%2%',$dfx); //3 letters day
							$dfx=str_replace('F','%3%',$dfx); //full month
							$dfx=str_replace('M','%4%',$dfx); //3 letters month

							$pd=date($dfx,$dtx);
							if(strpos($df,'l')!==false) {$day=intval(date('N',$dtx));$pd=str_replace('%1%',$lang[$loc][$day+12],$pd);}
							if(strpos($df,'D')!==false) {$day=intval(date('N',$dtx));$pd=str_replace('%2%',$lang[$loc][$day+19],$pd);}
							if(strpos($df,'F')!==false) {$month=intval(date('n',$dtx));$pd=str_replace('%3%',$lang[$loc][$month-1],$pd);}
							if(strpos($df,'M')!==false) {$month=intval(date('n',$dtx));$pd=str_replace('%4%',my_substr($lang[$loc][$month-1],0,3),$pd);}
						}
						else $pd=date($df,$dtx);
					}
					else if(strpos($pd,'.')!==false)
					{
						$pd=gfs($pd,'','.');
						$pd=str_replace('T',' ',$pd);
					}
					else
					{
						if(strpos($pd,'+')!==false)$pd=gfs($pd,'','+');
						if(strpos($pd,'-')!==false)$pd=gfs($pd,'','-');
					}
					$result.='<div class="rss_date '.$mm.'">'.$al.'<span class="rvts'.intval($req['datestyle']).'">'.$pd.'</span>'.$ale.'</div>';
				}

				if(isset($req['div'])&&($req['div']>0)) $result.='<p style="line-height:'.intval($req['div']).'px">&nbsp;</p>';

//enclosure handling   //TODO maybe here should be a loop for these
				if(isset($item['enclosure']))
				{
					$enc_src = '';
					$enc_size = '';
					$enc_type = '';
					$enc = $item['enclosure'];
					foreach($enc as $enc_attr)
					{
						list($enc_attr_name, $enc_attr_val) = explode('=',$enc_attr);
						if($enc_attr_name == 'url')
							$enc_src=($enc_attr_val[0] == '"')?substr($enc_attr_val,1,-1):$enc_atr_val; //removing the quotes
						if($enc_attr_name == 'type')
							$enc_type=($enc_attr_val[0] == '"')?substr($enc_attr_val,1,-1):$enc_atr_val;
						if($enc_attr_name == 'length')
							$enc_size=($enc_attr_val[0] == '"')?substr($enc_attr_val,1,-1):$enc_atr_val;
					}

					if($enc_type == 'video/quicktime')
					{
						$youtube_vid_id = substr($enc_src,strpos($enc_src,'watch%3Fv%3D')+12,11);
						$result.='<div class="rss_enclosure"><iframe class="youtube-player" type="text/html" width="'.$rwidth.'" height="'.$enc_height.'" src="http://www.youtube.com/embed/'.$youtube_vid_id.'" frameborder="0"></iframe></div>';
					}
					elseif($enc_type == 'image/jpeg' || $enc_type == 'image/gif' || $enc_type == 'image/png')
					{
						$img='<img width="120px" align="left" style="margin: 3px 4px 3px 0;" alt="" src="'.$enc_src.'">';
						$desc=isset($item['description'])?$item['description']:'';
						if(strpos($desc,'<![CDATA[')!==false)	$desc=str_replace('<![CDATA[','<![CDATA['.$img,$desc);
						else $desc=$img.$desc;
						$item['description']=$desc;
					}
				}
				if($media_on && isset($item['media']))
				{
          $media_url='';$media_type='';$media=$item['media'];
					foreach($media as $media_attr)
					{
						if(strpos($media_attr,'=')!==false)
						{
							list($media_attr_name,$media_attr_val)=explode('=',$media_attr);
							if($media_attr_name == 'url')
								$media_url=($media_attr_val[0] == '"')?substr($media_attr_val,1,-1):$media_attr_val;
							if($media_attr_name == 'type')
								$media_type=($media_attr_val[0] == '"')?substr($media_attr_val,1,-1):$media_attr_val;
						}
					}
					if($media_type=='image/jpeg' || $media_type=='image/gif' || $media_type=='image/png')  $result.='<a target="'.$etarget.'" href="'.$itemlink.'"><img class="rss_media" style="max-width:100%" src="'.$media_url.'"></a>';
				}

				if($desc_on && (isset($item['description'])))
				{
					$desc=$item['description'];
					if($no_vid_player) convert_vid_to_img($desc);
					if(strpos($desc,'CDATA[')!==false){$desc=getCdata($desc);$temp=encx($desc,true,$rs['charset']);}
					else
					{
						$desc=encx($desc,true,$rs['charset']);
						if(isset($req['descstyle'])) {$dsst=intval($req['descstyle']);$temp=$al.'<span class="rvts'.$dsst.'">'.$desc.'</span>'.$ale;}
						else $temp=$al.$desc.$ale;
					}
					$temp=str_replace('HTTP','http',$temp);
					$temp=str_replace(' src="http',' msrc="http',$temp);
					$temp=str_replace(' src="',' src="'.dirname($link).'/',$temp);
					$temp=str_replace(' msrc="http',' src="http',$temp);
					$result.='<div class="rss_desc">'.$temp.'</div>';
				}
    		$fb=isset($req['fb']);
				$tw=isset($req['tw']);
				if(isset($req['s'])) {$fb=1;$tw=1;} //bw compat.
				$rm=isset($req['rm']);

				if($fb || $tw || $rm)
				{
					$result.='<div class="rss_social" style="position:relative;height:22px;margin:7px 0;">';
					if($rm)
					{
						$bc=$loc!=''?$lang[$loc][26]:'Read more';
						$bc=isset($req['rmc'])&&($req['rmc']!='')?fstrip_tags($req['rmc']):$bc;
						if($buttonhtml!='')
						{
							if(strpos($buttonhtml,'class="art-button"')!==false) $result.=str_replace(array('%BUTTON%','class="art-button"'),array($bc,'class="art-button" target="'.$etarget.'" href="'.$itemlink.'"'),$buttonhtml);
							else $result.=str_replace('%BUTTON%','<a target="'.$etarget.'" href="'.$itemlink.'">'.$bc.'</a>',$buttonhtml);
						}
						else $result.='<a class="input1 rss_more art-button" style="height:24px;width:80px;padding:1px 3px;text-decoration:none;" target="'.$etarget.'" href="'.$itemlink.'">'.$bc.'</a>';
					}
					$itemlink=urlencode($itemlink);
					if($tw) $result.='<div style="position:absolute;top:0px;right:'.($fb?'100':'0').'px;width:85px">'
										.'<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/tweet_button.html?url='.$itemlink.'" style="width:130px; height:20px;"></iframe></div>';
					if($fb) $result.='<div style="position:absolute;top:0px;right:0px;width:100px;">'
										.'<iframe src="//www.facebook.com/plugins/like.php?send=false&amp;layout=button_count&amp;width=110&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId='.$appid.'&amp;href='.$itemlink.'" scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:100px;height:21px;" allowTransparency="true"></iframe></div>';
					$result.='</div>';
				}
				$result.='</li>';
				$counter++;
				if(($max>0)&&($max==$counter)) break;
			}
			$result.='</ul></div></div>';
		}
		if($p_navigation!='') $result.='<div>'.str_replace('nav_header"','nav_footer"',$p_navigation).'</div>';
		$result.='</div>';
		if($tic_h!='')
		{
			$ap=1;if(isset($req['ap']) && $req['ap']=='0')$ap=0;
			$result.='<script type="text/javascript">$("#'.$tic_id.'").rssticker({speed:'.$tic_du.',height:"'.$tic_h3.'",width:"'.intval($xwidth)
				.'",delay:'.$tic_d.',hor:'.(($tic_dir==1)?'true':'false')
				.($tic_c>1?',count:'.$tic_c:'')
				.($ap==0?',autoplay:false':'')
				.($tic_nb?',hidebtn:false':'').'});</script>';
		}
	}

	return $result;
}

function get_video_image_from_embed($url) //this is same as in functions.php, but I don't want to include entire file for this only
{
	$image_url = parse_url($url);
	if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'
			|| $image_url['host'] == 'www.youtu.be' || $image_url['host'] == 'youtu.be'){
		return 'http://i3.ytimg.com/vi/'.gfs($url,'embed/','?').'/default.jpg';
	} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
		$hash = unserialize(file_get_contents('http://vimeo.com/api/v2/video/'.substr($image_url['path'], 1).'.php'));
		return $hash[0]["thumbnail_small"];
	}
}

function convert_vid_to_img(&$data)
{
	$vid_iframe	=gfsAbi($data,'&lt;iframe','&lt;/iframe&gt;');
	if($vid_iframe=='&lt;iframe&lt;/iframe&gt;') return;
	$vid_src	=gfs($vid_iframe,'src="','"');
	$data		=str_replace($vid_iframe,'<img src="'.get_video_image_from_embed($vid_src).'" />',$data);
}

function process_feed()
{
	global $page_charset,$version;
	if(isset($_REQUEST['action']))
	{
		if($_REQUEST['action']=="version") {echo $version;exit;}
		elseif($_REQUEST['action']=="clearcache")
		{
			$rcache=new RSSCache;
			$rcache->clearall();
		}
		elseif($_REQUEST['action']=='true' || ($_REQUEST['action']=='false'))
		{
			if(isset($_REQUEST['chrset']))$page_charset=$_REQUEST['chrset'];
			$result=show_feed2($_REQUEST);
			if(isset($_REQUEST['use_template']))
			{
				$pname='../documents/rss_template.html';
				$fs=filesize($pname);
				if($fs>0)
				{
					$fp=fopen($pname,"r");
					$page=fread($fp,$fs);
					fclose($fp);
					$body=gfsAbi($page,'<body','</body');
					$page=str_replace('%FEED%',stripcslashes($result),$page);
					print $page;
				}
				else print $result;
			}
			else print "document.write('".$result."');";
		}
	}
}

process_feed();
?>