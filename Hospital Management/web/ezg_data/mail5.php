<?php
$m_version="mail v5 - 6";
/*
	http://www.ezgenerator.com
	Copyright (c) 2004-2011 Image-line
*/

function m_sendMail($send_to,$from,$content_html,$content_text,$subject,$page_charset,$att_content='',$att_file='',$att_filetype='',$send_to_author='',$author_data=array(),$send_to_bcc='',$m_mail_type,$m_return_path,$m_sendmail_from,$m_use_linefeed,$m_SMTP_HOST,$m_SMTP_PORT,$m_SMTP_HELLO,$m_SMTP_AUTH,$m_SMTP_AUTH_USR, $m_SMTP_AUTH_PWD,$m_admin_nickname,$m_SMTP_SECURE)
{

	include_once('class.phpmailer.php');
	try 
	{
		$mail = new PHPMailer(true);
	
		$mail->CharSet=$page_charset!=''?$page_charset:'utf-8';
		if($m_use_linefeed) $mail->LE="\r\n";

		if(($m_mail_type=='smtp') && ($m_SMTP_HOST!==''))	
		{
			$mail->IsSMTP();
			$mail->SMTPAuth=$m_SMTP_AUTH;
			$mail->Port=$m_SMTP_PORT;
			$mail->Host=$m_SMTP_HOST;
			$mail->Username=$m_SMTP_AUTH_USR;
			$mail->Password=$m_SMTP_AUTH_PWD;
			$mail->Helo=$m_SMTP_HELLO;
			if($m_SMTP_SECURE=='ssl') $mail->SMTPSecure='ssl';
			elseif($m_SMTP_SECURE=='tls') $mail->SMTPSecure='tls';
		}
		else $mail->IsMail();

		if($m_return_path!='')	$mail->Sender=$m_return_path;
		if($m_sendmail_from!='') ini_set('sendmail_from',$m_sendmail_from);

		if($from!='') 
		{	
			$ma=f_resolvemail($from,$m_admin_nickname);
			$mail->SetFrom($ma[0],$ma[1]);
		}

		if($send_to_bcc!='')
		{
			$send_to_bcc=str_replace(',',';',$send_to_bcc);
			if(strpos($send_to_bcc,';')!==false)	$sendto_bcc_array=explode(";",$send_to_bcc);
			else $sendto_bcc_array=array($send_to_bcc);
			foreach($sendto_bcc_array as $k=>$v)
			{
				$ma=f_resolvemail($v);
				$mail->AddBCC($ma[0],$ma[1]);
			}
		}
		
		$send_to=str_replace(',',';',$send_to);
		if(strpos($send_to,';')!==false) $sendto_array=explode(";",$send_to);
		else $sendto_array=array($send_to);
		foreach($sendto_array as $k=>$v)
		{
			$ma=f_resolvemail($v);
			$mail->AddAddress($ma[0],$ma[1]);
		}		
		
		if($send_to_author!='') //used in blogs
		{
			if(!empty($author_data['email']) && f_validate_email($author_data['email']))
				$mail->AddAddress($author_data['email']);
		}

		$mail->Subject=$subject;
		$content_text=str_replace(array("\n\n"),"\n",$content_text);
		if($content_html!='')
		{
			$mail->MsgHTML($content_html);
			$content_html = preg_replace('/\\\\/','', $content_html);
			if($content_text!='') $mail->AltBody=$content_text;
			$mail->IsHTML(true);
		}
		else
		{
			$mail->IsHTML(false);
			$mail->Body=$content_text;
		}

		if(is_array($att_content)){foreach($att_content as $k=>$v) if($v!='') $mail->AddAttachment($v,$att_file[$k],'base64',$att_filetype[$k]);}
		elseif($att_content!='') $mail->AddAttachment($att_content,$att_file,'base64',$att_filetype); 

		$mail->Send();
		$result='1';
		return $result;
	}
	catch (phpmailerException $e) {return $e->errorMessage();}
//PHP5END
}
?>