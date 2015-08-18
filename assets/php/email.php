<?php
session_start();

$error = FALSE;

include_once("connect.php");

$name 		= filter_var($_POST['inputName'],FILTER_SANITIZE_STRING);
$message 	= filter_var($_POST['inputText'],FILTER_SANITIZE_STRING);
$code 		= filter_var($_POST['inputCode'],FILTER_SANITIZE_STRING);
$email 		= $_POST['inputEmail'];

if($code != $_SESSION['secpic'])
{
	$error = TRUE;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$error = TRUE;
}

if((empty($name)) OR (strlen($name) < 3) OR (strlen($name) > 30))
{
	$error = TRUE;
}

if((empty($message)) OR (strlen($message) < 10) OR (strlen($message) > 500))
{
	$error = TRUE;
}

// if NO errors we send data via mail() function, save into file and save data to DB
if($error === FALSE)
{
	/*
		-------- save message into DB --------
	*/
	$query = $db->prepare("INSERT INTO mail (mailDate, mailName, mailEmail, mailMessage, mailIp) VALUES (?, ?, ?, ?, ?)");
	
	$mailDate = date("D, F j, Y",time());
	$mailName = $name;
	$mailEmail = $email;
	$mailMessage = $message;
	$mailIp = $_SERVER["REMOTE_ADDR"];

	$query->bind_param('sssss', $mailDate, $mailName, $mailEmail, $mailMessage, $mailIp);
	
	if(!$query->execute())
	{
		if(isset($_POST['jsenabled']))
	    {
			echo '<span id="sendResult">error</span>';
			$query->close(); 
			$db->close();
			error_log("cant write to DB", 0);
			exit();
	    }
	    else
	    {
	    	header("Location: http://".$_SERVER['HTTP_HOST']."/#contactme?message=no");
	    }
	}
	
	$query->close(); 
	$db->close();
	
	/*
		-------- save message into file 'messages.txt' --------
	*/
	if(file_exists(dirname(__FILE__).'/../messages.txt'))
	{
		$somecontent = "Date: ".date("D, F j, Y H:i:s",time())."\r\n";
		$somecontent .= "IP: ".$_SERVER["REMOTE_ADDR"]."\r\n";
		$somecontent .= "Name: ".$name."\r\n";
		$somecontent .= "Email: ".$email."\r\n";
		$somecontent .= "Message: ".$message."\r\n";
		$somecontent .= "----------||----------\n";
		
		$tempFile = tmpfile(); // create temp file
		fwrite($tempFile, $somecontent); // add message to tmp-file

		// open real file only for read
		$realFile = fopen("../messages.txt", "r");

		while(!feof($realFile))
		{	 
			// write data from real file into tmp file
			fwrite($tempFile, fgets($realFile));
		}
		fclose($realFile);

		$realFile = fopen("../messages.txt", "w");

		rewind($tempFile); // set pointer to begining of file
		while(!feof($tempFile))
		{
			// write data from tmp file into real file
			fwrite($realFile, fgets($tempFile));
		}

		fclose($tempFile); // delete tmp file
		fclose($realFile);
	}
	else
	{
	    if(isset($_POST['jsenabled']))
	    {
			echo '<span id="sendResult">error</span>';
			error_log("cant open file messages.txt", 0);
			exit();
	    }
	    else
	    {
	    	header("Location: http://".$_SERVER['HTTP_HOST']."/#contactme?message=no");
	    }
	}
	
	/*
		-------- send message via mail() function --------
	*/
    $subject = "makwebber.com: сообщение от ".$name;
    $header  = "Content-type: text/html; charset=utf-8 \r\n"; 
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "From:". $name ."<".$email."> \r\n";
    $header .= "Reply-To: ".$email." \r\n";

    mail("mail@makwebber.com", $subject, $message, $header);

    if(isset($_POST['jsenabled']))
    {
		echo '<span id="sendResult">success</span>';
    }
    else
    {
    	header("Location: http://".$_SERVER['HTTP_HOST']."/#contactme?message=yes");
    }
}
else
{
	if(isset($_POST['jsenabled']))
    {
		echo '<span id="sendResult">error</span>';
    }
    else
    {
    	header("Location: http://".$_SERVER['HTTP_HOST']."/#contactme?message=no");
    }
}
?>