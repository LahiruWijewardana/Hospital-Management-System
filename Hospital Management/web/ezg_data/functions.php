<?php
$f_version="functions v4 - 1.359 mysql/flat";
/*
	http://www.ezgenerator.com
	Copyright (c) 2004-2013 Image-line
*/
error_reporting(E_ERROR);
define('SEARCH_TABLES_CNT',2);
define('COUNTER_DETAILS_FIELD_CNT',12);
define('PHP4_MESSAGE','PHP5 or higher is required!');
if(version_compare(PHP_VERSION, '5.4.0', '<'))
	if(get_magic_quotes_runtime()==1) set_magic_quotes_runtime(0);
$f_min_sec=array();for($n=0;$n<60;$n++) $f_min_sec[]=($n<10)?'0'.strval($n):strval($n);
$f_counter_images=array('15|20','15|18','15|19','9|13','15|13','12|14','6|7','11|11','15|20','14|18');
$f_page_params=array();
$f_avatar_size='32';
$f_encode_urls=true;
$f_admin_email='';
$ca_settings=array();
$f_ca_fullscreen=false;
$f_url_fopen=ini_get('allow_url_fopen')!='off';
$f_hidden_uf='|password|creation_date|status|confirmed|self_registered|self_registered_id|details|';
$f_browsers=array('Unknown','IE','Opera','Firefox','Search Bot','AOL','Safari','Konqueror','IE 5','IE 6','IE 7','Opera 7','Opera 8','Firefox 1','Firefox 2','Netscape 6', 'Netscape 7','Firefox 3','Chrome','IE 8','IE 9','Firefox 4','Firefox 5','Firefox 6','Firefox 7','Firefox 8','Firefox 9','Firefox 10','Firefox 11','Firefox 12','IE 10','Mercury');
$f_navt='<div class="a_navt">';
$f_nave='</div>';
$f_navtop='<div class="a_n a_navtop"><!--pre-nav--><div class="a_navt">';
$f_navlist='<div class="a_n a_listing"><div class="a_navt">';
$f_navend='</div><!--post-nav--></div>';
$ca_rel_path=(isset($rel_path) && $rel_path==''? '':'../');
$f_proj_id='422595382866898';
$f_admin_cookieid='SID_ADMIN'.$f_proj_id;
$f_user_cookieid='cur_user'.$f_proj_id;
$f_site_url=''; //don't rely on this, it's user-defined
$f_proj_pre='';
$f_counter_on=false;
$f_db=null;
$f_db_createcharset='';
$f_db_namescharset='';
$f_db_folder='ezg_data/';
$f_ca_db_fname=$f_db_folder.'centraladmin.ezg.php';
$f_ca_settings_fname=$ca_rel_path.$f_db_folder.'centraladmin_conf.ezg.php';
$f_sitemap_fname='sitemap.php';
$f_template_source='documents/template_source.html';
$f_max_chars=25000;
$f_cap_id='CAPTCHA_CODE';
$f_home_page='index.html';
$f_intro_page='';
$f_mysql_host='';
$f_mysql_dbname='';
$f_mysql_username='';
$f_mysql_password='';
$f_mysql_setcharset=false;
$f_use_mysql=false;
$f_mail_type="mail";
$f_SMTP_HOST='%SMTP_HOST%';
$f_SMTP_PORT='%SMTP_PORT%';
$f_SMTP_HELLO='%SMTP_HELLO%';
$f_SMTP_AUTH=('%SMTP_AUTH%'=='TRUE');
$f_SMTP_AUTH_USR='%SMTP_AUTH_USR%';
$f_SMTP_SECURE='%SMTP_SECURE%';
$f_site_charsets_a=array("UTF-8");
$f_site_languages_a=array("English");
$f_inter_languages_a=array("EN");
$f_time_format_a=array("24");
$f_date_format_a=array("dd.mm.yy");
$ca_nav_labels=array('home'=>'+','first'=>' &lt;&lt; ','prev'=>' &lt; ','next'=>' &gt; ','last'=>' &gt;&gt; ');
$f_uni=('TRUE'=='TRUE');
$f_metamark='<!--rss_meta-->';
$f_use_mb=($f_uni && function_exists('mb_strtolower'));
$f_mbEncMHeader = false;
$f_SMTP_AUTH_PWD='%SMTP_AUTH_PWD%';
$f_return_path='';
$f_use_hostname=false;
$f_sendmail_from='';
if(isset($_SERVER['SERVER_SOFTWARE']))
	$f_use_linefeed=(strpos($_SERVER['SERVER_SOFTWARE'],'Microsoft')!==false) || (strpos($_SERVER['SERVER_SOFTWARE'],'Win')!==false);
else $f_use_linefeed=false;
$f_monitor_users=false;
$f_lf=($f_use_linefeed?"\r\n":"\n");
$f_xhtml_on=true;
$f_html='XHTML';
$f_ct=($f_xhtml_on?" />":">");
$f_br="<br".$f_ct;
$f_hr="<hr".$f_ct;
$f_js_st=($f_xhtml_on? "/* <![CDATA[ */": "<!--");
$f_js_end=($f_xhtml_on? "/* ]]> */": "//-->");
$f_php_timezone='';
$f_mysql_timezone='';
$f_def_tz_set=false;
if($f_php_timezone!='' && function_exists('date_default_timezone_set')) {date_default_timezone_set($f_php_timezone);$f_def_tz_set=true;}
if($f_php_timezone=='' && function_exists('date_default_timezone_get')) {$f_php_timezone = date_default_timezone_get();}  
$f_tzone_offset=-10000;
$f_names_lang_sets=array('BG'=>'Bulgarian','CS'=>'Czech','DA'=>'Danish','NL'=>'Dutch','EN'=>'English','ET'=>'Estonian','FI'=>'Finnish','FR'=>'French','DE'=>'German','EL'=>'Greek','HE'=>'Hebrew','HU'=>'Hungarian','IS'=>'Icelandic','IT'=>'Italian','NO'=>'Norwegian','PL'=>'Polish','PT'=>'Portuguese','RU'=>'Russian','SK'=>'Slovak','SL'=>'Slovenian','ES'=>'Spanish','SV'=>'Swedish','ZH'=>'Chinese','UK'=>'Ukrainian','BP'=>'Brazilian'); //'CA'=>'Catalan','RO'=>'Romanian',
$f_charset_lang_map=array('BG'=>'Windows-1251','CS'=>'Windows-1250','DA'=>'iso-8859-1','NL'=>'iso-8859-1','EN'=>'iso-8859-1','ET'=>'Windows-1257','FI'=>'iso-8859-1','FR'=>'iso-8859-1','DE'=>'iso-8859-1','EL'=>'Windows-1253','HE'=>'Windows-1255','HU'=>'Windows-1250','IS'=>'iso-8859-1','IT'=>'iso-8859-1','NO'=>'iso-8859-1','PL'=>'Windows-1250','PT'=>'iso-8859-1','RU'=>'Windows-1251','SK'=>'Windows-1250','SL'=>'windows-1250','ES'=>'iso-8859-1','SV'=>'iso-8859-1');
$f_innova_lang_list=array('english'=>'en-US','danish'=>'da-DK','german'=>'de-DE','spanish'=>'es-ES','finnish'=>'fi-FI','french'=>'fr-FR','norwegian'=>'nn-NO','italian'=>'it-IT','swedish'=>'sv-SE','dutch'=>'nl-NL');
$f_innova_asset_def_size='600';
$f_day_names=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
$f_month_names=array("January","February","March","April","May","June","July","August","September","October","November","December");
$f_max_rec_on_admin=20;
$f_demo_mode=false;
$f_use_captcha=true;
$f_btn_class="input1";
$f_captcha_size='small';  //captcha size is actually captcha type in ezg since v 4.0.0.402
$f_bg_tag='background: #ffffff;';
$f_atbg_class="topic_bg";
$f_atbgr_class="sub_bg";
$f_atbgc_class="news_bg";
$f_ftm_title='<span class="rvts8 a_editcaption">%s</span>'.$f_br;
$f_fmt_span8='<span class="rvts8">%s</span>';
$f_fmt_star='<em style="color:red;">*</em>';
$f_fmt_hidden='<input type="hidden" name="%s" value="%s"'.$f_ct;
$f_fmt_a='<a class="rvts12" href="%s">%s</a>';
$f_fmt_input_p='<input class="input1" type="text" name="%s" value="%s" style="width:500px" maxlength="255"'.$f_ct.$f_br; //used in add post
$f_fmt_input_com='<input class="comments_input input1" type="text" name="%s" value="%s" id="comments_%s" maxlength="50" style="width: 98%%;" '.$f_ct; // used in add comment
$f_fmt_caption='<span class="a_tabletitle">%s</span>';
$f_use_search=true;
$f_search_templates_a=array("0");
$f_ca_profile_templates_a=array("0");
$f_error_iframe=false; //the iframe html string or FALSE if not used.
$f_tiny=false;
$f_editor="LIVE";
$f_ext_styles=array("sub","L","XL","XXL","XXXL","Font Style");
$f_asset_user_own_fld=false; //user can use only own folder in assets
$f_reCaptcha=$f_captcha_size=='recaptcha'; //captcha size is actually captcha type in ezg     
$f_captchajs='var captcha=$(document).ready(function(){loadCaptcha("%PATH%");});';
$f_frmvalidation='$(document).ready(function(){$("form[id^=%ID%]").each(function(){var frl=$(this);var frl_id=$(this).attr("id");if(frl!=null){frl.append(\'<input type="hidden" id="cc" name="cc" value="1"/>\'); frl.submit(function(event){ event.preventDefault(); $(".frmhint").empty(); $("#"+frl_id+" .input1").removeClass("inputerror"); $.post( frl.attr("action"), frl.serialize(), function(re){ if(re.charAt(0)=="1"){ cc=$("#"+frl_id+" #cc"); cc.val("0"); frl.unbind("submit"); frl.submit(); cc.val("1"); }else if(re.charAt(0)=="0") { errors=re.substring(1).split("|"); for(i=0;i<errors.length;i=i+2) { $("#"+frl_id+"_"+errors[i]).append("<br />"+errors[i+1]); $("#"+frl_id+" input[name="+errors[i]+"]").addClass("inputerror"); } if(typeof reloadReCaptcha=="function") reloadReCaptcha(); } } ); }); } }); });';
$f_frmvalidation2='<script type="text/javascript">$(document).ready(function(){frl=$("#%ID%");if(frl!=null){frl.append(\'<input type="hidden" id="cc" name="cc" value="1"/>\');frl.submit(function(event){event.preventDefault();$(".frmhint").empty();$("#%ID% input").removeClass("inputerror");$("#div_%ID%").addClass("ajl").css("opacity","0.2").delay(500);$.post(frl.attr("action"),frl.serialize(),function(re){$("#div_%ID%").removeClass("ajl").css("opacity","1");if(re.charAt(0)=="1"){cc=$(".%ID% #cc");cc.val("0");frl.unbind("submit");frl.submit();cc.val("1");}else if(re.charAt(0)=="0") {errors=re.substring(1).split("|");for(i=0;i<errors.length;i=i+2) {$("#%ID%_"+errors[i]).append("<br />"+errors[i+1]);$("#%ID% input[name="+errors[i]+"]").addClass("inputerror");} if(typeof reloadReCaptcha == "function") reloadReCaptcha(); }else $("#%ID%").html(re);});})}});$(document).ready(function(){$(".passreginput").pmeter();})</script>';
$f_loginvalidation='<script type="text/javascript">$(document).ready(function(){frl=$("#%ID%");if(frl!=null){frl.append(\'<input type="hidden" id="cc" name="cc" value="1"/>\');frl.submit(function(event){event.preventDefault();$(".frmhint").empty();$("#%ID% input").removeClass("inputerror");$.post(frl.attr("action"),frl.serialize(),function(re){if(re.charAt(0)=="1"){cc=$(".%ID% #cc");cc.val("0");frl.unbind("submit");frl.submit();cc.val("1");}else if(re.charAt(0)=="0") {errors=re.substring(1).split("|");for(i=0;i<errors.length;i=i+2) {$("#%ID%_"+errors[i]).append("<br />"+errors[i+1]);$("#%ID% input[name="+errors[i]+"]").addClass("inputerror");} if(typeof reloadReCaptcha == "function") reloadReCaptcha();  }});})}});</script>';
$md_dialog='var activeModalWin; var isAssetOpened; function mDialogShow(url,width,height){var left=screen.availWidth/2-width/2;var top=screen.availHeight/2 - height/2;activeModalWin = window.open(url, "", "width="+width+"px,height="+height+",left="+left+",top="+top);window.onfocus=function(){if(activeModalWin.closed==false){activeModalWin.focus();};};}'
."function openAsset(id){cmdAManager=\"".($f_tiny?'mDialogShow':'modalDialogShow')."('%sinnovaeditor/assetmanager/assetmanager.php?lang=%s&root=%s&id=\'+id,755,500)\";eval(cmdAManager); isAssetOpened = true;}"
."function setAssetValue(val,id){document.getElementById(id).value=val;ima=document.getElementById('ima_'+id); if(ima!=null){ima.src=val;ima.style.display='block';}}";
$f_drop_script = <<<MSG
<script type="text/javascript">
var b_el=null;var tog=false;
function ToggleBody(e,r){if(tog&&b_el!=null&&b_el!=e){\$("#"+b_el+"Body").slideUp();\$("#"+b_el+"Up").attr("src",r+"images/expand.gif");};\$("#"+e+"Body").slideToggle(function() {b_el=e;src=(\$(this).css("display")=="block")?"collapse":"expand";img=r+"images/"+src+".gif";\$("#"+e+"Up").attr("src",img);});return false;}
</script>
MSG;

$f_framedtable = <<<MSG
<table width="%TABLEWIDTH%" cellspacing="0" cellpadding="0">
<tr><td><img src="%ROOT_PREFIX%images/t1tl.gif" class="cim" alt=""/></td><td class="topic_t" >%CAPTION%</td><td><img src="%ROOT_PREFIX%images/t1tr.gif" class="cim" alt=""/></td></tr>
<tr><td class="topic_l"><img src="%ROOT_PREFIX%images/t1l.gif" class="clr" alt=""/></td>
<td class="topic_bg">%BODY%</td>
<td class="topic_r"><img src="%ROOT_PREFIX%images/t1r.gif" class="clr" alt=""/></td></tr>
<tr><td><img src="%ROOT_PREFIX%images/t1bl.gif" class="cim" alt=""/></td><td class="topic_b"></td> <td><img src="%ROOT_PREFIX%images/t1br.gif" class="cim" alt=""/></td></tr>
</table>
MSG;

$f_framedtable_drop = <<<MSG
<table width="%TABLEWIDTH%" cellspacing="0" cellpadding="0">
<tr><td style="cursor:pointer" onclick="ToggleBody('%ELEMENT_NAME%','%ROOT_PREFIX%');">
 <table width="100%" cellspacing="0" cellpadding="0">
 <tr>
  <td><img src="%ROOT_PREFIX%images/t1tl.gif" class="cim" alt=""/></td>
  <td class="topic_t" >%CAPTION%</td>
  <td class="topic_t"><img id="%ELEMENT_NAME%Up" width="15" height="14" src="%ROOT_PREFIX%images/%STATEIMAGE%" alt=""/></td>
  <td><img src="%ROOT_PREFIX%images/t1tr.gif" class="cim" alt=""/></td>
 </tr>
 </table>
</td></tr>
<tr><td>
 <div id="%ELEMENT_NAME%Body" style="display:%STATE_DISPLAY%">
 <table width="100%" cellspacing="0" cellpadding="0">
 <tr>
  <td class="topic_l"><img src="%ROOT_PREFIX%images/t1l.gif" class="clr" alt=""/></td>
  <td class="topic_bg">%BODY%</td>
  <td class="topic_r"><img src="%ROOT_PREFIX%images/t1r.gif" class="clr" alt=""/></td>
 </tr>
 <tr><td><img src="%ROOT_PREFIX%images/t1bl.gif" class="cim" alt=""/></td><td class="topic_b"></td><td><img src="%ROOT_PREFIX%images/t1br.gif" class="cim" alt=""/></td></tr>
</table>
</div>
</td></tr>
</table>
MSG;

$f_editor_js= <<<MSG
<script type="text/javascript" src="%RELPATH%innovaeditor/scripts/language/%XLANGUAGE%/editor_lang.js"></script>
<script type="text/javascript" src='%RELPATH%innovaeditor/scripts/innovaeditor.js'></script>
MSG;
$f_editor_html= <<<MSG
<script type="text/javascript">
var oEdit1=new InnovaEditor("oEdit1");oEdit1.width="100%";oEdit1.height="350px";%RTL%
oEdit1.arrCustomButtons=[["Snippets","modalDialog('%RELPATH%innovaeditor/bootstrap/snippets.htm',900,658,'Insert Snippets');", "Snippets", "btnContentBlock.gif"]];
oEdit1.groups = [
    ["group1","",["FontName","FontSize","Superscript","ForeColor","BackColor","FontDialog","BRK","Bold","Italic", "Underline", "Strikethrough", "CompleteTextDialog", "Styles", "RemoveFormat"]],
    ["group2","",["JustifyLeft", "JustifyCenter", "JustifyRight", "Paragraph", "BRK", "Bullets", "Numbering", "Indent", "Outdent"]],
    ["group3","",["TableDialog", "Emoticons", "FlashDialog","CharsDialog", "BRK", "LinkDialog", "ImageDialog", "YoutubeDialog","Line"]],
    ["group4","",["SearchDialog", "SourceDialog","Paste","BRK","Undo","Redo"]]
    ];
oEdit1.arrStyle=[["BODY",false,"","font: 12px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;%BACKGROUND%"],["a",false,"","font: 12px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#400040;margin:0px;"],["p",false,"","text-indent:0px;padding:0px;margin:0px;"],["h1",false,"","font: bold 23px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;margin:0px;"],["h2",false,"","font: bold 17px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;margin:0px;"],["h3",false,"","font: bold 15px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;margin:0px;"],["h4",false,"","font: bold 12px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;margin:0px;"],["h5",false,"","font: bold 11px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;margin:0px;"],["h6",false,"","font: 11px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;margin:0px;"],["h6",false,"","font: 11px Verdana, Geneva, Arial, Helvetica, sans-serif;color:#000000;margin:0px;"]];
oEdit1.flickrUser="ezgenerator";
oEdit1.css=["%RELPATH%innovaeditor/styles/default.css"];
if(typeof oEditFonts!=="undefined") for(var i=0;i<oEditFonts.length;i++) oEdit1.css.push("http://fonts.googleapis.com/css?family="+oEditFonts[i]);
oEdit1.fileBrowser="../../assetmanager/assetmanager.php?lang=%XLANGUAGE%&root=%RELPATH%";
oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];
oEdit1.mode="XHTMLBody";oEdit1.REPLACE("htmlarea");
</script>
MSG;

$f_gfonts=array('Abel','Abril Fatface','Aclonica','Actor','Aldrich','Alike','Alice','Allan','Allerta','Allerta Stencil','Amaranth','Andika','Anonymous Pro','Antic','Anton','Architects Daughter','Arimo','Artifika',
'Arvo','Asset','Astloch','Aubrey','Bangers','Bentham','Bevan','Bigshot One','Black Ops One','Bowlby One','Bowlby One SC','Brawler','Cabin','Cabin Sketch','Calligraffitti','Candal',
'Cantarell','Cardo','Carme','Carter One','Changa One','Cedarville Cursive','Cherry Cream Soda','Chewy','Coda','Comfortaa','Coming Soon','Copse','Corben','Cousine','Coustard',
'Covered By Your Grace','Crafty Girls','Crimson Text','Crushed','Cuprum','Damion','Days One','Delius','Delius Swash Caps','Delius Unicase','Didact Gothic','Dorsa','Droid Sans',
'Droid Sans Mono','Droid Serif','EB Garamond','Expletus Sans','Fanwood Text','Federo','Fontdiner Swanky','Forum','Francois One','Goblin One','Gentium Basic','Gentium Book Basic',
'Geo','Geostar','Geostar Fill','Give You Glory','Gloria Hallelujah','Goudy Bookletter 1911','Gravitas One','Gruppo','Hammersmith One','Holtwood One SC','Homemade Apple',
'IM Fell DW Pica','IM Fell DW Pica SC','IM Fell Double Pica','IM Fell Double Pica SC','IM Fell English','IM Fell English SC','IM Fell French Canon',
'IM Fell French Canon SC','IM Fell Great Primer','IM Fell Great Primer SC','Inconsolata','Indie Flower','Istok Web','Irish Grover','Josefin Sans','Josefin Slab','Judson',
'Just Another Hand','Just Me Again Down Here','Kameron','Kelly Slab','Kenia','Kranky','Kreon','Kristi','La Belle Aurore','Lato','League Script','Leckerli One','Lekton','Limelight',
'Lobster','Lobster Two','Lora','Loved by the King','Love Ya Like A Sister','Luckiest Guy','Maiden Orange','Mako','Marvel','Maven Pro','Meddon','MedievalSharp','Megrim',
'Merriweather','Metrophobic','Michroma','Miltonian','Miltonian Tattoo','Modern Antiqua','Molengo','Monofett','Monoton','Montez','Mountains of Christmas','Muli','Neucha','Neuton',
'News Cycle','Nixie One','Nobile','Nothing You Could Do','Nova Cut','Nova Flat','Nova Mono','Nova Oval','Nova Round','Nova Script','Nova Slim','Numans','Nunito',
'OFL Sorts Mill Goudy TT','Old Standard TT','Open Sans','Open Sans Condensed','Orbitron','Oswald','Ovo','Pacifico','Passero One','Paytone One','Patrick Hand','Permanent Marker',
'Philosopher','Play','Playfair Display','Podkova','Pompiere','Prociono','PT Sans','PT Sans Caption','PT Sans Narrow','PT Serif','Puritan','Quattrocento','Quattrocento Sans',
'Questrial','Radley','Raleway','Rationale','Redressed','Reenie Beanie','Rochester','Rock Salt','Rokkitt','Rosario','Schoolbell','Shadows Into Light','Shanti','Short Stack','Sigmar One',
'Six Caps','Slackey','Smokum','Smythe','Sniglet','Snippet','Special Elite','Stardos Stencil','Sunshiney','Syncopate','Tangerine','Tenor Sans','Terminal Dosis Light','Tienne','Tinos',
'Tulpen One','Ubuntu','Ultra','UnifrakturCook','UnifrakturMaguntia','Unkempt','Unna','Varela','Varela Round','Vibur','Vidaloka','Volkhov','Vollkorn','Voltaire','VT323','Waiting for the Sunrise',
'Wallpoet','Walter Turncoat','Wire One','Yanone Kaffeesatz','Yellowtail','Yeseva One','Zeyada');

$f_buttonhtml='';
$f_ttype=2;
$f_smenu='<li><a class="smenu" href="%MenuItemUrl%">%MenuItemText%</a></li>';
$f_ssmenu='<li><a class="ss2menu" href="%MenuItemUrl%">%MenuItemText%</a></li>';
$f_http_prefix=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on')?'https://':'http://';
$f_db_search_table='site_search_index';
$f_db_history_table='site_history';
$f_db_priority_table='site_search_page_priority_index';
$f_db_charset='utf8'; // used for CA,counter,search
$f_os=array('Unknown','Win95','Win98','WinNT','W2000','WinXP','W2003','Vista','Linux','Mac','Windows','Win 7','iOS','Search Bot','android','Win 8', 'BlackBerry');
$f_admin_nickname='admin';
$f_admin_nickname=($f_admin_nickname=='')?'admin':$f_admin_nickname;
$f_admin_avatar='';
$f_lang_reg=array("0"=>array("welcome"=>"welcome [%%username%%]","profile"=>"profile","administration panel"=>"administration","protected area"=>"Protected area login","login form msg"=>"Please Login!","login"=>"log in","forgot password"=>"Forgot your password?","not a member"=>"Not a member yet?","register"=>"Register","welcome guest"=>"Welcome Guest","use correct username"=>"Please, use correct username and password to log in. You have %%attempt%% more attempts before account is blocked.","logout"=>"log out","username"=>"username","username exists"=>"such username already exists","unexisting"=>"This Username can't be found in the database","can contain only"=>"username can contain only A-Z, a-z, - _ @ . and 0-9","username equal password"=>"username can not be equal to password","name"=>"first name","surname"=>"last name","email"=>"email","email not found"=>"This Email address can't be found in the database","no email for user"=>"Email address is not defined for this Username. Please, contact the administrator.","password"=>"password","repeat password"=>"repeat password","password and repeated password"=>"password and repeated password don't match","change password"=>"change password","old password"=>"old password","new password"=>"new password","forgotten password"=>"forgotten password","forgot password message"=>"Enter Username OR Email address, and email with instructions for resetting password will be sent to you.","check email for new password"=>"Check your email to find the new password.","check email for instructions"=>"Check your email to find instructions for resetting password.","your password should be"=>"your password should be at least five symbols","registration"=>"Registration","registration was successful"=>"Your registration was successful. To complete it, check your email and follow the instructions.","registration was completed"=>"Your registration was successfully completed. ","you have to fill"=>"You have to fill either Email address or Username","required fields"=>"required fields","code"=>"verification code","I agree with terms"=>"I agree with the %%Terms of Use%%","you must agree with terms"=>"In order to proceed, you must agree with the Terms of Use","want to receive notification"=>"I want to receive notification for","site map"=>"sitemap","page name"=>"page name","admin link"=>"admin link","edit"=>"edit","save"=>"save","submit_btn"=>"submit","submit_register"=>"Register","submit_password"=>"Send","changes saved"=>"changes saved","close"=>"Close","my orders"=>"my orders","wrong_ext"=>"Only jpg/gif/png images are allowed!","short pwd"=>"Too short","weak"=>"Weak","average"=>"Average","good"=>"Good","strong"=>"Strong","forbidden"=>"Forbidden","email in use"=>"email in use","redirect in"=>"You will be redirected in %%time%% seconds","blocked_err_msg"=>"This account is blocked. Contact administrator!","temp_blocked_err_msg"=>"This account is temporarily blocked. Try again later.","unconfirmed_msg"=>"This account is not confirmed yet!","incorrect username/password"=>"incorrect username/password","require_approval"=>"self-registered users require activation from administrator","registration failed"=>"registration failed","incorrect credentials"=>"Please, use correct username and password to log in.","account_expired_msg"=>"your account expired!","remember me"=>"Remember me"));
$f_lang_f=array("0"=>array("Email not valid"=>"E-mail address is not valid. Please change it and try again...","Emails do not match"=>"Email confirmation does not match your Email","Required Field"=>"Required Field","Checkbox unchecked"=>"Field must be checked","Captcha Message"=>"Verification code does not match","validation failed"=>"Please correct the errors on this form.","post waiting approval"=>"Your message was posted, but waiting for approval. Once approved, it will appear on page.","login on comments"=>"Please Login to post comments!","dear"=>"Dear","email in use"=>"email in use","submit_btn"=>"submit","loading"=>"Loading...","total votes"=>"Total Votes","votes"=>"votes","ranking"=>"ranking","ranking mandatory"=>"Ranking is mandatory!"));
$f_innova_limited=false;
if(!$f_innova_limited) $f_asset_user_own_fld=true;
$f_tooltips_js = <<<MSG
\$(document).ready(function(){\$("a.hhint,td.hhint").cluetip({className:"hhint",width:200,fixed:false,fx:{open:"fadeIn",openSpeed:"50"}});});
MSG;
$f_use_prot_areas=false;
$f_sp_pages_ids=array('20','133','136','137','138','143','144','181','190','147');
if($f_use_mysql) $f_sp_pages_ids[] = '18'; //request edit for mysql only
$f_max_ranking=5;
$f_direct_ranking=false;
$f_ranking_script='$(document).ready(function(){$(".ranking").ranking({numbers:true});});';

$f_def_player_js='<script type="text/javascript">'.$f_lf.$f_js_st.$f_lf
.'swfobject.embedSWF("'.$ca_rel_path.'extdocs/single.swf","%ID%","320","260","9.0.0",false,false,{bgcolor:"#FFFFFF",wmode:"opaque",allowScriptAccess:"sameDomain",flashvars:"audurl=%listenurl3%"});'
.$f_lf.$f_js_end.$f_lf.'</script>'.$f_lf.'<div id="%ID%"></div>';
$f_def_playermp3_js='<script type="text/javascript">'.$f_lf.$f_js_st.$f_lf
.'swfobject.embedSWF("'.$ca_rel_path.'extdocs/singlemp3.swf","%ID%","320","20","9.0.0",false,false,{bgcolor:"#FFFFFF",wmode:"opaque",allowScriptAccess:"sameDomain",flashvars:"audurl=%listenurl3%"});'
.$f_lf.$f_js_end.$f_lf.'</script>'.$f_lf.'<div id="%ID%"></div>';

$f_tagcloudcss='
<style type="text/css">
.tcloud{font-size:13px;list-style-type:none;}
.tcloud_px{font-family:arial;text-align:justify;line-height:23px;}
.tcloud li{display:inline;} 
.tcloud li.alpha{display:block;}
.tcloud li a{text-decoration:none;margin-right:8px;white-space:nowrap;}
.tcloud li a:hover{text-decoration:underline}
.tcloud_px li a{margin:0;white-space:normal;}
.sidcol a{padding-left:3px;line-height:15px;text-decoration:none;text-transform:uppercase;} 
.sidcoll{padding-left:13px;line-height:15px;}
</style>
';

$f_subminiforms=array();
$f_subminiforms_news=array();

$f_mobile_detected=false;

$f_login_cookiebased=false;
$f_landingpage=1;
$f_login_cb_table = 'login_cookiebased';
$f_login_cookie_expire = '30'; //default time (days) cookie will be active
$f_login_cb_str = 'vid';
$f_session_databased = false;

$f_checked_users = array(); //holding already checked users to prevent multi-queries on user check

$f_comments_allowed_tags = array(
	'html'=>array('<p>','<u>','<i>','<b>','<strong>','<del>','<code>','<hr>'),
	'html_admin'=>array('<a>','<img>','<span>','<div>'),
	'extra'=>array('<span>','<div>')
);

function f_generate_pdf($html,$tmpFile,$outFile,$rel_path,$ascode=true,$paper='letter',$orientation='portrait')
{
	global $f_site_url,$f_url_fopen,$f_db_charset;
	
	if(!$f_url_fopen) return '';
	$html=str_replace('<head>','<head><meta http-equiv="content-type" content="text/html; charset='.$f_db_charset.'">',$html);
	$fp=fopen($rel_path.'innovaeditor/assets/'.$tmpFile,'w');
	$html=str_replace($rel_path.'innovaeditor/assets/','',$html);
	if($fp){fwrite($fp,$html);fclose($fp);}
	$url='http://miro.image-line.com/dompdf/dompdf.php?input_file='.$f_site_url.'/innovaeditor/assets/'.$tmpFile.'&paper='.$paper.'&orientation='.$orientation.'&output_file='.$outFile;
	return $ascode?file_get_contents($url):$url;
}

function f_geteditor($lang,$rel,$rtl,$ed_bg,&$html,&$js,$use_mini=false)
{
	global $f_editor_js,$f_editor_html,$f_tiny,$f_innova_lang_list;

	$langl=isset($f_innova_lang_list[$lang])?$f_innova_lang_list[$lang]:$f_innova_lang_list['english'];

	$html=str_replace(array('%RELPATH%','%BACKGROUND%','%XLANGUAGE%'),array($rel,$ed_bg,$langl),$f_editor_html);
	$js=str_replace(array('%EDITOR_LANGUAGE%','%RELPATH%','%XLANGUAGE%'),array($lang,$rel,$langl),$f_editor_js);

	if($f_tiny && $lang=='en') $html=str_replace("plugins :","gecko_spellcheck : true,plugins :",$html);
	if($f_tiny) $html=str_replace('language : "en",','language : "'.$lang.'",',$html);
	else $html=str_replace('%EDITOR_LANGUAGE%',$lang,$html);

	$rtl_code='';
	if($rtl) $rtl_code=$f_tiny?'directionality:"rtl",':'oEdit1.btnLTR=true;oEdit1.btnRTL=true;';
	$html=str_replace('%RTL%',$rtl_code,$html);
	if($use_mini)
	{
		if($f_tiny)
		{
		
		}
		else
		{
			$grps_def = f_GFSAbi($html,'oEdit1.groups = [','];');
			$file_brows=f_GFSAbi($html,'oEdit1.fileBrowser="','";');
			$html = str_replace($grps_def,'oEdit1.groups = [["group1","",["Bold","Italic", "Underline",'
				.'"ForeColor","BackColor","FontName","FontSize","JustifyLeft","JustifyCenter","JustifyRight","Emoticons","Line","LinkDialog"]]];',$html);
			$html = str_replace($file_brows,'',$html);
			$html = str_replace('</script>','oEdit1.enableLightbox=false;oEdit1.enableCssButtons=false;oEdit1.enableFlickr = false;</script>',$html);	
		}
	}
	$js=str_replace('%RTL%',$rtl_code,$js);
}

function f_update_ed_lang($pl,$rel_path,&$innova_js,&$innova_def)
{
	global $f_innova_lang_list,$f_names_lang_sets;

	$l=strtolower($f_names_lang_sets[$pl]);
	if(in_array($l,$f_innova_lang_list))
	{
		$la=(strpos($innova_js,'istoolbar.js')!==false)?$l:$f_innova_lang_list[$l];
		$innova_js=str_replace(f_GFSAbi($innova_js,'src="'.$rel_path.'innovaeditor/scripts/language/','/editor_lang.js"'), 'src="'.$rel_path.'innovaeditor/scripts/language/'.$la.'/editor_lang.js"', $innova_js);
		$innova_def=str_replace(f_GFSAbi($innova_def,'assetmanager.php?lang=','&root'), 'assetmanager.php?lang='.$la.'&root', $innova_def);
	}
}

function f_get_host()
{
	global $f_use_hostname;
	
	$host = '';	
	if($f_use_hostname && isset($_SERVER['HTTP_HOST']))
		$host = $_SERVER['HTTP_HOST'];
	elseif(isset($_SERVER['SERVER_NAME']))
		$host = $_SERVER['SERVER_NAME'];
	if($host == '') return $host; //host not found, return empty and get out
	if(isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != "80")
		$host .= ':'.$_SERVER['SERVER_PORT'];
		
	return $host;
}
function f_request_uri() 
{
	if(isset($_SERVER['REQUEST_URI'])) $uri=$_SERVER['REQUEST_URI'];
	else
	{
		if(isset($_SERVER['argv'])) $uri=$_SERVER['SCRIPT_NAME'].(isset($_SERVER['argv'][0])?'?'.$_SERVER['argv'][0]:'');
		elseif(isset($_SERVER['QUERY_STRING'])) $uri=$_SERVER['SCRIPT_NAME'].'?'.$_SERVER['QUERY_STRING'];
		else $uri=$_SERVER['SCRIPT_NAME'];
	}
	$uri='/'.ltrim($uri,'/');
	return $uri;
}

function f_replace_editor_classes_edit($src)
{
	global $f_ext_styles; 
	for($i=0;$i<count($f_ext_styles);$i++) 
		$src=str_replace('class="rvts'.(($i+1)*8).'"','class="'.$f_ext_styles[$i].'"',$src);
	return $src;
}

function f_replace_editor_classes($src)
{
	global $f_uni,$f_ext_styles;
	if(get_magic_quotes_gpc())
	{
		$src=str_replace(array("\'","&#92;'"),"'",$src);
		$src=str_replace(array('\"','&#92;"'),'"',$src);
		if(!$f_uni)
			$src=str_replace(array('&#8217;','&#8216;','&#8221;','&#8220;','´','`','”','“','’'),array('&rsquo;','&lsquo;','&rdquo;','&ldquo;','&rsquo;','&lsquo;','&rdquo;','&ldquo;',"'"),$src);
	}

	for($i=0;$i<count($f_ext_styles);$i++)
	{
		$src=str_replace('class="'.$f_ext_styles[$i].'"','class="rvts'.(($i+1)*8).'"',$src);
		$src=str_replace('class='.$f_ext_styles[$i].'>','class="rvts'.(($i+1)*8).'">',$src);
	}
	return $src;
}

function f_db($dbcharset,$namescharset)
{
	global $f_db,$f_mysql_host,$f_mysql_username,$f_mysql_password,$f_mysql_dbname,$f_proj_pre,$f_db_createcharset,$f_db_namescharset,$f_mysql_setcharset;
	
	if($f_db!=null && $namescharset!=$f_db_namescharset)$f_db->close();
	if($f_db==null)	
	{
		$f_db=new Database($f_mysql_host,$f_mysql_username,$f_mysql_password,$f_mysql_dbname,$f_proj_pre,$dbcharset);
		$f_db->connect();
		if($f_db->link_id && $namescharset!='') 
		{
			$f_db->query('SET NAMES "'.$namescharset.'"');
			if($f_mysql_setcharset)	$f_db->query('SET CHARACTER SET "'.$namescharset.'"');
		}
	}
	$f_db_createcharset=$dbcharset;
	$f_db_namescharset=$namescharset;
	if($f_db->link_id && $f_db->errno==0) return $f_db;
	else return false;
}

function f_str_replace_first($search,$replace,$subject) 
{
	$pos=strpos($subject,$search);
	if($pos !== false)$subject=substr_replace($subject,$replace,$pos,strlen($search));
	return $subject;
}

function f_multiboximages($src,$rel_path,$force=false)
{
	global $f_lf,$f_xhtml_on;
	
	$multibox=$force || strpos($src,'class="multibox')!==false;
	$mbox=$force || strpos($src,'class="mbox')!==false;
	
	if($multibox || $mbox)
	{ 
		$mb=$multibox?'function getMbCl(el){cl=$(el).attr("class").substring(9);return (cl=="")?"LB":cl;};$("a.multibox").each(function(){img=$(this).children("img");if(img.length>0) $(img).attr("class",($(this).attr("class")));else {cl = getMbCl(this);$(this).addClass("mbox").attr("rel","noDesc["+cl+"]");}});$("img.multibox").each(function(){cl = getMbCl(this);fl=$(this).css(\'float\');$(this).parent().addClass(\'mbox\').attr(\'rel\',\'lightbox[\'+cl+\'],noDesc\').css(\'float\',fl);});':'';
	
		if(strpos($src,'$(".mbox").multibox')!==false)
			$src=str_replace('$(".mbox").multibox',$mb.'$(".mbox").multibox',$src);
		else
		{
			$mb='<link rel="stylesheet" type="text/css" href="'.$rel_path.'extimages/scripts/fancybox.css" media="screen" />'.$f_lf
			.'<script type="text/javascript" src="'.$rel_path.'extimages/scripts/fancybox.js"></script>'.$f_lf
			.'<script type="text/javascript">'.$f_lf.($f_xhtml_on?'/* <![CDATA[ */'.$f_lf:'')
			.'$(document).ready(function(){'.$mb.'$(".mbox").multibox({zicon:true});});'.$f_lf.($f_xhtml_on?'/* ]]> */'.$f_lf:'')
			.'</script>'.$f_lf;	
			$src=str_replace('<!--endscripts-->','<!--endscripts-->'.$f_lf.$mb,$src);
		}
	}
	return $src;
}

function f_include_css($src,$css)
{
	global $f_lf;
	$ct='<style type="text/css">';$cte='</style>';
	if(strpos($css,$ct)!==false) $css=trim(f_GFS($css,$ct,$cte));
	if(strpos($src,$ct)!==false) $src=f_str_replace_first($ct,$ct.$f_lf.$css,$src);
	else $src=str_replace('<!--scripts-->',$ct.$f_lf.$css.$f_lf.$cte.'<!--scripts-->',$src);
	return $src;
}
function f_include_browsedialog($src,$rel_path,$lang='english',$resize_chkbx=true)
{
	global $md_dialog,$f_editor_js,$f_innova_lang_list;

	if(strpos($f_editor_js,'%XLANGUAGE%')!=false)
		$lang=isset($f_innova_lang_list[$lang])?$f_innova_lang_list[$lang]:$f_innova_lang_list['english'];
	 
	$sc=sprintf($md_dialog,$rel_path,$lang,$rel_path)."function fixima(val,id){ima=document.getElementById('ima_'+id);ima.src=val;ima.style.display=(val=='')?'none':'block';};";
	if(isset($_SERVER['HTTP_USER_AGENT'])) $ag=$_SERVER['HTTP_USER_AGENT'];
	if(!$resize_chkbx) $sc=str_replace('assetmanager.php?lang=','assetmanager.php?resize=0&lang=',$sc);
	if((strpos($src,'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">')!==false) && isset($ag) && (strpos($ag,'Internet Explorer')!==false || strpos($ag,'MSIE 8')!==false)) 
		$sc=str_replace('modalDialogShow','mDialogShow',$sc);
	$src=f_include_script($sc,$src);
	return $src;
}
function f_include_script($script,$page_src,$dependancies=array(),$r_path='')
{
	global $f_xhtml_on,$f_lf,$f_ct;
	
	if(!empty($script) && strpos($page_src,$script)===false)
	{ 
		if($f_xhtml_on)
			$script_enclosed='<script type="text/javascript">'.$f_lf.'/* <![CDATA[ */'.$f_lf.$script.$f_lf.'/* ]]> */'.$f_lf.'</script>'.$f_lf;
	  else
			$script_enclosed='<script type="text/javascript">'.$f_lf.$script.$f_lf.'</script>'.$f_lf;

		$start='<!--endscripts-->';
		if(strpos($page_src,$start)===false) $start='</head>'; 		
		$page_src=str_replace($start,$script_enclosed.$start,$page_src);			
	}
	if(!empty($dependancies))
	{
		foreach($dependancies as $k=>$v)
		{
			if(strpos($v,'.css')!==false && strpos($page_src,$v)===false) {$page_src=str_replace('<!--scripts-->','<link rel="stylesheet" type="text/css" href="'.$r_path.$v.'"'.$f_ct.$f_lf.'<!--scripts-->',$page_src);}
			elseif(strpos($page_src,$v.'.js')===false) {$page_src=str_replace('<!--scripts-->','<!--scripts-->'.$f_lf.'<script type="text/javascript" src="'.$r_path.$v.'.js"></script>',$page_src);}
		}
	}
	return $page_src;
}
function f_include_gfonts($src)
{
	global $f_gfonts,$f_lf,$f_editor_js,$f_ct;
	
	if(strpos($f_editor_js,'%XLANGUAGE%')!=false)
	{
		$js='';$fonts=join("|",$f_gfonts);
		$matches=array();
		if(preg_match_all('/'.$fonts.'/',$src,$matches) )
		{
			$matches=array_unique($matches[0]);
			foreach($matches as $k=>$v) if(strpos($src,'family='.$v.'" rel')==false) $js.='<link href="http://fonts.googleapis.com/css?family='.$v.'" rel="stylesheet" type="text/css"'.$f_ct.$f_lf;
			if($js!='') $src=str_replace('</title>','</title>'.$f_lf.$js,$src);
		}
	}
	return $src;
}
function f_addGoogleFontsToInnova($src,$js_innova)
{
	global $f_gfonts,$f_editor;
	
	if($f_editor=="LIVE")
	{
		$js=array();$fonts=join("|",$f_gfonts);
		$matches=array();
		if(preg_match_all('/'.$fonts.'/',$src,$matches) )
		{
			$matches=array_unique($matches[0]);
			foreach($matches as $k=>$v) $js[]='"'.$v.'"';
		}
		if(count($js)>0)
		{
		$js_innova.='
		<script type="text/javascript">
		if(typeof oEditFonts==="undefined") var oEditFonts=new Array();';
		foreach($js as $v) $js_innova.='oEditFonts.push('.$v.');';
		$js_innova.='</script>';
		}
	}	
	return $js_innova;
}
function f_append_script($script,$page_src)
{
	return str_replace(array('</HEAD>','</head>'),' '.$script.' </head>',$page_src);
}
function f_include_jquery_moo_js($page_src,$path='')
{
	global $f_lf;

	$st_part='<!--scripts-->'.$f_lf.'<script type="text/javascript" src="'.$path;
	if(strpos($page_src,'jquery.js')===false) {$page_src=str_replace('<!--scripts-->',$st_part.'jquery.js"></script>',$page_src);}
	return $page_src;
}
function f_include_modaldialog_js($page_src,$path,$height='160')
{
	return f_include_script('$(function() {$("#dialog:ui-dialog").dialog( "destroy" );$("#dialog-modal").dialog({height:'.$height.',modal: true});});',$page_src,array('extimages/scripts/jquery_plus','extimages/scripts/jquery_plus.css'),$path);
}
function f_add_modaldialog($title,$content)
{
	return '<div id="dialog-modal" title="'.$title.'"><p>'.$content.'</p></div>';
}

function f_get_datepicker($field_name,$month_name,$day_name)
{
	global $f_uni; 
	
	foreach($month_name as $k=>$v) $m_t[]="'".$v."'";
	$mon_impl=implode(',',$m_t);
	foreach($day_name as $k=>$v) {$d_sh[]="'".f_my_substr($v,0,2,$f_uni)."'";}
	$day_sh_impl=implode(',',$d_sh);
	 	
	$result='$(document).ready(function(){$(".'.$field_name .'").datepicker({showOtherMonths:true,changeYear:true,monthNames:['.$mon_impl.'],dayNamesMin:['.$day_sh_impl.'],dateFormat:\'MM d, yy\'});}); ';
	return $result;
}
function f_include_datepicker_js($output,$path,$month_name,$day_name,$timepicker,$field_name,$field_name2='',$field_name3='',$field_name4='')
{
	global $f_ct,$f_lf;
	
	$js='';
	if(strpos($output,'jquery_plus.css')===false)
		$js='<link rel="stylesheet" type="text/css" href="'.$path.'extimages/scripts/jquery_plus.css"'.$f_ct.$f_lf;
	if(strpos($output,'jquery_plus.js')===false)		
		$js.='<script type="text/javascript" src="'.$path.'extimages/scripts/jquery_plus.js"></script>';
		
	$js.=$f_lf.'<script type="text/javascript">'.$f_lf;
	if($field_name!='') $js.=f_get_datepicker($field_name,$month_name,$day_name).$f_lf;
	if($field_name2!='') $js.=f_get_datepicker($field_name2,$month_name,$day_name).$f_lf; 
	if($field_name3!='') $js.=f_get_datepicker($field_name3,$month_name,$day_name).$f_lf;
	if($field_name4!='') $js.=f_get_datepicker($field_name4,$month_name,$day_name).$f_lf;
	$js.='</script>'.$f_lf;

	$output=str_replace(array('</HEAD>','</head>'),$f_lf.$js.'</head>',$output);
	return $output;
}

function f_entry_cookie_id($page_id,$prefix)
{
	global $f_proj_id;
	return $prefix.$f_proj_id.$page_id;
}
function f_entry_iscookie($entry_id,$page_id,$prefix)
{
	$cookie_id=f_entry_cookie_id($page_id,$prefix);
	if(isset($_COOKIE[$prefix.$page_id.$entry_id]))
	{
		f_set_entry_cookie($entry_id,$page_id,$prefix);
		setcookie($prefix.$page_id.$entry_id,'',time()-3600);
	}
	if(isset($_COOKIE[$cookie_id]))
		return (strpos($_COOKIE[$cookie_id],$entry_id.'_')!==false);
	else return false;
}
function f_build_ranking($rank_value,$entry_id,$page_id)
{
	global $f_direct_ranking;
	return '<div class="ranking">'.$rank_value.':'.$entry_id.':'
	.(f_entry_iscookie($entry_id,$page_id,'ranking_')?0:($f_direct_ranking?2:1)).'</div>';
}

function f_set_entry_cookie($entry_id,$page_id,$prefix)
{
	$timestamp=time(); 
	$expire_timestamp=mktime(23,59,59,date('n',$timestamp),date('j',$timestamp),2037);
	$cookie_id=f_entry_cookie_id($page_id,$prefix);
	$cookie=(isset($_COOKIE[$cookie_id])?$_COOKIE[$cookie_id]:'');
	$cookie=substr($entry_id.'_'.$cookie,0,3999);	
	setcookie($cookie_id,$cookie,$expire_timestamp);
	$_COOKIE[$cookie_id]=$cookie;
}
function f_build_ranking_admin($ranking_voted,$ranking_total,$ct_color,$label)
{	
	$space=3; $w=5; $output='';
	if($ranking_voted>0)
	{
		$output='<div style="position:relative;width:200px;height:14px;">';
		$r_main=floor($ranking_total/$ranking_voted);
		for($i=0;$i<$r_main;$i++)
		{
			$output.='<div style="position:absolute;width:'.$w.'px;left:'.($i*($w+$space)).'px;bottom:2px;height:10px;background:' .$ct_color.';">&nbsp;</div>';
		}
		$r_reminder=($ranking_total%$ranking_voted); if($r_reminder==1) $r_reminder=2;
		if($r_reminder!=0) $output.='<div style="position:absolute;width:'.ceil($r_reminder/2).'px;left:'.(($r_main)*($w+$space)) .'px;bottom:2px;height:10px;background:'.$ct_color.';">&nbsp;</div>';
		$output.='<div class="rank_text" style="position:absolute;width:160px;left:42px;bottom:0px;"><span class="rvts8">'
		.(($ranking_voted>0)? round($ranking_total/$ranking_voted,1): 0).' \\ '.$ranking_voted.' '.$label.'</span></div></div>';
	}	
	return $output;
}
function f_date_dp($month_name,$ts)
{
	$mon=date('n',$ts); 
	$mon_name=$month_name[$mon-1];
	return $mon_name.date(' j, Y',$ts);
}
function f_detect_mobile($mode)
{
	$res=false;$fvc=false;
	if(isset($_REQUEST['fullview'])) 
	{
		setcookie('use_fullview','1',0,'/');
		$fvc=true;
	}
	elseif(isset($_COOKIE['use_fullview'])) $fvc=true; 	
	if(isset($_REQUEST['mobileview'])) 
	{
		setcookie("use_fullview","",time()-3600,'/');
		$fvc=false;
	}
	if(!$fvc && $mode!='0' && isset($_SERVER['HTTP_USER_AGENT']))
	{
		$us_agent=$_SERVER['HTTP_USER_AGENT'];
		if($mode=='1') 
		{
			if(strpos($us_agent,'iPhone')!==false || strpos($us_agent,'iPod')!==false) $res=true; 
		}
		elseif($mode=='2')
		{
			if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$us_agent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($us_agent,0,4)))  $res=true;
		}
	}
	return $res;
}

function f_str_ireplace($search,$replace,$subject)
{
  if(function_exists('str_ireplace')) $subject=str_ireplace($search,$replace,$subject);
  else
  {	 		  	
	 $ls=$search;foreach($ls as $k=>$v) $search[]=strtoupper($v);
   $subject=str_replace($search,$replace,$subject);
 }
 return $subject;
}

function f_str_lreplace($search, $replace, $subject) //replace last occurrence
{
    $pos = strrpos($subject, $search);
    if($pos !== false) $subject = substr_replace($subject, $replace, $pos, strlen($search));
    return $subject;
}

function f_intval($v)
{
 return intval(preg_replace("/[^0-9]/","",$v));
}

function f_boolastext($var)
{
	return ($var?'true':'false');
}
function f_boolval($var)
{
	if(is_bool($var))return $var; 
	else if($var===NULL || $var==='NULL' || $var==='null')return false; 
	else if(is_string($var))
	{
		$var=strtolower(trim($var));
		if($var=='true' || $var=='1' || $var=='yes')return true;
		else return false;
	}
	else return false;
}

function f_boolasnum($var)
{//returns '0' or '1' - for database boolean
	if(($var === true) || $var==1 || preg_match('/^yes$/i',$var)===1 || preg_match('/^y$/i',$var)===1) return 1;
	return 0;
}

function f_define_os($agent)
{
	global $f_os;
	$os=array(  
	'1'=>'Windows 95|Win95|Windows_95',
	'2'=>'Windows 98|Win98',
	//WIN NT, moved to bottom
	'4'=>'Windows NT 5.0|Windows 2000',
	'5'=>'Windows NT 5.1|Windows XP',
	'6'=>'Windows NT 5.2',
	'7'=>'Windows NT 6.0',
	'8'=>'Linux|X11|Ubuntu|Debian|FreeBSD',
	'9'=>'Mac_PowerPC|Macintosh',
	//"Windows" in the $f_os array, not sure why removed
	'11'=>'Windows NT 6.1',
	'12'=>'iPhone|Ipod|Ipad',
	'13'=>'nuhk|Googlebot|Yammybot|Openbot|Slurp\/cat|msnbot|ia_archiver',
	'14'=>'Android',
	'15'=>'Windows NT 6.2',
	'16'=>'BlackBerry|RIM Tablet OS',
	'3'=>'Windows NT 4.0|WinNT4.0|WinNT|Windows NT'
	); //WIN NT (3) must be last one checked (among the windows OSes)
	foreach($os as $k=>$v) {if(preg_match('/'.$v.'/i',$agent))return $f_os[intval($k)];}
	return 'Unknown';
}

function f_tooltip($url,$class,$title,$text,$imgpath,$link,$im_height='',$im_width='',$more='')
{
	$hint_id=($text!='')?'hhint':'ihint';
	$style=($im_height!='')?'height:'.$im_height.'px;':'';
	$style.=($im_width!='')?'width:'.$im_width.'px;':'';
	$style=($style!='')?' style=&quot;'.$style.'&quot;':'';
	$text=($text=='' && $imgpath!='')?'&lt;img alt=&quot;&quot; src=&quot;'.$imgpath.'&quot;'.$style.'&gt;':$text;
	$result='<a href="'.$url.'" class="'.$hint_id.($class!=''?' '.$class:'').'" title="'.$title.'::'.$text.'" '.$more.'>'.$link.'</a>';
	return $result;
}

function f_build_self_url($script_name,$use_alt_urls=false)
{
	global $f_http_prefix;

	if(isset($_SERVER['SCRIPT_URI']) && $use_alt_urls==false && 
		//these additional checks added due to wrong SCRIPT_URI when rewrite rule used (on some servers only)
		(strpos($_SERVER['SCRIPT_URI'],'.html')!==false ||strpos($_SERVER['SCRIPT_URI'],'.php')!==false)
	) return $_SERVER['SCRIPT_URI'];
	else if((isset($_SERVER['SCRIPT_NAME']))&&(strpos($_SERVER['SCRIPT_NAME'],$script_name) !== false))
		return $f_http_prefix.f_get_host().$_SERVER['SCRIPT_NAME'];
	else return $f_http_prefix.f_get_host().dirname($_SERVER['PHP_SELF']).(dirname($_SERVER['PHP_SELF'])=='/'?'':'/').$script_name;
}

function f_replace_accents($src)
{
	global $AccChars,$NormChars;
	$res=str_replace($AccChars,$NormChars,$src);
	return $res;
}

function f_parse_dropdown($temp,$i)
{
	for($ii=1;$ii<5;$ii++)
	{
		$drop_down_id='a'.$ii;
		$temp=str_replace("ToggleBody('".$drop_down_id."'","ToggleBody('".$drop_down_id."_".$i."'",$temp);
		$temp=str_replace('id="'.$drop_down_id.'Body','id="'.$drop_down_id.'_'.$i.'Body',$temp);
		$temp=str_replace('id="'.$drop_down_id.'Up','id="'.$drop_down_id.'_'.$i.'Up',$temp);
	}
	return $temp;
}
function f_getentrytablerows($tabledata,$script_name='')
{
	global $f_atbg_class,$f_ftm_title;
	$r='';
	foreach($tabledata as $key=>$value)
	{
		$r.='<tr class="'.$f_atbg_class.'" style="vertical-align:top;"><td>';
		if(is_array($value))
		{
			$cnt=count($value);
			if($cnt>2)
			{
				foreach($value as $k=>$v)
				{
					if(!f_is_odd($k))
					{
						$ctrl=$value[$k+1];
						$r.='<div '.($ctrl==''?'':'style="display:inline;float:left;padding-right:5px;').'">';
						if($value[$k]!='')$r.=sprintf($f_ftm_title,$value[$k]);
						$r.=$ctrl;
						$r.='</div>';
					}
				}
				$v='';
			}
			else
			{
				if($value[0]!='')$r.=sprintf($f_ftm_title,$value[0]);
				$r.=$value[1];
			}
		}
		else $r.=$value;
		$r.='</td></tr>';
	}
	
	if($script_name!='')
	{ 
		$act_param = strpos($script_name,'centraladmin.php')!==false ? 'process' : 'action';
		$r.='<script type="text/javascript">$(document).ready(function(){'
			.'$(".ui_shandle_ic3").click(function(){ 
					var pp=$(this).parent(),rel=$(this).attr("rel");
					$.post("'.$script_name.'?'.$act_param.'=fvalues&fid="+rel,function(data){
						ar=data.split("#");
						$(".xsel").remove();
						var s=$("<select />");
						s.addClass("input1 xsel");
						for(v in ar) {
							subar=ar[v].split("<><><>");
							$("<option />",{value:subar[0],text:subar[1]}).appendTo(s);
						};
						s.change(function(){$("input[name="+rel+"]").val($(this).val());});
						s.appendTo(pp);
					}); 
				});'		
		.'});</script>';
	}
	return $r;
}
function f_getentrytablerows_drag($tabledata,$sort,$script_name)
{
	global $f_atbg_class,$f_ftm_title,$f_atbgr_class,$f_lf;
	
	$hover_class='ui_shandle_highlight';//$f_atbgr_class=='t3'?'t3_caption':'ui_shandle_highlight';

	$sort_a=array_keys($tabledata);
	$dis=array(); 
	if($sort!='')
	{
		$s=explode('-',$sort);
		if(isset($s[1])) $dis=explode('|',$s[1]);
		if($s[0]!='')
		{
			$sort_a=explode('|',$s[0]);
			if($sort_a[count($sort_a)-1]=='')	array_pop($sort_a);
			foreach($tabledata as $k=>$v)
			{
				if(array_search($k,$sort_a)===false) $sort_a[]=strval(count($sort_a));
			}
			$temp=array();
			foreach($sort_a as $k=>$v) if(isset($tabledata[$v]))$temp[]=$tabledata[$v];
			$tabledata=$temp;
		}	
	}

	$r='<tr style="vertical-align:top;"><td><ul id="sort_table" style="list-style:none">';
	foreach($tabledata as $key=>$row)
	{
		$ihidden=$row[0]==='hidden';
		$merged=$row[0]==='merged';
		$draggable=!$ihidden && $row[0]!==false;
		$ver=$row[0]==='ver';
		$title=$row[1];
		$single=!(count($row)>5);
		$rowid=$sort_a[$key];
		$row_visible=$row[0]==false || (is_array($dis) && array_search($rowid,$dis)===false);
		$r.='<li id="sort_'.$rowid.'" class="'.$f_atbg_class.'" style="'.($ihidden?'display:none;':'').($merged?'':'margin-bottom:2px;').'">
		<div style="clear:left;padding:4px;position:relative;">';	
		if($title!='') $r.='<div class="ui_shandle"><span class="rvts8 a_editcaption">'.$title.'</span>'.($draggable?'<a class="ui_shandle_ic1"></a><a class="ui_shandle_ic2"></a>':'').'</div>';
		$r.='<div class="ui_sdata"'.($row_visible?'':' style="display:none"').'>';
		
		foreach($row as $k=>$v)
		{
			if($k>1 && !f_is_odd($k))
			{
				$r.='<div'.($single || $ver?'':' style="display:inline;float:left;padding-right:5px;"').'>';
				if($v!='')$r.=sprintf($f_ftm_title,$v);
				if(isset($row[$k+1]))$r.=$row[$k+1].'</div>';
			}
		}
		$r.='</div>';
		if(!$single)$r.='<div style="clear:left"></div>';
		$r.='</div></li>';
	}
	$r.='</ul></td></tr>';
	
	$r.='<script type="text/javascript">$(document).ready(function(){'
		.'$(".ui_shandle").hover(function(){$(this).addClass("'.$hover_class.'");},function(){$(this).removeClass("'.$hover_class.'");});'
		.'$(".ui_shandle_ic1").click(function(){$(this).parent().next().toggle();id=($(this).parent().next().is(":visible")?"+":"-")+$(this).parents("li").attr("id").substr(5);$.post("'.$script_name.'",{"toggle":id})});'	
		.'$("#sort_table").sortable({handle:".ui_shandle_ic2",placeholder:"ui-state-highlight",update:function(){$.post("'.$script_name.'",$("#sort_table").sortable("serialize") )}});'
		.'$(".ui_shandle_ic3").click(function(){var pp=$(this).parent(),rel=$(this).attr("rel");$.post("'.$script_name.'?action=fvalues&fid="+rel,function(data){d=data="---#"+data;ar=d.split("#");$(".xsel").remove();var s=$("<select />");s.addClass("input1 xsel");for(v in ar) {$("<option />",{value:ar[v],text:ar[v]}).appendTo(s);};s.change(function(){$("input[name="+rel+"]").val($(this).val());});s.appendTo(pp);} ) });'		
	.'});</script>';

	return $r;
}
function f_addentrytable($caption,$tabledata,$apend='',$tag='',$prepend='',$addhandle=false,$sort='',$script_name='',$frm='',$frmend='</form>')
{
	global $f_atbg_class,$f_atbgr_class,$f_br,$f_navtop,$f_navend,$f_navlist;

	$output='<script type="text/javascript">function s_roll(id,tg){document.getElementById(id).style.visibility=(tg)?"visible":"hidden"};function sv(id){tg=(document.getElementById(id).style.display=="none");document.getElementById(id).style.display=(tg)?"block":"none"};</script>';
	if($prepend!=='') $output.=$f_navtop.$prepend.$f_navend.'<br class="ca_br" />';

	if($frm!=='') $output.=$frm;
	$output.=str_replace('a_navt','a_navn',$f_navlist).'<table class="atable '.$f_atbgr_class.'" cellspacing="1" cellpadding="3" '.$tag.'>';
	if($addhandle) $output.=f_getentrytablerows_drag($tabledata,$sort,$script_name);
	else $output.=f_getentrytablerows($tabledata,$script_name);
	if($apend!='') $output.='<tr><td>'.$apend.'</td></tr>';
	$output.='</table>';
	$output.=$f_navend;
	if($frm!=='') $output.=$frmend;
	return $output;
}
function f_admintable_drag($captions,$tabledata,$apend='',$tag='',$script_path,$sort='',$keybased=false)
{
	global $f_fmt_caption,$f_atbg_class,$f_atbgr_class,$f_atbgc_class,$f_navtop,$f_navend,$f_navlist,$f_lf;

 	$sort_a=array_keys($tabledata);
	if($sort!='')
	{
		$sort_a=explode('|',f_GFS($sort,'','-'));
		if($sort_a[count($sort_a)-1]=='')	array_pop($sort_a);
		foreach($tabledata as $k=>$v)
		{
			if(array_search($k,$sort_a)===false) $sort_a[$k]=strval(count($sort_a));
		}	
		$temp=array();
		foreach($sort_a as $k=>$v) if(isset($tabledata[$v]))$temp[]=$tabledata[$v];
		$tabledata=$temp;
	}
		
	$cs=count($captions);
	$r=str_replace('a_navt','a_navn',$f_navlist).'<table id="sort_table" class="atable '.$f_atbgr_class.' a_left" cellspacing="1" cellpadding="4" '.$tag.(empty($tabledata)?' width="500px"':'').'><thead>';
	if(!empty($captions))
	{
		$r.='<tr class="'.$f_atbgr_class.'" style="vertical-align:top;">';
		foreach($captions as $key=>$value) 
		{
			if(is_array($value))	$r.='<th>'.sprintf('<a class="a_tabletitle" href="%s" style="text-decoration:%s">%s</a>',$value[0],$value[1],$value[2]).'</th>';
			else $r.='<th>'.sprintf($f_fmt_caption,$value).'</th>';
		}
		$r.='<td></td></tr></thead>'.$f_lf;
	}
	if($apend!='') $r.='<tfoot><tr><td colspan="'.$cs.'">'.$apend.'</td></tr></tfoot>'.$f_lf;
	$r.='<tbody>';	
	$i=1;	
	if(!empty($tabledata))
	{
		foreach($tabledata as $key=>$value) 
		{
			$row='';$j=0;
			$hglt_row=is_array($value);
			if($hglt_row)
			{
 				foreach($value as $key2=>$value2)
				{
					$row.='<td>';
					if(is_array($value2))
					{
						$j++;
						$row.=$value2[0].'<div class="a_detail" id="aa'.$j.'_'.$i.'"></div>';  
					}
					else $row.=$value2;
					$row.='</td>';
				}
				$row.='<td><div style="position:relative;width:40px;"><a class="ui_shandle_ic2"></a></div></td></tr>'.$f_lf;
			}
			else $row.='<td colspan="'.$cs.'">'.$value.'</td><td></td></tr>'.$f_lf;
			$xclass=f_is_odd($i)?' odd':' even';
			$rowid=$keybased?$key:$sort_a[$key];
			$r.='<tr id="sort_'.$rowid.'" class="ui_shandle '.$f_atbg_class.$xclass.'" style="vertical-align:top;">'.$row;
			$i++;
		}
	}
	$r.='</tbody></table>'.$f_navend;

	$r.=
	'<script type="text/javascript">
		function svc(id){$("#"+id).hide();}
		function ca_order() {$.post("'.$script_path.'?ca_order=1",$("#sort_table > tbody").sortable("serialize"),function(data){document.location=\''.$script_path.'?action=mng_categories\'});};
		var fixHelper=function(e,ui) {ui.children().each(function() {$(this).width($(this).width());}); return ui;};
		$(document).ready(function(){
		$(".ui_shandle").hover(function(){$(this).addClass("'.$f_atbgc_class.'").removeClass("'.$f_atbg_class.'");},
		function(){ $(this).addClass("'.$f_atbg_class.'").removeClass("'.$f_atbgc_class.'");});
		$("#sort_table > tbody").sortable({handle:".ui_shandle_ic2",helper: fixHelper,placeholder:"ui-state-highlight"});});
	</script>';

	return $r;
}

function f_admintable($page_nav,$captions,$tabledata,$apend='',$tag='',$sort='',$form_around_table=array())
{
	global $f_fmt_caption,$f_atbg_class,$f_atbgr_class,$f_atbgc_class,$f_lf,$f_ct;
	
	$table_pre=''; 
	$table_post=''; 
	if(count($form_around_table)>0) 
	{ 
		$table_pre='<form '; 
		foreach($form_around_table AS $fk => $fv) $table_pre.=$fk.'="'.$fv.'" '; 
		$table_pre.=$f_ct; 
		$table_post='</form>'; 
	} 
	$sort_a=array_keys($tabledata);		
	if($sort!='')
	{
		$sort_a=explode('|',f_GFS($sort,'','-'));
		if($sort_a[count($sort_a)-1]=='')	array_pop($sort_a);
		foreach($tabledata as $k=>$v)
		{
			if(array_search($k,$sort_a)===false) $sort_a[$k]=strval(count($sort_a));
		}	
		$temp=array();
		foreach($sort_a as $k=>$v) if(isset($tabledata[$v]))$temp[]=$tabledata[$v];
		$tabledata=$temp;
	}

	$cs=count($captions);if($cs==0)$cs=1;
	
	$table='<table class="atable '.$f_atbgr_class.' a_left" cellspacing="1" cellpadding="4" '.$tag.(empty($tabledata)?' width="500px"':'').'>';
	if(!empty($captions))
	{
		$table.='<tr class="'.$f_atbgr_class.'" style="vertical-align:top;">';
		foreach($captions as $key=>$value) 
		{
			if(is_array($value))
			{
				$table.='<td>'.sprintf('<a class="a_tabletitle" href="%s" style="text-decoration:%s">%s</a>',$value[0],$value[1],$value[2]);
				if(isset($value[3]))
					$table.=$value[3];
				for($i=4;$i<=10;$i++)
				{
					if(isset($value[$i]))
					{
						if(is_array($value[$i]))
						 $table.=sprintf('<a class="a_tabletitle extra" href="%s" style="margin-left: 10px; text-decoration:%s">%s</a>%s',$value[$i][0],$value[$i][1],$value[$i][2],$value[$i][3]);
						else
						 $table.=$value[$i];
					}
				}
				$table.='</td>';
			}
			else $table.='<td>'.sprintf($f_fmt_caption,$value).'</td>';
		}
		$table.='</tr>'.$f_lf;
	}
	$i=1;	
	if(!empty($tabledata))
	{
		foreach($tabledata as $key=>$value) 
		{
			$row='';$j=0;
			$hglt_row=is_array($value);
			if($hglt_row)
			{
				foreach($value as $key2=>$value2)
				{
					if(is_array($value2))
					{
						$row.='<td>';
						$j++;
						$row.=$value2[0].'<div class="a_detail" id="aa'.$j.'_'.$i.'">';
						if(is_array($value2[1])) 
							foreach($value2[1] as $key3=>$value3)
						 		if(is_array($value3) && count($value3)>1)
						 			$row.='<span class="rvts8">[</span><a class="'.$value3['class'].' rvts12" '.$value3['extra_tags'].' href="'.$value3['url'].'">'.$key3.'</a><span class="rvts8">]</span> ';
						 		else
						 			$row.='<span class="rvts8">[</span><a class="rvts12" href="'.$value3.'">'.$key3.'</a><span class="rvts8">]</span> ';  
						$row.='</div>';  
					}
					else
					{
						$style='';
						if(strpos($value2,'rel="cc:')!==false)
						{
							$ct_color=f_GFS($value2,'rel="cc:','"');
							$style=' style="border-right: 5px solid '.$ct_color.';"';
						}

						$row.='<td'.$style.'>'.$value2;
					}
					$row.='</td>';
				}
			}
			else $row.='<td colspan="'.$cs.'">'.$value.'</td>';;
			$row.='</tr>'.$f_lf;
			$xclass=f_is_odd($i)?' odd':' even';
			if($hglt_row)
			{
				$table.='<tr style="vertical-align:top;" class="'.$f_atbg_class.$xclass;
				if($j>0)
				{
					$table.='" onmouseover="';
					for($w=1;$w<=$j;$w++)$table.='s_roll(\'aa'.$w.'_'.$i.'\',1,this,\''.$f_atbgc_class.'\');';
					$table.='" onmouseout="';
					for($w=1;$w<=$j;$w++)$table.='s_roll(\'aa'.$w.'_'.$i.'\',0,this,\''.$f_atbg_class.'\');';
				}
			}
			else $table.='<tr style="vertical-align:top;" class="'.$f_atbgc_class.$xclass;
			$table.='">'.$row;
			$i++;
		}
	}
	if($apend!='') $table.='<tr><td colspan="'.$cs.'">'.$apend.'</td></tr>'.$f_lf;
	$table.='</table>';
	
	$output='<script type="text/javascript">'.$f_lf
		.'var act=null;function s_roll(id,tg,th,cn){if(act==null){th.className=cn;document.getElementById(id).style.visibility=(tg)?"visible":"hidden"}};'.$f_lf
		.'function sv(id){tg=(document.getElementById(id).style.display=="none");act=(tg)?id:null;document.getElementById(id).style.display=(tg)?"block":"none"};'.$f_lf
		.'function svc(id){document.getElementById(id).style.display="none";}'.$f_lf.
		'</script>'.$f_lf	
		.($page_nav!==''?'<div class="a_n a_navtop"><div class="a_navt">'.$page_nav.'</div></div><br class="ca_br" />':'')
		.'<div class="a_n a_listing"><div class="a_navn">'
		.$table_pre
		.$table
		.$table_post
		.($i>11 && $page_nav!=''?'<div class="a_navt a_foot">'.$page_nav.'</div>':'')
		.'</div></div>';
	return $output;
}
function f_framedtable($root,$caption,$body,$width,$drop,$drop_expand,$drop_id,$align)
{
	global $f_framedtable_drop,$f_framedtable,$f_br;
	$src=($drop)?$f_framedtable_drop:$f_framedtable;
	if($drop)
	{
		$src=str_replace('%STATEIMAGE%',($drop_expand)?'collapse.gif':'expand.gif',$src);
		$src=str_replace('%STATE_DISPLAY%',($drop_expand)?'block':'none',$src);
		$src=str_replace('%ELEMENT_NAME%',$drop_id,$src);
	}
	$src=str_replace(array('%BODY%','%CAPTION%','%ROOT_PREFIX%','%TABLEWIDTH%'),array($f_br.$body.$f_br,$caption,$root,$width),$src);
	if($align!=='')$src='<div align="'.$align.'">'.$src.'</div>';
	return $src;  
}

function f_framedtablScript($root)
{
	global $f_drop_script;
	$src=str_replace('%ROOT_PREFIX%',$root,$f_drop_script);
	return $src;
}
function f_hiddendiv($hidden_div_css,$content,$id,$close_label='X',$out_div_extra_st='',$mid_div_extra_st='',$in_div_extra_st='')
{
	global $f_br;
	$output=$hidden_div_css.'<script type="text/javascript"> function show_Hdiv(id,ms,ha,op) {hda=id;opa=(op==null)?1:op;new Fx.Tween(id,{duration:ms}).start(\'opacity\',0,opa); if(ha!=false) var myDrag=(ha!=null)?$(id).makeDraggable({\'handle\':$(ha)}):$(id).makeDraggable();} function hide_Hdiv(id) {hda=\'\'; new Fx.Tween(id,{duration:500}).start(\'opacity\',opa,0);} </script>';
	$output.='<div id="hdp_'.$id.'" '.$out_div_extra_st.'>';
	$output.='<a id="hdpc_hdp_'.$id.'" href="javascript:hide_Hdiv(\'hdp_'.$id.'\');">'.$close_label.'</a>';
	$output.=' <div id="hdps_hdp_'.$id.'" '.$mid_div_extra_st.'>';
	$output.=' <div id="hd_hdp_'.$id.'" '.$in_div_extra_st.'>'.$content.'</div>';
	$output.='</div></div>';
	return $output;
}

//this is new version of above, using jquery, instead of mootools
function f_hidden_div($id,$content,$title,$hidden_div_css='',$close_label='X',$out_div_extra_st='',$mid_div_extra_st='',$in_div_extra_st='')
{
	global $f_br;
	$output=$hidden_div_css;
	$output.='<div id="hdp_'.$id.'" '.$out_div_extra_st.'>';
	$output.='<div id="hdp_'.$id.'_title">'.$title;
	$output.='<a id="hdpc_hdp_'.$id.'" style="float:right; text-decoration:none;" href="javascript:hide_Hdiv(\'hdp_'.$id.'\');">'.$close_label.'</a>';
	$output.='</div>';//close title div
	$output.=' <div id="hdps_hdp_'.$id.'" '.$mid_div_extra_st.'>';
	$output.=' <div id="hd_hdp_'.$id.'" '.$in_div_extra_st.'>'.$content.'</div>';
	$output.='</div></div>';
	return $output;
}

function f_hiddendiv_innova($id,$content,$hdiv_width,$hdiv_height,$rel_path,$hdiv_header,$btn_1,$btn_2)
{
	global $f_br,$f_ct;

	$output='<style type="text/css">'.
	' <!--  #hdp_'.$id.'{position:absolute;'.'display:none;'.'z-index: 1004;border:1px solid #d6d6d6;background:#eaeaea url('.$rel_path.'innovaeditor/scripts/icons/dialogbg.gif) repeat-x 0 0;}'
	.'#hdps_hdp_'.$id.' .hd_hdp_'.$id.' #hd_hdp_'.$id.'{display:block;} '
	.'#hdps_hdp_'.$id.'{position:relative;padding: 5px 15px;} '
	.'#hdpc_hdp_'.$id.'{position:absolute;top:2px;right:2px;} '
	.'.inpChk{vertical-align:middle;margin:5px;width:13px;height:13px;} '
	.'.txtLang,.txtInp{font:8pt tahoma;color:black;} '
	.'.txtLang{color:#444444;} '
	.'#dlg_caption{font: bold 17px Trebuchet MS;font-variant:small-caps;color:#444444;padding:5px 15px;} '
	.'.inpBtn{padding:4px 10px;margin-left:2px;font: bold 11px Tahoma;color:#000000;background:#EEEEEE url(\''.$rel_path.'innovaeditor/scripts/style/button.png\');border:1px solid #DDDDDD;border-right-color:#AAAAAA;border-bottom-color:#AAAAAA;cursor:pointer;}--></style>' 
	.'<script type="text/javascript">'
	.'function showDlg(id,ms,ha){hda=id;w=$(window).width();h=$(window).height();dw=$(\'#\'+id).width();dh=$(\'#\'+id).height();$(\'#\'+id).css({position:"fixed",left:((w-dw)/2),top:((h-dh)/2)});$(\'#\'+id).show();if(ha!=false)(ha!=null)?$(\'#\'+id).draggable({handle:\'handle\'}):$(\'#\'+id).draggable();}'
	.'function hideDlg(id){hda=\'\';$(\'#\'+id).hide();};'
	.'</script>'
	.'<div id="hdp_'.$id.'" style="width:'.$hdiv_width.'px;height:'.$hdiv_height.'px;">'
	.'<div id="drag_bar" style="cursor:move;height:30px;">'.$hdiv_header.'<a id="hdpc_hdp_'.$id.'" href="javascript:hideDlg(\'hdp_'.$id.'\');"><img class="system_img" style="float:right;cursor:pointer;" onmousedown="event.cancelBubble=true;if(event.preventDefault) event.preventDefault();" src="'.$rel_path.'innovaeditor/scripts/icons/btnClose.gif"'.$f_ct.'</a></div>'
	.'<div id="hdps_hdp_'.$id.'"><div id="hd_hdp_'.$id.'">'.$content
	.'<div style="text-align:right;"><input class="inpBtn" type="submit" name="add_to_group" value=" '.$btn_1.' " style="vertical-align:top;"' .$f_ct.'&nbsp;'.'<input class="inpBtn" type="button" value=" '.$btn_2.' " onclick="hideDlg(\'hdp_'.$id.'\');"'.$f_ct.'</div>'.'</div></div></div>';
	return $output;
}

function f_getmime($ext,$default='audio/mpeg3')
{
	if(strpos($ext,'tif')!==false) $mime='image/tiff';
	elseif(strpos($ext,'png')!==false) $mime='image/png';
	elseif(strpos($ext,'gif')!==false) $mime='image/gif';
	elseif(strpos($ext,'jp')!==false) $mime='image/jpeg';
	elseif(strpos($ext,'pdf')!==false) $mime='application/pdf';
	elseif(strpos($ext,'swf')!==false) $mime='application/x-shockwave-flash';
	elseif(strpos($ext,'doc')!==false) $mime='application/msword';
	elseif(strpos($ext,'wav')!==false) $mime='audio/wav';
	elseif(strpos($ext,'avi')!==false) $mime='video/avi';
	elseif(strpos($ext,'mp4')!==false) $mime='video/mp4';	
	else $mime=$default;
	return $mime;
}

function f_countries($first_item)
{
	global $f_countries_list;
	$res=array_merge(array('Select'=>$first_item),$f_countries_list);
	return $res;
}
//^^^^^^^^^^^^cookiebased session functions^^^^^^^^^^^^
function f_sess_open() {
    //register_shutdown_function("session_write_close");
    return true;
}

function f_sess_close() {return true;}

function f_sess_read($id) 
{
	global $db;

	if(!isset($db)) return ''; //no database object - cannot read anything
	$sql=sprintf('SELECT `data` FROM `'.$db->pre.'sessions` WHERE id = "%s"', $id);

	$res=$db->fetch_all_array($sql,1);
	if($res===false)
	{
		include_once('data.php');
		create_sess_db($db);
		$res=$db->fetch_all_array($sql,1); //try the query again
	}
	if(count($res) > 0) return $res[0]['data'];
	return '';

}

function f_sess_write($id, $data) 
{
	global $db, $f_proj_pre;

	$sql=sprintf('REPLACE INTO `'.$f_proj_pre.'sessions` VALUES(\'%s\', \'%s\', \'%s\')',
		mysql_real_escape_string($id),
		mysql_real_escape_string($data),
		f_build_mysql_time());
	$res=$db->query($sql,1);
	if($res===false)
	{
		include_once('data.php');
		create_sess_db($db);
		$res = $db->query($sql,1); //try the query again
	}

	return $res;
}

function f_sess_destroy($id) 
{
	global $db, $f_proj_pre;

	$sql=sprintf('DELETE FROM `'.$f_proj_pre.'sessions` WHERE `id` = \'%s\'', $id);
	return $db->query($sql);

}

function f_sess_gc($max)
{
	global $db,$f_proj_pre;

	$sql=sprintf('DELETE FROM `'.$f_proj_pre.'sessions` WHERE `timestamp` < \'%s\'',mysql_real_escape_string(time() - $max));
	return $db->query($sql);

}

function f_sess_regenerate_id()
{
	global $db,$f_proj_pre;

	$old=session_id();
	session_regenerate_id();
	$new=session_id();
	return $db->query_update('sessions',array('id'=>mysql_real_escape_string($new)),'`id` = "'.mysql_real_escape_string($old).'"');
} 
//login cookiebased functions
function f_make_cookie_hash($user,$t_hash)
{
	global $f_proj_id;
	return sha1($f_proj_id.$t_hash.$user['username'].$user['password'].$user['status']);
}

function f_make_db_hash($username,$cookie_hash)
{
	global $f_proj_id;
	return sha1($f_proj_id.'for'.$username.'with'.$cookie_hash);
}

function f_set_longtime_login_cookie($user, $expire_time)
{
	global $db,$f_proj_id,$f_login_cookiebased,$f_login_cb_table, $f_login_cb_str,$f_use_mysql;
	if($f_login_cookiebased)
	{ 
		$t_hash = md5(time());
		setcookie($f_login_cb_str.'usr'.$f_proj_id, $user['username'], $expire_time,'/');
		setcookie($f_login_cb_str.'t'.$f_proj_id, $t_hash, $expire_time,'/');
		$hash = f_make_cookie_hash($user,$t_hash);
		setcookie($f_login_cb_str.'hash'.$f_proj_id,$hash, $expire_time,'/');
		$db_hash = f_make_db_hash($user['username'], $hash);
		
		if($f_use_mysql)
		{
			$r = $db->query_insert($f_login_cb_table,array(
				'id'=>null,
				'hash'=>$db_hash, 
				'exp'=>f_build_mysql_time($expire_time)), true);
			if(!$r) f_check_login_cb_table();		
		}
		else
		{
			setcookie($f_login_cb_str.'exh'.$f_proj_id,$db_hash,$expire_time,'/');
		}
	}
}

function f_check_login_cookies()
{
	global $f_login_cb_str,$f_proj_id, $f_use_mysql;
	$is_set_common_data = (isset($_COOKIE[$f_login_cb_str.'hash'.$f_proj_id])
			&& isset($_COOKIE[$f_login_cb_str.'t'.$f_proj_id]) 
			&& isset($_COOKIE[$f_login_cb_str.'usr'.$f_proj_id]));
	
	if($is_set_common_data)
	{
		$ret = array(
						'username'=>$_COOKIE[$f_login_cb_str.'usr'.$f_proj_id],
						'time'=>$_COOKIE[$f_login_cb_str.'t'.$f_proj_id], 
						'hash'=>$_COOKIE[$f_login_cb_str.'hash'.$f_proj_id]);
		if(!$f_use_mysql && isset($_COOKIE[$f_login_cb_str.'exh'.$f_proj_id]))
			$ret['extrahash'] = $_COOKIE[$f_login_cb_str.'exh'.$f_proj_id];
		return $ret;
	}
	else return false;
}

function f_check_login_cb_table()
{
	global $f_login_cb_table,$db;
	include_once('data.php');
	create_cb_login_db($db,$f_login_cb_table);
}

//NORMAL SESSION FUNCTIONS
function f_int_start_session($flag='',$regen_id=false,$sess_id=false)
{
	global $f_proj_id,$f_session_databased;

	$curr_sess_id = session_id();
	if(isset($_SESSION) && ($sess_id===false || $sess_id == $curr_sess_id)) return false; //don't do anything if session is already started

	if($f_session_databased)
	{
		ini_set('session.save_handler', 'user');
		//set above functions to handle the sessions, using database instead of files
		session_set_save_handler('f_sess_open', 'f_sess_close', 'f_sess_read', 'f_sess_write', 'f_sess_destroy', 'f_sess_gc');
		register_shutdown_function('session_write_close');
	}
	else
	{
		$ssp=''; 
		if(($ssp!='')&&(strpos($ssp,'%SESSIONS_')===false)) session_save_path($ssp);
		session_name('PHPSESSID'.$f_proj_id);
	}
		if($sess_id!==false && $sess_id != $curr_sess_id)
	{
		@session_start();
		@session_destroy();
		session_id($sess_id);
		session_start();
		if(f_session_isset('HTTP_USER_AGENT')) f_unset_session_var('HTTP_USER_AGENT');
	}
	else session_start();
		
	if($flag=='private') header("Cache-control: private");
	if($regen_id && $sess_id===false) f_regenerate_session_id(); //don't allow regen id if specific sess id is set
}

function f_regenerate_session_id()
{

	global $f_session_databased;
	if(function_exists('session_regenerate_id') && version_compare(phpversion(),"4.3.3",">=") ) 
	{
		if($f_session_databased) f_sess_regenerate_id();
		else session_regenerate_id();  //miro disabled
	}
}

function f_session_isset($Var) 
{
	return isset($_SESSION[$Var]);
}

function f_get_session_var($Var) {return (isset($_SESSION[$Var])? $_SESSION[$Var]: NULL);} 
//using null isntead of ''. f_strip_tags(null) is string "", so it should not be a problem

function f_get_session_var_str($var) {return f_strip_tags(f_get_session_var($var));}

function f_set_session_var($Var,$varValue) {$_SESSION[$Var]=$varValue;}
function f_set_session_var_arr($Var,$varArrId,$arr) {$_SESSION[$Var][$varArrId]=$arr;}

function f_unset_session_var($Var) {unset($_SESSION[$Var]);}

//admin logged cookies
function f_adminCookie() 
{
	global $f_admin_cookieid;
	return f_is_logged($f_admin_cookieid);
}
function f_getAdminCookie() 
{
	global $f_admin_cookieid;
	return f_get_session_var_str($f_admin_cookieid);
}
function f_setAdminCookie($c) 
{
	global $f_admin_cookieid;
	f_set_session_var($f_admin_cookieid,$c);
}

function f_is_ezg_admin_logged() //true if admin logged
{
	return f_adminCookie() && (!f_is_logged('HTTP_USER_AGENT') || f_get_session_var('HTTP_USER_AGENT')==md5($_SERVER['HTTP_USER_AGENT']));
}

function f_is_ezg_admin_notlogged()
{
	return (!f_adminCookie() || f_is_logged('HTTP_USER_AGENT') && ($_SESSION['HTTP_USER_AGENT']!=md5($_SERVER['HTTP_USER_AGENT'])));
}

//user logged cookies
function f_userCookie() 
{
	global $f_user_cookieid;
	return f_is_logged($f_user_cookieid);
}
	
function f_getUserCookie() 
{
	global $f_user_cookieid;
	return f_get_session_var_str($f_user_cookieid);
}
function f_setUserCookie($c) 
{
	global $f_user_cookieid;
	f_set_session_var($f_user_cookieid,$c);
}

function f_is_logged($Var) 
{
	global $f_login_cookiebased,$f_login_cb_table, $f_proj_id, $db, $f_proj_pre, $f_use_mysql,$ca_rel_path,$f_user_cookieid;

	$sessVar = f_get_session_var($Var);
	$issetVar = ($sessVar!='' || $sessVar!=NULL);
	if(!$f_login_cookiebased)	return $issetVar;
	
	//if this line is reached, cookiebased login is active so let's check if we need to read the cookie at all
	if($Var==$f_user_cookieid && !$issetVar)
	{
		//looking for user, session is not set yet so check if there is a cookie left
		if($user_cookies = f_check_login_cookies())
		{ 
			$user_account=f_get_user($user_cookies['username'],$ca_rel_path); 
			if(empty($user_account) || $user_account['status']!='1' || ($f_use_mysql && $user_account['confirmed']!='1')) 
				return false; //function returns that the user is not logged in
		
			$hash = f_make_cookie_hash($user_account,$user_cookies['time']);
			$db_hash = f_make_db_hash($user_account['username'], $hash);
			if($f_use_mysql)
			{
				$res = $db->fetch_all_array('SELECT * FROM `'.$f_proj_pre.$f_login_cb_table.'` WHERE `hash` = "'.$db_hash.'" AND `exp` > NOW()');
				if(count($res)!= 1) return false; //there is something incorrect, require new login
			}
			else
			{
				if(!isset($user_cookies['extrahash']) || $user_cookies['extrahash'] !== $db_hash)
					return false; //the hash doesn't match, require new login
			}	
			//user is correct - lets add the session info and let him proceed
			f_int_start_session(); 
			f_regenerate_session_id();
			f_setUserCookie($user_account['username']);
			return true;	//user is logged now
		}
		//no cookie - no user logged, so we don't do anything here
	}
	//it's not user we're checking for, so return if var is set or not
	return $issetVar;	
}

function f_unset_session()
{
	global $f_login_cookiebased, $f_login_cb_str, $f_login_cb_table, $f_proj_id, $db, $f_proj_pre, $f_use_mysql;
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])) {setcookie(session_name(),'',time()+1,'/');}
	if($f_login_cookiebased)
	{ 
		$login_cookies = f_check_login_cookies(); //get info for the user - i.e. username and hash
		if($login_cookies !== false){
			setcookie($f_login_cb_str.'usr'.$f_proj_id,'',time()+1,'/');
			setcookie($f_login_cb_str.'hash'.$f_proj_id,'',time()+1,'/');
			setcookie($f_login_cb_str.'t'.$f_proj_id,'',time()+1,'/');
			$hash = f_make_db_hash($login_cookies['username'],$login_cookies['hash']);
			if($f_use_mysql)
				$db->query('DELETE FROM `'.$f_proj_pre.$f_login_cb_table.'` WHERE `hash` = "'.$hash.'"');
			else
				setcookie($f_login_cb_str.'exh'.$f_proj_id,'',time()+1,'/');	
		}
	}
	session_destroy();
}

function f_url_redirect($url,$temp_redirect_on=false)
{
	global $f_ct;
	if(false) echo '<meta http-equiv="refresh" content="0;url='.$url.'"'.$f_ct;
	else {if($temp_redirect_on) header("HTTP/1.0 307 Temporary redirect"); header('Location:'.str_replace('&amp;','&',$url));}
}

function f_GFS($src,$start,$stop)
{
	if($start=='')$res=$src;
	else if(strpos($src,$start)===false){$res='';return $res;}
	else $res=substr($src,strpos($src,$start)+strlen($start));
	if(($stop!='')&&(strpos($res,$stop)!==false))$res=substr($res,0,strpos($res,$stop));
	return $res;
}

function f_GFSAbi($src,$start,$stop){$res2=f_GFS($src,$start,$stop);return $start.$res2.$stop;}

function f_my_substr($string,$start,$stop,$utf_date_flag=false)
{
	global $f_use_mb;
	if($f_use_mb) return mb_substr($string, $start, $stop, 'UTF-8'); 
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

function substr_unicode($str, $s, $l = null) 
{
	return join("", array_slice(preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY), $s, $l));
}

function f_fileext($src)
{
	$ext_pos=strrpos($src,".");
	$ext=substr($src,$ext_pos);
	return $ext;
}

function f_strtolower($s)
{
	global $f_uni,$f_use_mb;
	return ($f_uni && $f_use_mb)?mb_strtolower($s,"UTF-8"):strtolower($s);
}

function f_strtoupper($s)
{
	global $f_uni,$f_use_mb;
	return ($f_uni && $f_use_mb)?mb_strtoupper($s,"UTF-8"):strtoupper($s);
}

function f_ucfirst($s) //deprecated
{
	return $s;
}

function f_str_replace_once($needle,$replace,$haystack)
{
	$pos=strpos($haystack,$needle);
	if($pos===false) return $haystack;
	$result=substr_replace($haystack,$replace,$pos,strlen($needle));
	return $result;
}

function f_validate_email($email)
{
	$isValid=true;
	$atIndex=strrpos($email,"@");
	if(is_bool($atIndex) && !$atIndex) $isValid=false;
	else
	{
		$domain=substr($email,$atIndex+1);
		$local=substr($email,0,$atIndex);
		$localLen=strlen($local);
		$domainLen=strlen($domain);
		if($localLen < 1 || $localLen > 64) $isValid=false; // local part length exceeded
		else if($domainLen < 1 || $domainLen > 255) $isValid=false; // domain part length exceeded
		else if($local[0]=='.' || $local[$localLen-1]=='.') $isValid=false; // local part starts or ends with '.'
		else if(preg_match('/\\.\\./',$local)) $isValid=false;  // local part has two consecutive dots
		else if(!preg_match('/^[A-Za-z0-9\\-\\.]+$/',$domain)) $isValid = false;// character not valid in domain part
		else if(preg_match('/\\.\\./', $domain)) $isValid=false; // domain part has two consecutive dots
		else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',str_replace("\\\\","",$local)))
		{ // character not valid in local part unless local part is quoted
			if(!preg_match('/^"(\\\\"|[^"])+"$/',str_replace("\\\\","",$local))) $isValid=false;
		}
		if(function_exists('checkdnsrr') && $isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) $isValid=false;// domain not found in DNS
	}
	return $isValid;
}

function f_color_picker($edit,$root_path='../') 
{
	global $f_ct;

	$hex=array('00','33','66','99','cc','ff');
	$area='<area href="javascript:void(0);" onclick="javascript:tS'.$edit.'(\''.$edit.'\', \'#%s\');" coords="%s,%s,%s,%s" alt="" shape="rect"'.$f_ct;
	$result='<img alt="Color Picker" usemap="#cp1'.$edit.'" src="'.$root_path.'ezg_data/colorpicker.png"'.$f_ct;
	$result.='<map name="cp1'.$edit.'">';
	for($i=0;$i<6;$i++)
		for($k=0;$k<6;$k++) 
			for($j=0;$j<6;$j++){$l=($i*72)+($j*12)+1;$t=($k*12)+1;$color=$hex[$i].$hex[$k].$hex[$j];$result.=sprintf($area,$color,$l,$t,$l+12,$t+12);}
	$result.='</map>';
	$result.='<script type="text/javascript">function tS'.$edit.'(element,color){document.getElementById(element).value=color; document.getElementById(element).style.background=color; } </script>';
	return $result;
}

//commented id:1 

function f_is_able_build_img()
{
	if(function_exists('imagecreate') && (function_exists('imagegif') || function_exists('imagejpeg') || function_exists('imagepng'))) return true;
	else return false;
}

function f_days_in_feb($year)
{
	if($year<0) $year++;
	$year+=4800;
	if(($year%4)==0)
	{
		if(($year%100)==0) {if(($year%400)==0) return(29); else return(28);}
		else return(29);
	}
	else return(28);
}
function f_days_in_month($month,$year) 
{
	if($month==0) //probably curr month is Jan and Dec of last year is checked
	{
		$month = 12; $year -= 1;
	}
	if($month==2) return f_days_in_feb($year);
	else
	{
		if($month==1 || $month==3 || $month==5 || $month==7 || $month==8 || $month==10 || $month==12) return(31);
		else return(30);
	}
}
function f_DecodeDate($days,&$Year,&$Month,&$Day)
{
	$D1=365;$D4=($D1*4)+1;$D100=($D4*25)-1;$D400=($D100*4)+1;
	$MonthDays=array(array(31,28,31,30,31,30,31,31,30,31,30,31),array(31,29,31,30,31,30,31,31,30,31,30,31));
	$days+=693594;$days--;$Y=1;
	while($days >= $D400){$days-=$D400;$Y+=400;}
	DivMod($days,$D100,$I,$D);
	if($I==4){$I++;$D+=$D100;}
	$Y+=$I*100;DivMod($D,$D4,$I,$D);$Y+=$I*4;DivMod($D,$D1,$I,$D);
	if($I==4){$I--;$D+=$D1;}
	$Y+=$I;
	$leap=($Y % 4 == 0)&&(($Y % 100 <> 0)||($Y % 400 == 0));
	$DayTable=$MonthDays[$leap];$M=1;
	while(true) {$I=$DayTable[$M-1];if($D<$I) break;$D-=$I;$M++;}
	$Year=$Y;$Month=$M;$Day=$D+1;
}

function xtract($text,$num)
{
	if(preg_match_all('/\s+/',$text,$junk) <= $num) return $text;
	$text=preg_replace_callback('/(<\/?[^>]+\s+[^>]*>)/','_abstractProtect',$text);
	$words=0;
	$out=array();$stack=array();
	$tok=strtok($text,"\n\t ");
	while($tok!==false and strlen($tok)) 
	{
		if(preg_match_all('/<(\/?[^\x01>]+)([^>]*)>/',$tok,$matches,PREG_SET_ORDER))
			{foreach($matches as $tag) _recordTag($stack,$tag[1],$tag[2]);}
		$out[]=$tok;
		if(! preg_match('/^(<[^>]+>)+$/', $tok)) ++$words;
		if($words==$num) break;
		$tok=strtok("\n\t ");
	}
	$result=_abstractRestore(implode(' ', $out));
	$stack=array_reverse($stack);
	if($words==$num) $result.=' ...';
	foreach($stack as $tag) $result.="</$tag>";
	return $result;
}
function _abstractProtect($match) {return preg_replace('/\s/',"\x01",$match[0]);}
function _abstractRestore($strings){return preg_replace('/\x01/',' ',$strings);}
function _recordTag(&$stack, $tag, $args)
{
	if(strlen($args) && $args[strlen($args)-1]=='/') return;
	elseif($tag[0]=='/')
	{
		$tag=substr($tag,1);
		for($i=count($stack)-1;$i>=0;$i--){if($stack[$i]==$tag){array_splice($stack,$i,1);return;}}
		return;
	}
	elseif(in_array(f_strtolower($tag),array('h1','h2','h3','h4','h5','h6','p','li','ul','ol','div','span','a','strong','b','i','u','em','blockquote','font','h','td','tr','tbody','table'))) $stack[]=$tag;
}

function f_split_html_content($string, $max_chr) {return xtract($string,$max_chr/4);}
function f_quotes($s) {return str_replace(array('%92','%91','%93','%94'),array('&rsquo;','&lsquo;','&rdquo;','&ldquo;'),$s);}
function f_un_esc($s) {return str_replace(array('\\\\','\\\'','\"'), array( '\\','\'','"'), $s);}
function f_esc($s) {return (get_magic_quotes_gpc()? $s: str_replace(array('\\','\'','"'), array('\\\\','\\\'','\"'), $s));}
function f_sth($s) {return htmlspecialchars(str_replace(array('\\\\','\\\'','\"'),array('\\','\'','"'),$s), ENT_QUOTES);}
function f_sth_2($s) {return str_replace(array('\\\\','\\\'','\"','<?','?>'),array('\\','\'','"','&lt;?','?&gt;'),$s);}
function f_sth_3($s) {return str_replace(array('\\\\','\\\'','\"'),array('\\','\'','"'),$s);}
function f_strip_tags($src,$tags='') {  $src=urldecode($src); $src=strip_tags($src,$tags);return $src; }
function f_strip_quotes($src) {$src=str_replace(array('"','\''),'',$src);return $src; }  

function f_build_title_for_link($title)
{
	$title=str_replace(' ','-',f_strip_tags(f_strtolower(f_sth_2(urldecode($title)))));
	return rawurlencode(str_replace(array('&','@','"',"'",'/',':',';',',','?','.','!','$','|','<','>','=','^','#','\\'),'',$title));
}

function f_clean_url($url,$lower=true)
{
	$url=preg_replace("`\[.*\]`U","",$url);
	$url=preg_replace('`&(amp;)?#?[a-z0-9_]+;`i','-',$url);
	$url=htmlentities($url, ENT_COMPAT,'utf-8');
	$url=preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $url );
	$url=preg_replace( array("`[^a-z0-9_]`i","`[-]+`"),"-", $url);
	if($lower)return f_strtolower(trim($url, '-'));
	else return trim($url, '-');
}
//read/write db files functions
function f_read_file($filename)
{
	$contents='';
	clearstatcache();
	if(file_exists($filename))
	{	
		$fsize=filesize($filename);
		if($fsize>0) {$fp=fopen($filename,'r');$contents=fread($fp,$fsize);fclose($fp);}
	}
	if(version_compare(PHP_VERSION, '5.4.0', '<'))
		if(get_magic_quotes_runtime()) $contents=stripslashes($contents);
	return $contents;
}
function f_read_tagged_data($file,$tag)
{	
	$file_contents=f_read_file($file);
	if($file_contents=='' && strpos($file,'../')!==false) $file_contents=f_read_file(str_replace('../','',$file));
	$setting=f_GFS($file_contents,'<'.$tag.'>','</'.$tag.'>');
	return $setting;
}
function f_write_tagged_data($tags,$newset,$db_settings_file,$template_fname,$del_flag=false)
{
	$file_contents='<?php echo "hi"; exit; /* */ ?>';
	clearstatcache();
	if(!file_exists($db_settings_file)) {print f_fmt_in_template($template_fname,f_fmt_error_msg('MISSING_DBFILE',$db_settings_file));exit;}
	elseif(!$fp=fopen($db_settings_file,'r+')) {print f_fmt_in_template($template_fname,f_fmt_error_msg('DBFILE_NEEDCHMOD',$db_settings_file));exit;}
	else 
	{
		flock($fp,LOCK_EX);
		$fsize=filesize($db_settings_file);
		if($fsize>0) $file_contents=fread($fp,$fsize);
		
		if(!is_array($tags)) {$tags_arr=array($tags); $newset_arr=array($newset);}
		else {$tags_arr=$tags;$newset_arr=$newset;}

		foreach($tags_arr as $k=>$type)
		{
			if(strpos($file_contents, "<$type>")!==false)
			{
				$oldsettings=f_GFS($file_contents, "<$type>", "</$type>");
				$file_contents=str_replace("<$type>".$oldsettings."</$type>",($del_flag==true?'':"<$type>".$newset_arr[$k]."</$type>"),$file_contents);
			}
			else $file_contents=str_replace("*/ ?>", "<$type>".$newset_arr[$k]."</$type>*/ ?>",$file_contents);
		}
		ftruncate($fp,0);fseek($fp,0);
		if(fwrite($fp,$file_contents)===FALSE) {print "Cannot write to file";exit;}
		flock($fp,LOCK_UN);fclose($fp);
		return true;
	}
}
function f_read_lang_set($file,$lang,$page_type,$period_list=array())
{
	global $f_day_names,$f_month_names;

	$result=array();
	if(file_exists($file))
	{	
		$content=file_get_contents($file);
		if($content!==false) 
		{
			$en=f_GFS($content,'[EN]','[END]');
			$ln=f_GFS($content,'['.$lang.']','[END]');
			$content='';

			$lines_en=explode("\n",$en);$count_en=count($lines_en);
			for($i=1;$i<$count_en;$i++)
			{
				$label=explode("=",trim($lines_en[$i]));	
				if(!empty($label[0])) $default_lang_l["{$label[0]}"]=trim($label[1]);
			}

			$lines_ln=explode("\n",$ln);$count_ln=count($lines_ln);
			for($i=1;$i<$count_ln;$i++) 
			{
				$label=explode("=",trim($lines_ln[$i]));
				if(in_array($page_type,array('blog','podcast','photoblog','calendar','guestbook')))
				{
					if(in_array($label[0],$f_day_names))		$new_day_name[]=trim($label[1]);
					elseif(in_array($label[0],$f_month_names))	$new_month_name[]=trim($label[1]);
					if($page_type=='calendar')
					{
						if(in_array($label[0],$period_list)) $new_period_list[]=trim($label[1]);
						elseif(in_array($label[0],array('year','month','week'))) $new_repeatPeriod_list[]=trim($label[1]);
					}
				}	
				if(!empty($label[0])) $new_lang_l["{$label[0]}"]=trim(isset($label[1])?$label[1]:$label[0]);
			}
		}

		if(isset($new_lang_l)) 
		{
			foreach($default_lang_l as $k=>$v) 
			{
				if(isset($new_lang_l[$k])) $default_lang_l[$k]=$new_lang_l[$k];
			}
			$result['lang_l']=$default_lang_l;
		}
		else {$result['lang_l']=$default_lang_l;}

		if(isset($new_day_name)) $result['day_name']=$new_day_name; 
		if(isset($new_month_name)) $result['month_name']=$new_month_name;	
		if(isset($new_period_list)) $result['period_list']=$new_period_list;
		if(isset($new_repeatPeriod_list)) $result['repeatPeriod_list']=$new_repeatPeriod_list;	
	}
	return $result;
}
/* ------------------ central admin functions ------------------- */
function f_get_sitemap($root_path,$incl_cats=false,$return_assoc=false,$only_for_cat='')
{
	global $f_sitemap_fname;
	$result=array();
	
	$filename=(strpos($root_path,'sitemap.php')!==false)?$root_path:$root_path.$f_sitemap_fname;
	if(file_exists($filename))
	{
		$fsize=filesize($filename);
		if($fsize>0)
		{
			$fp=fopen($filename,'r');$content=fread($fp,$fsize);fclose($fp);
			$lines_a=explode("\n",$content);$count=count($lines_a);
			for($i=1;$i<$count;$i++) 
			{
				if(strpos($lines_a[$i],'<?php echo "hi"; exit; /*')===false && strpos($lines_a[$i],'*/ ?>')===false)
				{
					if($incl_cats || strpos($lines_a[$i],'<id>')!==false)
					{
						$line_arr=explode("|",trim($lines_a[$i]));
						if(strpos($line_arr[0],'#')!==false && strpos($line_arr[0],'#')==0) $line_arr[0]=str_replace('#','',$line_arr[0]);
						if($return_assoc) { $id=str_replace('<id>','',$line_arr[10]); $result["$id"]=$line_arr; }
						else $result[]=$line_arr;
					}
				}
			}
		}
	}
	return $result;
}

function f_get_page_params($id,$root_path='../',$use_next_page=false)
{
	global $f_page_params,$f_subminiforms,$f_subminiforms_news;

	$forms=array_merge($f_subminiforms,$f_subminiforms_news);
	if(array_key_exists($id,$forms) || ($id==0 && isset($_GET['pageid']) && array_key_exists($_GET['pageid'],$forms))) $id=$forms[$id];
	
	if($id==0) return '';
	if(isset($f_page_params[$id])) $result=$f_page_params[$id];
	else
	{
		$result='';
		$all_pages=f_get_sitemap($root_path);
		foreach($all_pages as $k=>$v) {if($v[10]=='<id>'.$id) {$result=$v;break;}}
		
		if(!$use_next_page) $f_page_params[$id]=$result;
		else
		{
			if(!empty($result)) $f_page_params[$id]=$result;
			else { $id--; while(empty($result) && $id>0) { foreach($all_pages as $k=>$v) {if($v[10]=='<id>'.$id) {$result=$v;break;}} $id--; }  }
		}
	}
	return $result;
}

//get current page url (for return basically)
function f_cur_page_url()
{
	global $f_use_hostname;

	$pageURL='http';
	$request_URI=f_request_uri();
	if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") $pageURL.="s";
	$pageURL.="://";
	$pageURL.=f_get_host().$request_URI;

	return $pageURL;
}
// ----------------- admin 
function f_format_users($users,$user_as_index=false,$userid_as_index=false)  //flat only, also used in data.php for import
{
	$users_array=array();$i=1;

	while(strpos($users,'<user id="')!==false)
	{
		$i=f_GFS($users,'<user id="','" ');
		$all='<user id="'.$i.'" '.f_GFS($users,'<user id="'.$i.'" ','</user>');
		$basic=f_GFS($all,'<user id="'.$i.'" ','>').' ';
		$details=f_GFS($all,'<details ','></details>').' ';
		$access=f_GFS($all,'<access_data>','</access_data>').' ';
		$news=f_GFS($all,'<news_data>','</news_data>').' '; // event manager

		list($username,$password)=explode(' ',$basic);
		$details_arr=array();		
		$details_arr['email']=f_GFS($details,'email="','"');
		$details_arr['first_name']=f_GFS($details,'name="','"');
		$details_arr['surname']=f_GFS($details,'sirname="','"');
		$details_arr['creation_date']=f_GFS($details,'date="','"');
		$details_arr['self_registered']=f_GFS($details,'sr="','"'); //self-registration flag
		
		$status_flag=f_GFS($details,'status="','"');
		$details_arr['status']=($status_flag!='')? $status_flag: '1'; //status flag

		$access_arr=array(); $j=1;
		while(strpos($access, '<access id="'.$j.'" ')!==false)
		{
			$access_full=f_GFSAbi($access,'<access id="'.$j.'" ','</access>');
			$page_access_arr=array(); $m=1;
			while(strpos($access_full,'<p id="'.$m.'" ')!==false) 
			{
				$page_access_str=f_GFSAbi($access_full,'<p id="'.$m.'" ','>');
				$page_access_arr []=array('page'=>f_GFS($page_access_str,'page="','"'), 'type'=>f_GFS($page_access_str,'type="','"'));
				$m++;
			}
			$access_str=f_GFS($access_full,'<access id="'.$j.'" ','>');
			list($section,$type)=explode(' ',$access_str);
			$access_arr[]=array(substr($section,0,strpos($section,'='))=>f_GFS($section,'="','"'),substr($type,0,strpos($type,'='))=>f_GFS($type,'="','"'),'page_access'=>$page_access_arr);
			$j++;
		}
		$news_arr=array();$j=1; // event manager
		while(strpos($news,'<news id="'.$j.'" ')!==false) 
		{
			$news_str=f_GFS($news,'<news id="'.$j.'" ','>');
			list($page,$cat)=explode(' ',$news_str);
			$news_arr []=array(substr($page,0,strpos($page,'='))=>f_GFS($page,'="','"'), substr($cat,0,strpos($cat,'='))=>f_GFS($cat,'="','"'));
			$j++;
		}

		$user=f_GFS($username,'="','"');
		if($user_as_index) 
		{
			$users_array[$user]=array('id'=>$i,'uid'=>$i,'username'=>$user,'password'=>f_GFS($password,'="','"'), 'access'=>$access_arr,'news'=>$news_arr);
			foreach($details_arr as $k=>$v)$users_array[$user][$k]=$v;
		}
		elseif($userid_as_index) 
		{
			$users_array[$i]=array('id'=>$i,'uid'=>$i,'username'=>$user,'password'=>f_GFS($password,'="','"'), 'access'=>$access_arr,'news'=>$news_arr);
			foreach($details_arr as $k=>$v)$users_array[$i][$k]=$v;
		}
		else
		{
			$usr=array('id'=>$i,'uid'=>$i,'username'=>$user,'password'=>f_GFS($password,'="','"'), 'access'=>$access_arr,'news'=>$news_arr);
			foreach($details_arr as $k=>$v)$usr[$k]=$v;
			$users_array[]=$usr;
		}
		
		$users=str_replace($all,'',$users);
	}
	return $users_array;
}
function f_get_all_users($root_path,$user_as_index=false,$userid_as_index=false,$add_admin=false,$db=null)
{
	global $f_ca_db_fname,$f_db_charset,$f_use_mysql,$f_uni,$f_admin_nickname,$f_admin_avatar;

	$users_arr=array();
	if($f_use_mysql)
	{
		if($db==null)$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));
		$users_arr=f_m_get_all_users($db,'confirmed=1');
	}
	else
	{
		$filename=(strpos($root_path,'centraladmin.ezg.php')!==false)?$root_path:$root_path.$f_ca_db_fname; 
		$src=f_read_file($filename);
		$users=f_GFS($src,'<users>','</users>');
		if($users!='') $users_arr=f_format_users($users,$user_as_index,$userid_as_index);
	}
	if($user_as_index && $f_use_mysql && !empty($users_arr)) {foreach($users_arr as $k=>$v) $temp[$v['username']]=$v; $users_arr=$temp;}
	elseif($userid_as_index && $f_use_mysql && !empty($users_arr)) {foreach($users_arr as $k=>$v) $temp[$v['uid']]=$v; $users_arr=$temp;}
	if($add_admin) $users_arr[-1]=array('uid'=>'-1','username'=>$f_admin_nickname,'avatar'=>$f_admin_avatar);
	return $users_arr;
}
function f_get_user($username,$root_path,$by_email='',$by_id='')
{
	global $f_use_mysql,$f_db_charset,$f_uni;

	$specific_user=array();
	if($f_use_mysql)
	{
		$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));
		if($by_email!='') $specific_user=f_m_get_user($by_email,$db,'email');
		elseif($by_id!='') $specific_user=f_m_get_user($by_id,$db,'uid');
		else $specific_user=f_m_get_user($username,$db,'username');
	}
	else
	{
		$users_arr=f_get_all_users($root_path);
		if(!empty($users_arr))
		{
			if($by_email!='') { foreach($users_arr as $k=>$v){if($v['email']==$by_email) {$specific_user=$v;break;}} }
			elseif($by_id!='') { foreach($users_arr as $k=>$v){if($v['id']==$by_id) {$specific_user=$v;break;}} }
			else { foreach($users_arr as $k=>$v){if(array_search($username,$v)!==false) {$specific_user=$v;break;}} }
		}
		$users_arr='';
	}
	return $specific_user;
}

function f_m_get_all_users($db,$where=1,$get_groups=false) // mysql version
{	
	$records=array();
	if($get_groups)
		$records=$db->fetch_all_array('SELECT u.*,g.name as group_name,UNIX_TIMESTAMP(u.creation_date) AS creation_date_ts FROM '.$db->pre.'ca_users u LEFT JOIN '.$db->pre.'ca_users_groups_links l
	ON u.uid = l.user_id LEFT JOIN '.$db->pre.'ca_users_groups g ON g.id = l.group_id WHERE '.$where.' ORDER BY username DESC',true);
	else
		$records=$db->fetch_all_array('SELECT *,UNIX_TIMESTAMP(creation_date) AS creation_date_ts FROM '.$db->pre.'ca_users WHERE '.$where.' ORDER BY username DESC',true);
	return $records;
}

function f_replaceUserFields($page,$db)
{
	global $f_hidden_uf;
	
	$user=f_getUserCookie();
	if($user!='')
	{
		$user_data=f_m_get_user($user,$db,'username',false,false);
		foreach($user_data as $k=>$v)
		{
			if(strpos($f_hidden_uf,'|'.$k.'|')==false)
			{
				$rep_array=array();$rep_array[]=$k;
				if($k=='surname')$rep_array[]='last_name';
				elseif($k=='address')$rep_array[]='address1';
				foreach($rep_array as $kk=>$vv) $page=str_replace('name="'.$vv.'"','name="'.$vv.'" value="'.$v.'"',$page);
			}
		}
	}
	return $page;
}
function f_m_getLoggedValues($rel_path,$db)
{
	global $admin_email,$f_admin_nickname,$f_hidden_uf,$f_admin_avatar;
	$user_data=array();
	if(f_adminCookie()) 
	{
		$user_data['name']=$f_admin_nickname;
		$user_data['email']=$admin_email;
		$user_data['avatar']=$f_admin_avatar;
	}
	elseif(f_userCookie())  
	{
		$username=f_getUserCookie();
		$user_data=f_m_get_user($username,$db,'username',false,false);
		$user_data['name']=isset($user_data['first_name'])?$user_data['first_name']:$username;
		foreach($user_data as $k=>$v) {if(strpos($f_hidden_uf,'|'.$k.'|')!==false) unset($user_data[$k]);}
	}
	if(isset($user_data['email']) && strpos($user_data['email'],'<')!=false)$user_data['email']=f_GFS($user_data['email'],'<','>');
	return $user_data;
}
function f_getLoggedData($rel_path,&$name_v,&$email_v,&$surname_v)
{
	global $admin_email;
	if(f_adminCookie()) 
	{
		$name_v='admin';
		$email_v=$admin_email;
	}
	elseif(f_userCookie())  
	{
		$name_v=f_getUserCookie();
		$user_data=f_get_user($name_v,$rel_path);
		$email_v=$user_data['email'];
		if(isset($user_data['first_name']) && !empty($user_data['first_name']))
		{
			$name_v=f_un_esc($user_data['first_name']);
			$surname_v=f_un_esc($user_data['surname']);
		}
	}
	if(strpos($email_v,'<')!=false)$email_v=f_GFS($email_v,'<','>');
}

//TODO - optimize this function to use one query and joins for getting the user data
function f_m_get_user($user,$db,$by_field='uid',$need_access=true,$need_news=true) // mysql version
{	
	global $f_checked_users;
	if(array_key_exists($user, $f_checked_users)) return $f_checked_users[$user];
	
	$user_data=array();

	$tb_ca=$db->get_tables('ca_');
	if(!empty($tb_ca)) 
	{
		$q=$by_field=='uid'?intval($user):'"'.addslashes($user).'"';
		$que='SELECT u.*,a.*,g.login_redirect AS group_login_redirect FROM '.$db->pre.'ca_users u INNER JOIN '.$db->pre.'ca_users_access a ON a.user_id = u.uid LEFT JOIN '.$db->pre.'ca_users_groups_links l ON u.uid = l.user_id LEFT JOIN '.$db->pre.'ca_users_groups g ON g.id = l.group_id WHERE '.$by_field.' = '.$q;
		$ud=$db->fetch_all_array($que,true);
		if($ud===false)
		{
			$que=str_replace('g.login_redirect','""',$que);
			$ud=$db->fetch_all_array($que,true);
		}
		if(!empty($ud))
		{
			$user_data=$ud[0];
			$access=array();
			foreach($ud as $k=>$v)
				$access[]=array('user_id'=>$v['user_id'],'section'=>$v['section'],'page_id'=>$v['page_id'],'access_type'=>$v['access_type']);		
			$user_data['access']=$access;
			$user_data['user_admin']=($access[0]['section']=='ALL' && $access[0]['access_type']=='9')?1:0;
			if(isset($user_data['uid']))
			{
				$where='user_id = '.$user_data['uid'];
				if($need_news)
				{
					$users_news=f_m_get_user_news($db,$where);	
					if(isset($users_news[$user_data['uid']])) $user_data['news']=$users_news[$user_data['uid']];
				}
			}
		}
	}
	$f_checked_users[$user] = $user_data;
	return $user_data;
}

function f_m_get_user_access($db,$where=1) // mysql version
{
	$records=array();
	$records_raw=$db->fetch_all_array('SELECT * FROM '.$db->pre.'ca_users_access WHERE '.$where);
	foreach($records_raw as $k=>$v) $records[$v['user_id']][]=$v;
	return $records;
}

function f_m_get_logged_as()	//gets logged user name (even if it's admin)
{
	global $f_admin_nickname;

	$result='';
	if(f_userCookie()) $result=f_getUserCookie();
	elseif(f_adminCookie()) $result=$f_admin_nickname!=''?$f_admin_nickname:'admin';
	return $result;
}
function f_m_get_loggeduser($db,$admin_email=false,$full_data=false)
{
	global $f_admin_nickname,$f_admin_avatar,$f_admin_email;


	if($f_admin_email===false) $admin_email=$f_admin_email;
	if(f_userCookie())
		return f_m_get_user(f_getUserCookie(),$db,'username',$full_data,$full_data);
	
	elseif(f_is_ezg_admin_logged())
	{
		$ua=array();
		$ua['uid']=-1;
		$ua['username']=$f_admin_nickname!=''?$f_admin_nickname:'admin';
		$ua['email']=$admin_email;
		$ua['avatar']=$f_admin_avatar;
		$ua['user_admin']=0;
		return $ua;
	}
	return false;
}
function f_m_get_userid($db)
{
	$result=0;
	if(f_userCookie()) 
	{
		$user_account=f_m_get_user(f_getUserCookie(),$db,'username',false,false);
		$result=$user_account['uid'];
	}
	return $result;
}

function f_m_get_users_with_access($db,$root_path,$page_id,$page_section,$use_prot_areas,$exclude_view_access)
{
	$result=array();
	$que='SELECT u.*,UNIX_TIMESTAMP(creation_date) AS creation_date_ts, ua.* FROM '.$db->pre.'ca_users AS u LEFT JOIN '.$db->pre.'ca_users_access AS ua ON(ua.user_id = u.uid) WHERE u.confirmed = 1 ORDER BY username DESC';
	$rec_raw=$db->fetch_all_array($que,1);
	if($rec_raw===false) f_url_redirect($root_path.'documents/centraladmin.php?process=dbcheck&url='.f_url());
	foreach($rec_raw as $user)
	{
		$uid=$user['uid'];
		if($user['section']=='ALL')
		{
			if( ($exclude_view_access && $user['access_type']>0) || !$exclude_view_access) $result[$uid]=$user['username'];
		}
		else
		{
			if($page_section==$user['section']  || !$use_prot_areas)
			{
				if($user['page_id']!=0) 
				{
					if($page_id==$user['page_id'] && $user['access_type']!=2) 
					{
						if( ($exclude_view_access && $user['access_type'] != 0) || !$exclude_view_access)
						$result[$uid]=$user['username'];
					}
				}
				elseif($page_section==$user['section'] && $user['access_type']!=2) $result[$uid]=$user['username'];
			}
		}
	}
	return $result;
}
function f_m_get_user_news($db,$where=1) // mysql version
{
	$records=array();
	$records_raw=$db->fetch_all_array('SELECT * FROM '.$db->pre.'ca_users_news WHERE '.$where);
	foreach($records_raw as $k=>$v) $records[$v['user_id']][]=$v;
	return $records;
}
function f_get_users_pg($page_id,$root_path)
{
	global $f_ca_db_fname,$f_sitemap_fname,$f_use_mysql,$f_use_prot_areas;
	
	if($f_use_mysql) return f_m_get_users_pg($page_id,$root_path);
	else
	{
		$result=array();
		$all_users=f_get_all_users($root_path.$f_ca_db_fname);
		$page_info=f_get_page_params($page_id,$root_path.$f_sitemap_fname);	
		foreach($all_users as $key=>$user)
		{
			if(isset($user['access'][0]) && $user['access'][0]['section']=='ALL') $result[]=$user['username'];
			else
			{
				foreach($user['access'] as $k=>$v)
				{
					if($page_info[7]==$v['section'] || !$f_use_prot_areas)
					{
						if($page_info[7]==$v['section'] && $v['type']!='2')	$result[]=$user['username'];
						elseif(isset($v['page_access'])) 
						{
							foreach($v['page_access'] as $kk=>$vv) {if($page_id==$vv['page'] && $vv['type']!='2') {$result[]=$user['username']; break;} }
						}
					}
				}
			}
		}
		$result=array_unique($result);
		return $result;
	}
}
function f_fetch_user_id($username,$rel_path)
{
	$user_data=f_get_user($username,$rel_path);
	return (!empty($user_data)? $user_data['uid']: 0);
}
function f_fetch_user_name($user_id, $rel_path)
{
	$user_data=f_get_user($user_id,$rel_path,'',$user_id);
	return (isset($user_data['display_name']) && !empty($user_data['display_name'])? $user_data['display_name']: (isset($user_data['username'])? $user_data['username']: ''));
}
function f_m_get_users_pg($page_id,$root_path,$exclude_view_access=false) // mysql version
{
	global $f_sitemap_fname,$f_use_mysql,$f_db_charset,$f_uni;
	
	$result=array();
	$page_info=f_get_page_params($page_id,$root_path.$f_sitemap_fname);
	$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));
	$all_users=f_m_get_all_users($db,'confirmed = 1');
	if(!empty($all_users))
	{
		$users_list=array();
		foreach($all_users as $k=>$v) $users_list[]=$v['uid'];
		$where='user_id IN ('.implode(',',$users_list).')';
		$users_access=f_m_get_user_access($db, $where);
	}
	return f_m_get_users_with_access($db,$root_path,$page_id,$page_info[7],false,$exclude_view_access);
}

function f_m_has_allread_access($user_account)
{
	if(!empty($user_account) && ($user_account['status']==1) && ($user_account['confirmed']==1) )
	{
		if(isset($user_account['access'][0]) && $user_account['access'][0]['section']=='ALL') return true;
	}
	return false;
}

function f_m_has_read_access($user_account,$prot_page_info) // mysql version
{
	$auth=false;$section_flag=false;$write_flag=false;$access=false;
	$page_id=str_replace('<id>','',$prot_page_info[10]); settype($page_id,'integer');

	if(!empty($user_account) && ($user_account['status']==1) && ($user_account['confirmed']==1) && isset($prot_page_info[1]))
	{
		if(isset($user_account['access'][0]) && $user_account['access'][0]['section']!='ALL')
		{
			foreach($user_account['access'] as $k=>$v)
			{
				if(f_check_protection($prot_page_info) == 1) return true; //unprotected, user has access
				else
				{
					$section_flag=true; 
					if($v['page_id']!=0)
					{
						if($page_id==$v['page_id'])
						{
							if($v['access_type']==1 || $v['access_type']==3) {$write_flag=true; $access=true; break;}
							elseif($v['access_type']==0) {$access=true; break;}
							elseif($v['access_type']==2) break;
						}
					}
					elseif($prot_page_info[7]==$v['section'])
					{
						if($v['access_type']==0) {$access=true; break;}
						elseif($v['access_type']==1) {$write_flag=true;$access=true; break;}
					}
				}
			}
		}
		else
		{
			$section_flag=true; $access=true;
			if(isset($user_account['access'][0]) && $user_account['access'][0]['access_type']>0) $write_flag=true;
		}
		if($section_flag) $auth=($write_flag || (!isset($_GET['indexflag']) && $access));
	}
	return $auth;
}

function f_has_write_access($user,$page_info,$root_path='../')
{
	global $f_ca_db_fname,$f_use_mysql,$f_db_charset,$f_use_prot_areas,$f_uni;
	
	if($f_use_mysql) 
	{
		$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));
		return f_m_has_write_access($user,$page_info,$db);
	}
	else
	{
		$access=false;
		$page_id=str_replace('<id>','',$page_info[10]);
		$user_account=f_get_user($user,$root_path.$f_ca_db_fname);

		if(!empty($user_account) && ($user_account['status']=='1')) 
		{
			if(isset($user_account['access'][0]) && $user_account['access'][0]['section']!='ALL' && $user_account['username']==$user) 
			{
				foreach($user_account['access'] as $k=>$v)
				{
					if($page_info[7]==$v['section']  || !$f_use_prot_areas)
					{
						if($page_info[7]==$v['section'] && $v['type']=='1')	{$access=true;} 
						elseif($v['type']=='2' && isset($v['page_access'])) 
						{
							foreach($v['page_access'] as $key=>$val)
							{
								if($page_id==$val['page'] && ($val['type']=='1' || $val['type']=='3')) {$access=true;break;}
								elseif($page_id==$val['page'] && $val['type']=='2') {break;}
							}
						}
						if($page_info[7]==$v['section']) break;
					}
				}
			}
			elseif($user_account['username']==$user) {if(isset($user_account['access'][0]) && $user_account['access'][0]['type']=='1') $access=true;}
		}
		return $access;
	}
}

function f_m_has_write_access2($username,$user_account,$page_info) // mysql version
{
	$access=false;
	$page_id=str_replace('<id>','',$page_info[10]); settype($page_id,'integer');	

	if(!empty($user_account) && ($user_account['status']==1)) 
	{ 
		if(isset($user_account['access'][0]) && $user_account['access'][0]['section']!='ALL' && $user_account['username']==$username) 
		{
			foreach($user_account['access'] as $k=>$v)
			{
				if($v['page_id']!=0)
				{
					if($page_id==$v['page_id'])
					{
						if($v['access_type']==1 || $v['access_type']==3) {$access=true;break;}
						elseif($v['access_type']==2) break;
					}
				}
				elseif($page_info[7]==$v['section'] && $v['access_type']==1)	{$access=true; break;} 
			}
		}
		elseif($user_account['username']==$username) 
		{
			if(isset($user_account['access'][0]) && $user_account['access'][0]['access_type']>0) $access=true;
		}
	}
	return $access;
}

function f_m_has_write_access($username,$page_info,$db)  // mysql version
{
	$user_account=f_m_get_user($username,$db,'username',true,false);
	$access=f_m_has_write_access2($username,$user_account,$page_info);
	return $access;
}

function f_has_register_access($username,$page_info,$root_path='../') 
{
	global $f_use_mysql,$f_use_prot_areas;

	$auth=false; 
	$user_account=f_get_user($username,$root_path);
	if(!empty($user_account) && ($user_account['status']=='1'))
	{
		if(isset($user_account['access'][0]) && $user_account['access'][0]['section']!='ALL' && $user_account['username']==$username)
		{
			foreach($user_account['access'] as $k=>$v)
			{
				if($page_info[7]==$v['section']  || !$f_use_prot_areas || $f_use_mysql) {$auth=true; break;}
			}
		}
		elseif($user_account['username']==$username) $auth=true;
	}
	return $auth;
}

//these (two) functions were in the innova files,extracted as single function as used more than once.
//logged user and admin paramethers are by reference, because they are declared before and used
//after the functions use in the script
function f_innova_auth(&$logged_user,&$logged_admin,$check_innova_access_only=false)
{
	f_int_start_session();
	$err='';
	$oep_pass_mode= (f_session_isset('page_id') && f_session_isset('cur_pwd'.f_get_session_var('page_id'))? true: false);
	$pass_mode= (f_session_isset('page_id') && f_session_isset('admin'.f_get_session_var('page_id'))? true: false);
	if(!f_adminCookie())
	{
		if(!f_userCookie())	{ if(!$pass_mode && !$oep_pass_mode) $err=f_innova_handle_error($check_innova_access_only); }
		elseif(f_innova_checkauth(f_getUserCookie())==false) $err=f_innova_handle_error($check_innova_access_only);
		else $logged_user=f_getUserCookie();
	}
	else $logged_admin='admin';	
	if($err != '') return $err;
}

function f_innova_handle_error($check_innova_access_only=false)
{
	if($check_innova_access_only) return 'forbidden';
	else {echo "Not allowed!"; exit;}
}
function f_innova_checkauth($username,$user_account=null) 
{
	global $f_use_mysql;
	
	$auth=false; 
	if($user_account==null)$user_account=f_get_user($username,'../../');
	if(!empty($user_account))
	{
		if($user_account['access'][0]['section']!='ALL')
		{
			foreach($user_account['access'] as $k=>$v)
			{
				if($f_use_mysql) { if($v['access_type']==1 || $v['access_type']==3) {$auth=true;break;} }
				else
				{
					if($v['type']=='1') {$auth=true; break;}
					elseif($v['type']=='2' && isset($v['page_access'])) 
					{
						foreach($v['page_access'] as $key=>$val) {if($val['type']=='1' || $val['type']=='3') {$auth=true; break;}}
					}
				}
			}
		}
		else
		{
			if($f_use_mysql && $user_account['access'][0]['access_type']>0) $auth=true;
			elseif(isset($user_account['access'][0]['type']) && $user_account['access'][0]['type']=='1') $auth=true;
		}
	}
	return $auth;
}

function f_user_edit_own($db,$uid,$page_info)
{
	$ua=array();
	$where='user_id = '.$uid;
	$users_access=f_m_get_user_access($db,$where);
	if(isset($users_access[$uid])) $ua['access']=$users_access[$uid];
	return f_user_edit_own_check('',$ua,$page_info);
}

function f_user_edit_own_check($user,$user_account,$page_info) 
{	
	global $f_use_mysql,$f_use_prot_areas;
	
	$result=false; 
	$page_id=str_replace('<id>','',$page_info[10]);

	if(!empty($user_account) && isset($user_account['access'][0]) && $user_account['access'][0]['section']!='ALL') 
	{
		foreach($user_account['access'] as $k=>$v)
		{
			if($page_info[7]==$v['section']  || !$f_use_prot_areas || $f_use_mysql)
			{	
				if($f_use_mysql) 
				{
					if($v['page_id']!=0) { if($page_id==$v['page_id'] && $v['access_type']==3) {$result=true;break;} }
				}
				else
				{
					if($v['type']=='2' && isset($v['page_access'])) 
					{
						foreach($v['page_access'] as $key=>$val) 
						{
							if($page_id==$val['page'] && $val['type']=='3') {$result=true;break;}
						}
					}
				}
			}
		}
	}
	return $result;
}

# ------------ functions generating HTML -----------------
function f_user_navigation($captions, $urls, $selected='') 
{
	$output='<div class="logged_container" style="padding:2px;text-align:center;">';
	foreach($captions as $k=>$v)
	{
		$format_user='';$value=$v; 
		if(empty($urls[$k])) $output.=' <span class="rvts8 logged_span">'.$value.'</span> |';
		elseif($k==$selected) $output.=' <a class="rvts8 logged_link" href="'.$urls[$k].'">'.$value.'</a> |';
		else
		{
			if(strpos($v,'[')!==false)
			{
				$user=f_GFSAbi($v,'[',']');
				$format_user=' <span class="rvts8 logged_span">'.$user.'</span>';
				$value=str_replace($user,'',$v);
			}
			if(!empty($v) && $v!=' ') $output.=' <a class="rvts12 logged_link" href="'.$urls[$k].'">'.$value.'</a>'.$format_user.' |';
		}
	}
	$output.='<!--end_ca_header--></div>';
	return $output;
}
function f_define_admin_link($pinfo)
{
	global $f_sp_pages_ids;

	$admin_link='';
	if($pinfo[4]=='18')
	{
		$dir=(strpos($pinfo[1],'../')===false)?'':'../'.f_GFS($pinfo[1],'../','/').'/';
		$admin_link=$dir.'ezgmail_'.str_replace('<id>','',$pinfo[10]).'.php?action=index';
	}
	elseif($pinfo[4]=='133') 
	{
		$dir=(strpos($pinfo[1],'../')===false)?'':'../'.f_GFS($pinfo[1],'../','/').'/';
		$admin_link=$dir.'newsletter_'.str_replace('<id>','',$pinfo[10]).'.php?action=subscribers';
	}
	elseif($pinfo[4]=='143' && strpos($pinfo[1],'?flag=podcast')!==false) {$admin_link=$pinfo[1].'&action=index';}
	elseif($pinfo[4]=='147') $admin_link=$pinfo[1].'?action=manage';
	elseif($pinfo[4]=='190') $admin_link=$pinfo[1].'?action=login';
	elseif($pinfo[4]=='181')
	{
		if(strpos($pinfo[1],'action=list')!==false) $admin_link=str_replace('action=list','action=login',$pinfo[1]);
		else $admin_link=$pinfo[1].'?action=login';
	}
	elseif($pinfo[4]=='20')
	{
		if(strpos($pinfo[1],'action=show')!==false) $admin_link=str_replace('action=show','action=doedit',$pinfo[1]);
		else $admin_link=$pinfo[1].'?'.'action=doedit';
	}
	elseif(in_array($pinfo[4],$f_sp_pages_ids)) $admin_link=$pinfo[1].'?action=index';
	else $admin_link=$pinfo[1];

	return $admin_link;
}

function f_deleteUser($db,$user)
{
	global $f_monitor_users; 
	
	if($f_monitor_users)
	{
		$data=array();
		$data['username']='';
		$db->query_update('counter_users',$data,'username = "'.$user.'"');
	}
}

function f_appendUser($db,$user)
{
	global $f_monitor_users; 
	
	if($f_monitor_users)
	{
		$data=array();
		$data['ip']=f_getIP();
		$data['created']=f_build_mysql_time();
		$data['username']=$user;
		if($user!='')	$db->query('DELETE FROM '.$db->pre.'counter_users WHERE ip = "'.$data['ip'].'"');
		$db->query_insert('counter_users',$data);
	}
}

function f_getOnlineUsers($content)
{
	global $f_db_charset,$f_monitor_users,$f_uni;

	$count_reg=0;$users='';$count=0;
	if($f_monitor_users)
	{
		$timeout=300;
		$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));

		$ts=f_build_mysql_time(time()-$timeout);
		$db->query('DELETE FROM '.$db->pre.'counter_users WHERE created < "'.$ts.'"');
		$rawdata=$db->fetch_all_array('SELECT DISTINCT (ip),username FROM '.$db->pre.'counter_users ORDER BY username DESC');
		$users=array();

		foreach($rawdata as $k=>$v)
		{
			if($v['username']!=='')
			{
				$count_reg++;
				$users[]=$v['username'];
			}
		}
		$count=count($rawdata)-$count_reg;
		if($count==0 && $count_reg==0)$count=1;
	}
	$content=str_replace(array('%USER_COUNT%','%GUEST_COUNT%','%USERS%'),array($count_reg,$count,(is_array($users)?implode(" | ", $users):'')),$content);
	return $content;
}

function f_strpos_multi($haystack,$needle_array)
{
	foreach($needle_array as $k=>$v) {if(strpos($haystack,$v)!==false) return true;}
	return false;
}
# builds logged user menu (logout, edit profile), represented in EZG with %LOGGED_INFO% macro 
function f_build_logged_info($content,$page_id,$root_path,$script_path,$lg='')
{
	global $f_sp_pages_ids,$f_admin_nickname,$db,$f_avatar_size,$f_ct;
	if(f_strpos_multi($content,array('%USER_COUNT%','%GUEST_COUNT%','%USERS%'))) $content=f_getOnlineUsers($content);
	
	if(strpos($content,'%LOGGED')!==false)
	{
		f_int_start_session();
		$logged_as_admin=f_adminCookie(); 
		$logged_as_user=f_userCookie();
		$logged=$logged_as_user||$logged_as_admin;
		$logged_name='';
		if($logged)$logged_name=$logged_as_user?f_getUserCookie():$f_admin_nickname;
		$content=str_replace(array('%LOGGED%','%LOGGED_USER%'),array($logged,$logged_name),$content);
		if(strpos($content,'%LOGGED_')!==false) //parse other user params if needed
		{
			$user_data=f_m_getLoggedValues($root_path,$db);
			foreach($user_data as $k=>$v)
				if(!is_array($v) && $k!='password')
				{
					if($k=='avatar') $v=($v!='')?'<img class="system_img" src="'.$root_path.$v.'" alt="" style="height:'.$f_avatar_size.'px;padding-left:5px;"'.$f_ct:'';
					$content=str_replace('%LOGGED_'.$k.'%',$v,$content);
				}
			if(!$logged_as_user)$content = preg_replace('/\%LOGGED_\w+\%/',"",$content);				
		}
	}

	$code="<?php if(function_exists('user_navigation'))";
	if(strpos($content,$code)!==false)
	{
		$labels=f_get_myprofile_labels($page_id,$root_path);
		f_int_start_session();
		$logged_as_admin=f_adminCookie();
		$logged_as_user=f_userCookie();
		$logged=$logged_as_user||$logged_as_admin;
		if($logged)
		{
			$pageid_info=f_get_page_params($page_id,$root_path);

			$logged_user=$logged_as_admin?$f_admin_nickname:f_getUserCookie();
			while(strpos($content,$code)!==false)
			{
				$params_raw=f_GFSAbi($content,$code,"?>");
				if($params_raw!='')
				{
					$logged_info='';
					$params=explode(',',str_replace("'",'',f_GFS($params_raw,'user_navigation(',')')));
					if(f_strtolower(implode('',$params))=="username" || (isset($params[0]) && $params[0]=='true')) $logged_info=$logged_user;
					else
					{
						$captions=array();$urls=array();
						$ca_url=$root_path.((strpos($root_path,'documents')===false)?'documents/':'').'centraladmin.php?';
						$captions[]=strpos($labels['welcome'],'%%username%%')===false?$labels['welcome'].' ['.$logged_user.']':str_replace('%%username%%',$logged_user,$labels['welcome']);
						$urls[]='';
						if($logged_as_admin)
						{
							if(isset($pageid_info[4]) && in_array($pageid_info[4],$f_sp_pages_ids))
							{
								$captions[]=$labels['edit'];
								$urls[]=f_define_admin_link($pageid_info);
							}
							$captions[]=$labels['administration panel'];
							$urls[]=$ca_url.'process=index&amp;'.$lg;
							$captions[]=$labels['logout'];
							$urls[]=$ca_url.'process=logoutadmin&amp;pageid='.$page_id.'&amp;'.$lg;
						}
						else
						{
							if(isset($pageid_info[4]) && in_array($pageid_info[4],$f_sp_pages_ids) && f_has_write_access($logged_user,$pageid_info,$root_path)) 
							{
								$captions[]=$labels['edit'];
								$urls[]=f_define_admin_link($pageid_info);
							}
							$ca_expanded_url=$ca_url.'&amp;username='.$logged_user.'&amp;pageid='.$page_id.'&amp;ref_url='.urlencode($script_path).'&amp;process=';
							$captions[]=$labels['profile'];
							$urls[]=$ca_expanded_url.'editprofile&amp;'.$lg;
							$captions[]=$labels['logout'];
							$urls[]=$ca_url.'process=logout&amp;pageid='.$page_id.'&amp;'.$lg;
						}
						$logged_info=f_user_navigation($captions,$urls);
					}
					$content=str_replace($params_raw,$logged_info,$content);
				}
			}
		}
		else $content=str_replace(f_GFSAbi($content,$code,"?>"),'',$content);
	}
	return $content;
}
function f_get_myprofile_labels($thispage_id,$root_path='../',$lang='')
{
	global $f_inter_languages_a,$f_lang_reg;

	$labels=array();
	if($thispage_id!='' && $thispage_id>0)
	{ 
		$pageid_info=f_get_page_params($thispage_id,$root_path);
		if(empty($pageid_info)) 
		{
			for($i=1;$i<=7;$i++) {$pageid_info=f_get_page_params(($thispage_id-$i),$root_path); if(!empty($pageid_info)) break;}
		}
		if($lang=='') $lang=(isset($pageid_info[22]))? $pageid_info[22]:'EN';
		$key=array_search($lang,$f_inter_languages_a);
		if($key!==false) $labels=$f_lang_reg[$key]; 
		if(empty($labels) && $lang=='EN') $labels=$f_lang_reg['EN'];
	}
	else $labels=$f_lang_reg['0'];
	return $labels;
}

function f_admin_filter_bar($fast_nav,$left_content,$right_content)
{
	global $f_br;
	$fast_nav_items=$fast_nav[0];
	$fast_nav_selected=$fast_nav[1];
	$output='';
	foreach($fast_nav_items as $k=>$v)
	{
		$class=(((!isset($v['status']) && $fast_nav_selected=='') || (isset($v['status']) && $v['status']==$fast_nav_selected))?' class="selected"':'');
		$output.='<a'.$class.' href="'.$v['url'].'">'.$v['label'].' ('.$v['count'].')'.'</a>';
	}
	$output='<div class="filter_bar">'.$output.'</div><div class="filter_bar2">'.$left_content.'<div class="filter_bar_search">'.$right_content.'</div></div>';
	return $output;
}

function f_add_nav_entry($caption,$url,$active,$id,$span='',$class='')
{
	return array('caption'=>$caption,'url'=>$url,'id'=>$id,'active'=>$active,'span'=>$span,'class'=>$class);
}

function f_admin_navigation2($data,$caption='',$page_view=false)
{
	global $f_navend,$f_navtop,$f_ca_fullscreen;

	$sel='';$sel_id='';
	$output=str_replace('a_navt','a_nav',$f_navtop).'<!--start_ca_header-->';
	foreach($data as $k=>$v)
	{
		if($v['url']=='') $output.=' <span>'.$v['caption'].'</span> ::';
		else 
		{
			if($v['active'])
			{
				$sel=$page_view?'':$v['caption'];
				$sel_id=$v['id'];
			}
			$output.='<span class="a_nav_l'.($v['class']!=''?' '.$v['class']:'').($v['active']?' active':'').'">						
			<a '.($v['active']?'class="selected" ':'').'href="'.$v['url'].'">'.$v['caption'].'</a>'.($v['span']!=''?' [<span class="ca_user">'.$v['span'].'</span>]':'')
			.'<span class="ca_nav_icon icon_'.$v['id'].'"></span></span>
			<span class="a_nav_s'.($v['active']?' active':'').'"> ::</span><span class="a_nav_r"></span>';
		}

	}
	$output.='<!--end_ca_header--></div>';
	
	if(!$f_ca_fullscreen) $output.='<div class="a_nav"><span id="a_caption" class="a_caption">'.$sel.$caption.'</span>'.$f_navend;
	else
	{
		$output.='<div class="a_nav">'.$f_navend;
		if($sel.$caption!='')	$output.='<div class="a_navtitle"><span class="ca_title_icon icon_'.$sel_id.'"></span><span id="a_caption" class="a_caption">'.$sel.$caption.'</span></div>';
		$output=str_replace(array('<!--pre-nav-->','<!--post-nav-->'),array('<div class="a_header"></div>','<div class="a_footer"></div>'),$output);
	}
	return $output;
}

# builds admin screen navigation menu ("selected" is index number)
function f_admin_navigation($captions,$urls,$selected='',$caption='',$page_type='ca') 
{
	global $f_navend,$f_navtop,$f_ca_fullscreen;
	$sel='';
	$output=str_replace('a_navt','a_nav',$f_navtop).'<!--start_ca_header-->';
	$current=1;$count=count($captions);
	foreach($captions as $k=>$v)
	{
		$format_user='';
		$value=$v;
		$xclass=(strpos($urls[$k],'process=logout')!==false)?' a_right':'';
		if(empty($urls[$k])) $output.=' <span>'.$value.'</span> ::';
		elseif($k==$selected) 
		{
			$sel=$value;
			$output.=' <span class="a_nav_l active"><span class="ca_nav_icon" id="icon_'.$k.'"></span>
			<a class="selected" href="'.$urls[$k].'">'.$value.'</a></span>
			<span class="a_nav_s active"> ::</span><span class="a_nav_r active"></span>';
		}
		else
		{
			if(strpos($v,'[')!==false)
			{
				$user=f_GFSAbi($v,'[',']');
				$format_user=' <span>'.$user.'</span>';
				$value=str_replace($user,'',$v);
			}
			if(!empty($v) && $v!=' ') $output.='<span class="a_nav_l'.$xclass.($current==$count?' last':'').'">
			<span class="ca_nav_icon" id="icon_'.$k.'"></span>
			<a href="'.$urls[$k].'">'.$value.'</a>'.$format_user.'</span>
			<span class="a_nav_s"> ::</span><span class="a_nav_r"></span>';
		}
		$current++;
	}
	$output.='<!--end_ca_header--></div>';
	if(!$f_ca_fullscreen) $output.='<div class="a_nav"><span id="a_caption" class="a_caption">'.$sel.$caption.'</span>'.$f_navend;
	else
	{
		$output.='<div class="a_nav">'.$f_navend;
		if($sel.$caption!='')
		$output.='<div class="a_navtitle"><span id="a_caption" class="a_caption">'.$sel.$caption.'</span></div>';
	}
	return $output;
}

# formats admin screen output
function f_fmt_admin_screen($content,$menu='')
{
	$output='<div class="a_body">';
	if(!empty($menu)) $output.=$menu.'<br class="ca_br" />';
	$output.=$content.'</div>';
	return $output;
}

function f_fmt_blocked_ips($blocked_ips,$script_path,$unblock_label,$noblocked_label) 
{
	global $f_fmt_span8,$c_page_amp,$lg_amp,$f_atbgr_class;
	
	if(!empty($blocked_ips))
	{
		$output='<div class="a_n"><div class="a_navn"><table class="'.$f_atbgr_class.'" cellspacing="1" cellpadding="4">';
		foreach($blocked_ips as $k=>$v) 
		{
			$output.="<tr><td>".sprintf($f_fmt_span8,$v['ip'])."</td><td><a class='rvts12' href='".$script_path."?action=index&amp;unblockip=" .$v['ip'].$c_page_amp.$lg_amp."'>[". $unblock_label."]</a></td></tr>";
		}
		$output.="</table></div></div>";
	}
	else $output='<span class="rvts8 empty_caption">'.$noblocked_label.'</span>';
	return $output;	
}

# formats page output in template
function f_fmt_in_template($filename,$page_output,$css='',$bg_tag='',$include_menu=true,$include_counter=false,
	$miniform_in_earea=false,$grab_tpl_from_php=false,$ignore_fullScreen=false)
{
	global $f_template_source,$f_ct,$f_lf,$f_ca_fullscreen;

	$root=!(((strpos($filename,'../')!==false) && substr_count($filename,'/')>1 &&(strpos($f_template_source,'../')===false)));
	if(!$root) $f_template_source='../'.$f_template_source;
	if(file_exists($f_template_source)) $filename=$f_template_source;

	$contents=f_read_file($filename);
	$fs=$ignore_fullScreen?false:$f_ca_fullscreen;
	if($grab_tpl_from_php) //get template from php page (remove all the php code)
		$contents = str_replace(f_GFSAbi($contents,'<?php','?>'),'',$contents);
	
	if(!$fs && strpos($filename,'template_source.html')!==false && strpos($contents,'%CONTENT%')!==false) $pattern='%CONTENT%';
	elseif(!$fs && strpos($contents,'<!--page-->')!==false && $include_menu) $pattern=f_GFS($contents,'<!--page-->','<!--/page-->');
	else
	{
		$contents=str_replace(array('<BODY','</BODY'),array('<body','</body'),$contents);
		$pattern=f_GFSAbi($contents,'<body','</body>');
		$body_part=substr($pattern, 0, strpos($pattern,'>')+1);
		if($bg_tag!=='') $body_part=str_replace('<body','<body style="'.$bg_tag.'"',$body_part);
		$page_output=$body_part.'<!--page-->'.$page_output.'<!--/page--></body>';
	}
	$contents=str_replace($pattern,$page_output,$contents);
	if($include_counter==false) $contents=str_replace(f_GFS($contents,'<!--counter-->','<!--/counter-->'),'',$contents);
	if(!empty($css)) $contents=str_replace('<!--scripts-->','<!--scripts-->'.$f_lf.$css,$contents); 
	if($root && (strpos($filename,'template_source.html')!==false) && !$miniform_in_earea) 
		$contents=str_replace(array('src="../','href="../'),array('src="','href="'), $contents);
	if($fs)
		$contents=str_replace('documents/textstyles_nf.css"','documents/ca.css"',$contents);
	else $contents=str_replace('</title>','</title>'.$f_lf.'<link type="text/css" href="'.($root && !$miniform_in_earea?'':'../').'documents/ca.css" rel="stylesheet"'.$f_ct,$contents);
	
	if($f_ca_fullscreen && strpos($contents,'script.js')!==false && strpos($contents,'art-sheet')===false) //fix for conflict artisteer in full screen mode
   	$contents=str_replace('<script type="text/javascript" src="documents/script.js"></script>','',$contents);
   	
	return $contents;
}

function f_format_err_msg($msg,$wrap=false)
{
	global $f_br;
	
	$msg='<p><span class="rvts8"><em style="color:red;">'.$msg.'</em></span></p>';
	if($wrap) $msg='<div class="a_n a_navtop">'.$msg.$f_br.'</div>'.$f_br;
	return $msg;
}

function f_fmt_error_msg($error_index, $affected_file='', $page_type='',$merge_text=false)
{
	global $f_br,$f_ct;
	$error_messages=array('MISSING_DBFILE'=>'Database file '.$affected_file.' is missing on server.',
		'READFILE_FAILED'=>'Can\'t read database file '.$affected_file.'.',
		'DBFILE_NEEDCHMOD'=>'Database file '.$affected_file.' doesn\'t have WRITE permissions.',
		'EMAIL_NOTSET'=>'You haven\'t defined your email yet',
		'MAIL_FAILED'=>'Missing mail settings');

	$output='<span '.($merge_text? 'style="padding:0px;font-size:10px;"':'class="rvts4"').'><em style="color: red;">';
	if($error_index=='MAIL_FAILED') $output.='Email FAILED'; 
	elseif($error_index!='EMAIL_NOTSET') $output.='Operation FAILED!'; 
	$output.="</em>"; 
	
	$br=($merge_text?' ':$f_br);
	$output.=$br."PROBLEM: ".$error_messages[$error_index];
	if($error_index=='MISSING_DBFILE')
		$output.=$br."To solve the problem, go to Project Settings - Upload, press <em style='color: red;'>Re-upload database</em> button and then <em style='color: red;'>Publish</em>.";
	elseif($error_index=='DBFILE_NEEDCHMOD')
		$output.=$br."Set file permissions manually on server. If server is LINUX, set <em style='color:red;'>CHMOD 666</em>. If server is WINDOWS, set <em style='color:red;'>WRITE permission</em>.";
	elseif($error_index=='EMAIL_NOTSET')
		$output.=$br."To solve the problem, open page in EZGenerator ".$f_br."and type email address in <em style='color: red;'>Send Notification to</em> box.";
	elseif($error_index=='MAIL_FAILED')
		$output.=$br."To solve the problem, check with host provider if server uses MAIL or SMTP for sending mails. $f_br If SMTP is used, get the smtp settings from provider, go to <em style='color: red;'>Project Settings >> PHP settings>></em> and set the smtp settings. $f_br If MAIL is used, check with your provider if mail settings are set correctly.";
	$output.="</span>";
	return $output;
}
function f_clearrsscache($script_dir)
{
	$files=array();
	if($handle=opendir($script_dir.'innovaeditor/assets/')) 
	{
		while(false!==($file=readdir($handle))) 
		{
			if($file != "." && $file != ".." && strpos($file,'cache_')===0) $files[]=$file;
		}
	}
	closedir($handle);
	foreach($files as $k=>$v) unlink($script_dir.'innovaeditor/assets/'.$v);
}
function f_rss_line($tag, $rss_setting, $fl_flag=false, $f_sth=false)
{
	global $f_lf;
	$t=($fl_flag)?' ':'';
	return $t."<$tag>".($f_sth? f_sth($rss_setting): $rss_setting)."</$tag>".$f_lf;
}
function f_rss_line_st($line, $fl_flag=false)
{
	global $f_lf;
	$t=($fl_flag)?' ':'';
	return $t.$line.$f_lf;
}
function f_build_rss_header($rss_settings,$page_charset,$page_url,$publish_date,$more_xmlns='',
	$fl_flag=false,$rss_url='',$title='',$googleM=false)
{
	global $f_lf,$f_site_url;

	if($googleM)$rss_header='<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">';
	elseif(!isset($rss_settings['Subtitle (iTunes)'])) $rss_header='<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" '.$more_xmlns.'>';
	else $rss_header='<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" ' .$more_xmlns.'>';
	$pub_date=date('r',$publish_date);
	if($title=='') $title=empty($rss_settings['Title'])?'My site':$rss_settings['Title'];

	$output='<?xml version="1.0" encoding="'.$page_charset.'"?>'.$f_lf;
	if(isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')!==false)
		$output.='<?xml-stylesheet type="text/xsl" media="screen" href="'.$f_site_url.'documents/rss.xls"?>'.$f_lf;
	$output.=f_rss_line_st($rss_header,$fl_flag).f_rss_line_st('<channel>',$fl_flag);
	if(strpos($rss_header,'xmlns:atom')!==false)
		$output.=f_rss_line_st('<atom:link href="'.($rss_url!=''? $rss_url: $page_url.'?action=rss').'" rel="self" type="application/rss+xml"/>',$fl_flag);
	$output.=f_rss_line('title',$title,$fl_flag,true).f_rss_line('link',$page_url,$fl_flag)
	.f_rss_line('description',$rss_settings['Description'],$fl_flag,true)
	.f_rss_line('language',$rss_settings['Language'],$fl_flag).f_rss_line('pubDate',$pub_date,$fl_flag).f_rss_line('lastBuildDate',$pub_date,$fl_flag)
	.f_rss_line('docs','http://blogs.law.harvard.edu/tech/rss',$fl_flag);

	$tags_list=array('copyright','managingEditor','webMaster','category','ttl','cloud','image','rating','textInput','skipHours','skipDays');
	$settings_list=array('Copyright','Managing editor','Webmaster','Category','TTL','Cloud domain','Image','Rating','Text input title','Skip hours','Skip days');
	foreach($settings_list as $k=>$v)
	{
		if(!empty($rss_settings[$v]))
		{
			$tag=$tags_list[$k]; $value=$rss_settings[$v];
			if($v=='Category' && empty($rss_settings['Category domain'])) $output.=f_rss_line($tag,$value,$fl_flag,true);	
			elseif($v=='Category')  
				$output.=f_rss_line_st('<'.$tag.' domain="'.$rss_settings['Category domain'].'">'.$value.'</'.$tag.'>', $fl_flag, true);
			elseif($v=='TTL' && $value!=0) $output.=f_rss_line($tag,$value,$fl_flag,true);
			elseif($v=='Cloud domain') 
				$output.=f_rss_line_st('<'.$tag.' domain="'.$value.'" port="'.$rss_settings['Cloud port'].'" path="'.$rss_settings['Cloud path'].'" registerProcedure="'.$rss_settings['Cloud reg proc'].'" protocol="'.$rss_settings['Cloud protocol'].'"/>',$fl_flag);
			elseif($v=='Image') 
				$output.=f_rss_line_st('<'.$tag.'>',$fl_flag).f_rss_line_st('<title>'.$title.'</title>',$fl_flag).f_rss_line_st('<link>'.$page_url.'</link>',$fl_flag).f_rss_line_st('<url>'.$value.'</url>',$fl_flag).f_rss_line_st('</'.$tag.'>',$fl_flag); 
			elseif($v=='Text input title') 
				$output.=f_rss_line_st('<'.$tag.' title="'.$value.'" description="'.$rss_settings['Text input description']
				.'" name="'.$rss_settings['Text input name'].'" link="'.$rss_settings['Text input link'].'"></'.$tag.'>',$fl_flag);
			else $output.=f_rss_line($tag, $value, $fl_flag,true);
		}
	}
// iTunes special tags
	if(isset($rss_settings['Subtitle (iTunes)']))
	{
		$tags_list=array('itunes:summary','itunes:subtitle','itunes:author','itunes:image','itunes:owner','itunes:keywords','itunes:explicit','itunes:block','itunes:new-feed-url');
		$settings_list=array('Description','Subtitle (iTunes)','Author (iTunes)','Image (iTunes)','Owner name (iTunes)','Keywords (iTunes)','Explicit (iTunes)', 'Block (iTunes)','New-feed-url (iTunes)');
		foreach($settings_list as $k=>$v)
		{
			$tag=$tags_list[$k]; $value=$rss_settings[$v];
			if($v=='Description') $output.=f_rss_line($tag, (empty($value)?'This is my podcast':$value), $fl_flag,true);
			elseif($v=='Owner name (iTunes)' && (!empty($value) || !empty($rss_settings['Owner email (iTunes)'])) )
			{
				$output.=f_rss_line_st('<'.$tag.'>',$fl_flag);
				if($rss_settings['Owner name (iTunes)']!='') $output.=f_rss_line('itunes:name',$rss_settings['Owner name (iTunes)'],$fl_flag,true);
				if($rss_settings['Owner email (iTunes)']!='') $output.=f_rss_line('itunes:email',$rss_settings['Owner email (iTunes)'],$fl_flag,true);
				$output.=f_rss_line_st('</'.$tag.'>',$fl_flag);
			}
			elseif(!empty($rss_settings[$v])) 
			{
				if($v=='Image (iTunes)') $output.=f_rss_line_st('<'.$tag.' href="'.$value.'" />');
				else $output.=f_rss_line($tag, $value, $fl_flag,true);
			}
		}
// iTunes categories
		$itunes_cats=array('Category (iTunes)','Category II (iTunes)','Category III (iTunes)'); 
		$itunes_subcats=array('Subcategory (iTunes)','Subcategory II (iTunes)','Subcategory III (iTunes)');
		foreach($itunes_cats as $k=>$cat)
		{
			$subcat=$itunes_subcats[$k];
			if(!empty($rss_settings[$cat]) && !empty($rss_settings[$subcat]))
			{
				$output.=f_rss_line_st('<itunes:category text="'.f_sth($rss_settings[$cat]).'">',$fl_flag);
				$output.=f_rss_line_st('<itunes:category text="'.f_sth($rss_settings[$subcat]).'" />',$fl_flag);
				$output.=f_rss_line_st('</itunes:category>',$fl_flag);
			}
			elseif(!empty($rss_settings[$cat])) $output.=f_rss_line_st('<itunes:category text="'.f_sth($rss_settings[$cat]).'"/>',$fl_flag);
		}
	}
	return $output;
}
function f_build_rss_items($rss_data,$fl_flag=false)
{	
	$output='';
	if(!empty($rss_data))
	{
		foreach($rss_data as $key=>$item)
		{
			$output.=f_rss_line_st('<item>',$fl_flag);
			foreach($item as $tag=>$value)
			{
				if(!is_array($value))
				{
					if($tag=='guid')  $output.=f_rss_line_st('<'.$tag.' isPermaLink="true">'.$value.'</'.$tag.'>',$fl_flag);
					else $output.=f_rss_line($tag, $value, $fl_flag);
				}
				else
				{
					if($tag=='enclosure' || $tag=='media:content') {$line='<'.$tag; foreach($value as $attr=>$v) $line.=' '.$attr.'="'.$v.'"'; $line.='/>'; $output.=f_rss_line_st($line,$fl_flag);}
					elseif($tag=='category') $output.=f_rss_line_st('<'.$tag.' domain="'.$value['domain'].'">'.$value['value'].'</'.$tag.'>',$fl_flag);
				}
			}
			$output.=f_rss_line_st('</item>',$fl_flag);
		}
	}
	return $output;
}
function f_build_rss($rss_data,$rss_settings,$page_charset,$page_url,$publish_date,$more_xmlns='',$fl_flag=false,$rss_url=''
	,$title='',$googleM=false)
{
	$output=f_build_rss_header($rss_settings,$page_charset,$page_url,$publish_date,$more_xmlns,$fl_flag,$rss_url,$title,$googleM)
		.f_build_rss_items($rss_data,$fl_flag)
		.f_rss_line_st('</channel>',$fl_flag)
		.f_rss_line_st('</rss>',$fl_flag);
	return $output;
}
function f_page_nav_ca($rec_count,$page_url,$max,$page)
{
	global $ca_nav_labels;
	return f_page_navigation($rec_count,$page_url,$max,$page,' / ','nav',$ca_nav_labels,'&amp;','',false,false,'',true); 
}
function f_page_navigation($rec_count,$page_url,$rec_per_page,$page=1,$of_label='of',$class='rvts12',$src_labels,$pg_prefix='&amp;',
	$lang='',$url2_flag=false,$addhome=false,$homeurl='',$ca=false,$params='') 
{
	global $ca_nav_labels;
	if($rec_per_page==0) return '';
	$output='';
	$purl=($url2_flag?$page_url:$page_url.$pg_prefix.'page=');
	$cl_url=($url2_flag?'/'.$pg_prefix:$lang);
	
	if(!isset($src_labels['home'])) $src_labels['home']='home';
  $compact=strpos($params,'compact')!==false; //comapct labels : same as ca labels + 123  >
  $labels=$compact?$ca_nav_labels:$src_labels;
  
	$lb=$compact?'':'<span class="'.$class.' nav_brackets left">[</span>';
	$rb=$compact?'':'<span class="'.$class.' nav_brackets right">]</span>';
	$class=strpos($class,'class=')!=false?f_GFS($class,'"','"'):$class;
	$div_class=$ca?'class="ca_nav"':'class="user_nav"';
	
	$labels['home_title']=$src_labels['home'];
	$labels['prev_title']=$src_labels['prev'];
	$labels['next_title']=$src_labels['next'];

	$tabsmax=6;
	if($rec_per_page<1)$rec_per_page=1;
	$pcount=round(($rec_count-1) / $rec_per_page) +1;
	$pcount=ceil($rec_count/$rec_per_page);

	if($rec_count>0)
	{
		$output.='<div '.$div_class.'><table style="width:100%"><tr><td><span class="rvts8">';
		if($addhome)$output.=$lb.'<a class="'.$class.' nav_home" href="'.$homeurl.'" title="'.$labels['home_title'].'">'.$labels['home'].'</a>'.$rb.'&nbsp;';
		if($rec_per_page>0)
		{
			if($page>1)	$output.=$lb.'<a class="'.$class.' nav_prev" href="'.$purl.($page-1).$cl_url.'" title="'.$labels['prev_title'].'">'.$labels['prev'].'</a>'.$rb.'&nbsp;';
			if($pcount<=$tabsmax)
			{
				$start=1;
				$stop=$pcount;
			}
			else
			{
				$start=$page-round($tabsmax/2);
				$start=max($start,1);
				$stop=$start+$tabsmax;
				if($stop > $pcount)
				{
					$stop=$pcount;
					$start=$stop-$tabsmax+1;
				}
			}
			if($start>1)
			{
				$output.='<a class="'.$class.'" href="'.$purl.'1'.$cl_url.'">1</a> ';
				if($start>2) $output.='<span class="'.$class.' nav_dots"> ... </span>';
			}
	
			if($start!=$stop)
			for($i=$start;$i<$stop+1;$i++)
			{
				if($i==$page && $page<=$pcount) $output.=$lb.'<span class="'.$class.' nav_active">'.$i.'</span>'.$rb;
				else $output.=' <a class="'.$class.'" href="'.$purl.$i.$cl_url.'">'.$i.'</a> ';
			}

			if($stop<$pcount)
			{
	      if($stop<$pcount-1) $output.='<span class="'.$class.' nav_dots"> ... </span>';
				$output.=' <a class="'.$class.'" href="'.$purl.($pcount).$cl_url.'">'.$pcount.'</a>';
	    }
	
	    if($page<$pcount) 
				$output.='&nbsp;'.$lb.'<a class="'.$class.' nav_next" href="'.$purl.($page+1).$cl_url.'" title="'.$labels['next_title'].'">'.$labels['next'].'</a>'.$rb;

			$output.='</span></td>';
			if($rec_count>1) {$output.='<td style="text-align:right"><span class="rvts8 '.$class.' nav_count">'.(($page-1)*$rec_per_page+1).'-'
			.($rec_per_page*$page>$rec_count?$rec_count:$rec_per_page*$page).' '.$of_label.' '.$rec_count.'</span></td>';}
			$output.='</tr></table></div>';
		}
		else
		{
			$output='<div '.$div_class.' style="text-align:right;padding: 2px 0;">';
			if($addhome)$output.=$lb.'<a class="'.$class.' nav_home" href="'.$homeurl.'" title="'.$labels['home_title'].'">'.f_strtoupper($labels['home']).'</a>'.$rb.'&nbsp;';
			$output.='<span class="rvts8 '.$class.' nav_count">1-'.$rec_count.' '.$of_label.' '.$rec_count.'</span></div>';
		}
	}
	return $output;
}

function f_entry_navigation($prev,$next,$prev_title,$next_title,$page_url,$labels,$url2_flag=false,$params='') 
{
	global $ca_nav_labels,$f_br;
	$output='';
	$class='rvts12';
	$compact=strpos($params,'compact')!==false;
	$floating=strpos($params,'floating')!==false;
	
	if($compact)$labels=$ca_nav_labels;

	$lb=$compact?'':'<span class="'.$class.' nav_brackets left">[</span>';
	$rb=$compact?'':'<span class="'.$class.' nav_brackets right">]</span>';
	$div_class='class="user_nav"';
	if(!isset($labels['home']))$labels['home']='home';

	$output.='<div '.$div_class.' style="padding: 2px 0;"><table style="width:100%"><tr><td><span class="rvts8">';
	if($floating)
	{
		if($prev!='') $output.='<div style="float:left;text-align:left;">'.$lb.'<a class="'.$class.' nav_prev" href="'.$prev.'" title="'.f_sth($prev_title).'">'.$labels['prev'].'</a>'.$rb.$f_br.f_sth($prev_title).'&nbsp;</div>';
		if($next!='') $output.='<div style="float:right;text-align:right;">'.$lb.'<a class="'.$class.' nav_next" href="'.$next.'" title="'.f_sth($next_title).'">'.$labels['next'].'</a>'.$rb.$f_br.f_sth($next_title).'</div>';
		$output.='<div style="width:20%; margin: 10px auto;text-align:center;">'.$lb.'<a class="'.$class.' nav_home" href="'.$page_url.'" title="'.$labels['home'].'">'.$labels['home'].'</a>'.$rb.'&nbsp;</div>';
		$output.='<div style="clear:both;"></div></span></td></tr></table></div>';
	}
	else
	{
		$output.=$lb.'<a class="'.$class.' nav_home" href="'.$page_url.'" title="'.$labels['home'].'">'.$labels['home'].'</a>'.$rb.'&nbsp;';
		if($prev!='') $output.=$lb.'<a class="'.$class.' nav_prev" href="'.$prev.'" title="'.f_sth($prev_title).'">'.$labels['prev'].'</a>'.$rb.'&nbsp;';
		if($next!='') $output.=$lb.'<a class="'.$class.' nav_next" href="'.$next.'" title="'.f_sth($next_title).'">'.$labels['next'].'</a>'.$rb;
		$output.='</span></td></tr></table></div>';
	}
	return $output;
}

function f_build_filter($id,$filter,$action,$style='')
{
	global $f_ct;
	return '<span style="float:right"><input title="filter" type="text" id="'.$id.'" class="input1 direct_edit" value="'.$filter.'" style="font-size:11px;'.$style.'"><input class="ui_shandle_ic4" style="display:none" type="button" onclick="'.$action.'" value=""'.$f_ct.'</span>';
}

function f_apply_filter_style(&$filterHTML, $tpl_in_root)
{
	$filterHTML = str_replace('style="display:none"', 'style="display:none; background-image: url('
	.($tpl_in_root?'':'../').'extimages/scripts/ui-icons.png); background-position: -64px -144px;'
	.'width: 16px;height: 16px;border: none;cursor: pointer;margin-left: 2px;"', $filterHTML);
}

function f_build_input($name,$value,$style='',$max_len='',$type='text',$misc='',$frmid='',$label='',$btn_id='')
{
	global $f_ct,$f_br;

	if($type=='textarea') $output='<textarea name="'.$name.'" ';
	else $output='<input class="input1" type="'.$type.'" name="'.$name.'" value="'.str_replace('"','&quot;',$value).'" ';
	if(!empty($label)) $output='<p><span class="rvts8 a_editcaption" style="line-height:16px">'.$label.'</span><p>'.$output;
	if(!empty($style)) $output.='style="'.$style.'" ';
	if(!empty($max_len)) $output.='maxlength="'.$max_len.'" ';
	if(!empty($misc)) $output.=$misc.' ';
	if($type=='textarea') $output.='>'.str_replace('"','&quot;',$value).'</textarea>';
	else $output.=$f_ct;
	if(!empty($frmid))$output.='<span class="rvts12 frmhint" id="'.$frmid.'_'.$name.'"></span>';
	if($btn_id!='') $output='<div class="input_wrap">'.$output.'<a class="ui_shandle_ic3" rel="'.$btn_id.'"></a></div>';
	return $output;
}

function f_format_ca_caption($caption,$p=false)
{
	$result='<span class="rvts8 a_editcaption">'.$caption.'</span>';
	if($p)$result='<p>'.$result.'</p>';
	return $result;
}
function f_format_ca_notice($notice,$p=false)
{
	$result='<span class="rvts8 a_editnotice">'.$notice.'</span>';
	if($p)$result='<p>'.$result.'</p>';
	return $result;
}

function f_build_checkbox($name,$checked,$caption,$class='',$id='')
{
	global $f_ct;
	$output='<input '.($id!=''?'id="'.$id.'" ':'').'class="forminput'.($class!=''?' '.$class:'').'" type="checkbox" name="'.$name.'" value="1" '.($checked=='1'? ' checked="checked" ':'').'style="vertical-align: middle;" '.$f_ct.' <span class="rvts8 a_editcaption">'.$caption.'</span>';
	return $output;
}

function f_build_select($name,&$data,$selected,$style='',$mode='key',$jstring='',$class=' class="input1"')
{
 return f_build_select2($name,$name,$data,$selected,$style,$mode,$jstring,$class);
}

function f_build_select2($name,$id,&$data,$selected,$style='',$mode='key',$jstring='',$class=' class="input1"') 
{
	$r='';
	if(is_array($data) && !empty($data))
	{
		$r='<select'.$class.' '.$jstring.' '.$style.' id="'.$id.'" name="'.$name."\">";
		foreach($data as $k=>$v) 
		{
			$k=($mode=='value'?$v:$k);
			if($mode=='swap'){$tmp=$k;$k=$v;$v=$tmp;}
			$r.='<option value="'.$k.'"';
			if($k==$selected) $r.=' selected="selected"';
			$r.='>'.$v.'</option>';
		}
		$r.='</select>';
	}
	return $r;
}

function f_build_tag_cloud($script_path,$all_records,$max_tags=50,$style='',$ccloud=false,$use_flash=false,$use_alt_urls=false,$min_occs=-1,$alpha_cols=0,$px=true)
{
	$output='';
	$tags_list=array();
	$max_font_size=$px?24:200;
	$min_font_size=$px?13:80;
	$action=$ccloud?'category':'tag';

	if($ccloud)$tags_list=$all_records;
	else
		foreach($all_records as $k=>$v)
		{
			$tags_per_record=explode(',',(urldecode(isset($v['Keywords'])? $v['Keywords']: $v['keywords'])));
			foreach($tags_per_record as $kk=>$tag)
			{
				if($tag!='')
				{
					$tr_tag=f_strtolower(trim($tag));
					if($tr_tag!=='' && array_key_exists($tr_tag, $tags_list)) $tags_list[$tr_tag]=$tags_list[$tr_tag]+1;
					else $tags_list[$tr_tag]=1;
				}
			}
		}
	if($min_occs > 1) {
		foreach($tags_list as $tname => $tcount)
			if($tcount < $min_occs) unset($tags_list[$tname]);
	}
	if(!empty($tags_list))
	{
		if((count($tags_list)>$max_tags))
		{
			arsort($tags_list);
			$tags_count=0; $new_tags_list=array();
			foreach($tags_list as $k=>$v)
			{
				$new_tags_list[$k]=$v;
				$tags_count++;
				if($max_tags<$tags_count)break;
			}
			$tags_list=$new_tags_list;
		}
		$max_freq=max(array_values($tags_list));
		$min_freq=min(array_values($tags_list));
		$diff=$max_freq-$min_freq;
		if(!$px && $diff<3) $diff=3;
		elseif($diff<1) $diff=1;
		ksort($tags_list);

		$step=$diff>0?($max_font_size-$min_font_size)/$diff:1;

		$output='';
		if($alpha_cols>0)  //aplhabetical list
		{
			$tcnt=count($tags_list);
			$tags_a=array();
			foreach($tags_list as $tag=>$cnt)
			{
				$l=mb_substr($tag,0,1,'UTF-8');
				if(!isset($tags[$l])) $tags[$l]=array();
				$tags[$l][$tag]=$cnt;
			}
			$tcnt+=count($tags);
			$colmax=round($tcnt/$alpha_cols);
			$w='position:relative;float:left;width:'.round(100/$alpha_cols).'%;';
			$icnt=0;$ul_open=true;
			$output.='<li class="tcloud_column" style="'.$w.'"><ul>';
			foreach($tags as $l=>$la)
			{
				$icnt++;
				$output.='<li class="alpha tcloud_head"><span>'.$l.'</li>';

				foreach($la as $tag=>$cnt)
				{
					$output.='<li class="alpha tcloud_line"><a href="'.$script_path.($use_alt_urls?'/'.$action.'/':$action.'=').urlencode($tag).($use_alt_urls?'/':"").'" alt="'.stripslashes($tag).'('.$cnt.')">'.stripslashes($tag).'</a> </li>';
					$icnt++;
					if($colmax<=$icnt)
					{
						$icnt=0;
						$output.='</ul></li><li class="tcloud_column" style="'.$w.'"><ul>';
						$ul_open=true;
					}
				}
			}
			$output.='</ul></li>';
		}
		else
			foreach($tags_list as $k=>$v)
			{
				if($k!=='')
				{
					if($px) $size=((($max_font_size-$min_font_size)/$diff)*($v-$min_freq))+$min_font_size;
					else $size=round($min_font_size + (($v - $min_freq) * $step));

					if(!$use_flash)
						$output.='<li><a '.$style.' href="'.$script_path.($use_alt_urls?'/'.$action.'/':$action.'=').urlencode($k).($use_alt_urls?'/':"").'" style="font-size:'.$size.($px?'px':'%').';" alt="'.stripslashes($k).'('.$v.')">'.stripslashes($k).'</a> </li>';
					else
						$output.="<a href='".$script_path.($use_alt_urls?'/'.$action.'/':$action.'=').urlencode($k).($use_alt_urls?'/':"")."' style='font-size:+".(($size/100)*22)."pt'>" .stripslashes($k)."</a>";
				}
			}
	}
	if(!empty($output) && !$use_flash)
		$output='<div class="tcloud_container">
			<ul class="tcloud'.($alpha_cols==0 && $px?' tcloud_px':'').'">'.$output.'</ul>
			</div><div style="clear:left"></div>';
	return $output;
}

function f_build_flash_tag($rel_path, $flash_tags_param, $tags_cloud, $cats='')
{
	global $f_ct,$f_lf;
	$p=$flash_tags_param;
	$movie=$rel_path.'extdocs/tagcloud';
	$w=200; $h=150; $tag_color="0x000000"; $tag_color2="0x808080"; $bg_color="#ffffff"; $wmode=false; $tspeed=100; $distr=true; $mode='tags';
	if(!empty($p))
	{
		if(isset($p[0]) && !empty($p[0])) $w=$p[0];	
		if(isset($p[1]) && !empty($p[1])) $h=$p[1];
		if(isset($p[2]) && !empty($p[2])) $tag_color="0x".$p[2];
		if(isset($p[3]) && !empty($p[3])) $tag_color2="0x".$p[3];
		if(isset($p[4]) && !empty($p[4])) $hi_color="0x".$p[4];
		if(isset($p[5]) && !empty($p[5])) $bg_color="#".$p[5];
		if(isset($p[6]) && !empty($p[6])) $wmode=$p[6];
		if(isset($p[7]) && !empty($p[7])) $tspeed=$p[7];
		if(isset($p[8]) && !empty($p[8])) $distr=$p[8];
		if(isset($p[9]) && !empty($p[9])) $mode=$p[9];
	}	
	$vars='tcolor='.$tag_color;
	if(isset($tag_color2)) $vars.= '&tcolor2='.$tag_color2;
	if(isset($hi_color)) $vars.= '&hicolor='.$hi_color;
	$vars.= '&tspeed='.$tspeed. '&distr='.$distr. '&mode='.$mode;
	if($mode!="cats") $vars.= '&tagcloud='.urlencode('<tags>').urlencode($tags_cloud).urlencode('</tags>');
	if($mode!="tags") $vars.= '&categories='.urlencode($cats);
	$output='<script type="text/javascript">'.$f_lf.'/* <![CDATA[ */'.$f_lf.'swfobject.embedSWF("'.$movie.'.swf","tcloud","'.$w.'","'.$h.'","10.0.0",false,false,{bgcolor:"'.$bg_color.'",wmode:"'.($wmode=='true'?'transparent':'opaque').'",allowScriptAccess:"sameDomain",loop:"false",flashvars:"'.$vars.'"});'.$f_lf.'/* ]]> */'.$f_lf.'</script><div id="tcloud"></div>';
	return $output;
}

function f_tzone_date_now()
{
	$dt=date("Y-m-d_H:i:s",f_tzone_date(time()));
	return $dt;
}

function f_tzone_date($date,$reversed=false)
{
	global $f_tzone_offset,$f_use_mysql,$f_db_charset,$f_ca_settings_fname,$ca_settings,$f_uni;
	
	if($f_tzone_offset==-10000)
	{
		if($f_use_mysql)
		{
			if(empty($ca_settings))
			{
				$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));
				f_db_fetch_ca_settings($db);
			}
			$f_tzone_offset=isset($ca_settings['tzone_offset'])?intval($ca_settings['tzone_offset']):0;
		}
		else $f_tzone_offset=intval(f_read_tagged_data($f_ca_settings_fname,'tzoneoffset'));
	}

	$fixed_date=$date;
	if($f_tzone_offset!=0) 
	{
		if($reversed)$fixed_date=$date-$f_tzone_offset*60*60; 
		else $fixed_date=$date+$f_tzone_offset*60*60;
	}

	return $fixed_date;
}

function f_format_date($timestamp,$params,$month_names,$day_names,$mode,$use_tzone=true) # mode --> short, long
{
	$res='';
	$ts=($use_tzone)?f_tzone_date($timestamp):$timestamp;
	
	if(!empty($params))
	{
		$params=str_replace(array('dddd','ddd','DDDD' ,'DDD' ,'dd','d','mmmm','mmm','MMMM','MMM' ,'mm','m','yyyy','yy','hh','nn','ss'),
												array('XX3' ,'XX4','XX32','XX42','XX5','j','XX2' ,'XX1','XX22','XX12','XX6' ,'n','Y'   ,'y' ,'H' ,'i' ,'s' ),$params);
												
		$res=str_replace('XX5','d',$params);
		$res=str_replace('XX6','m',$res);
		$res=date($res,$ts);
		$res=str_replace('XX12',f_strtoupper(f_my_substr($month_names[date('n',$ts)-1],0,3)),$res);
		$res=str_replace('XX22',f_strtoupper($month_names[date('n',$ts)-1]),$res);
		$res=str_replace('XX42',f_strtoupper(f_my_substr($day_names[date('w',$ts)],0,3)),$res);
		$res=str_replace('XX32',f_strtoupper($day_names[date('w',$ts)]),$res);		
		$res=str_replace('XX1',f_my_substr($month_names[date('n',$ts)-1],0,3),$res);
		$res=str_replace('XX2',$month_names[date('n',$ts)-1],$res);
		$res=str_replace('XX4',f_my_substr($day_names[date('w',$ts)],0,3),$res);
		$res=str_replace('XX3',$day_names[date('w',$ts)],$res);	
	}
	else $res=($mode=='short')?$month_names[date('n', $ts)-1].date(', Y', $ts):$month_names[date('n', $ts)-1].date(' d, Y', $ts);
	return $res;
}

function f_format_time($timestamp,$time_format,$mode='short') # mode --> short, long
{
	$ts=f_tzone_date($timestamp);
	$res=($mode=='short')?($time_format==12? date(' g:i A',$ts): date(' G:i',$ts)):($time_format==12? date(' d, Y g:i A',$ts): date(' d, Y G:i',$ts));
	return $res;
}

function f_check_protection($page_info)  // returns: 1:unprotected, 2:protected, 3:partly protected, false:error
{ 
	if(!is_array($page_info) || !isset($page_info[6])) return false;
	if($page_info[6]=='TRUE') //page is protected
	{
		if(isset($page_info[25]) && $page_info[25] == 'PP') return 3;
		else return 2;
	}
	else return 1;
}

function f_checksourcepage($data,$id,$use_mobile=false,$check_in_normal=false)
{
	global $f_mobile_detected;
	$fname='';
	$used_for_mob_search=isset($_REQUEST['mobile_search'])&&$_REQUEST['mobile_search']==1;
	if(strpos($data[1],'http:')===false && strpos($data[1],'https:')===false)
	{
		if(in_array($data[4],array('136','137','138','143','144','20','147','148','150'))) //Special pages
		{
			$f_dir=(strpos($data[1],'../')===false)?'':'../'.f_GFS($data[1],'../','/').'/';
			$fname=$f_dir.$id.(f_check_protection($data) > 1? '.php': '.html');
		}
		elseif(in_array($data[4],array('181','190','18')))//shop/lister/request
		{
			$f_dir=(strpos($data[1],'../')===false)?'':'../'.f_GFS($data[1],'../','/').'/';
			$fname=$f_dir.($data[4]=='18'? ($id+1):$id).'.html';
		}
		elseif(f_check_protection($data) == 1 && ($data[4]=='0' || $data[4]=='1' || $data[4]>199) /*&& strpos($data[1],'.html')!==false*/) $fname=$data[1];  //normal page
	}
	$check_mobile = f_detect_mobile($data[24])==true;
	if($check_in_normal) $check_mobile = $data[24] != '0'; //check only whether page has mobile or not
	
	if($use_mobile && ($check_mobile || $used_for_mob_search)) 
	{
		if(strpos($fname,'/')===false) $fname='i_'.$fname; 
		else {$temp_name=substr($fname,strrpos($fname,'/')+1); $fname=str_replace($temp_name,'i_'.$temp_name,$fname);}
		$f_mobile_detected=true;
	}
	return $fname;
}

function f_define_source_page($root='../',$lang='',$use_mobile=false)
{
	global $f_sitemap_fname,$f_template_source,$f_max_chars;

	$result='';
	$f_template_source_f=$root.$f_template_source;
	if($use_mobile) $f_template_source_f = strpos($f_template_source_f, '../')!==false?f_str_lreplace('/','/i_',$f_template_source_f):'i_'.$f_template_source_f;
	if(file_exists($f_template_source_f)) $result=$f_template_source_f;
	elseif(file_exists($root.$f_sitemap_fname) && filesize($root.$f_sitemap_fname)>0) 
	{
		if(isset($_REQUEST['id'])) $id=intval($_REQUEST['id']);
		$fp=fopen($root.$f_sitemap_fname,'r');
		if(isset($id)) //getting current page 
		{
			while(($data=fgetcsv($fp,$f_max_chars,'|'))&&($result=='')) { if(isset($data[10]) && ($data[10]=='<id>'.$id)) $result=f_checksourcepage($data,$id,$use_mobile);}
		}
		if($result=='') //getting any page
		{
			fseek($fp,0);
			while(($data=fgetcsv($fp,$f_max_chars,'|'))&&($result=='')) 
			{
				if($lang!='')
				{
					if(isset($data[22]) && ($data[22]==$lang)) $result=f_checksourcepage($data,str_replace('<id>','',$data[10]),$use_mobile);
				}
				else if(isset($data[10])) $result=f_checksourcepage($data,str_replace('<id>','',$data[10]),$use_mobile);
			}
		}
		if($result=='') //getting any page
		{
			fseek($fp,0);
			while(($data=fgetcsv($fp,$f_max_chars,'|'))&&($result=='')) {	if(isset($data[10])) $result=f_checksourcepage($data,str_replace('<id>','',$data[10]),$use_mobile);}
		}
		
//still nothing => no html page in the project => we use 1st php page as template
		if($result=='')
		{
			fseek($fp,0);
			while(($data=fgetcsv($fp,$f_max_chars,'|'))&&($result=='')) 
			{
				if(isset($data[10]))
					if(strpos($data[1],'.php') !== false) //just for sure the page is php
						{$result = $data[1]; break;} 
			}
		}
		fclose($fp);
	}
	return $result;
}

function f_multi_unique($array)
{
	$new=array();$new1=array();

	foreach($array as $k=>$na) $new[$k]=serialize($na);
	$uniq=array_unique($new);
	foreach($uniq as $k=>$ser) $new1[$k]=unserialize($ser);
	return $new1;
}

function f_url()
{
	if(isset($_SERVER['SCRIPT_URI'])) return $_SERVER['SCRIPT_URI'];
	elseif(isset($_SERVER['SCRIPT_NAME'])) return f_get_host().$_SERVER['SCRIPT_NAME'];
	else return f_get_host().$_SERVER['PHP_SELF'];
}

function f_log()
{
	global $f_lf;
	$data=(base64_encode(var_export($_REQUEST,true)));
	$pref=(file_exists('sitemap.php'))?'':'../';
	$log_file=$pref.'ezg_data/log_ezg.php';
	if(file_exists($log_file))
	{
		$handle=@fopen($log_file,'a+b');
		$fsize=filesize($log_file);
		flock($handle,LOCK_EX);	
		$url=f_url();
		$new_record=date("H:i:s j-n-Y").'|'.$data.'||'.$url.$f_lf;
		fwrite($handle,$new_record);
		flock($handle,LOCK_UN);fclose($handle);
	}
}

function f_obj_div_replacing($object, $replace_in)
{
	$replace_in=str_replace("<p>$object</p>", "<div>$object</div>", $replace_in);
	$replace_in=str_replace('<p class="rvps1">'.$object.'</p>','<div class="rvps1">'.$object.'</div>', $replace_in);
	$replace_in=str_replace('<p class="rvps2">'.$object.'</p>','<div class="rvps2">'.$object.'</div>', $replace_in);
	return $replace_in;
}

function f_obj_clearing($object, $replace_in)
{
	$replace_in=str_replace("%".$object."(</p>","%".$object."(", $replace_in);
	$replace_in=str_replace("%".$object."(</span>","%".$object."(", $replace_in);
	$replace_in=str_replace("<span>)%",")%", $replace_in);
	$replace_in=str_replace('<p class="rvps1">)%',")%", $replace_in);
	$replace_in=str_replace('<p class="rvps2">)%',")%", $replace_in);
	return $replace_in;
}

function f_p_tag_clearing($replace_in)
{
	$pos_p=strpos($replace_in,'<p');
	$pos_cp=strpos($replace_in,'</p>');
	if((($pos_cp!==false) && ($pos_p!==false) && ($pos_cp<$pos_p)) || (($pos_cp!==false) && ($pos_p===false)))
	{
		$temp1=substr($replace_in,0,$pos_cp);
		$temp2=substr($replace_in,$pos_cp+4);
		$replace_in=$temp1.$temp2;
	}
	return $replace_in;
}

function f_fix_innova_paths($content,$script_name,$full_script_path,$rel_path)
{
	$full_script_path2=str_replace("/".$script_name, '', $full_script_path);
	$abs_url=($rel_path==''? $full_script_path2: substr($full_script_path2,0,strrpos($full_script_path2,'/'))).'/innovaeditor/assets/';
	$content=str_replace('="../innovaeditor/assets/','="innovaeditor/assets/',$content);
	$content=str_replace('src="innovaeditor/assets/','src="'.$abs_url,$content);
	$content=str_replace('href="innovaeditor/assets/','href="'.$abs_url,$content);
	return $content;
}

function f_data_sorting($records,$by_field='Id',$flag='desc',$prior_field=-1) // sorting info by date
{
	if(!empty($records))
	{
		foreach($records as $key=>$row) {
			$ids[$key]=$row[$by_field];
			if($prior_field>0) $priors[$key]=$row[$prior_field];
		}
		if($prior_field>0)
		{
			if($flag=='desc') array_multisort($priors,SORT_DESC,SORT_NUMERIC,$ids,SORT_DESC,SORT_NUMERIC,$records);
			else array_multisort($priors,SORT_DESC,SORT_NUMERIC,$ids,SORT_ASC,SORT_NUMERIC,$records);
		}
		else
		{
			if($flag=='desc') array_multisort($ids,SORT_DESC,SORT_NUMERIC,$records);
			else array_multisort($ids,SORT_ASC,SORT_NUMERIC,$records);
		}
	}
	return $records;
}
function f_get_category_info($category_name,$category_color,$category_id,$search_category,$flag)
{
	settype($search_category,"integer");
	if(in_array($search_category,$category_id))
	{
		$buf=array_search($search_category,$category_id);
		$cat_res=($flag=='name')? f_un_esc($category_name[$buf]): $category_color[$buf];
	}
	else { $cat_res=($flag=='name')? f_un_esc($category_name[array_search(1,$category_id)]): $category_color[array_search(1,$category_id)]; }
	return $cat_res;
}

function f_ip_locator($ip) 
{ return '<a class="rvts12" style="text-decoration:none;" href="http://en.utrace.de/?query='.$ip.'" target="_blank">'.$ip.'</a>'; }

$f_countries_list = array('AF'=>'Afghanistan'
,'AL'=>'Albania'
,'DZ'=>'Algeria'
,'AS'=>'America Samoa'
,'AD'=>'Andorra'
,'AO'=>'Angola'
,'AI'=>'Anguila'
,'AQ'=>'Antartica'
,'AG'=>'Antigua And Barbuda'
,'AR'=>'Argentina'
,'AM'=>'Armenia'
,'AW'=>'Aruba'
,'AU'=>'Australia'
,'AT'=>'Austria'
,'AZ'=>'Azerbaijan'
,'BS'=>'Bahamas, The'
,'BH'=>'Bahrain'
,'BD'=>'Bangladesh'
,'BB'=>'Barbados'
,'BY'=>'Belarus'
,'BE'=>'Belgium'
,'BZ'=>'Belize'
,'BJ'=>'Benin'
,'BM'=>'Bermuda'
,'BT'=>'Bhutan'
,'BO'=>'Bolivia'
,'BA'=>'Bosnia and Herzegovina'
,'BW'=>'Botswana'
,'BV'=>'Bouvet Island'
,'BR'=>'Brazil'
,'IO'=>'British Indian Ocean Territory'
,'BN'=>'Brunei'
,'BG'=>'Bulgaria'
,'BF'=>'Burkina Faso'
,'BI'=>'Burundi'
,'KH'=>'Cambodia'
,'CM'=>'Cameroon'
,'CA'=>'Canada'
,'CV'=>'Cape Verde'
,'KY'=>'Cayman Islands'
,'CF'=>'Central African Republic'
,'TD'=>'Chad'
,'CL'=>'Chile'
,'CN'=>'China'
,'CX'=>'Christmas Island'
,'CC'=>'Cocos (Keeling) Islands'
,'CO'=>'Colombia'
,'KM'=>'Comoros'
,'CG'=>'Congo'
,'CD'=>'Congo, Democractic Republic of the '
,'CK'=>'Cook Islands'
,'CR'=>'Costa Rica'
,'CI'=>'Cote DIvoire (Ivory Coast)'
,'HR'=>'Croatia (Hrvatska)'
,'CU'=>'Cuba'
,'CY'=>'Cyprus'
,'CZ'=>'Czech Republic'
,'DK'=>'Denmark'
,'DJ'=>'Djibouti'
,'DM'=>'Dominica'
,'DO'=>'Dominican Republic'
,'EC'=>'Ecuador'
,'EG'=>'Egypt'
,'SV'=>'El Salvador'
,'GQ'=>'Equatorial Guinea'
,'ER'=>'Eritrea'
,'EE'=>'Estonia'
,'ET'=>'Ethiopia'
,'FK'=>'Falkland Islands (Islas Malvinas)'
,'FO'=>'Faroe Islands'
,'FJ'=>'Fiji Islands'
,'FI'=>'Finland'
,'FR'=>'France'
,'GF'=>'French Guiana'
,'PF'=>'French Polynesia'
,'TF'=>'French Southern Territories'
,'GA'=>'Gabon'
,'GM'=>'Gambia, The'
,'GE'=>'Georgia'
,'DE'=>'Germany'
,'GH'=>'Ghana'
,'GI'=>'Gibraltar'
,'GR'=>'Greece'
,'GL'=>'Greenland'
,'GD'=>'Grenada'
,'GP'=>'Guadeloupe'
,'GU'=>'Guam'
,'GT'=>'Guatemala'
,'GN'=>'Guinea'
,'GW'=>'Guinea-Bissau'
,'GY'=>'Guyana'
,'HT'=>'Haiti'
,'HM'=>'Heard and McDonald Islands'
,'HN'=>'Honduras'
,'HK'=>'Hong Kong S.A.R.'
,'HU'=>'Hungary'
,'IS'=>'Iceland'
,'IN'=>'India'
,'ID'=>'Indonesia'
,'IR'=>'Iran'
,'IQ'=>'Iraq'
,'IE'=>'Ireland'
,'IL'=>'Israel'
,'IT'=>'Italy'
,'JM'=>'Jamaica'
,'JP'=>'Japan'
,'JO'=>'Jordan'
,'KZ'=>'Kazakhstan'
,'KE'=>'Kenya'
,'KI'=>'Kiribati'
,'KR'=>'Korea'
,'KP'=>'Korea, North'
,'KW'=>'Kuwait'
,'KG'=>'Kyrgyzstan'
,'LA'=>'Laos'
,'LV'=>'Latvia'
,'LB'=>'Lebanon'
,'LS'=>'Lesotho'
,'LR'=>'Liberia'
,'LY'=>'Libya'
,'LI'=>'Liechtenstein'
,'LU'=>'Luxembourg'
,'MO'=>'Macau S.A.R.'
,'MK'=>'Macedonia'
,'MG'=>'Madagascar'
,'MW'=>'Malawi'
,'MY'=>'Malaysia'
,'MV'=>'Maldives'
,'ML'=>'Mali'
,'MT'=>'Malta'
,'MH'=>'Marshall Islands'
,'MR'=>'Mauritania'
,'MU'=>'Mauritius'
,'YT'=>'Mayotte'
,'MX'=>'Mexico'
,'FM'=>'Micronesia'
,'MD'=>'Moldova'
,'MC'=>'Monaco'
,'MN'=>'Mongolia'
,'MS'=>'Montserrat'
,'MA'=>'Morocco'
,'MZ'=>'Mozambique'
,'MM'=>'Myanmar'
,'NA'=>'Namibia'
,'NR'=>'Nauru'
,'NP'=>'Nepal'
,'AN'=>'Netherlands Antilles'
,'NL'=>'Netherlands, The'
,'NC'=>'New Caledonia'
,'NZ'=>'New Zealand'
,'NI'=>'Nicaragua'
,'NE'=>'Niger'
,'NG'=>'Nigeria'
,'NU'=>'Niue'
,'NF'=>'Norfolk Island'
,'MP'=>'Northern Mariana Islands'
,'NO'=>'Norway'
,'OM'=>'Oman'
,'PK'=>'Pakistan'
,'PW'=>'Palau'
,'PA'=>'Panama'
,'PG'=>'Papua new Guinea'
,'PE'=>'Peru'
,'PH'=>'Philippines'
,'PN'=>'Pitcairn Island'
,'PL'=>'Poland'
,'PT'=>'Portugal'
,'PR'=>'Puerto Rico'
,'QA'=>'Qatar'
,'RE'=>'Reunion'
,'RO'=>'Romania'
,'RU'=>'Russia'
,'RW'=>'Rwanda'
,'SH'=>'Saint Helena'
,'KN'=>'Saint Kitts And Nevis'
,'LC'=>'Saint Lucia'
,'PM'=>'Saint Pierre and Miquelon'
,'VC'=>'Saint Vincent And The Grenadines'
,'WS'=>'Samoa'
,'SM'=>'San Marino'
,'ST'=>'Sao Tome and Principe'
,'SA'=>'Saudi Arabia'
,'RS'=>'Serbia'
,'SN'=>'Senegal'
,'SC'=>'Seychelles'
,'SL'=>'Sierra Leone'
,'SG'=>'Singapore'
,'SK'=>'Slovakia'
,'SI'=>'Slovenia'
,'SB'=>'Solomon Islands'
,'SO'=>'Somalia'
,'ZA'=>'South Africa'
,'GS'=>'South Georgia'
,'ES'=>'Spain'
,'LK'=>'Sri Lanka'
,'SD'=>'Sudan'
,'SR'=>'Suriname'
,'SJ'=>'Svalbard And Jan Mayen Islands'
,'SZ'=>'Swaziland'
,'SE'=>'Sweden'
,'CH'=>'Switzerland'
,'SY'=>'Syria'
,'TW'=>'Taiwan'
,'TJ'=>'Tajikistan'
,'TZ'=>'Tanzania'
,'TH'=>'Thailand'
,'TG'=>'Togo'
,'TK'=>'Tokelau'
,'TO'=>'Tonga'
,'TT'=>'Trinidad And Tobago'
,'TN'=>'Tunisia'
,'TR'=>'Turkey'
,'TM'=>'Turkmenistan'
,'TC'=>'Turks And Caicos Islands'
,'TV'=>'Tuvalu'
,'UG'=>'Uganda'
,'UA'=>'Ukraine'
,'AE'=>'United Arab Emirates'
,'UK'=>'United Kingdom'
,'US'=>'United States'
,'UM'=>'United States Minor Outlying Islands'
,'UY'=>'Uruguay'
,'UZ'=>'Uzbekistan'
,'VU'=>'Vanuatu'
,'VA'=>'Vatican City State (Holy See)'
,'VE'=>'Venezuela'
,'VN'=>'Vietnam'
,'VG'=>'Virgin Islands (British)'
,'VI'=>'Virgin Islands (US)'
,'WF'=>'Wallis And Futuna Islands'
,'YE'=>'Yemen'
,'ZM'=>'Zambia'
,'ZW'=>'Zimbabwe');

$AccChars=array("á","à","â","ã","à","Á","À","Â","Ã","À","ç","Ç","ð","é","è","ê","É","È","Ê","í","ì","î","Í","Ì","Î","ó","ò","ô","Ó","Ò","Ô","‘","Š","ú","ù","û","Ú","Ù","Û","ý","Ý","ž","Ž","ä","Ä","ë","Ë","ï","Ï","ö","Ö","ü","Ü","ÿ","Ÿ","å","Å","ø","Ø","æ","Æ","œ","Œ","ß");
$NormChars=array("a","a","a","a","a","A","A","A","A","A","c","C","d","e","e","e","E","E","E","i","i","i","I","I","I","o","o","o","O","O","O","s","S","u","u","u","U","U","U","y","Y","z","Z","a","A","e","E","i","I","o","O","u","U","y","Y","aa","Aa","oe","Oe","ae","AE","oe","OE","ss");

function f_microtime_float()
{
	list($usec,$sec)=explode(" ",microtime());
	return ((float)$usec+(float)$sec);
}

function f_update_eventcount($db,$p_id)
{
	global $f_use_mysql,$f_uni,$f_db_charset;
	
	if($db==null)	$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));
	$que='SELECT eventcount FROM '.$db->pre.'counter_pageloads WHERE page_id = '.$p_id;
	$eventcount=$db->query_singlevalue($que,true);
	if($eventcount===false) 
	{
		f_db_counter_check($db);
		$db->query('ALTER TABLE '.$db->pre.'counter_pageloads ADD eventcount bigint(20) unsigned NOT NULL');
		$eventcount=$db->query_singlevalue($que,true);
	}
	if(is_null($eventcount)) $db->query_insert('counter_pageloads',array("page_id"=>$p_id,"total"=>1,"eventcount"=>1));
	else $db->query('UPDATE '.$db->pre.'counter_pageloads SET eventcount=eventcount + 1 WHERE page_id = '.$p_id);
}

function f_sendMailStat($db,$p_id,$send_to,$from,$content_html,$content_text,$subject,$page_charset,$att_content='',$att_file='',$att_filetype='',$send_to_author='',$author_data=array(),$send_to_bcc='')//14 params
{
	global $f_db_charset,$f_uni;
	
	$result=f_sendMail($send_to,$from,$content_html,$content_text,$subject,$page_charset,$att_content,$att_file,$att_filetype,$send_to_author,$author_data,$send_to_bcc);
	if($db==null)	$db=f_db($f_db_charset,($f_uni?$f_db_charset:''));
	$data=array();
	$data['page_id']=$p_id;
	$rec='';
	if(is_array($send_to)) foreach($send_to as $k=>$v) $rec.=$v.' ';
	else $rec=$send_to;
	$data['send_to']=$rec;
	$data['bcc']=$send_to_bcc;
	$data['msgfrom']=$from;
	$data['message_html']=$content_html;
	$data['message_text']=$content_text;
	$data['subject']=$subject;
	$data['success']=$result;
	$att='';
	if(is_array($att_content)){foreach($att_content as $k=>$v) $att.=$att_file[$k].' ';}
	else $att=$att_file;
	$data['attachments']=$att;
	$data['ip']=f_getIP();
	
	$fa=$db->get_tables('ca_email_data');
	if(!empty($fa)) 
	{ 
		$field_names=$db->db_fieldnames('ca_email_data');
		if(!in_array('ip',$field_names)) $db->query('ALTER TABLE '.$db->pre."ca_email_data ADD ip varchar (255) NOT NULL default ''");
		$db->query_insert('ca_email_data',$data);	
	}

	return $result; 
}

function f_resolvemail($m,$def='')
{
	$ma=array();
	$name=$def;
	if((strpos($m,'<')!== false)){$address=f_GFS($m,'<','>');$name=stripslashes(f_GFS($m,'"','"'));}
	else $address=$m;
	$ma[]=$address;
	$ma[]=$name;
	return $ma;
}

function f_sendMail($to,$from,$content_html,$content_text,$subject,$page_charset,$att_content='',$att_file='',$att_filetype='',$send_to_author='',$author_data=array(),$send_to_bcc='')
{
	global $f_mail_type,$f_return_path,$f_sendmail_from,$f_use_linefeed,$f_SMTP_HOST,$f_SMTP_PORT,$f_SMTP_HELLO,$f_SMTP_AUTH,
	$f_SMTP_AUTH_USR, $f_SMTP_AUTH_PWD,$f_SMTP_SECURE,$f_admin_nickname;
	
	include_once('mail5.php');
	
	$sendto=(is_array($to))?implode(";",$to):$to; 
	if($subject=='') $subject = 'Auro-reply from '.f_get_host();
	$result=m_sendMail($sendto,$from,stripslashes($content_html),stripslashes($content_text),stripslashes($subject),$page_charset,$att_content,$att_file,$att_filetype,$send_to_author,$author_data,$send_to_bcc,$f_mail_type,$f_return_path,$f_sendmail_from,$f_use_linefeed,$f_SMTP_HOST,$f_SMTP_PORT,$f_SMTP_HELLO,$f_SMTP_AUTH,$f_SMTP_AUTH_USR, $f_SMTP_AUTH_PWD,$f_admin_nickname,$f_SMTP_SECURE);
	return $result;
}

function f_send_mail_ca($content_html,$content_text,$subject,$send_to='',$bcc='')
{
	global $ca_settings,$ca_lang_l,$f_sendmail_from,$f_site_charsets_a,$f_use_mysql;
	if($f_use_mysql) global $db;
	
	$res=false;
	if(!$f_use_mysql)
	{
		$settings=f_GFS($ca_settings,'<registration>','</registration>');
		$admin_email=(strpos($settings,'<admin_email>')!==false)?f_GFS($settings,'<admin_email>','</admin_email>'):'';
	}
	else $admin_email=$ca_settings['sr_admin_email'];
 	
	$from=($f_sendmail_from=='')?$admin_email:$f_sendmail_from;
	if($from=='')$from='admin@'.f_get_host();
	$to=array(($send_to=='')?$admin_email:$send_to);

	if($to=='') return '<div align="left"><h1>Admin e-mail address not defined!</h1><h2>To solve the problem, go to Online Administration >> Registration Settings and define Admin Email!</h2>';

	if(in_array('UTF-8',$f_site_charsets_a)) $page_charset='UTF-8';
	else $page_charset=(isset($_GET['charset'])?f_strip_tags($_GET['charset']):$f_site_charsets_a[0]);
	if($bcc!='')
	{
		if($f_use_mysql) $res=f_sendMailStat($db,0,$to,$from,$content_html,$content_text,$subject,$page_charset,'','','','',array(),$bcc);
		else $res=f_sendMail($to,$from,$content_html,$content_text,$subject,$page_charset,'','','','',array(),$bcc);
	}
	else
	{
		if($f_use_mysql) $res=f_sendMailStat($db,0,$to,$from,$content_html,$content_text,$subject,$page_charset);
		else $res=f_sendMail($to,$from,$content_html,$content_text,$subject,$page_charset);
	}
	return $res;
}


function f_build_calendar($mon,$year,$first_day_ofweek,$events_by_day,$url,$month_names,$day_names,$styles,$utf_fl=false,$suf='?')
{
	$css_day1=$styles['day1']; $css_day2=$styles['day2']; $css_day3=$styles['day3'];
	$css_currday=$styles['currday']; $css_calh1=$styles['calh1']; $css_calh2=$styles['calh2'];
	$css_calurl=$styles['calurl']; $cal_cspacing=$styles['cal_cspacing']; 

	$days_in_curr_mon=f_days_in_month($mon,$year);
	$fdaymonth_ts=mktime(0,0,0,$mon,1,$year);
	$ldaymonth_ts=mktime(23,59,59,$mon,$days_in_curr_mon,$year);
	$month=$month_names[$mon-1];
	$firstday_str=date('l',mktime(0,0,0,$mon,1,$year));
// 'First day of week' check
	if($first_day_ofweek==1) $firstday=date('w',mktime(0,0,0,$mon,1,$year));
	else
	{
		$day=date('w',mktime(0,0,0,$mon,1,$year));
		$firstday=($day==0? 6: $day-1);
		$temp=$day_names[0];
		$day_names_rev=$day_names;
		array_shift($day_names_rev);
		array_push($day_names_rev, $temp);
	}
	settype($firstday,'integer');
	$cal_pointer=$firstday;
	$row_counter=0;

	$nav_prev=f_cal_navigation($mon,$year,'prev',$url.$suf);
	$nav_next=f_cal_navigation($mon,$year,'next',$url.$suf);

	$html='<table cellpadding="0" cellspacing="0"><tr><td><div class="cal_bg">'
		.'<table class="calendar" cellspacing="'.$cal_cspacing.'">'
		.'<tr><td colspan="8" '.f_bl_cl($css_calh1,'').'><div style="position:relative;height:16px;width:100%;">';

	// internal <> 
	$html.='<div style="width:100%;text-align:center;">'.f_my_substr($month,0,3,$utf_fl).' '.$year.'</div>'
		.'<div style="position:absolute;top:0px;left:0;">'.$nav_prev.'</div>'
		.'<div style="position:absolute;top:0px;right:0px">'.$nav_next.'</div>'
		.'</div></td></tr><tr>';

//weekday names
	foreach(($first_day_ofweek==1?$day_names:$day_names_rev) as $k=>$v) {$html.="<td ".f_bl_cl($css_calh2,'').">".f_my_substr($v,0,1,$utf_fl)."</td>";}
	$html.='</tr><tr>';
//last days from previous month	
	if($firstday!=0 || ($mon==2 && $days_in_curr_mon==28))
	{
		$days_prev_mon=($mon==1)?f_days_in_month(12,$year):f_days_in_month(($mon-1),$year);
		if($firstday!=0)
		{
			$t=$days_prev_mon-$firstday+1;
			for($i=0; $i<$firstday; $i++){$html.="<td ".f_bl_cl($css_day3).">".$t."</td>";$t++;}
		}
		else
		{
			$t=$days_prev_mon-6;
			for($i=0; $i<7; $i++){$html.="<td ".f_bl_cl($css_day3).">".$t."</td>";$t++;} $html.='</tr>';
		}
	}
//  displaying days from selected month
	for($i=1;$i<=$days_in_curr_mon;$i++)
	{
		if($cal_pointer>6)
		{
			$cal_pointer=0;
			$html.='</tr><tr>';
			$row_counter++;
		}
		if(array_key_exists(($i), $events_by_day))
		{
			$html.="<td ".(f_is_current_day($i,$mon,$year)? f_bl_cl($css_currday): f_bl_cl($css_day2))
				.'><a style="position:relative;z-index:1;"'.(f_is_current_day($i,$mon,$year)? f_bl_cl($css_currday): f_bl_cl($css_calurl))
				.' href="'.$url.$suf.'mon='.$mon.'&amp;year='.$year.'&amp;day='.$i.'">'.$i."</a></td>";		
		}
		else $html.="<td ".(f_is_current_day($i,$mon,$year)? f_bl_cl($css_currday): f_bl_cl($css_day1)).">".$i.'</td>';
		$cal_pointer++;
	} 
//  displaying first days from next month
	$next_month_days=1;
	while($cal_pointer<=6)
	{
		$html.="<td ".f_bl_cl($css_day3).">".$next_month_days."</td>"; 
		$next_month_days++; $cal_pointer++;	
	}
	$html.="</tr>";
	$row_counter++;
	if($row_counter<6)
	{
		$html.="<tr>";
		$cal_pointer=0;
		while($cal_pointer<=6)
		{
			$html.="<td ".f_bl_cl($css_day3).">".$next_month_days."</td>"; 
			$next_month_days++; $cal_pointer++;	
		}
		$html.="</tr>";
	}
	$html.='</table></div></td></tr></table>';
	return $html;
}

function f_is_current_day($day,$mon,$year) //  current day check
{
	$current_date=getdate(f_tzone_date(time()));
	$currday=$current_date['mday'];
	$currmon=$current_date['mon'];
	$curryear=$current_date['year'];
	if($day==$currday && $mon==$currmon && $year==$curryear) return true;
	else return false;
}

function f_bl_cl($class,$more_class='') { return ' class="'.$class.($more_class!=''? ' '.$more_class:'').'"'; }

function f_cal_navigation($mon,$year,$type,$url)  // calendar < > navigation
{
	$output='';
	$prev_mon=$mon-1; $prev_year=$year;	$next_mon=$mon+1; $next_year=$year;

	if($mon==1 && $year>1950) { $prev_mon=12; $prev_year=$year-1; }
	elseif($mon==1 && $year<=1950) { $prev_mon=1; $prev_year=1950; }
	elseif($mon==12 && $year<2050) { $next_mon=1; $next_year=$year+1; }
	elseif($mon==12 && $year>=2050) { $next_mon=12; $next_year=2050; }

	$mode_param_prev='&amp;mode=month'; $mode_param_next='&amp;mode=month';
	
	$output.='<span style="background:transparent;width:12px;cursor:pointer;" onclick="document.location=\''.$url;
	if($type=='prev') $output.="mon=".$prev_mon."&amp;year=".$prev_year;
	else $output.="mon=".$next_mon."&amp;year=".$next_year;
	$output.='\';">'.($type=='prev'?'&lt;':'&gt;').'</span>';
	return $output;
}

function f_define_posts_per_day($mon,$year,$all_posts,$date_field_name)  // define posts for each day in a month
{
	$posts_per_day[]=array();
	$mktime=f_tzone_date(time());
	$t=time();
	$today_ts=mktime(0,0,0,date("n",$t),date("j",$t),date("Y",$t));
	for($i=1; $i<=f_days_in_month($mon,$year); $i++) 
	{
		$st_i_ts=mktime(0,0,0,$mon,$i,$year);
		$end_i_ts=mktime(23,59,59,$mon,$i,$year);	
		foreach($all_posts as $k=>$v) 
		{
			if($v[$date_field_name]>=$st_i_ts && $v[$date_field_name]<=$end_i_ts) {$posts_per_day[$i]=true; break;}
		}
	}
	return $posts_per_day;
}

function f_download_file($path, $new_filename='')
{
	define('F_STREAM_BUFFER',4096);
	define('F_STREAM_TIMEOUT',86400);
	define('F_USE_OB',false);

	$filesize=filesize($path); 
	$filename=basename($path);
	if(empty($new_filename)) $new_filename=$filename;

	$file=@fopen($path,'r') or die("can't open file");
	$sm=ini_get('safe_mode');
	if(!$sm && function_exists('set_time_limit') && strpos(ini_get('disable_functions'),'set_time_limit')===false)
		set_time_limit(F_STREAM_TIMEOUT);

	$partialContent=false;
	if(isset($_SERVER['HTTP_RANGE'])) 
	{
		$rangeHeader=explode('-',substr($_SERVER['HTTP_RANGE'],strlen('bytes=')));	
		if($rangeHeader[0]>0){$posStart=intval($rangeHeader[0]);$partialContent=true;}
		else $posStart=0;
		if($rangeHeader[1]>0){$posEnd=intval($rangeHeader[1]);$partialContent=true;}
		else $posEnd=$filesize-1;
	}
	else {$posStart=0;$posEnd=$filesize-1;}
/****** HEADERS ******/
	$ext=end(explode(".",strtolower($new_filename)));
	$mime=f_getmime($ext);
	header("Content-type: ".$mime);
	header('Content-Disposition: attachment; filename="'.$new_filename.'"');
	header("Content-Length: ".($posEnd - $posStart + 1));
	header('Date: '.gmdate('D, d M Y H:i:s \G\M\T',time()));
	header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T',filemtime($path)));
	header('Accept-Ranges: bytes');
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header("Expires: ".gmdate("D, d M Y H:i:s \G\M\T", mktime(date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y"))));
	if($partialContent) 
	{
		header("HTTP/1.0 206 Partial Content");
		header("Status: 206 Partial Content");
		header("Content-Range: bytes ".$posStart."-".$posEnd."/".$filesize);
	}
	if($sm) fpassthru($file);
	else
	{
		fseek($file,$posStart);
		if(F_USE_OB) ob_start();
		while (($posStart + F_STREAM_BUFFER < $posEnd) && (connection_status()==0))
		{
			echo fread($file,F_STREAM_BUFFER);
			if(F_USE_OB) ob_flush();
			flush();
			$posStart+=F_STREAM_BUFFER;
		}
		if(connection_status()==0) echo fread($file,$posEnd-$posStart + 1);
		if(F_USE_OB) ob_end_flush();
	}
	fclose($file);
}
//search reindex
function f_get_page_content($fname,$include_earea=false)
{
	if(!file_exists($fname)) return ''; //no file found, no page content
	$content=f_read_file($fname);
	$content=f_get_page_area($content,$include_earea);
	return $content;
}
function f_get_page_area($content,$include_earea=false,$exclude_body_tag=false)
{
	if(strpos($content,'<!--page-->')!==false)	
	{
		$earea_buff='';
		if($include_earea)
		{
			while(strpos($content,'<!--%areap')!==false)
			{
				$earea_st=f_GFSAbi($content,'<!--%areap','%-->');
				$earea=f_GFS($content,$earea_st,'<!--areaend-->');
				$earea_buff.=$earea.' ';
				$content=str_replace($earea_st.$earea.'<!--areaend-->','',$content);
			}
		}
		$content=f_GFS($content,'<!--page-->','<!--/page-->');
		$content=$earea_buff.$content;
	}
	else
	{
		$content=str_replace(array('<BODY','</BODY'),array('<body','</body'),$content);
		$pattern=f_GFSAbi($content,'<body','</body>');	
		$body_start_tag=substr($pattern,0,strpos($pattern,'>')+1);
		if($exclude_body_tag) $content=f_GFS($content, $body_start_tag, '</body>');
		else $content=f_GFSAbi($content, $body_start_tag, '</body>');
	}
	if(!$include_earea)
	{
		while(strpos($content,'<!--%areap')!==false)
			$content=str_replace(f_GFSAbi($content,'<!--%areap','<!--areaend-->'),'',$content);
	}
	return $content;
}
function f_filter_alt($html)
{
	$html=preg_replace('/<img[^>]*alt="([^"]*)"[^>]*>/i',"$1",$html); 
	return $html;
}
function f_floatlogin($src)
{
	$temp=f_GFS($src,'<!--login-->','<!--/login-->');
	$float_login=strpos($temp,'class="frm_login"')!==false;
	return $float_login;
}
function f_clear_html($html)
{
	global $f_temp_erea_counter;

	if($html=='') return '';
	$html=str_replace(f_GFSAbi($html,'<div id="bkc"','</div>'),'',$html); 
	$html=str_replace(f_GFSAbi($html,'<div id="bkf"','</div>'),'',$html); 
	$html=f_filter_alt($html); 
	$search_main=array("'<\?php.*?\?>'si","'<script[^>]*?>.*?</script>'si","'<!--footer-->.*?<!--/footer-->'si", "'<!--search-->.*?<!--/search-->'si", "'<!--counter-->.*?<!--/counter-->'si","'<!--mmenu-->.*?<!--/mmenu-->'si","'<!--smenu-->.*?<!--/smenu-->'si","'<!--ssmenu-->.*?<!--/ssmenu-->'si","'<!--rand-->.*?<!--/rand-->'si","'<!--login-->.*?<!--/login-->'si");
	$result=preg_replace($search_main,array("","","","","","","","","",""),$html);

	if(!isset($f_temp_erea_counter)) $f_temp_erea_counter=1;
	if(strpos($result,'<div style="display:none" class="area1_x">')!==false) $result=preg_replace("'<!--%areap.*?<!--areaend-->'si","",$result);
	elseif($f_temp_erea_counter>1) $result=preg_replace("'<!--%areap.*?<!--areaend-->'si","",$result);
	$f_temp_erea_counter++;

	$search_more=array ("'<img.*?>'si","'<a .*?>'si","'<embed.*?</embed>'si","'<object.*?</object>'si","'<select[^>]*?>.*?</select>'si", "'<[/!]*?[^<>]*?>'si","'\n'","'\r\n'","'&(quot|#34);'i","'&(amp|#38);'i","'&(lt|#60);'i","'&(gt|#62);'i","'&(nbsp|#160);'i","'&(iexcl|#161);'i", "'&(cent|#162);'i","'&(pound|#163);'i","'&(copy|#169);'i","'&#(d+);'e","'%%USER.*?%%'si","'%%HIDDEN.*?HIDDEN%%'si","'%%DLINE.*?DLINE%%'si", "'%%KEYW.*?%%'si");
	$replace_more=array (" "," "," "," "," "," "," "," ","\"","&","<",">"," ",chr(161),chr(162),chr(163),chr(169),"chr(\1)","","","","");
	$result=preg_replace($search_more,$replace_more,$result);
	$result=str_replace('%%TEMPLATE1%%','',$result);
	return f_esc($result);
}
function f_clear_macros($content, $id, $fields=array())
{
	if($id=='136')	//calendar
		$result=preg_replace(array("'%CALENDAR_OBJECT\(.*?\)%'si","'%CALENDAR_EVENTS\(.*?\)%'si","'%CALENDAR_.*?%'si"),array('','',''),$content);	
	elseif($id=='137')	//blog
		$result=preg_replace(array ("'%BLOG_OBJECT\(.*?\)%'si","'%BLOG_ARCHIVE\(.*?\)%'si","'%BLOG_RECENT_COMMENTS\(.*?\)%'si","'%BLOG_RECENT_ENTRIES\(.*?\)%'si","'%BLOG_CATEGORY_FILTER\(.*?\)%'si", "'%BLOG_.*?%'si"),array ('','','','','',''),$content);					
	elseif($id=='138')  //photoblog
		$result=preg_replace(array("'%BLOG_OBJECT\(.*?\)%'si","'%BLOG_EXIF_INFO\(.*?\)%'si","'%ARCHIVE_.*?%'si","'%BLOG_.*?%'si", "'%PERIOD_.*?%'si", "'%CATEGORY_.*?%'si","%GALLERY_LINK%","%CALENDAR%","'%BLOG_RECENT_COMMENTS\(.*?\)%'si","'%BLOG_RECENT_ENTRIES\(.*?\)%'si"), array ('','','','','','','','','',''),$content);
	elseif($id=='143') //podcast  
		$result=preg_replace(array ("'%PODCAST_OBJECT\(.*?\)%'si","'%PODCAST_ARCHIVE\(.*?\)%'si","'%PODCAST_RECENT_COMMENTS\(.*?\)%'si","'%PODCAST_RECENT_EPISODES\(.*?\)%'si","'%PODCAST_CATEGORY_FILTER\(.*?\)%'si","'%PODCAST_OBJECT\(.*?\)%'si","'%PODCAST_.*?%'si"),array('','','','','','',''),$content);			
	elseif($id=='144')  //guestbook
	{
		$content=preg_replace(array("'%GUESTBOOK_OBJECT\(.*?\)%'si","'%GUESTBOOK_ARCHIVE\(.*?\)%'si","'%GUESTBOOK_ARCHIVE_VER\(.*?\)%'si", "'%GUESTBOOK_.*?%'si"),array('','','',''),$content);
		$result=str_replace(array('%HOME_LINK%','%HOME_URL%'),array('',''),$content);
	}
	elseif(in_array($id,array('181','192','191','190')))  //lister 
	{
		$a=array_fill(0,17,'');
		$content=preg_replace(array ("'%HASH\(.*?\)%'si","'%ITEMS\(.*?\)%'si","'%SCALE\(.*?\)%'si","'%SHOP_ITEM_DOWNLOAD_LINK\(.*?\)%'si","'%SHOP_CATEGORYCOMBO\(.*?\)%'si","'%SHOP_PREVIOUS\(.*?\)%'si","'%SHOP_NEXT\(.*?\)%'si","'%LISTER_CATEGORYCOMBO\(.*?\)%'si","'%LISTER_PREVIOUS\(.*?\)%'si","'%LISTER_NEXT\(.*?\)%'si","'<!--menu_java-->.*?<!--/menu_java-->'si","'<!--scripts2-->.*?<!--endscripts-->'si","'<!--<pagelink>/.*?</pagelink>-->'si","'<LISTER_BODY>.*?</LISTER_BODY>'si", "'<LISTERSEARCH>.*?</LISTERSEARCH>'si","'<SHOP_BODY>.*?</SHOP_BODY>'si", "'<SHOPSEARCH>.*?</SHOPSEARCH>'si","'%SHOP_.*?%'si","'%LISTER_.*?%'si","'%SLIDESHOWCAPTION_.*?%'si"),$a,$content); 
		$content=str_replace(array ('%ERRORS%','%IDEAL_VALID%','%QUANTITY%','%LINETOTAL%','%LINETOTAL%','%URL=Detailpage%','%CATEGORY_COUNT%','%SEARCHSTRING%','%SUBCATEGORIES%','%NAVIGATION% '),'',$content);
		
		$a=array_fill(0,40,'');
		$result=str_replace(array ('<ITEM_VARS>','</ITEM_VARS>','<ITEM_VARS_LINE>','</ITEM_VARS_LINE>','<ITEM_HASHVARS>','</ITEM_HASHVARS>','<SHOP_DELETE_BUTTON>','</SHOP_DELETE_BUTTON>','<MINI_CART>','</MINI_CART>','<SHOP_BUY_BUTTON>','</SHOP_BUY_BUTTON>','<QUANTITY>','<RANDOM>','</RANDOM>','<SHOP>','</SHOP>','<LISTER>','</LISTER>','<ITEM_INDEX>','<ITEM_ID>','<ITEM_QUANTITY>','<ITEM_AMOUNT>','<ITEM_AMOUNT_IDEAL>','<ITEM_VAT>','<ITEM_SHIPPING>','<ITEM_CODE>','<ITEM_SUBNAME>','<ITEM_SUBNAME1>','<ITEM_SUBNAME2>','<ITEM_NAME>','<ITEM_CATEGORY>','<ITEM_VARS>','</ITEM_VARS>','<SHOP_URL>','<BANKWIRE>','</BANKWIRE>','<CATEGORY_HEADER>','</CATEGORY_HEADER>','<FROMCART>'),$a,$content);		
	}
	else $result=$content;
	if(!empty($fields)) {foreach($fields as $k=>$v) $result=str_replace('%'.$v.'%','',$result);}

	$result=str_replace(array('%LINK_TO_ADMIN%','%TAGS_CLOUD%','%FLASH_TAGS_CLOUD%'),array('','',''),$result);
	return $result;
}	

function f_addtohistory($page_id,$table_id,$entry_id,$user_id,$data)
{
	global $f_db_history_table,$db;
	
	$dump=var_export($data,true);
	$data=array();
	$data['page_id']=$page_id;
	$data['table_id']=$table_id;
	$data['entry_id']=$entry_id;
	$data['user_id']=$user_id;
	$data['dump']=$dump;
	$data['creation_date']=f_build_mysql_time();
	if(!$db->query_insert($f_db_history_table,$data,true)) 
	{
		include_once('data.php');	
		create_historydb($db,$f_db_history_table);
		$db->query_insert($f_db_history_table,$data);	
	}
}
function f_gethistorypath($root)
{
	return ($root?'':'../').'innovaeditor/assets/admin/history/';
}
function f_gethistoryfilepath($root,$page_id,$entry_id)
{
	return f_gethistorypath($root).$page_id.'_'.$entry_id; 
}
function f_addtohistory_flat($root,$page_id,$entry_id,$user_id,$data)
{
	global $f_lf;
	
	$history_path=f_gethistorypath($root);
	$history_filepath=f_gethistoryfilepath($root,$page_id,$entry_id);
	
	$go=true;
	if(!is_dir($history_path)) if(!@mkdir($history_path,0700)) $go=false;
	
	if($go)
	{
		$date=f_build_mysql_time();
		$dump=var_export($data,true);
		$file_contents='<entry date="'.$date.'" user="'.$user_id.'">'.$data.'</entry>'.$f_lf;
		
		$fp=fopen($history_filepath,'a+');
		if($fp)
		{
			fwrite($fp,$file_contents);
			fclose($fp);
		}
	}
}
function f_db_search_check($db)
{
	global $f_db_search_table,$f_db_charset,$f_db_priority_table;

	$tb_s=$db->get_tables('site_search_');
	if(count($tb_s)!==SEARCH_TABLES_CNT)
	{
		include_once('data.php');	
		create_searchdb($db,$f_db_search_table,$f_db_priority_table,$f_db_charset);
	}
}
function f_cat_search_box_html($action,$lang_l,$cat_id='') //backward comp
{
	$js='';
	$c=f_cat_search_box($action,$lang_l,$cat_id='',$js);
	return $c.'<script type="text/javascript">'.$js.'</script>';
} 
function f_cat_search_box($action,$lang_l,$cat_id='',&$js)
{
	global $f_ct,$f_br,$lg_amp,$obj_pre,$f_js_st,$lg_l,$f_js_end,$f_btn_class;
	
	$output='<div id="category_search_ct" style="display:inline;position:relative;padding:0 0 12px 2px;">';
	$output.='<form name="category_search" action="'.$action.'" method="post" onsubmit="return document.category_search.q.value!=\'\'">';
	$js.='$(document).ready(function(){ $(".cat_chb").click(function(){$(".allcat_chb").attr("checked",false);});$(".allcat_chb").click(function(){$(".cat_chb").attr("checked",false);});'.
	'$("#search_edit").focus(function() {$("#scb").fadeIn("fast");}).click(function() {$("#scb").fadeIn("fast");});$("#category_search_ct").mouseleave(function(){$("#scb").fadeOut("fast");});});';
	$output.=' <input class="input1" id="search_edit" type="text" name="q" autocomplete="off" value="" '.$f_ct.
		' <input class="'.$f_btn_class.'" id="search_btn" type="submit" name="search" value="'.$lang_l['search'].'" '.$f_ct;
	$output.='<div class="input1" id="scb" style="display:none;text-align:left;position:absolute;z-index:100;min-width:180px;top:23px;left:2px;padding:4px;box-shadow:0 0 4px #606060;background:white;">%CAT_SEARCH%</div></form></div>';
	return $output;
}
function f_db_search_reindex($db,$where,$p_lang,$p_id,$p_title,$p_date,$p_content,$p_url_param='',$entry_id='',$cat_id='',$user_id='')
{
	global $f_db_search_table;

	$data=array();
	$data['page_lang']=$p_lang;
	$data['page_id']=$p_id;
	$data['page_title']=$p_title;
	$data['page_url_params']=$p_url_param;
	$data['page_content']=$p_content;	
	$data['modified_date']=$p_date;	
	$data['entry_id']=$entry_id;
	$data['cat_id']=$cat_id;
	if($user_id!='')$data['user_id']=$user_id;

	$exist_rec=$db->query_first('SELECT * FROM '.$db->pre.$f_db_search_table.' WHERE '.$where);
	if(!empty($exist_rec)) $db->query_update($f_db_search_table,$data,$where);
	else $db->query_insert($f_db_search_table,$data);
}
function f_db_search_reindex_del($db,$where)
{
	global $f_db_search_table;
	$db->query('DELETE FROM '.$db->pre.$f_db_search_table.' WHERE '.$where); 
}
function f_db_fetch_ca_settings($db)
{
	global $ca_settings;

	if(empty($ca_settings))
	{
		$records=$db->fetch_all_array('SELECT * FROM '.$db->pre.'ca_settings',1);  
		if($records!==false) 
		{
			if(!empty($records)) 
				foreach($records as $k=>$v) $ca_settings[$v['skey']]=$v['sval'];
		}
		if(!isset($ca_settings['sr_disable_captcha'])) $ca_settings['sr_disable_captcha']='0';
		if(!isset($ca_settings['sr_cals_block'])) $ca_settings['sr_cals_block']='1';
		if(!isset($ca_settings['sr_users_seecounter'])) $ca_settings['sr_users_seecounter']='0';
		if(!isset($ca_settings['sr_users_see_all'])) $ca_settings['sr_users_see_all']='0';
		if(!isset($ca_settings['login_redirect_option'])) $ca_settings['login_redirect_option']='admin';
		if(!isset($ca_settings['auto_login_redirect_time'])) $ca_settings['auto_login_redirect_time']='5';
		if(!isset($ca_settings['auto_login_redirect_loc'])) $ca_settings['auto_login_redirect_loc']='';
		if(!isset($ca_settings['auto_login'])) $ca_settings['auto_login']=0;

	}
}
function f_db_get_ca_setting($db,$key)
{
	global $ca_settings;

	if(empty($ca_settings)) f_db_fetch_ca_settings($db);
	$result=isset($ca_settings[$key])?$ca_settings[$key]:'';
	return $result;
}

function f_db_blockedips($db)
{
	$records=$db->fetch_all_array('SELECT ip FROM '.$db->pre.'blocked_ips');
	$res=array();
	foreach($records as $k=>$v)$res[]=$v['ip'];
	return $res;
}
function f_db_is_ip_blocked($db,$ip)
{
	$ip=$db->escape($ip);
	$records=$db->fetch_all_array('SELECT id FROM '.$db->pre.'blocked_ips WHERE ip = \''.$ip.'\'');
	if(empty($records)) return false;
	else return true;
}

function f_db_counter_check($db)
{
	global $f_max_chars,$f_db_charset,$f_uni;
	$c_tb=$db->get_tables('counter_');
	if(empty($c_tb) || count($c_tb)==1)
	{
		include_once('data.php');
		create_counterdb($db,$f_max_chars,$f_db_charset,$f_uni,true);
	}
	elseif(count($c_tb)==3)
	{
		include_once('data.php');
		create_counterdb($db,$f_max_chars,$f_db_charset,$f_uni,false);	
	}
	elseif(count($db->db_fieldnames('counter_details')) < COUNTER_DETAILS_FIELD_CNT)
	{
		include_once('data.php');
		create_counterdb($db,$f_max_chars,$f_db_charset,$f_uni,false,true);		
	}
}
function f_handle_search_session_hit($db,$sd='',$sdID=-1)
{
	f_int_start_session(); //sess not started when ajax call to counter
  if($sdID > 0) //search performed, get search log id
  {
  	$ref=isset($sd['referrer'])?$sd['referrer']:'NA';
    if(strpos($ref,'q=')!==false)
        f_set_session_var('last_search_id', $sdID);
  }
  else
  { //normal page, check if search has been performed before that
		$serv_ref = $_SERVER['HTTP_REFERER'];
    if(strpos($serv_ref,'q=')===false && strpos($serv_ref,'documents/search.php')!==false)
    {
      $lsid = f_get_session_var('last_search_id');
      $parsed_lsid = intval($_REQUEST['lsid']);
      $hit_link=isset($_REQUEST['url'])?$_REQUEST['url']:'';
      if($lsid!==NULL && $lsid == $parsed_lsid)
      {
        $db->query_update('counter_details',array('hit'=>1,'hit_link'=>$hit_link),'id = '.$lsid);
        f_unset_session_var('last_search_id');
      }
    }
  }
}


function f_get_user_name($user_id,$rel_path='../')
{
	global $f_admin_nickname;
	if($user_id==-1) return $f_admin_nickname!=''?$f_admin_nickname:"admin";
	else
	{
		$user_data=f_get_user($user_id,$rel_path,'',$user_id);
		return (!empty($user_data)? $user_data['username']: '');
	}
}

function f_get_user_id($username,$rel_path='../')
{
	$user_data=f_get_user($username,$rel_path);
	return (!empty($user_data)? $user_data['uid']: 0);
}

function f_is_recaptcha_posted()
{
	return (isset($_POST['recaptcha_challenge_field']) && isset($_POST['recaptcha_response_field']));
}
function f_captcha_valid($inputName='captchacode')
{
	global $f_cap_id, $f_reCaptcha;
	$ccheck=isset($_POST['cc']) && $_POST['cc']=='1'; //needed to know if it's check or post (not sure why it was outside before)
	//and also it's still outside for compatibility.
	if($f_reCaptcha)  //we have reCaptcha here? 
	{
		require_once('recaptchalib.php');
		$privatekey = '6Ld8cskSAAAAAOCdGESm17P58trbl2PI-O5-BIry';
		$re_chall = isset($_POST['recaptcha_challenge_field'])?$_POST['recaptcha_challenge_field']:'';
		$re_resp = isset($_POST['recaptcha_response_field'])?$_POST['recaptcha_response_field']:'';
		$resp = recaptcha_check_answer($privatekey,$_SERVER['REMOTE_ADDR'],$re_chall,$re_resp);
		if($ccheck)    //pre-check, if valid - set session
		{
			if($resp->is_valid) f_set_session_var($f_cap_id,md5('verified')); //indicator for the actual check
			return ($resp->is_valid);
		}
		else
		{//actual check 
			if(f_session_isset($f_cap_id) && f_get_session_var_str($f_cap_id)==md5('verified'))
			{ //looks like it was already validated in the pre-check.
				f_unset_session_var($f_cap_id);   //we don't neet this anymore
				return true;
			}
			else	return $resp->is_valid;  //no pre check (blog comment post, etc) just return the check
		}
	}
	else
	{
		$captcha=f_get_session_var($f_cap_id);
		if($captcha=='' || $captcha==NULL) $check_failed=true;//exit('0|This is illegal operation.');
		else $check_failed=(!isset($_POST[$inputName])||(md5(strtoupper($_POST[$inputName]))!=$captcha));
		return !$check_failed;
	}
}

function f_get_tag_attribute($string,$tag,$attr,$has_closing=false)
{
	$pattern = '/<'.$tag.' (.*?)'.$attr.'=((\'(.*?)\')|("(.*?)"))(.*?)'.($has_closing?'>(.*?)</'.$tag.'>':'(\/)?>').'/i';	
	preg_match_all($pattern,$string,$tagAttrs,PREG_PATTERN_ORDER);
	$ret = array();
	foreach($tagAttrs[1] as $pos=>$tag)
	{
		if($tagAttrs[4][$pos] != '') $ret[]=$tagAttrs[4][$pos];
		elseif($tagAttrs[6][$pos] != '') $ret[]=$tagAttrs[6][$pos];	
	}

	return $ret;  
	
}
function f_check_img_src($imgScr)
{
	$imgExtsAllowed = array('JPG','JPEG','PNG','GIF');
	$imgFile=substr($imgScr,strrpos($imgScr, '/')+1);
	$imgExt = substr($imgFile,strpos($imgFile,'.')+1);
	return !(strpos($imgExt,'.')!==false || !in_array(f_strtoupper($imgExt),$imgExtsAllowed));	
}

function f_validate_comments_form($name_field,$content_field,$email_field,$forbid_urls,$email_enabled,$require_email,$lang_uc,
	$blocked_ip=false,$must_be_logged=false,$used_in_blog_comments=false,$content_field_required=true)
{
	global $thispage_id,$f_cap_id;
	
	$ccheck=isset($_POST['cc']) && $_POST['cc']=='1';
	
	$errors=array();
	$content=$_POST[$content_field];
	$name=(!is_array($name_field)?$_POST[$name_field]:'');
	$code_not_allowed=$used_in_blog_comments ? false : (strlen($content)!==(strlen(strip_tags($content))));
	$invalid_img_url=false;
	if($used_in_blog_comments)
	{
		$imgSources = f_get_tag_attribute($content,'img','src',false);
		foreach($imgSources as $imgScr)	
		{
			$relImgScr=f_get_rel_path_between_urls($imgScr,f_cur_page_url());
			$content = str_replace($imgScr,$relImgScr,$content);
			if(!f_check_img_src($imgScr)) $invalid_img_url = true;
		} 	
	}
	else $content=strip_tags($content); 
	$name=strip_tags($name);

	$mail=(isset($_POST[$email_field]))?f_strip_tags($_POST[$email_field]):'';

	f_int_start_session('private');
	
	$is_logged =f_adminCookie() || f_userCookie();
	$logged=($must_be_logged && $is_logged);
	if($must_be_logged && !$logged) 
	{
		$errors[]='er_error|'.$lang_uc['login on comments'];
		return $errors;
	}

	$ct_dec=html_entity_decode($content);
	$content_invalid=($forbid_urls && ((strpos($ct_dec,'http')!==false)||(strpos($ct_dec,'href')!==false)||(strpos($ct_dec,'www.')!==false)));	
	$mail_valid=(!$is_logged && $email_enabled && $require_email && !f_validate_email($mail))?false:true;
	
	if($name=='')
	{
		if(is_array($name_field)) 
		{ 
			foreach($name_field as $k=>$v) 
			{
				if($_POST[$v]=='' || $v=='country' && $_POST[$v]=='Select') $errors[]=($ccheck?$v.'|':'').$lang_uc['Required Field'];
			} 
		}
		else $errors[]=($ccheck?$name_field.'|':'').$lang_uc['Required Field'];
	}
	if($content_field_required && $content=='') $errors[]=($ccheck?$content_field.'|':'').$lang_uc['Required Field'];
	elseif($code_not_allowed) $errors[]=($ccheck?'er_error|':'')."Not allowed to include HTML or other code!";
	elseif($content_invalid) $errors[]=($ccheck?'er_error|':'')."Not allowed to include url!";
	
	if($invalid_img_url) $errors[]=($ccheck?'er_error|':'')."Img src provided is not allowed !";
	
	if(!$mail_valid) $errors[]=($ccheck?$email_field.'|'.$lang_uc['Email not valid']:$lang_uc['Email not valid']);
	
	$captcha_invalid=(!isset($thispage_id) && f_is_able_build_img())?!f_captcha_valid('code'):false;	
	if($captcha_invalid && (f_adminCookie() || f_userCookie())) $captcha_invalid = false;	
	if($captcha_invalid) $errors[]=($ccheck?'code|':'').$lang_uc['Captcha Message'];
	if($blocked_ip) $errors[]=($ccheck?'er_error|':'').$lang_uc['your IP is blocked'];	
	elseif(!empty($errors)) $errors[]=($ccheck?'er_error|':'').$lang_uc['validation failed'];

	return $errors;
}
function f_parse_comment($str,$full_access,$loggedUser,$canUseUrl=false)
{
	global $f_comments_allowed_tags;

	$htmlTags = ($full_access ? implode('',$f_comments_allowed_tags['html_admin']) : '').implode('',$f_comments_allowed_tags['html']);
	if($loggedUser) $htmlTags .= implode('',$f_comments_allowed_tags['extra']);
	$result = strip_tags($str,$htmlTags);
	$result = f_clean_inside_html_tags($result,implode('',$f_comments_allowed_tags['html']));
	if($loggedUser) $result = f_parse_tags_with_attributes($result,$f_comments_allowed_tags['extra']);
	if($canUseUrl) f_parse_content_x($result);

	return $result;
}
function f_parse_content_x(&$str)
{
  if(isset($_POST['content_x']) && $_POST['content_x'] != '')
    $str .= $_POST['content_x'];
}

//Clean the inside of the tags
function f_clean_inside_html_tags($str,$tags)
{
  preg_match_all('/<([^>]+)>/i',$tags,$allTags,PREG_PATTERN_ORDER);
  foreach ($allTags[1] as $tag){ 
      $str=preg_replace('/<'.$tag.' [^>]*>/i','<'.$tag.'>',$str);
  }

  return $str;
}
function f_parse_tags_with_attributes($str,$allowed_tags)
{
	$allCTags=array();
	$allNTags=array();
	preg_match_all('/<([^>]+)>(.*?)<\/([^>]+)>/i',$str,$allCTags,PREG_PATTERN_ORDER);
	preg_match_all('/<([^>]+)>/i',$str,$allNTags,PREG_PATTERN_ORDER);
	foreach($allCTags[1] as $pos=>$tagInfo)
	{
		$tag = strtoupper($allCTags[3][$pos]);
	 	if(in_array('<'.$tag.'>',$allowed_tags))
		{
		  if($tag == 'A')
		  {
		  	$url = $allCTags[2][$pos];
		  	if(strpos($tagInfo, '=') !== false) $url = f_get_tag_attribute($tagInfo,'a','href');
		  	$str = str_replace($allCTags[0][$pos], '<a href="'.$url.'">'.$allCTags[2][$pos].'</a>', $str);
			}
		}
	}

	foreach($allNTags[0] as $pos=>$tagInfo)
		if(strpos($tagInfo,'<img')!==false)
		{
			$imgScrs = f_get_tag_attribute($tagInfo,'img','src');
			if(!empty($imgScrs))
			{
	      $imgSrc=f_get_rel_path_between_urls($imgScrs[0],f_cur_page_url());
				$str = str_replace($tagInfo,'<img class="img_comment_maxw" src="'.$imgSrc.'" />', $str);
			}
		} 			
		elseif(strpos($tagInfo,'<span')!==false)
		{
			$spanStyles = f_get_tag_attribute($tagInfo,'span','style');
			if(!empty($spanStyles))
				$str = str_replace($tagInfo,'<span style="'.$spanStyles[0].'" />', $str);
		}
		elseif(strpos($tagInfo,'<div')!==false)
		{
			$divStyles = f_get_tag_attribute($tagInfo,'span','style');
			if(!empty($divStyles))
				$str = str_replace($tagInfo,'<span style="'.$divStyles[0].'" />', $str);
		}
	return $str;
}

function f_build_comments_hint_div($lang_l,$admin=false)
{
	global $f_comments_allowed_tags,$f_ct;
	$hint = '';
	$htmlTags = array_merge($f_comments_allowed_tags['html'],$f_comments_allowed_tags['extra']);
	if($admin) $htmlTags = array_unique(array_merge($htmlTags,$f_comments_allowed_tags['html_admin']));

	foreach($htmlTags as $tag)
	{
		if($tag=='<a>')
			$hint.= '<span class="comment_tag_lbl rvts12" title="'.htmlspecialchars('<a href="http://some.url"></a>').'">'.htmlspecialchars($tag).'</span>&nbsp;';
		elseif($tag=='<img>')
			$hint.= '<span class="comment_tag_lbl rvts12" title="'.htmlspecialchars('<img src="http://some.url" '.$f_ct).'">'.htmlspecialchars($tag).'</span>&nbsp;';
		else
			$hint.= '<span class="comment_tag_lbl rvts12" title="'.htmlspecialchars($tag.str_replace('<', '</', $tag)).'">'.htmlspecialchars($tag).'</span>&nbsp;';
	}

	return '<div class="rvts8 allowed_tags">'.$lang_l['comments tags allowed'].$hint.'</div>';
}
//end of comments functions

function f_get_lang_cookie()
{
	$lang='';
	f_int_start_session('private'); 
	if(f_userCookie()) $logged_user=f_getUserCookie();
	elseif(f_adminCookie()) $logged_admin=f_getAdminCookie();
	if(isset($logged_user) && isset($_COOKIE[$logged_user.'_lang'])) $lang=f_strtoupper(f_strip_tags($_COOKIE[$logged_user.'_lang']));
	elseif(isset($logged_admin) && isset($_COOKIE['ca_lang'])) $lang=f_strtoupper(f_strip_tags($_COOKIE['ca_lang']));
	return $lang;
}
function f_gd_save_image($image_p,$new_fname,$quality,$img_type)
{
	if($img_type==1)
	{
		if(function_exists("imagegif"))		imagegif($image_p,$new_fname);
		elseif(function_exists("imagejpeg")) imagejpeg($image_p,$new_fname,$quality);
		else imagepng($image_p,$new_fname);
	}
	elseif($img_type==3) {imagepng($image_p,$new_fname);}
	else
	{
		if(function_exists("imagejpeg"))	imagejpeg($image_p,$new_fname,$quality);
		elseif(function_exists("imagegif"))	imagegif($image_p,$new_fname);
		else imagepng($image_p,$new_fname);
	}
}
function f_gd_image_create($img_type,$fname)
{
	if($img_type==1)
	{
		if(function_exists("imagecreatefromgif"))		$image=imagecreatefromgif($fname);
		elseif(function_exists("imagecreatefromjpeg")) $image=imagecreatefromjpeg($fname);
		else $image=imagecreatefrompng($fname);
	}
	elseif($img_type==3) $image=imagecreatefrompng($fname);
	else
	{
		if(function_exists("imagecreatefromjpeg"))	$image=imagecreatefromjpeg($fname);
		elseif(function_exists("imagecreatefromgif"))	$image=imagecreatefromgif($fname);
		else $image=imagecreatefrompng($fname);
	}
	return $image;
}
function f_gd_rotate_image($fname,$quality,$rotate_angle)
{
	if(ini_get('memory_limit')<50) ini_set('memory_limit','50M');
	$gdv=f_gdVersion();$gdv_above_2=($gdv>=2?true:false);

	list($orig_width,$orig_height,$img_type,$img_attr)=@getimagesize($fname);
	if($rotate_angle>0 && function_exists("imagerotate")) 
	{ 	
		$image_r=f_gd_image_create($img_type,$fname);	
		if($image_r!='')
		{
			$image_r_new=imagerotate($image_r,intval($rotate_angle),0);
			f_gd_save_image($image_r_new,$fname,$quality,$img_type);
		}
	}
}

function f_gdVersion($user_ver=0) // check GD version
{
	if(!extension_loaded('gd')) {return;}
	static $gd_ver=0;

	if($user_ver==1) {$gd_ver=1; return 1;} // Just accept the specified setting if it's 1.
	if($user_ver!=2 && $gd_ver>0 ) {return $gd_ver;} // Use the static variable if function was called previously.

	if(function_exists('gd_info'))  // Use the gd_info() function if possible.
	{
		$ver_info=gd_info(); preg_match('/\d/',$ver_info['GD Version'],$match);
		$gd_ver=$match[0];
		return $match[0];
	}	
	if(preg_match('/phpinfo/', ini_get('disable_functions')))  // If phpinfo() is disabled use a specified / fail-safe choice...
	{
		if($user_ver==2) {$gd_ver=2;  return 2;} else {$gd_ver=1;  return 1;}
	}
	// ...otherwise use phpinfo().
	ob_start();
	phpinfo(8);
	$info=ob_get_contents();
	ob_end_clean();
	$info=stristr($info,'gd version');
	preg_match('/\d/',$info,$match);
	$gd_ver=$match[0];
	return $match[0];
} 
//flags: thumb, image, rescalethumb, rescaleimage
//thumb_scale could be 1=default or 2=crop
function f_scale_image($fname,$max_image_size=600,$flag='image',$quality=100,$max_image_side=600,$max_thumb_size=300,$max_thumb_height=120,$thumb_scale=1)  // scale image/thumbnail 
{
	global $max_thumb_size,$max_thumb_height,$thumb_scale;
	
	if(ini_get('memory_limit')<100) ini_set('memory_limit','100M'); // fix for serevrs with low memory limit 
	$gdv=f_gdVersion();$gdv_above_2=$gdv>=2;

	if($flag=='rescaleimage')
	{
		$full_fname=substr($fname, 0, strrpos($fname, "."))."_full".substr($fname, strrpos($fname, "."));
		if(file_exists($full_fname)) list($orig_width,$orig_height,$img_type,$img_attr)=@getimagesize($full_fname);
		else list($orig_width,$orig_height,$img_type,$img_attr)=@getimagesize($fname);
	}
	else list($orig_width,$orig_height,$img_type,$img_attr)=@getimagesize($fname);
	
	$thumb=$flag=='thumb' || $flag=='rescalethumb';
	$max_size_param=$thumb?$max_thumb_size:$max_image_size;	
	if($orig_width>$max_size_param || $orig_height>$max_size_param)
	{ 	
		if($flag=='image')
		{
			$new_fname=$fname;
			$fname=substr($fname, 0, strrpos($fname, "."))."_full".substr($fname, strrpos($fname, "."));
			rename($new_fname,$fname);
		}
		elseif($flag=='rescaleimage')
		{
			$final_name=$fname;
			$new_fname=substr($fname,0,strrpos($fname,"."))."_tempimg".substr($fname,strrpos($fname,"."));
			if(file_exists($full_fname)) {copy($full_fname,$fname);}
		}
		elseif($flag=='rescalethumb')
		{	
			$final_name=substr($fname,0,strrpos($fname,"."))."_thumb".substr($fname,strrpos($fname,"."));
			$new_fname=substr($fname,0,strrpos($fname,"."))."_thumb_tempimg".substr($fname,strrpos($fname,"."));
		}
		else {$new_fname=substr($fname,0,strrpos($fname,"."))."_thumb".substr($fname,strrpos($fname,"."));}
			
		$ratio=$orig_width/$orig_height;
		
		if($thumb_scale==2) $scaling='crop';
		else $scaling='default';
//scaling_mode
		if(!$thumb || $scaling=='default') //old scaling
		{
			if($orig_width>=$orig_height) 
			{
				$new_width=$max_size_param; 
				$new_height=intval($max_size_param/$ratio);
			}
			else 
			{
				$new_width=intval($max_size_param*$ratio);
				$new_height=$max_size_param;
			}
		}
		else
		{	
			if($orig_width>=$orig_height) 
			{
				$new_height=$max_thumb_height; 
				$new_width=intval($new_height*$ratio);
			}
			else
			{
				$new_width=$max_size_param; 
				$new_height=intval($new_width/$ratio);
			}
		}
// Resample 	
		if($gdv_above_2) $image_p=@imagecreatetruecolor($new_width,$new_height);
		else $image_p=@imagecreate($new_width,$new_height);
		
		$image=f_gd_image_create($img_type,$fname);
//transparency
		if($img_type==1 || $img_type==3) 
		{
			$trnprt_indx=imagecolortransparent($image);
			if($trnprt_indx>=0)
			{
				$trnprt_color=imagecolorsforindex($image,$trnprt_indx);
				$trnprt_indx=imagecolorallocate($image_p,$trnprt_color['red'],$trnprt_color['green'],$trnprt_color['blue']);
				imagefill($image_p,0,0,$trnprt_indx);
				imagecolortransparent($image_p,$trnprt_indx);
			}
			elseif ($img_type==3) 
			{
				imagealphablending($image_p, false);
				$color=imagecolorallocatealpha($image_p,0,0,0,127);
				imagefill($image_p,0,0,$color);
				imagesavealpha($image_p,true);
			}
		}
//end transparency
		if($image!='')
		{
			if($gdv_above_2) imagecopyresampled($image_p,$image,0,0,0,0,$new_width,$new_height,$orig_width,$orig_height);
			else imagecopyresized($image_p,$image,0,0,0,0,$new_width,$new_height,$orig_width,$orig_height);

			f_gd_save_image($image_p,$new_fname,$quality,$img_type); // Save image 
			imagedestroy($image_p);imagedestroy($image);
			if($flag=='rescalethumb' || $flag=='rescaleimage') {unlink($final_name); rename($new_fname,$final_name);}
			return $new_fname;
		}
		else return false;
	}
	elseif($flag=='image')
	{
		$full_fname=substr($fname, 0, strrpos($fname, "."))."_full".substr($fname, strrpos($fname, "."));
		copy($fname,$full_fname);
		return $fname;
	}
	else return $fname;
}
function f_build_og_meta($page_src,$tags,$fb_api_id='')
{
	global $f_ct,$f_lf,$f_xhtml_on,$f_metamark;

	$macro=strpos($page_src,$f_metamark)!==false?$f_metamark:'<!--scripts-->';
	$meta='';
	//if($f_xhtml_on)
	{
		if($fb_api_id!='') $meta.='<meta property="fb:app_id" content="'.$fb_api_id.'"'.$f_ct.$f_lf;
		foreach($tags as $k=>$v) $meta.='<meta property="og:'.$k.'" content="'.$v.'"'.$f_ct.$f_lf;
		if($meta!='') $page_src=str_replace($macro,$macro.$f_lf.$meta,$page_src);
	}

	$html=f_GFSabi($page_src,'<html','>');
	if(strpos($html,'xmlns:og')==false)
		$page_src=str_replace($html,str_replace('>',' xmlns:og="http://opengraphprotocol.org/schema/">',$html),$page_src);

	return $page_src;
}
function f_build_yt_img($yt_url)
{
	if(strpos($yt_url,'embed/')!==false) $id=f_GFS($yt_url,'embed/','');
	elseif(strpos($yt_url,'watch?v=')!==false && strpos($yt_url,'&')===false) $id=substr($yt_url,strpos($yt_url,'?v=')+3);
	elseif(strpos($yt_url,'watch?v=')!==false) $id=f_GFS($yt_url,'?v=','&');
	elseif(strpos($yt_url,'?')!==false) $id=f_GFS($yt_url,'/v/','?');
	elseif(strpos($yt_url,'&')!==false) $id=f_GFS($yt_url,'/v/','&');
	else $id=substr($yt_url,strpos($yt_url,'/v/')+3);
	return 'http://img.youtube.com/vi/'.$id.'/0.jpg';//return 'http://i1.ytimg.com/vi/'.$id.'/default.jpg';
}
function f_include_meta_archives($page_src,$archive_entries)
{
	global $f_ct,$f_lf,$f_metamark;

	$meta='';
	foreach($archive_entries as $k=>$v)	$meta.='<link rel="archives" title="'.$v['title'].'" href="'.$v['href'].'"'.$f_ct.$f_lf;
	$page_src=str_replace($f_metamark,$f_metamark.$f_lf.$meta,$page_src);
	return $page_src;	
}

function f_strposReverse($str,$search,$pos)
{
	$str=strrev($str);
	$search=strrev($search);
	$pos=(strlen($str)-1)-$pos;
	$posRev=strpos($str,$search,$pos);
	return (strlen($str)-1)-$posRev-(strlen($search)-1);
}
function f_keyArray($ar,$key)
{
	$res=array();
	foreach($ar as $k=>$v) $res[$v[$key]]=$v;
	return $res;
}

function f_parse_inputdate($fname,$time_format,$month_name)
{
	if(isset($_POST[$fname]))
	{
		$postFname=trim($_POST[$fname]);
		$gethm=isset($_POST[$fname.'_hour']);
		$postFnameHour=$gethm?trim($_POST[$fname.'_hour']):'0';
		$postFnameMin=$gethm?trim($_POST[$fname.'_min']):'0';
		$postFnameAmPm=($gethm && $time_format==12 && isset($_POST[$fname.'_ampm']))?trim($_POST[$fname.'_ampm']):'';
		list($tt,$yy)=explode(',',$postFname);
		list($mm,$dd)=explode(' ',$tt);
		$m=array_search($mm,$month_name);
		$start_hour=intval($time_format==12?($postFnameAmPm=='AM'?$postFnameHour:($postFnameHour+12)):($postFnameHour));
		$date=mktime($start_hour,intval($postFnameMin),0,($m+1),intval($dd),intval($yy));	
		$date=f_tzone_date($date,true);
	}
	else $date=f_tzone_date(time());
	return $date;
}

function f_build_mysql_time($ts='',$from_ico=false)
{
	if($from_ico) return str_replace(array('T','+00:00'), array(' ',''), $ts); 
	elseif($ts!='') return date('Y-m-d H:i:s',$ts);
	else return date('Y-m-d H:i:s');
}

function f_buildDateInput($id,$date,$month_names_ar,$xtrajs='')
{
	global $f_ct;

	$dateValue=f_date_dp($month_names_ar,$date);
	$cd='<input class="input1 '.$id.'" name="'.$id.'" type="text" readonly="readonly" value="'.$dateValue.'"'.$xtrajs.$f_ct; 
	return $cd;
}

function f_buildDateTimeInput($id,$date,$time_format,$month_names_ar,$xtrajs='',$iid=true)
{
	global $f_ct,$f_min_sec;
	$tf=intval($time_format);

	if($tf==12)
	{
		$hours_array=array('0','1','2','3','4','5','6','7','8','9','10','11','12');
		$ampm_array=array('AM','PM');
		$ampm=date('A',$date);
	}
	else $hours_array=array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23');	

	$dateValue=f_date_dp($month_names_ar,$date);
	$hour=date(($tf==12?'g':'G'),$date);
	$min=date('i',$date);

	$cd='<input class="input1 '.$id.'" '.($iid?'id="'.$id.'"':'').' name="'.$id.'" type="text" readonly="readonly" value="'.$dateValue.'"'.$xtrajs.$f_ct 
		.'@'.f_build_select($id.'_hour',$hours_array,$hour,'','value').'<span class="rvts8">:</span>'
		.f_build_select($id.'_min',$f_min_sec,$min,'','value');

	if($tf==12) $cd.=f_build_select($id.'_ampm',$ampm_array,$ampm,'','value');

	return $cd;
}

function f_getIP() 
{
	if(isset($_SERVER["HTTP_CLIENT_IP"])) return $_SERVER["HTTP_CLIENT_IP"];
	if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) return $_SERVER["HTTP_X_FORWARDED_FOR"];
	if(isset($_SERVER["HTTP_X_FORWARDED"])) return $_SERVER["HTTP_X_FORWARDED"];
	if(isset($_SERVER["HTTP_FORWARDED_FOR"])) return $_SERVER["HTTP_FORWARDED_FOR"];  
	if(isset($_SERVER["HTTP_FORWARDED"])) return $_SERVER["HTTP_FORWARDED"];
	if(isset($_SERVER["REMOTE_ADDR"])) return $_SERVER["REMOTE_ADDR"];
	if(isset($_SERVER["HTTP_PC_REMOTE_ADDR"])) return $_SERVER["HTTP_PC_REMOTE_ADDR"];	 	 	  	  
  return("unknown");
}

function f_getHost()
{
	$host='unknown';
	if(isset($_SERVER['REMOTE_HOST'])) $host=trim($_SERVER['REMOTE_HOST']);
	elseif(isset($_SERVER['REMOTE_ADDR'])) $host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
	return $host;
}

function f_is_odd($int){return($int & 1);}

function f_hChart($data,$width,$height,$offs=110,$show_vals=false,$sort=true,$zero_tot=false) //graph
{
	global $f_lf;
	if(!is_array($data) || count($data) == 0) return '';
	if($sort) ksort($data);
	$grid=true;$width-=$offs;$grid_w=$width/10;
	$colors=array('a_chart_color1','a_chart_color2');
	$ret='<div class="hchart" style="width:'.($width+$offs).'px;height:'.$height.'px;">'.$f_lf;
	$h=$height/count($data);
	if($grid)
	{
		for($i=0;$i<11;$i++)
		{
			$ret.='<div class="hchart_line" style="height:'.$height.'px;left:'.(($i*$grid_w) + $offs).'px;"></div>'.$f_lf;
			$ret.='<div class="hchart_line_point" style="left:'.(($i*$grid_w) + $offs).'px;"></div>'.$f_lf;
		}
	}

	$col_cnt = count($colors);
	$t=0;$cp=0;$md=(max($data)==0?1:max($data));$tot=0;
	foreach($data as $v)$tot+=$v;
	if($tot!=0 || $zero_tot)
	{ $i=0; 
		foreach($data as $k=>$v)
		{
			$color=$colors[$i%$col_cnt];$pc=($tot==0?0:($v/$tot)*100);
			$ret.='<div class="hchart_data '.$color.'" style="width:'.($v/$md*($width)).'px;height:'.($h-1).'px;top:'.$t.'px;left:'.$offs.'px;">'.($show_vals?'<span style="margin-left: 10px">'.$v.'</span>':'').'</div>'.$f_lf;
			if(strlen($k)>40)
			{
				$tooltip_k=$k;
				if(strpos($k,'<img')!==false) $k = str_replace(f_GFSAbi($k,'<img','>'), '[+]',$k);
				if(strlen($k)>40) $k=substr($k,0,40).'...';
				$span='<span class="show-tooltip" title="'.$tooltip_k.'">'.$k.'</span>';
			}
			else $span='<span>'.$k.'</span>';
			$ret.='<div class="hchart_labels" style="top:'.($t+2).'px;">'.$span.'</div>'.$f_lf;
			$ret.='<div class="hchart_labels_pc" style="left:'.($offs-45).'px;top:'.($t+2).'px;"><span>'.number_format($pc,1).'%</span></div>'.$f_lf;
			$t+=$h; $i++;
		}
	}
	$ret.='</div>'.$f_lf;
	return $ret;
}
function f_vChart($data,$width,$height,$labels,$ye) 
{
	global $f_br;
	if(!is_array($data) || count($data) == 0) return '';
	if(!isset($_REQUEST['f'])) $_REQUEST['f'] = 'h';
	$colors=array('a_chart_color1','a_chart_color2');$cd=count($data);
	$link=f_build_self_url('centraladmin.php').'?process=index&stat=detailed';
	$link.=(!isset($_REQUEST['pid']))?'&f='.$_REQUEST['f'].'&mo=':'&pid='.$_REQUEST['pid'].'&f='.$_REQUEST['f'].'&purl='.$_REQUEST['purl'].'&pname='.$_REQUEST['pname'].'&mo=';
	$ret='<div class="vchart" id="'.($ye?'year_chart':'month_chart').'" style="width:'.$width.'px; height:'.$height.'px;">';
	$w=max(1,floor(($width-$cd)/$cd));
	$width=($w+1)*$cd;
	$grid_h=$height/10;
	for($i=0;$i<11;$i++)
	{
		$ret.='<div class="vchart_line" style="width:'.$width.'px;top:'.$i*$grid_h.'px"></div>';
		$ret.='<div class="vchart_line_point" style="top:'.$i*$grid_h.'px"></div>';
	}
	$i=0;
	$col_cnt = count($colors);
	$md = max($data);
	foreach($data as $v)
	{
		$color=$colors[$i%$col_cnt];
		$js=($ye)?' onclick="document.location=\''.$link.($i+1).'\'"':''; 
		if($v!=0) $ret.='<div'.$js.' class="vchart_data '.$color.'" style="width:'.($w-1).'px;height:'.($v/$md*$height).'px;left:'.($i*$w + $i).'px;"></div>'; 
		if($v!=0) $ret.='<div class="vchart_data_text" style="width:'.($w).'px;left:'.($i*$w + $i).'px;bottom:'.(($v/$md*$height)+1).'px;"><span>'.$v.'</span></div>'; 
		$i++;
	}
	$i=0;
	foreach($labels as $v) { $ret.='<div class="vchart_labels" style="width:'.($w).'px;left:'.($i*$w + $i).'px;"><span>'.$v.'</span></div>'; $i++;}
	$ret.='</div>'.$f_br.$f_br;
	return $ret;
}
function f_sendFileHeaders($fname,$c_type='application/octet-stream')
{
	header("Pragma: public"); 
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Type: $c_type");
	header("Content-Disposition: attachment; filename=\"".$fname."\";");
	header("Content-Transfer-Encoding: binary");
}

//password functions
function f_check_pass_strength($pwd,$thispage_id,$get_arr_only=false,$is_admin=false)
{
	$lang=f_get_myprofile_labels($thispage_id);
	$str=array(
		'short'=>$lang['short pwd'],	//1
		'weak'=>$lang['weak'],				//2
		'average'=>$lang['average'],	//3
		'good'=>$lang['good'],				//4
		'strong'=>$lang['strong'],		//5
		'forbidden'=>$lang['forbidden']
	);
	if($get_arr_only) return $str; //added this to define the labels at one place only
	
	//only longer than 8 chars
	$weak_passwords=array ('firebird', 'password', '12345678', 'steelers', 'mountain', 'computer', 'baseball', 'xxxxxxxx', 'football', 'qwertyui', 'jennifer', 'danielle', 'sunshine', 'starwars', 'whatever', 'nicholas', 'swimming', 'trustno1', 'midnight', 'princess', 'startrek', 'mercedes', 'superman', 'bigdaddy', 'maverick', 'einstein', 'dolphins', 'hardcore', 'redwings', 'cocacola', 'michelle', 'victoria', 'corvette', 'butthead', 'marlboro', 'srinivas', 'internet', 'redskins', '11111111', 'access14', 'rush2112', 'scorpion', 'iloveyou', 'samantha', 'mistress');
	$ret_num_min = 3;
	if(in_array($pwd, $weak_passwords)) {$msg=$str['forbidden'];$ret_num=2;}  //block weak passwords
	else
	{		
		$msg=''; $ret_num=0;
		if(preg_match('/^.{1,7}$/', $pwd)) {$msg=$str['short'];$ret_num=1;}
		elseif(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $pwd)) {$msg=$str['strong']; $ret_num=5;}
		elseif(preg_match('/^.{12,}$/', $pwd)) {$msg=$str['strong']; $ret_num=5;}
		elseif(preg_match('/(?=^.{8,}$)(?=.*\d)(?![.\n])(?=.*[a-zA-Z]).*$/', $pwd)) {$msg=$str['good']; $ret_num=4;}
		elseif(preg_match('/^[^0-9]{8,11}$/', $pwd)) {$msg=$str['average']; $ret_num=3;}
		elseif(preg_match('/^[0-9]{8,}$/', $pwd)) {$msg=$str['weak'];$ret_num=2;}
		else  $msg="That's not a password!"; 
	}
	$is_pass_ok = $is_admin?true:($ret_num>=$ret_num_min);
	
	return array('num'=>$ret_num,'msg'=>$msg,'pass_is_ok'=>$is_pass_ok);
}

function f_show_pass_meter($pass_levels,$pos='right',$mt='6',$id='')
{
	$outDivStart='<div class="out_pass_div'.$id.'" style="height:4px;position:relative;">';
	$innDivStart='<div class="inn_pass_div'.$id.'" style="height:4px;margin-top:'.$mt.'px">';
	$outDivEnd=$innDivEnd='</div>';
	$txtSpan='<span id="pwdptext_%s'.$id.'" style="display:none;line-height:4px;position:absolute;top:0;'.$pos.':0;" class="pass_progress_text'.$id.' rvts8 field_label">%s</span>';
	
	$output=$outDivStart.$innDivStart.$innDivEnd;
	foreach($pass_levels as $pk => $pv) $output.=sprintf($txtSpan,$pk,$pv);
	
	return $output.$outDivEnd;
}

function f_parse_mailmacros($str,$user_data=array(),$more_macros=array(),$get_perm_mcs=false)
{
	$ip=f_getIP();
	$perm_macros_array=array('%ip%','%host%','%useremail%','%date%','%os%','%username%','%site%','%whois%','##');

	if($get_perm_mcs) return $perm_macros_array;

	$ca_site_url=str_replace('documents/centraladmin.php','',f_build_self_url('centraladmin.php'));

	$perm_macros_vals=array($ip,(isset($_SERVER['REMOTE_HOST'])?$_SERVER['REMOTE_HOST']:""),$user_data['email'],
					date('Y-m-d G:i', f_tzone_date(time())),(isset($_SERVER['HTTP_USER_AGENT'])?f_define_os($_SERVER['HTTP_USER_AGENT']):""),
					$user_data['username'],$ca_site_url,'http://en.utrace.de/?query='.$ip,'<br>');

	$str=str_replace('%%','%',$str); //backwards compatibility  
	$str=f_str_ireplace($perm_macros_array,$perm_macros_vals,$str);
//message specific macros
	if(is_array($more_macros)) foreach($more_macros as $k=>$v) $str=f_str_ireplace($k,$v,$str);  
	//replacing the user data (if provided)
	if(is_array($user_data)) foreach($user_data as $k=>$v) If(!is_array($v)) $str=str_replace('%'.$k.'%',$v,$str);

	return $str;
}

function f_hide_content_from_guests(&$content)
{
	if(strpos($content,'%hidden_text(')!==false)
	{
		$hid_cnt=f_GFS($content,'%hidden_text(',')%');
		if(f_userCookie() || f_adminCookie()) $content=str_replace('%hidden_text('.$hid_cnt.')%',$hid_cnt,$content);
		else $content=str_replace('%hidden_text('.$hid_cnt.')%','',$content);
	}
}

function f_build_collaps_sidebar($cat_array,$collaps,&$js,&$css,$full=true,$direction='ver',$external=false)
{
	global $f_lf;

	$sub_style_active='margin-bottom:5px;list-style-type:none';
	$sub_style=($collaps?'display:none;':'').$sub_style_active;
	$output='<ul class="'.$direction.'_cat_list" style="list-style-type:none">';
	$prevismain=true;
	foreach($cat_array as $k=>$cdata)
	{
		$is_sub=$cdata['issub'];
		$active=$cdata['active'];
		if($is_sub) $sub_active=$active;
		else $cat_active=$active;
		$cnt=isset($cdata['count']);
		$line='<li class="'.($is_sub?'vcl_s':'vcl_m').($active?' active':'').'">'.$cdata['line'];
		if($is_sub && $sub_active && $cnt) $output=str_replace('active"','active subactive"',$output);		
		if($prevismain)
		{
			if($is_sub) 
			{
				$output.='<ul class="ver_cat_list_sub" style="'.($cat_active?$sub_style_active:$sub_style).'">'.$line.'</li>'.$f_lf;
				$prevismain=false;
			}
			else $output.=($k>0?'</li>'.$f_lf:'').$line;
		}
		else
		{
			if($is_sub) $output.=$line.'</li>'.$f_lf;
			else 
			{	
				$output.='</ul></li>'.$f_lf.$line;
				$prevismain=true;
			}
		}
	}
	$output.=($prevismain?'</li>':'</ul></li>'.$f_lf).($direction='hor'?'<li class="clear"></li>':'').'</ul>'.$f_lf;

	if($external) $js_src='$(document).ready(function(){$(".vcl_m").mouseover(function(e){sub=$(this).find("ul.ver_cat_list_sub");if(sub.length)sub.show("fast");})});';
 	elseif($cnt && ($collaps && $collaps!='collaps'))
		$js_src='$(document).ready(function(){
		$(".vcl_ma").click(function(e){
  	sub=$(this).parents(".vcl_m").find("ul.ver_cat_list_sub");
		if(sub.length){
			sv=sub.is(":visible");pa=sub.parents(".vcl_m").hasClass("active");
			sact=$(this).parent().hasClass("subactive");
			if(sv && (!sact)){sub.hide();
		}
		else if(!sv || pa){sub.show();}
		if((sv || pa)&&(!sact)){e.preventDefault();} }});
		});';
	else
		$js_src='$(document).ready(function(){
		$(".vcl_ma").click(function(e){
			sub=$(this).parents(".vcl_m").find("ul.ver_cat_list_sub");
			if(sub.length && !sub.hasClass("collapsed")){
				sub.toggleClass("collapsed").toggle();
				e.preventDefault();}});
		});';
	$css_src='.vcl_ma{font-weight: bold;}'.$f_lf.'.vcl_sa{padding-left:10px;}'.$f_lf.'.vcl_m.active a.vcl_ma{text-decoration:none;}'.$f_lf.'.vcl_s.active a{text-decoration:none;}'.$f_lf
		.'.hor_cat_list .vcl_m{float:left;}'.$f_lf;
	if(strpos($js,$js_src)===false) $js.=$js_src;
	if(strpos($css,$css_src)===false) $css.=$css_src;
	return $output;
}

function f_read_user_agent($agent,$host)
{
	global $f_os;
	$result=array();
	$p=array_search(f_define_os($agent),$f_os);
	$b='0'; //Unknown
	if(strpos($agent,'MSIE')!==false)
	{	
		if(strpos($agent,'MSIE 10')!==false) $b='30';
		elseif(strpos($agent,'MSIE 9')!==false)	$b='20';
		elseif(strpos($agent,'MSIE 8')!==false)	$b='19';
		elseif(strpos($agent,'MSIE 7')!==false && strpos($agent,'Trident/4.0')!==false)	$b='19';
		elseif(strpos($agent,'MSIE 7')!==false)	$b='10';
		elseif(strpos($agent,'MSIE 6')!==false)	$b='9';
		else $b='1';
	}
	elseif(strpos($agent,'Firefox')!==false)
	{
		if(strpos($agent,'Firefox/3')!==false) $b='17';
		elseif(strpos($agent,'Firefox/12')!==false) $b='29';
		elseif(strpos($agent,'Firefox/11')!==false) $b='28';
		elseif(strpos($agent,'Firefox/10')!==false) $b='27';
		elseif(strpos($agent,'Firefox/9')!==false) $b='26';
		elseif(strpos($agent,'Firefox/8')!==false) $b='25';
		elseif(strpos($agent,'Firefox/7')!==false) $b='24';
		elseif(strpos($agent,'Firefox/6')!==false) $b='23';
		elseif(strpos($agent,'Firefox/5')!==false) $b='22';
		elseif(strpos($agent,'Firefox/4')!==false) $b='21';
		else $b='3';
	}
	elseif(strpos($agent,'Opera')!==false) $b='2';
	elseif(strpos($agent,'Chrome')!==false) $b='18';
	elseif(strpos($agent,'Mercury')!==false) $b='31';
	elseif(strpos($agent,'Safari')!==false)	$b='6';
	elseif((strpos($agent,'Konqueror')!==false)||(strpos($agent,'KHTML')!==false)) $b='7';
	elseif((strpos($host,'googlebot.com')!==false)) $b='4';

	$result['platform']=$p;	
	$result['browser']=$b;
	return $result;
}

function f_build_detailed_stat($timestamp,$page_id,$uniq_flag,$firsttime_flag,$q='',$rc=0)
{	
	global $f_use_mysql;

	$frames_mode=(isset($_GET['frames']) && $_GET['frames']=='1');
	$stat=array();
	$stat['page_id']=$page_id;
	$stat[$f_use_mysql?'date':'timestamp']=$f_use_mysql?f_build_mysql_time($timestamp):$timestamp;

	$stat['ip']=f_getIP();
  $stat['host']=f_getHost();
	if($stat['ip']==$stat['host']) $stat['host']='';

	$agent=f_read_user_agent(isset($_SERVER['HTTP_USER_AGENT'])? $_SERVER['HTTP_USER_AGENT']:'',$stat['host']);
	$stat['browser']=(isset($agent['browser'])?$agent['browser']:'');
	$stat['os']=(isset($agent['platform'])?$agent['platform']:'');
	$stat['resolution']=($q!=''?$rc:(isset($_GET['w'])&& isset($_GET['h'])?intval($_GET['w']).'x'.intval($_GET['h']): ''));

	if($q!='') $stat['referrer']='documents/search.php?q='.$q;
	else
	{
		$stat['referrer']='NA';
		$http_ref=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'NA';		
		if(!$frames_mode) 
			$http_ref=isset($_REQUEST['referrer'])?f_strip_tags($_REQUEST['referrer']):$http_ref;   
		if($http_ref!=='NA')
		{
			$h=f_get_host();	
			$stat['referrer']=(strpos($http_ref,$h)===0)?substr($http_ref,strpos($http_ref, $h)+strlen($h)):$http_ref;
		}
	}	
	$stat[($f_use_mysql?'visit_type':'type')]=(!$uniq_flag? 'h': ($firsttime_flag?'f':'r') );
	return  $stat;
}

function f_parseIF($macro) //moved from shop as used in survey also now
{
	$cond=f_GFS($macro,'<condition>','</condition>');
	if(strpos($macro,' <> ')) $eq='<>';
	elseif(strpos($macro,' <= ')) $eq='<=';
	elseif(strpos($macro,' => ')) $eq='=>';
	elseif(strpos($macro,' = ')) $eq='=';
	elseif(strpos($macro,' < ')) $eq='<';
	elseif(strpos($macro,' > ')) $eq='>';
	elseif(strpos($macro,'<>')) $eq='<>';
	elseif(strpos($macro,'<=')) $eq='<=';
	elseif(strpos($macro,'=>')) $eq='=>';
	elseif(strpos($macro,'=')) $eq='=';
	elseif(strpos($macro,'<')) $eq='<';
	elseif(strpos($macro,'>')) $eq='>';
	else $eq='';

	$trueval=f_GFS($macro,'<truevalue>','</truevalue>');
	$falseval=f_GFS($macro,'<falsevalue>','</falsevalue>');
	$lc=trim(f_GFS($cond,'',$eq));
	$rc=trim(f_GFS($cond,$eq,''));
	$res=$falseval;
	if($eq=='=') {if($lc==$rc) $res=$trueval;}
	else if($eq=='>'){if($lc>$rc) $res=$trueval;}
	else if($eq=='<'){if($lc<$rc) $res=$trueval;}
	else if($eq=='<='){if($lc<=$rc) $res=$trueval;}
	else if($eq=='=>'){if($lc>=$rc) $res=$trueval;}
	else if($eq=='<>'){if($lc!=$rc) $res=$trueval;}
	return $res;
}

function f_print_img_html($rel_path) 
{
	global $f_ct; 
	return '<img class="system_img" src="'.$rel_path.'ezg_data/print.png" alt="Print" style="vertical-align: middle;"'.$f_ct;
}

function f_build_returnURL($has_param=true)
{
	$r=base64_encode(f_cur_page_url());
	if($has_param) $r='&amp;r='.$r;
	return $r;
}
//redirects to given path or returns false if no such path is provided
function f_check_returnURL($check_only=false,$get_clean=false)
{
	if(isset($_REQUEST['r']) && $_REQUEST['r']!= '')
	{
		$r=$_REQUEST['r']; 
		if($check_only && !$get_clean) return $r;     //check only and there is something to return to
		$r=base64_decode($r);
		//don't return to duplicate if coming from there
		$r=preg_replace('/action=duplicate&entry_id=(\d+)$/','action=index',$r);
		if($check_only && $get_clean) return $r;		//checks and gets pure returning url
		f_url_redirect($r);
		exit;
	}
	return false;
}

function f_timeline_data($startdate,$title,$text,$media,$data)
{
	$t=array();
	$t['timeline']['headline']=$title;
	$t['timeline']['type']='default';
	$t['timeline']['startDate']=$startdate;
	$t['timeline']['text']=$text;
	$t['timeline']['asset']=array('media'=>$media,'credit'=>'','caption'=>'');
	$t['timeline']['date']=array();
	foreach($data as $k=>$v)
	{
		$dt=array();
		$dt['startDate']=$v['date'];
    $dt['headline']=$v['title'];
    $dt['text']=$v['text'];
    $dt['asset']=array("media"=>$v['media'],"credit"=>$v['credit'],"caption"=>$v['caption']);
		$t['timeline']['date'][]=$dt;
	}
	
	echo json_encode($t);
	return;
}

function get_directeditjs($container_class,$script_path)
{
	return 	'
	function closeTL(th){$(".ui_hidden").show();$(th).parent().find(".ui").remove();};
	function deleteC(th,idt,idp){$.get("'.$script_path.'",{action:\'del_comment\',\'cc\':1,comment_id:idt,entry_id:idp},function(){$(th).closest(".blog_comments_entry").remove();});}
	function updateTL(th,rel){
		var idt=$(th).prev().attr("name"),dt=$(th).prev().val(),rl=$(th).parent().attr("rel");
		$.get("'.$script_path.'",{action:\'updatetl\',id:idt,data:dt,rel:rl},function(r){
		$(".ui").remove();if(rel) $("."+idt).html(r).attr("rel",dt);else $("."+idt).html(dt);$(".ui_hidden").show();
		});}
	function editTL(id){
		var rel=$("."+id).hasClass("el_rel"),html=rel?$("."+id).attr("rel"):$("."+id).html(),cc=$(".'.$container_class.' ."+id);
		if(cc.parents("a").length>0) cc=cc.parents("a");
		cc.after(\'<input class="ui ui_input" onclick="return false" type="text" name="\'+id+\'" value="\'+html+\'"><input type="button" onclick="updateTL(this,\'+rel+\');" class="ui ui_shandle_ic4"><input type="button" onclick="closeTL(this);" class="ui ui_shandle_ic5">\');
		$(".ui_shandle_ic5").next().addClass("ui_hidden").hide();
	};
	';
}

function get_directeditcss($rel_path)
{
	return '.ui_hidden{display:none;}.ui_shandle_ic6,.ui_shandle_ic5,.ui_shandle_ic4{background-color:#fff;background-image: url("'.$rel_path.'extimages/scripts/ui-icons.png");background-position: -64px -144px;border: medium;border-radius:2px;cursor: pointer;height: 16px;margin-left: 2px;width: 16px;}
			.ui_shandle_ic5{background-position: -80px -368px;}.ui_shandle_ic6{background-position: -176px -352px;}.ui_input{width:90%}';
}

function f_show_timeline($rel_path,$script_path,$action,$write=false,$init_zoom=0,$lang='en',$timeline_reversed=false,$thumb_size=60,$c_sbars_on_thumbs=false)
{
//activate custom slidebars if custom slidebars on thumbs is active
echo '<!DOCTYPE html>
<html>
	<head>       
			<meta http-equiv="content-type"  content="text/html; charset=UTF-8">
	    <title>Timeline</title>
	    <link rel="stylesheet" href="'.$rel_path.'ezg_data/timeline/timeline.css" />     
	    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Dancing+Script|Antic+Slab" />       
	    <!--[if lt IE 9]>
	      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	</head>
	<body>
	<div id="timeline"></div>
	<script type="text/javascript" src="'.$rel_path.'jquery.js"></script>
	<script type="text/javascript" src="'.$rel_path.'ezg_data/timeline/timeline-min.js"></script>
	<script type="text/javascript" src="'.$rel_path.'ezg_data/timeline/storyjs-embed.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script type="text/javascript" src="'.$rel_path.'ezg_data/timeline/mousewheel.min.js"></script>
	<script type="text/javascript" src="'.$rel_path.'ezg_data/timeline/mCustomScrollbar.js"></script>'
	.($thumb_size!=60? 
	'<style>
		#timeline .thumb{max-width:'.($thumb_size+40).'px;cursor:pointer;}
		.thumb_mask{height:'.$thumb_size.'px;width:'.$thumb_size.'px;}
	</style>':'').'
	<script type="text/javascript">
		$(document).ready(function() {
				createStoryJS({
					type:		"timeline",
					width:		"100%",
					height:		"100%",
					source:		"'.$script_path.$action.'",
					embed_id:	"timeline",
					'.($timeline_reversed?'':'start_at_end: true,').'
					start_zoom_adjust: '.$init_zoom.',
					lang: "'.$lang.'", 
					debug:		true
				});
			});'
		.($write?	get_directeditjs('text',$script_path):'').
		'	
		function handleth(th){
			im=$(th).closest(".content").find(".media-container img");$(im).attr("alt",$(th).attr("title"));
			if(!$(im).hasClass("l_on")) {				
				$(im).addClass("l_on").load(function(){
					$(".view-loader").remove();
					$(this).parent().siblings(".caption").html(this.alt);
					} );
			}			
			$(th).closest(".content").find("div.media-image").append(\'<div class="view-loader"></div>\');
			$(".view-loader").css({"top":($(im).height()/2)-30,"left":($(im).width()/2)-30}); 
			$(im).attr("src",$(th).attr("rel"));
		};
		
		function handleEn(th){
			var $evId = $(th).attr("rel");
			var $evHolder = $("#ev_"+$evId);  
			$evHolder.addClass("view-loader");
			$evHolder.show();
			if($evHolder.text() == "")
			{
				$evHolder.html("<p><span class=\'rvts8\'>Loading ...</span></p>");
				$currPage = window.location.toString().replace(window.location.search,"");
				var jqxhr = $.get($currPage+"?entry_id="+$evId, function (data) {
					$evHolder.html($(data).find(".post_content"));
				});
			}
			$evHolder.removeClass("view-loader");
		};
		function showFirstEn(th){
			return false; //function ignored
			$(th).closest(".container").children("div[id^=\'ev_\']").hide();
			$(th).closest(".container").children("p").show();
		};
		function isScrolledIntoView(elem){
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();
			var elemTop = $(elem).offset().top;
			var elemBottom = elemTop + $(elem).height();
			return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		};
		function scroller(){
			if(console) console.log("scroller launched");
			$(".slider-item").scroll(function(){
				var slider = this;
				detectForHandling(slider);
			});
			detectForHandling(null);
		};
		function detectForHandling(elem){
			$elem = elem == null ? '.($c_sbars_on_thumbs?'$(".slider-item").find(".thumb_con").attr("style","height:350px;")':'$(".slider-item")').': $(elem);
			$elem.children().find("span.entry").each(function(){
				if(isScrolledIntoView(this)) {handleEn(this);}	
			});
			//if no media used, set some icon in the timeline
			$(".flag-content").each(function() {
				if($(this).children("div[class*=\'thumbnail\']").size()==0)
				$(this).prepend("<div class=\'thumbnail thumb-plaintext\'></div>");
			});
			if(elem == null)
			{
				$elem.each(function() {
					if(!$(this).hasClass("mCustomScrollbar") && $(this).children().size() > 0)
					{
						var slider = this;
						$(this).mCustomScrollbar({
							advanced:{updateOnBrowserResize:true, updateOnContentResize:true, autoExpandHorizontalScroll:false },
							callbacks:{onScroll:function(){}, onTotalScroll:function(){	detectForHandling(slider);}, onTotalScrollOffset:0}
						});
						VMM.fireEvent(window,"resize");
					}
				});
			}
		}; 
		VMM.bindEvent(VMM,scroller,"EZGBUILDSLIDE");
	</script>
	</body>
</html>';
}

function f_get_longest_common_subsequence($str_1,$str_2)
{
	$str_1_len=strlen($str_1);
	$str_2_len=strlen($str_2);
	$result="";

	if($str_1_len === 0 || $str_2_len === 0) return $result;
	$longest_common_subsequence=array();

	for($i=0;$i<$str_1_len;$i++){
		$longest_common_subsequence[$i] = array();
		for ($j = 0; $j < $str_2_len; $j++) $longest_common_subsequence[$i][$j] = 0;
	}
	$max_size=0;
	for($i=0;$i<$str_1_len;$i++){
		for($j=0;$j<$str_2_len;$j++){
			if($str_1[$i] === $str_2[$j]){
				if($i===0 || $j===0) $longest_common_subsequence[$i][$j]=1;
				else $longest_common_subsequence[$i][$j]=$longest_common_subsequence[$i-1][$j-1]+1;
		
				if($longest_common_subsequence[$i][$j] > $max_size){
					$max_size=$longest_common_subsequence[$i][$j];
					$result="";
				}
				if($longest_common_subsequence[$i][$j]===$max_size)
					$result=substr($str_1,$i-$max_size+1,$max_size);
			}
		}
	}
	return $result;
}
function f_get_rel_path_between_urls($path_1, $path_2)
{
	//calculate rel path from symlinks folder to file dest folder
	if(strpos($path_1,'innovaeditor')!==false)
	{
		$common = f_get_longest_common_subsequence($path_1, $path_2);
		$path_1_part = str_replace($common, '', $path_1);
	$path_2_part = str_replace($common,'', $path_2);
	}
	else
	{
		$path_1_part = str_replace('../', '', $path_1); //assuming innovaeditor is always in root
		$path_2_part = $path_2;
	}
	$path_2_part_dirs = substr_count($path_2_part,'/');
	$pref_path = '';
	for($i = $path_2_part_dirs; $i > 0; $i--)  $pref_path .= '../';
	return $pref_path.$path_1_part;
}

function f_replaceIfMacro(&$src)
{
	$ifc='%IF<condition>';$fval='</falsevalue>%';
	while (strpos($src,$ifc) !== false) :
		$pre=f_GFS($src,$ifc,$fval); 
		while(strpos($pre,$ifc)!==false) 
			{$pre=f_GFS($pre.$fval,$ifc,$fval);}
		$temp=$ifc.$pre.$fval;
		$parsed=f_parseIf($temp);
		$src=str_replace($temp,$parsed,$src);
	endwhile;
}

function f_import($settings,$flag)
{

	if (version_compare(PHP_VERSION, '5.0.0', '<')) 
		return array(PHP4_MESSAGE,'');
	else
	{
		include_once('importer.php');
		switch($flag) 
		{
			case 'LI':$importer = new ShopImporter($settings); break;
			case 'NL':$importer = new NewsImporter($settings); break;
			case 'CA':$importer = new CAImporter($settings); break;

			default: break;
		}
		$importer->process();
		return  $importer->output();
	}
	
}

function f_mailer($settings,$flag)
{
	if (version_compare(PHP_VERSION, '5.0.0', '<')) 
		return array(PHP4_MESSAGE,'');
	else
	{
	  include_once('mailer.php');
		switch($flag) 
		{
			case 'BL':$mailer = new BlogMailer($settings); break;
			case 'CA':$mailer = new CAMailer($settings); break;
			default: break;
		}
		$mailer->process();
		return  $mailer->output();
	}	
}

//$items_list param must be an array and must has ['email'] index (column)
function f_build_double_selector($items_list,$left_caption,$right_caption,$left_select_id,$right_select_id,$preselected_items_list=array())
{
	global $f_ct,$f_br,$f_fmt_caption;
	
	$table="<table><tr><td>".sprintf($f_fmt_caption,$left_caption).$f_br
	.'<select id="'.$left_select_id.'" class="input1" multiple size="20" style="width:230px" name="'.$left_select_id.'[]">';
	foreach($items_list as $k=>$v) 
	{
		$em=f_sth($v['email']);$em2=$v['uid']; 
		if(!in_array($em, $preselected_items_list) && !empty($em)) 
				$table.='<option value="'.$em2.'">'.$em.'</option>';
	}
	$table.= '</select></td><td>'.$f_br.'<input name="right" type="button" value="  >>  " onclick="moveright();"'
			.$f_ct.$f_br.'<input name="left" type="button" value="  <<  " onclick="moveleft();"'
			.$f_ct.$f_br.$f_br.'<input name="all" type="button" value="*>>" onclick="moverightAll();"'.$f_ct.'</td>';
	$table.= "<td>".sprintf($f_fmt_caption,$right_caption)
			.$f_br.'<select id="'.$right_select_id.'" multiple class="input1" size="20"'
			.' style="width:230px" name="'.$right_select_id.'[]">';
	foreach($preselected_items_list as $k=>$v) 
	{
		if(!empty($v)) $table.='<option value="'.$k.'">'.f_sth($v).'</option>';
	}
	$table.='</select></td></tr></table>'; 
	
	return $table;
}

function f_get_double_selector_script($left_select_id,$right_select_id)
{
	return 'function moveleft() {'
		.'l=$("#'.$left_select_id.'")[0];r=$("#'.$right_select_id.'")[0];'
		.'var j=0;if(l.options.length>0) j=l.options.length;'
		.'for(i=0;i<r.options.length;i++) {if(r.options[i].selected) {l.options[j]=new Option(r.options[i].text,r.options[i].value);j++;}}'
		.'for(m=r.options.length-1;m>=0;m--) {if(r.options[m].selected) r.options[m]=null;} '
		.'}; '
		.'function moveright() {'
		.'l=$("#'.$left_select_id.'")[0];r=$("#'.$right_select_id.'")[0];'
		.'var j=0;if(r.options.length>0) j=r.options.length;'
		.'for(i=0;i<l.options.length;i++) {if(l.options[i].selected) '
		.'{r.options[j]=new Option(l.options[i].text,l.options[i].value);r.options[j].selected=true;j++;} }'
		.'
		for(m=l.options.length-1; m>=0; m--) {
		if(l.options[m].selected) 
		l.options[m]=null;
		}'
		.'}; '
		.'function moverightAll() {'
		.'markl();moveright();'
		.'}; '
		.'function markl(){el=$("#'.$left_select_id.'")[0];for(i=0;i<el.options.length;i++) el.options[i].selected=true;};'
		.'function mark(){el=$("#'.$right_select_id.'")[0];for(i=0;i<el.options.length;i++) el.options[i].selected=true;};'
		.'function toggle_admin_check(el){var target=$(el).parents("tr").next();if($(el).is(":checked")) target.hide();else target.show();};'
		.'$(document).ready(function(){	$("#usr_grps_select").change(function(){var val = $(this).find(":selected").val();'
		.'var grp=val.split(",");var el=$("#emails_select")[0];for(i=0;i<el.options.length;i++) {var res = $.inArray(el.options[i].value,grp);'
		.'if(res!=-1) el.options[i].selected=true;} moveright();})});';
}

function f_print_entry($btn_id,$rel_path,$output,$template,$use_page_bg=true,$css='')
{
	$print_html='<a id="'.$btn_id.'" href="javascript:void(0);" style="padding:2px;">'.f_print_img_html($rel_path).'</a>'
			.($use_page_bg?'<div id="xm1" style="float:none;width:970px;"><div id="xm2">'.$output.'</div></div>':$output);
	$print_js='<script type="text/javascript">
		$(document).ready(function(){$("link[media=\'print\']").remove();$("#'.$btn_id.'").click(function(){$(this).hide();window.print();$(this).show();});});
</script>
';

	$body_part=f_GFSAbi($template,'<body','</body>');
	$template=str_replace($body_part,'<body class="print_preview" style="background:transparent">'.$print_html.'</body>',$template);
	$template=str_replace('<!--endscripts-->',$css.$print_js.'<!--endscripts-->',$template);
	$template=str_replace(array('<script type="text/javascript" src="documents/script.js"></script>',
	'<script type="text/javascript" src="../documents/script.js"></script>'),'',$template);
	print $template;
	exit;
}

function f_format_pageview($page,$apanel,$rel_path)
{
	global $f_ct,$f_lf;

	$body_tag=f_GFSAbi($page,'<body','>');
	$page=str_replace($body_tag,$body_tag.'<div class="a_body" style="background:transparent">'.$apanel.'<div style="margin-left:205px">',$page);
	$page=str_replace('</body','</div></div></body',$page);
	$page=str_replace('</title>','</title>'.$f_lf.'<link type="text/css" href="'.$rel_path.'documents/ca.css" rel="stylesheet"'.$f_ct,$page);
	return $page;	
}

function f_filter_params_to_query(&$where,$params)
{
	foreach($params as $pk => $pv)
		if($pv!='')
			$where.=($where==''?' WHERE ':' AND ').' '.$pk.' LIKE "%'.$pv.'%" ';
}

function f_filter_orderby($defOrder, $defAsc)
{
	$orderby=(isset($_REQUEST['orderby']))?f_strip_tags($_REQUEST['orderby']):$defOrder;
	$asc=(isset($_REQUEST['asc']))?f_strip_tags($_REQUEST['asc']):$defAsc;
	return array($orderby,$asc);
}

function f_get_video_image($url)
{
	$image_url = parse_url($url);
	if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
		$array = explode('&', $image_url['query']);
		return 'http://i3.ytimg.com/vi/'.substr($array[0], 2).'/default.jpg';
	} else if($image_url['host'] == 'www.youtu.be' || $image_url['host'] == 'youtu.be'){
		$array = explode('/', $image_url['path']);
		return 'http://i3.ytimg.com/vi/'.$array[1].'/default.jpg';
	} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
		$ctx=stream_context_create(array('http'=>array('timeout' => 5)));
		$hash = unserialize(file_get_contents(
		'http://vimeo.com/api/v2/video/'.substr($image_url['path'], 1).'.php',false,$ctx));
		return $hash[0]["thumbnail_small"];
	}
}

function f_remove_url_multi_slash($url)
{
	return preg_replace('%([^:])([/]{2,})%','\\1/',$url);
}

?>
