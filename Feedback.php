<?php	
include('func.php');
if(isset($_POST['mail']))
{
	$msg=verify($_POST['content']);
	if($msg!=NULL)
	{
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From:'.verify($_POST['email']) . "\r\n";
		$to="rjain.rahul5@gmail.com";
		$subject="Feedback Email from toce-results.cf";
		$body=$msg;
		mail($to,$subject,$body,$headers);
		echo "<script>alert('Feedback Successful!');window.location='index.html';</script>";
	}
}
?>
