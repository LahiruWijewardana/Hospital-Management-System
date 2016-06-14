<?php
$version="ezgenerator captcha V4 - 1.3";
/*
	centraladmin.php
	http://www.ezgenerator.com
	Copyright (c) 2004-2013 Image-line
*/

$c_captcha_img_type=strtolower('gif');
$f_captcha_size='small';
$f_proj_id='422595382866898';

function f_draw_captcha($captcha)
{
	global $c_captcha_img_type,$f_captcha_size;

	$sa=array(16,25,'csmall.gif',1,2,25,30,'cmedium.gif',3,2,45,50,'clarge.gif',4,6);
	$ss=($f_captcha_size=='small')?0:(($f_captcha_size=='medium')?5:10);
	$g=$c_captcha_img_type=='gif';
	$h=($g)?($sa[$ss]+2):18;
	$w=($g)?(($sa[$ss+1]*4)+2)+17:105;
	$im=imagecreate($w,$h);
	
	if($g)
	{
		$src=imagecreatefromgif($sa[$ss+2]);
		$clr1=imagecolorallocate($im,255,255,255);
	}
	else
	{
		$bg=imagecolorallocate($im,255,255,255);
		for($i=0;$i<100;$i++){$clr2=imagecolorallocate($im,rand(110,255),rand(110,255),rand(110,255));$x=rand(0,105);$y=rand(0,18);imageline($im,$x,$y,$x+rand(0,3),$y+2,$clr2);}
		for($i=0;$i<10;$i++){$x=rand(0,120);$y=rand(0,18);$xs=rand(180,255);$clr2=imagecolorallocate($im,$xs,$xs,$xs);imagearc($im,$x,$y,rand(10,30),rand(15,30),rand(0,360),rand(180,360),$clr2);}
		$clr1=imagecolorallocate($im,120,120,120);
	}
	
	imagerectangle($im,0,0,$w-1,$h-1,$clr1);
	$result='';
	for($i=0;$i<strlen($captcha);$i++)
 	{
		$char=substr($captcha,$i,1);
		$or=ord($char)-65;
		$xaz=25;
		if($g){$yas2=rand(-1,$sa[$ss+3]);$xas2=rand(-$sa[$ss+4],$sa[$ss+4]);imagecopy($im,$src,($i*$sa[$ss+1])+1,1,0,($or*$sa[$ss])+$yas2,$sa[$ss+1],$sa[$ss]);}
		else{$xas2=rand(5,14);$yas2=rand(-1,3);$clr=imagecolorallocate($im,rand(0,110),rand(0,110),rand(0,110));imagestring($im,5,$i*$xaz+$xas2,$yas2,$char,$clr);}
	}
	$or=26;
  if($g){imagecopy($im,$src,(4*$sa[$ss+1])+1,1,0,($or*$sa[$ss]),17,$sa[$ss]);}
  else{$xas2=rand(5,14);$yas2=0;$clr=imagecolorallocate($im,rand(0,110),rand(0,110),rand(0,110));imagestring($im,5,$i*$xaz+$xas2,$yas2,$char,$clr);}
	

	$img_type=(function_exists("image".$c_captcha_img_type))?$c_captcha_img_type:((function_exists("imagegif"))?'gif':(function_exists("imagejpeg"))?'jpeg':((function_exists("imagepng")))?'png':'');
	if($img_type!='')
	{
		header("Content-type: image/$img_type");
		header("Cache-Control: no-cache");
  	header("Pragma: no-cache");
		if($img_type=='gif') imagegif($im);elseif($img_type=='jpeg') imagejpeg($im);elseif($img_type=='png') imagepng($im);
	}
	imagedestroy($im);
}

function f_generate_captcha_code2()
{
	global $f_proj_id;
	
	$str="";
	for($i=0;$i<4;$i++) $str.=chr(rand(97,122));
	$str=strtoupper($str);	
	
	$ssp='';  
	if(($ssp!='')&&(strpos($ssp,'%SESSIONS_')===false)) session_save_path($ssp);
	session_name('PHPSESSID'.$f_proj_id);
	session_start();	
	$_SESSION['CAPTCHA_CODE']=md5($str);
	session_write_close();
	return $str;
}


$code=f_generate_captcha_code2();
if(isset($_GET['asStr'])) print f_generate_captcha_code2(); 
else f_draw_captcha($code);
?>
