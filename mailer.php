<?php
include('func.php');
if(isset($_POST['submit']))
{
	if(strlen(verify($_POST['usn']))<=11)
	{
		if(verify($_POST['scheme'])==="cbcs")
			$url="http://results.vtu.ac.in/cbcs_".date("y")."/result_page.php";
		else $url="http://results.vtu.ac.in/results17"."/result_page.php";
		echo "<meta name=viewport content=width=device-width, initial-scale=1>";
		$sub=NULL;
		$usn=verify($_POST['usn']);
		$flag=0;
		$msg=NULL;
		$dom = fetch_result($usn, $url);
		if($dom!=NULL)
			$sub=process($dom);
			if($sub!=NULL)
			{
				$msg="<meta name=viewport content=width=device-width, initial-scale=1><link rel=stylesheet href=bootstrap.min.css></link>";
				$msg.=$sub;
				$flag=1;
				$msg.="<div class=\"footer container-fluid\" style=\" position:absolute; bottom:5px; width:99%; \"><a href=\"https://github.com/rahuljain5\" ><img src=\"./images/github_icon.png\" alt=\"github logo\" height=\"40px\" width=\"40px\" ></img></a><a href=\"profile.html\" ><img src=\"./images/hireme_icon.png\" alt=\"Hireme logo\" height=\"40px\" width=\"40px\" ></img></a><h4 style=\"float:right;\">By <b>Rahul Jain<b></h4></div>";
      }
	}
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: result-mailer@toce-results.cf' . "\r\n";
	$to=$_POST['email'];
	$subject="Result Email";
	$body=$msg;
	if($flag==0)
		{
		echo "<script>alert('Result Unavailable!');</script>";
		return false;
		}
	else
		{
		$error = 'Message sent!';mail($to,$subject,$body,$headers);
		echo "<script>alert('Result Mailed!');</script>";return true;
		}
}
?>
<html>
<title>Result Mailer|Toce Results</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Get results via Email for CBCS and NON-CBCS Scheme under VTU.">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="icon" href="./images/logo.png"></link>
<body>
<nav class="navbar" style="margin-bottom:0px;">
  <div class="container-fluid" style="margin-bottom:0px;">
    <div class="navbar-header" style="margin-bottom:0px;">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"><b>.</b></span>
        <span class="icon-bar"><b>.</b></span>
        <span class="icon-bar"><b>.</b></span>
      </button>
<a href="index.html"><h1 id="head1" class="navbar-brand navbar-text" style=" color:black; font-size:40px;">Toce-Results</h1></a>
	</div>
	 <div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav navbar-right navbar-text" style="font-size:34px;" >
      <li><a href="index.html">Home</a></li>
      <li><a href="contact.html">Feedback</a></li>
      <li><a href="./dbms/index.html">DBMS Project</a></li>
    </ul>
	</div>
	</div>
</nav>
 <div class="col-title"><h1 style="text-align:center; color:navy; font-size:40px;"><strong>Result Mailer</strong></h1></div>
<hr/>
<div class="container">
	 <h3 align="center" >Result will be mailed if available on VTU site.</h3>
	<fieldset style="text-align:center;background-color:rgb(17, 92, 155);">
 	 <h3 style="text-align:center; font-size:30px; color:white;">Enter the USN here.</h3>
	<form method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>>
	 <h3 style="text-align:center;font-size:30px; color:white;"><strong>USN:</strong></h3>
	 <input name="usn" placeholder="Enter usn here" size="20" pattern="[1-4]{1}[a-z]{2}[1-9]{2}[a-z]{2}[0-9]{3}" autocomplete="off" required style="display:inline-block; align:center;" value=""></input>
	 <br/>

	 <br/>
         <h3 style="text-align:center;font-size:30px; color:white;"><strong>Email:</strong></h3>
	 <input name="email" placeholder="Enter email here" size="20" autocomplete="off" required style="display:inline-block; align:center;" type="email" value=""></input>
	 <br/>
	 <h3 style="text-align:center;font-size:30px; color:white;"><strong>Scheme:</strong></h3>
	 	 <select size="1" required="required" name="scheme" autocomplete="off" required>
            <option selected="selected" value="0" disabled>-----</option>
            <option value="cbcs">CBCS</option>
            <option value="non_cbcs">Non-CBCS</option>
		</select>
	 <br/><br/>
	 <button class="btn" style="background-color:inherit; border:1px solid white; color:white; padding:5px 25px;" value="submit1" name="submit"><strong>SUBMIT</strong></button>
</form>
</fieldset>
</div>
<hr/>
<div class="footer container-fluid" style="width:99%; ">
<a href="https://github.com/rahuljain5" ><img src="./images/github_icon.png" alt="github logo" height="40px" width="40px" ></img></a>
<a href="profile.html" ><img src="./images/hireme_icon.png" alt="Hireme logo" height="40px" width="40px" ></img></a>
<h4 style="float:right;">By <b>Rahul Jain<b></h4>
</div>
</body>
</html>
