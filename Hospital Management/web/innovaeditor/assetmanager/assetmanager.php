<?php
/*
*	EZGenerator asset manager.
*	Custom code.
*	V 0.9
*
*		Copyright (c) Image Line 2012
*/

include_once ('../../ezg_data/functions.php');
if($f_use_mysql) include_once ('../../ezg_data/mysql.php');

$logged_user='';$logged_admin=''; //g
$f_live=true;
f_innova_auth($logged_user,$logged_admin);
?>
<?php
include("settings.php");

/*** Permission ***/
$bReadOnly0=false;
$bReadOnly1=false;
$bReadOnly2=false;
$bReadOnly3=false;
/*** /Permission ***/

$sBaseRoot0="";
$sBaseRoot1="";
$sBaseRoot2="";
$sBaseRoot3="";
$sBaseRoot0=str_replace($sBaseVirtual0,"",$sBase0); //output: "c:/inetpub/wwwroot"
if($sBase1!="")$sBaseRoot1=str_replace($sBaseVirtual1,"",$sBase1);
if($sBase2!="")$sBaseRoot2=str_replace($sBaseVirtual2,"",$sBase2);
if($sBase3!="")$sBaseRoot3=str_replace($sBaseVirtual3,"",$sBase3);

$sMsg = "";
$currFolder=$sBase0;
$ffilter="";
$sUploadedFile="";
$resize=(isset($_REQUEST['resize']) && intval($_REQUEST['resize']) == 0)?false:true;

$MaxFileSize = false;
$AllowedTypes = "|gif|jpg|jpeg|png|mp3|swf|asf|avi|mpg|mpeg|wav|wma|mid|wmw|mov|ram|bmp|pdf|zip|rar|xml|doc|docx|flv|xls|xlsx|ppt|dwg|";

function isTypeAllowed($sFileName)
  {
  global $AllowedTypes;
  if($AllowedTypes=="*") return true;
  if((strpos($AllowedTypes,'|'.getExt($sFileName).'|')!==false)&&(substr_count($sFileName,'.')==1))
    return true;
  else
    return false;
  }
  
function isDoubleExtension($sFileName)
  {
  if(substr_count($sFileName,'.')==1)
    return true;
  else
    return false;
  }  

if(isset($_FILES["File1"]))
  {
  if(isset($_POST["inpCurrFolder2"]))$currFolder=$_POST['inpCurrFolder2'];
  if(isset($_REQUEST["inpFilter"]))$ffilter=$_REQUEST["inpFilter"];

  if($MaxFileSize && ($_FILES['File1']['size'] > $MaxFileSize))
    {
    $sMsg = "The file exceeds the maximum size allowed.";
    }
  elseif(!isDoubleExtension($_FILES['File1']['name']))
  {
    $sMsg = "The File Name contains multiple dots. Please rename it.";
  }
  else if(!isTypeAllowed($_FILES['File1']['name']))
    {
    $sMsg = "The File Type is not allowed.";
    }
  else if (move_uploaded_file($_FILES['File1']['tmp_name'], $currFolder."/".basename($_FILES['File1']['name'])))
    {
    //added file rescale if needed
    $fileBase = $currFolder."/".basename($_FILES['File1']['name']);
    $sMsg = "";
    $sUploadedFile=$_FILES['File1']['name'];
    if(isset($_POST['reScaleOnUpload']) && $_POST['reScaleOnUpload']=='checked')
    {
    	//get max size (width or height, depends on wich one is bigger)
    	$maxSize = isset($_POST['maxScaleSize']) && intval($_POST['maxScaleSize']) > 20? intval($_POST['maxScaleSize']) : 600;
    	$quality = isset($_POST['quality'])?intval($_POST['quality']):90;
    	if($quality<0 || $quality>100) $quality=90;
    	//scale only images (not rars, zips, mp3s, etc)
    	$sExt=getExt($fileBase);
    	if ($sExt=="gif" || $sExt=="jpg" || $sExt=="jpeg" || $sExt=="png") $fileBase = f_scale_image($fileBase,$maxSize,'rescaleimage',$quality);
    }
    @chmod($fileBase, 0644);
    }
  else
    {
    $sMsg = "Upload failed.";
    }
  }
else
  {
  if(isset($_POST["inpCurrFolder"]))$currFolder=$_POST['inpCurrFolder'];
  if(isset($_REQUEST["ffilter"]))$ffilter=$_REQUEST["ffilter"];
  }

if(isset($_POST["inpFileToDelete"]))
  {
  $filename=pathinfo($_POST["inpFileToDelete"]);
  $filename=$filename['basename'];
  if($filename!="")
    unlink($currFolder . "/" . $filename);
  $sMsg = "";
  }


/*** Permission ***/
$bWriteFolderAdmin=false;
if($sBase0!="")
  {
  if(strtolower($currFolder)!=str_replace(strtolower($sBase0),"",strtolower($currFolder)) AND $bReadOnly0==true) $bWriteFolderAdmin=true;
  }
if($sBase1!="")
  {
  if(strtolower($currFolder)!=str_replace(strtolower($sBase1),"",strtolower($currFolder)) AND $bReadOnly1==true) $bWriteFolderAdmin=true;
  }
if($sBase2!="")
  {
  if(strtolower($currFolder)!=str_replace(strtolower($sBase2),"",strtolower($currFolder)) AND $bReadOnly2==true) $bWriteFolderAdmin=true;
  }
if($sBase3!="")
  {
  if(strtolower($currFolder)!=str_replace(strtolower($sBase3),"",strtolower($currFolder)) AND $bReadOnly3==true) $bWriteFolderAdmin=true;
  }
$sFolderAdmin="";
if($bWriteFolderAdmin)$sFolderAdmin="style='display:none'";
/*** /Permission ***/


Function writeFolderSelections()
  {
  global $sBase0;
  global $sBase1;
  global $sBase2;
  global $sBase3;
  global $sName0;
  global $sName1;
  global $sName2;
  global $sName3;
  global $currFolder;
  global $f_asset_user_own_fld, $logged_user; //Joe (user to be able to use only own folder, no shared)

  echo "<select name='selCurrFolder' id='selCurrFolder' onchange='changeFolder()' class='inpSel' style='display:inline;'>"; 
  recursive($sBase0,$sBase0,$sName0);
  if($sBase1!="" && is_dir($sBase1))recursive($sBase1,$sBase1,$sName1); //is_dir($sBase1) added by G
  if($sBase2!="" && is_dir($sBase2))recursive($sBase2,$sBase2,$sName2);
  if($sBase3!="" && is_dir($sBase3))recursive($sBase3,$sBase3,$sName3);
  echo "</select>";
  }

Function recursive($sPath,$sPath_base,$sName)
	{
	global $sBase0;
	global $sBase1;
	global $sBase2;
	global $sBase3;
	global $currFolder,$logged_user,$logged_admin; //g
	global $f_asset_user_own_fld; //Joe (user to be able to use only own folder, no shared)
	
	if($sPath==$sBase0) //g
	{
		if($logged_user!='')
		{
			if(!is_dir($sPath."/".$logged_user)) {mkdir($sPath."/".$logged_user,0755);chmod($sPath."/".$logged_user,0755);}
			if(!isset($_POST["inpCurrFolder"])) $currFolder=$sPath."/".$logged_user;
		}
		elseif($logged_admin!='')
		{
			if(!is_dir($sPath."/admin")) {mkdir($sPath."/admin",0755);chmod($sPath."/admin",0755);}
			if(!isset($_POST["inpCurrFolder"]) && !isset($_REQUEST["ffilter"])) $currFolder=$sPath."/admin";
		}
	}

  if($sPath==$sBase0 ||$sPath==$sBase1 ||$sPath==$sBase2 ||$sPath==$sBase3)
  {
  	//Joe (wether to show the shared folder or not)   
  	if(($f_asset_user_own_fld && $logged_admin!='') || !$f_asset_user_own_fld)
    {
			if($currFolder==$sPath)
      	echo "<option value='$sPath' selected>$sName</option>";
 	  	else
      	echo "<option value='$sPath'>$sName</option>";
  	}
	}

  $oItem=opendir($sPath);
  $aItem = array();
  while($sItem=readdir($oItem))
  {
  $aItem[] = $sItem;
  }
  sort($aItem);
  for ($i=0; $i<count($aItem); $i++)
  //while($sItem=readdir($oItem))
    {

    $sItem = $aItem[$i];
    if($sItem=="." || $sItem==".." || $sItem=="generated" 
		  || 
			($logged_user!='' && $logged_user!=$sItem
				&& !is_dir($currFolder."/".$sItem) && strpos($currFolder,'/'.$logged_user)===false //Joe - shows also subdirs for current user's dir
			)
			) //g  
      {}
    else
      {
      $sCurrent=$sPath."/".$sItem;
      $fIsDirectory=is_dir($sCurrent);

      $sDisplayed=str_replace($sBase0,"",$sCurrent);
      if($sBase1<>"") $sDisplayed=str_replace($sBase1,"",$sDisplayed);
      if($sBase2<>"") $sDisplayed=str_replace($sBase2,"",$sDisplayed);
      if($sBase3<>"") $sDisplayed=str_replace($sBase3,"",$sDisplayed);
      $sDisplayed=$sName.$sDisplayed;

      if($fIsDirectory)
        {
			if(strpos($sCurrent,'/'.$logged_user)!==false) //Joe - exclude not owned folders when user is logged
			{
				if($currFolder==$sCurrent)
				  echo "<option value='$sCurrent' selected>$sDisplayed</option>";
				else
				  echo "<option value='$sCurrent'>$sDisplayed</option>";
			}
			recursive($sCurrent,$sPath,$sName);
        }
      }
    }
  closedir($oItem);
  }

function getExt($sFileName)//ffilter
  {
  $sExt="";
  $sTmp=$sFileName;
  while($sTmp!="")
    {
    $sTmp=strstr($sTmp,".");
    if($sTmp!="")
      {
      $sTmp=substr($sTmp,1);
      $sExt=$sTmp;
      }
    }
  return strtolower($sExt);
  }

function writeFileSelections()
  {
  global $sFolderAdmin;
  global $ffilter;
  global $sUploadedFile;
  global $sBaseRoot0;
  global $sBaseRoot1;
  global $sBaseRoot2;
  global $sBaseRoot3;
  global $currFolder;
  global $bWriteFolderAdmin;

  $nIndex=0;
  $bFileFound=false;
  $iSelected="";

  echo "<div style='overflow:auto;height:400px;border: 1px solid #D7D7D7;'>";
  echo '<table cellpadding="2" cellspacing="0" width="100%" height="100%" >';
  $sColor = "#e7e7e7";

  $oItem=opendir($currFolder);
  while($sItem=readdir($oItem))
  {
  $aItem[] = $sItem;
  }
  sort($aItem);
  #while($sItem=readdir($oItem))
  for ($i=0; $i<count($aItem); $i++)
    {
    $sItem = $aItem[$i];

    if($sItem=="."||$sItem=="..")
      {
      }
    else
      {
      $sCurrent=$currFolder."/".$sItem;
      $fIsDirectory=is_dir($sCurrent);


      if(!$fIsDirectory)
        {

        //ffilter ~~~~~~~~~~
        $bDisplay=false;
        $sExt=getExt($sItem);
        if($ffilter=="flash")
          {
          if($sExt=="swf")$bDisplay=true;
          }
        else if($ffilter=="media")
          {
          if ($sExt=="avi" || $sExt=="wmv" || $sExt=="mpg" || $sExt=="mpeg" || $sExt=="wav" || $sExt=="wma" || $sExt=="mid" || $sExt=="mp3") $bDisplay=true;
          }
        else if($ffilter=="image")
          {
          if ($sExt=="gif" || $sExt=="jpg" || $sExt=="jpeg" || $sExt=="png") $bDisplay=true;
          }
        else //all
          {
          if($sExt!="")$bDisplay=true;
          }
        //~~~~~~~~~~~~~~~~~~

        if($bDisplay)
          {
          $nIndex=$nIndex+1;
          $bFileFound=true;

          //echo $sBaseRoot0; //    c:/inetpub/wwwroot
          //echo $sCurrent; //    c:/inetpub/wwwroot/Editor/assets/bullet.gif
          //echo $sBaseVirtual0;//  /Editor/assets
     //miro     if($sBaseRoot0=="") {
//miro            $sCurrent_virtual=$sCurrent;
//miro          } else {
            $sCurrent_virtual=str_replace($sBaseRoot0,"",$sCurrent);
//miro          }
          if($sBaseRoot1!="")$sCurrent_virtual=str_replace($sBaseRoot1,"",$sCurrent_virtual);
          if($sBaseRoot2!="")$sCurrent_virtual=str_replace($sBaseRoot2,"",$sCurrent_virtual);
          if($sBaseRoot3!="")$sCurrent_virtual=str_replace($sBaseRoot3,"",$sCurrent_virtual);

          if($sColor=="#EFEFF5")
            $sColor = "";
          else
            $sColor = "#EFEFF5";

          //icons
          $sIcon="ico_unknown.gif";
          if($sExt=="asp")$sIcon="ico_asp.gif";
          if($sExt=="bmp")$sIcon="ico_bmp.gif";
          if($sExt=="css")$sIcon="ico_css.gif";
          if($sExt=="doc")$sIcon="ico_doc.gif";
          if($sExt=="exe")$sIcon="ico_exe.gif";
          if($sExt=="gif")$sIcon="ico_gif.gif";
          if($sExt=="htm")$sIcon="ico_htm.gif";
          if($sExt=="html")$sIcon="ico_htm.gif";
          if($sExt=="jpg")$sIcon="ico_jpg.gif";
          if($sExt=="jpeg")$sIcon="ico_jpg.gif";
          if($sExt=="js")$sIcon="ico_js.gif";
          if($sExt=="mdb")$sIcon="ico_mdb.gif";
          if($sExt=="mov")$sIcon="ico_mov.gif";
          if($sExt=="mp3")$sIcon="ico_mp3.gif";
          if($sExt=="pdf")$sIcon="ico_pdf.gif";
          if($sExt=="png")$sIcon="ico_png.gif";
          if($sExt=="ppt")$sIcon="ico_ppt.gif";
          if($sExt=="mid")$sIcon="ico_sound.gif";
          if($sExt=="wav")$sIcon="ico_sound.gif";
          if($sExt=="wma")$sIcon="ico_sound.gif";
          if($sExt=="swf")$sIcon="ico_swf.gif";
          if($sExt=="txt")$sIcon="ico_txt.gif";
          if($sExt=="vbs")$sIcon="ico_vbs.gif";
          if($sExt=="avi")$sIcon="ico_video.gif";
          if($sExt=="wmv")$sIcon="ico_video.gif";
          if($sExt=="mpeg")$sIcon="ico_video.gif";
          if($sExt=="mpg")$sIcon="ico_video.gif";
          if($sExt=="xls")$sIcon="ico_xls.gif";
          if($sExt=="zip")$sIcon="ico_zip.gif";

          $sTmp1=strtolower($sItem);
          $sTmp2=strtolower($sUploadedFile);
          if($sTmp1==$sTmp2)
            {
            $sColorResult="yellow";
            $iSelected=$nIndex;
            }
          else
            {
            $sColorResult=$sColor;
            }

          echo "<tr style='background:".$sColorResult."'>";
          echo "<td><img src='images/".$sIcon."'></td>";
          echo "<td valign=top width='100%' align='left'><div style='width:160px;overflow:hidden;white-space:nowrap'><u id=\"idFile".$nIndex."\" style='cursor:pointer;' onclick=\"selectFile(".$nIndex.")\">".$sItem."</u></div></td>";
          echo "<td><img style='cursor:pointer;' onclick=\"downloadFile(".$nIndex.")\" src='download.gif'>";
          echo "<input type=hidden name=inpFile".$nIndex." id=inpFile".$nIndex." value=\"".$sCurrent_virtual."\"></td>";
          echo "<td valign=top align=right nowrap>".round(filesize($sCurrent)/1024,1)." kb&nbsp;</td>";
          echo "<td valign=top nowrap onclick=\"deleteFile(".$nIndex.")\"><u style='color:crimson' ".$sFolderAdmin.">";
          if(!$bWriteFolderAdmin)
            {
            //echo "<script>document.write(getTxt('del'))</script>";
            echo "<img style='cursor:pointer;' onclick=\"deleteFile(".$nIndex.")\" src='delete.gif'>";
            }
          echo "</u></td>";



          echo "</tr>";
          }
        }
      }
    }

  if($bFileFound==false)
    echo "<tr><td colspan=4 height=100% align=center><script>document.write(getTxt('Empty...'))</script></td></tr></table></div>";
  else
    echo "<tr><td colspan=4 height=100% ></td></tr></table></div>";

  echo "<input type=hidden name=inpUploadedFile id=inpUploadedFile value='".$iSelected."'>";
  echo "<input type=hidden name=inpNumOfFiles id=inpNumOfFiles value='".$nIndex."'>";

  closedir($oItem);
  }
?>
<base target="_self">
<html>
<head>
<title>Asset Manager</title>
<meta http-equiv="Content-Type" content="text-html; charset=Windows-1252">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<link href="style.css" rel="stylesheet" type="text/css">
<?php
$sLang="en-US";
$pDir="../";
if(isset($_REQUEST["root"])){if($_REQUEST["root"]=='') $pDir="";}
$pId=(isset($_REQUEST["id"]))?$_REQUEST["id"]:'';
if(isset($_REQUEST["lang"]))
  {
  $sLang=$_REQUEST["lang"];
  if($sLang=="")$sLang="en-US";
  }
?>
<script>
  var sLang="<?php  echo $sLang ?>";
  var pDir="<?php  echo $pDir ?>";
  var pId="<?php  echo $pId ?>";
  var isTiny="<?php echo $f_tiny ?>";
  document.write("<scr"+"ipt src='language/"+sLang+"/asset.js'></scr"+"ipt>");
  if(!isTiny)
  document.write("<scr"+"ipt src='../scripts/common/common.js'></scr"+"ipt>");
</script>
<script>writeTitle()</script>
<script>
var bReturnAbsolute=<?php  if($bReturnAbsolute){echo "true";} else{echo "false";} ?>;
var activeModalWin;

function getAction()
  {
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  //Clean previous ffilter=...
  sQueryString=window.location.search.substring(1)
  sQueryString=sQueryString.replace(/ffilter=media/,"")
  sQueryString=sQueryString.replace(/ffilter=image/,"")
  sQueryString=sQueryString.replace(/ffilter=flash/,"")
  sQueryString=sQueryString.replace(/ffilter=/,"")
  if(sQueryString.substring(sQueryString.length-1)=="&")
    sQueryString=sQueryString.substring(0,sQueryString.length-1)

  if(sQueryString.indexOf("=")==-1)
    {//no querystring
    sAction="assetmanager.php?ffilter="+document.getElementById("selFilter").value;
    }
  else
    {
    sAction="assetmanager.php?"+sQueryString+"&ffilter="+document.getElementById("selFilter").value
    }
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  return sAction;
  }

function applyFilter()//ffilter
  {
  var Form1 = document.forms.Form1;

  Form1.elements.inpCurrFolder.value=document.getElementById("selCurrFolder").value;
  Form1.elements.inpFileToDelete.value="";

  Form1.action=getAction()
  Form1.submit()
  }
function refreshAfterDelete(sDestination)
  {
  var Form1 = document.forms.Form1;

  Form1.elements.inpCurrFolder.value=sDestination;
  Form1.elements.inpFileToDelete.value="";

  Form1.action=getAction()
  Form1.submit();
  }
function changeFolder()
  {
  var Form1 = document.forms.Form1;

  Form1.elements.inpCurrFolder.value=document.getElementById("selCurrFolder").value;
  Form1.elements.inpFileToDelete.value="";

  Form1.action=getAction();
  Form1.submit();
  }

function upload()
  {
  var Form2 = document.forms.Form2;

  if(Form2.elements.File1.value == "")return;

  var sFile=Form2.elements.File1.value.substring(Form2.elements.File1.value.lastIndexOf("\\")+1);
  for(var i=0;i<document.getElementById("inpNumOfFiles").value;i++)
    {
    if(sFile==document.getElementById("idFile"+(i*1+1)).innerHTML)
      {
      if(confirm(getTxt("File already exists. Do you want to replace it?"))!=true)return;
      }
    }

  Form2.elements.inpCurrFolder2.value=document.getElementById("selCurrFolder").value;
  document.getElementById("idUploadStatus").innerHTML=getTxt("Uploading...")

  Form2.action=getAction()
  Form2.submit();
  }
  
function mDlgShow(url,width,height)
{
	var left=screen.availWidth/2-width/2;var top=screen.availHeight/2 - height/2;
	activeModalWin=window.open(url,"","width="+width+"px,height="+height+",left="+left+",top="+top);
	window.onfocus=function()
	{
		if(activeModalWin.closed==false)activeModalWin.focus();
	}
}

function newFolder()
  {
    var currentPath = window.location.href;
	var hasPar=parent.location.href.indexOf('/innovaeditor/')!=-1;
    currentPath = currentPath.substring(0, currentPath.lastIndexOf("/assetmanager"));
    if(isTiny || !hasPar) mDlgShow(currentPath + "/foldernew.php", 250, 170, window);
    else parent.modalDialogShow(currentPath + "/foldernew.php", 250, 170, window);
  }
function deleteFolder()
  {
  var selCurrFolder = document.getElementById("selCurrFolder");

  if(selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder0").value.toLowerCase() ||
  selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder1").value.toLowerCase() ||
  selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder2").value.toLowerCase() ||
  selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder3").value.toLowerCase())
    {
    alert(getTxt("Cannot delete Asset Base Folder."));
    return;
    }

  var currentPath = window.location.href;
  var hasPar=parent.location.href.indexOf('/innovaeditor/')!=-1;
  currentPath = currentPath.substring(0, currentPath.lastIndexOf("/assetmanager"));
  if(isTiny || !hasPar) mDlgShow(currentPath + "/folderdel.php", 250, 170, window);
  else parent.modalDialogShow(currentPath + "/folderdel.php", 250, 170, window);
  }
function downloadFile(index)
  {
  sFile_RelativePath = "<?php echo $sBaseRoot0;?>" + document.getElementById("inpFile"+index).value;
  window.open(sFile_RelativePath)
  }
function selectFile(index)
  {
  curFolder=document.getElementById("selCurrFolder").value;
	sFile_RelativePath = curFolder + document.getElementById("inpFile"+index).value;

  //This will make an Absolute Path
  if(bReturnAbsolute)
    {
    sFile_RelativePath = window.location.protocol + "//" + window.location.host.replace(/:80/,"") + sFile_RelativePath
    //Ini input dr yg pernah pake port:
    //sFile_RelativePath = window.location.protocol + "//" + window.location.host.replace(/:80/,"") + "/" + sFile_RelativePath.replace(/\.\.\//g,"")
    }

	if(curFolder.indexOf("../assets")==0) relPath='innovaeditor/assets';
	else if(curFolder.indexOf("../../blog")==0) relPath='blog/php';
	else if(curFolder.indexOf("../../photoblog")==0) relPath='photoblog/php';
	else if(curFolder.indexOf("../../podcast")==0) relPath='podcast/php';
	else relPath=curFolder.replace('../../',''); 
	
	rel_path=pDir+relPath+document.getElementById("inpFile"+index).value;
	document.getElementById("inpSource").value= rel_path;
	//if(pDir=='')rel_path='../'+rel_path;

  var arrTmp = sFile_RelativePath.split(".");
  var sFile_Extension = arrTmp[arrTmp.length-1]
  var sHTML="";

  //Image
  if(sFile_Extension.toUpperCase()=="GIF" || sFile_Extension.toUpperCase()=="JPG" || sFile_Extension.toUpperCase()=="JPEG" || sFile_Extension.toUpperCase()=="PNG")
    {
    if(typeof parent.fileclick == 'function') parent.fileclick(rel_path);
    if(pDir=='')rel_path='../'+rel_path;
    sHTML = "<img width=100% src=\"../" + rel_path + "\" >";    
    }
  //SWF
  else if(sFile_Extension.toUpperCase()=="SWF")
    {
    if(typeof parent.fileclick == 'function') parent.fileclick(rel_path);
    sHTML = "<object "+
      "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' " +
      "width='100%' "+
      "height='100%' " +
      "codebase='http://active.macromedia.com/flash6/cabs/swflash.cab#version=6.0.0.0'>"+
      " <param name=movie value='"+sFile_RelativePath+"'>" +
      " <param name=quality value='high'>" +
      " <embed src='"+sFile_RelativePath+"' " +
      "   width='100%' " +
      "   height='100%' " +
      "   quality='high' " +
      "   pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash'>" +
      " </embed>"+
      "</object>";
    }
  //Video
  else if(sFile_Extension.toUpperCase()=="WMV"||sFile_Extension.toUpperCase()=="AVI"||sFile_Extension.toUpperCase()=="MPG")
    {
    if(typeof parent.fileclick == 'function') parent.fileclick(rel_path);
    sHTML = "<embed src='"+sFile_RelativePath+"' hidden=false autostart='true' type='video/avi' loop='true'></embed>";
    }
  //Sound
  else if(sFile_Extension.toUpperCase()=="WMA"||sFile_Extension.toUpperCase()=="WAV"||sFile_Extension.toUpperCase()=="MID")
    {
    if(typeof parent.fileclick == 'function') parent.fileclick(rel_path);
    sHTML = "<embed src='"+sFile_RelativePath+"' hidden=false autostart='true' type='audio/wav' loop='true'></embed>";
    }
  //Files (Hyperlinks)
  else
    {
    if(typeof parent.fileclick == 'function') parent.fileclick(rel_path);
    sHTML = "<br><br><br><br><br><br>Preview Not Available"
    }

  document.getElementById("idPreview").innerHTML = sHTML;
  }
function deleteFile(index)
  {
  if (confirm(getTxt("Delete this file ?")) == true)
    {
    sFile_RelativePath = document.getElementById("inpFile"+index).value;

    var Form1 = document.getElementById("Form1");
    Form1.elements.inpCurrFolder.value=document.getElementById("selCurrFolder").value;
    Form1.elements.inpFileToDelete.value=sFile_RelativePath;

    Form1.action=getAction()
    Form1.submit();
    }
  }
bOk=false;
function doOk()
	{
		if(isTiny && window.opener.tinyfck!=null)
		{
 			window.opener.tinyfck.document.getElementById(window.opener.tinyfck_field).value = document.getElementById("inpSource").value;
			if (window.opener.tinyfck.document.getElementById(window.opener.tinyfck_field).onchange != null)
			{window.opener.tinyfck.document.getElementById(window.opener.tinyfck_field).onchange();}
			bOk=true;
			if(self.closeWin) self.closeWin(); else self.close();
	}
	else
	{  //innova image handler (Joe)
		if(parent.isAssetOpened+''!='undefined') 
    {                          
      val = document.getElementById("inpSource").value;
      parent.document.getElementById(pId).value = val;
      ima=parent.document.getElementById('ima_'+pId);
      if(ima!=null) {ima.src=val; ima.style.display='block';}
      bOk=true;
      I_Close();
    }
    else if(isTiny)
    {
    	(opener?opener:openerWin).setAssetValue(document.getElementById("inpSource").value,pId);
			bOk=true;
			if(self.closeWin) self.closeWin(); else self.close();
		}
    else 
    {
      parent.I_InsertImage(document.getElementById("inpSource").value);
      bOk=true;
      parent.I_Close();
    }
	}
}
function doUnload()
  {
  if(navigator.appName.indexOf('Microsoft')!=-1)
    if(!bOk)window.returnValue="";
  else
  	{
  	if(isTiny)if(!bOk)window.opener.setAssetValue("");
  	else if(!bOk)(opener?opener:openerWin).setAssetValue("");
  	}
  }

</script>
</head>
<body onunload="doUnload()" onload="loadTxt();this.focus();if(document.getElementById('inpUploadedFile').value!='')selectFile(document.getElementById('inpUploadedFile').value);" style="overflow:hidden;margin:0px;">

<input type="hidden" name="inpAssetBaseFolder0" id="inpAssetBaseFolder0" value="<?php  echo $sBase0 ?>">
<input type="hidden" name="inpAssetBaseFolder1" id="inpAssetBaseFolder1" value="<?php  echo $sBase1 ?>">
<input type="hidden" name="inpAssetBaseFolder2" id="inpAssetBaseFolder2" value="<?php  echo $sBase2 ?>">
<input type="hidden" name="inpAssetBaseFolder3" id="inpAssetBaseFolder3" value="<?php  echo $sBase3 ?>">

<div style="height:440px;background:url('bg.gif') no-repeat right bottom;padding: 0 5px;">
    <!--ffilter-->
    <form method=post name="Form1" id="Form1">
        <input type="hidden" name="inpFileToDelete">
        <input type="hidden" name="inpCurrFolder">
    </form>
		<div style="margin-bottom:2px;">
				<?php  writeFolderSelections(); ?>&nbsp;
				<?php
//ffilter
				$sHTMLFilter = "<select name=selFilter id=selFilter onchange='applyFilter()' class='inpSel'>"; //ffilter
				$sAll="";
				$sMedia="";
				$sImage="";
				$sFlash="";
				if($ffilter=="") $sAll="selected";
				if($ffilter=="media") $sMedia="selected";
				if($ffilter=="image") $sImage="selected";
				if($ffilter=="flash") $sFlash="selected";
				$sHTMLFilter = $sHTMLFilter." <option name=optLang id=optLang value='' ".$sAll."></option>";
				$sHTMLFilter = $sHTMLFilter." <option name=optLang id=optLang value='media' ".$sMedia."></option>";
				$sHTMLFilter = $sHTMLFilter." <option name=optLang id=optLang value='image' ".$sImage."></option>";
				$sHTMLFilter = $sHTMLFilter." <option name=optLang id=optLang value='flash' ".$sFlash."></option>";
				$sHTMLFilter = $sHTMLFilter."</select>";
				echo $sHTMLFilter;
//~~~~~~~~~
        ?>
          <?php if(!$f_innova_limited || $logged_user=='')
          echo '<span onclick="newFolder()" style="cursor:pointer;"><u><span name="txtLang" id="txtLang" '.$sFolderAdmin.'>New&nbsp;Folder</span></u> </span>&nbsp;<span onclick="deleteFolder()" style="cursor:pointer;"><u><span name="txtLang" id="txtLang" '.$sFolderAdmin .'>Del&nbsp;Folder</span></u></span>'; ?>
		</div>
		<div>
        <div style="width:180px;margin-right:5px;float:left;">
          <div id="idPreview" style="overflow:auto;width:179px;height:400px;border:#d7d7d7 1px solid;background:#ffffff;margin-right:2px;"></div>
          <div><input type="<?php  echo ($f_live?'hidden':'text'); ?>" id="inpSource" name="inpSource" style="margin-top:2px;border:#cfcfcf 2px solid;width:254px" class="inpTxt"></div>
        </div>
        <div style="background:white">
          <?php  writeFileSelections(); ?>
        </div>
   	</div>
   	<div>	
        <div <?php echo $sFolderAdmin;?>>
        <div style="height:18px;">
        <font color=red><?php  echo $sMsg ?></font>
        <span style="font-weight:bold" id=idUploadStatus>
				<?php echo '<span style="font-size:9px;color:red;">Max. Filesize: '.ini_get('upload_max_filesize').'</span>'; ?>
				</span>
        </div>


        <form enctype="multipart/form-data" method="post" runat="server" name="Form2" id="Form2" style="padding:0;margin:0">
        <input type="hidden" name="inpCurrFolder2" ID="inpCurrFolder2">
        <!--ffilter-->
        <input type="hidden" name="inpFilter" ID="inpFilter" value="<?php  echo $ffilter ?>">
        <span name="txtLang" id="txtLang" style="display:none">Upload File</span>
        <input type="file" id="File1" name="File1" title="Upload File" class="inpTxt" style="width:178px;">&nbsp;
        <?php if($resize) echo '<input name="reScaleOnUpload" type="checkbox" value="checked" checked="checked"> 
				<span name="resizeLang" id="resizeLang" style="font:9px arial;">Scale (px)</span><input type="text" id="maxScaleSize" name="maxScaleSize" class="inpTxt" value="'.$f_innova_asset_def_size.'" size="1">&nbsp;<span style="font:9px arial;"> Quality:</span><input type="text" id="quality" name="quality" class="inpTxt" value="90" size="1">'; 	?> 
				<input name="btnUpload" id="btnUpload" type="button" value="upload" onclick="upload()" >
        </form>
        </div>
    </div>

</div>
<div class="dialogFooter" align="right">
  <input name="btnOk" id="btnOk" type="button" value=" ok " onclick="doOk()" class="inpBtn" onmouseover="this.className='inpBtnOver';" onmouseout="this.className='inpBtnOut'">
</div>

</body>
</html>
