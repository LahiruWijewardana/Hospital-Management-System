<?php
$version="ezgenerator mobile support 1.0";
/*
	http://www.ezgenerator.com
	Copyright (c) 2004-2013 Image-line
*/

function f_GFS($src,$start,$stop)
{
	if($start=='')$res=$src;
	else if(strpos($src,$start)===false){$res='';return $res;}
	else $res=substr($src,strpos($src,$start)+strlen($start));
	if(($stop!='')&&(strpos($res,$stop)!==false))$res=substr($res,0,strpos($res,$stop));
	return $res;
}

function f_GFSAbi($src,$start,$stop){$res2=f_GFS($src,$start,$stop);return $start.$res2.$stop;}

$contents='';
$filename='../index_mobile.html';
$fsize=filesize($filename);
if($fsize>0) {$fp=fopen($filename,'r');$contents=fread($fp,$fsize);fclose($fp);}
$menu=f_GFSAbi($contents,'<ul id="ms_sitemap">','</div></ul>');
if(isset($_REQUEST['root'])&&($_REQUEST['root']==0))
{
	$menu=str_replace('href="','href="../',$menu);
	$menu=str_replace('href="../http','href="http',$menu);
} 

echo $menu;
?>
