<?php
include('simple_html_dom.php');
include('func.php');
if(isset($_POST['submit']))
{
	if(verify($_POST['scheme'])==1)
	$url="http://results.vtu.ac.in/cbcs_".date("y")."/result_page.php?usn=";
else $url="http://results.vtu.ac.in/results".date("y")."/result_page.php?usn=";
	if(strlen($_POST['usn'])<=8)
	{
		echo "<meta name=viewport content=width=device-width, initial-scale=1>";
		$sub=NULL;
		$flag=false;
		$dom=new simple_html_dom();
		$usn=strtolower(verify($_POST['usn']));
		$url.=$usn;
		if($usn!=NULL)
		{
			$tags="<meta name=viewport content=width=device-width, initial-scale=1><link rel=stylesheet href=bootstrap.min.css></link><script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script><script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script><link rel=\"stylesheet\" href=\"bootstrap.min.css\">";
			echo $tags;
			for($index=1;$index<130;$index++)
			{
				//make index 3 digit
				if($index<100) $index=str_pad($index, 3, "0", STR_PAD_LEFT);
				$dom = file_get_html($url.$index);
				if($dom!=NULL)
				{
					$sub=proc($dom);
				}
				if($sub!=NULL)
				{
						display($sub);$flag=true;
				}
			}
		}
	if(!$flag)
	{
		die("<h1 style='text-align:center'>NO RESULT FOUND</h1>");
	}
	}
}
?>
<title>Class Result VTU</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="VTU Results, toce results, multiple vtu results, classwise results,cbcs vtu result,vtu cbcs scheme results,toce multiple results, results vtu"/>
<meta name="description" content="Get results for the whole class, enter the first 7 digits of the USN and find class result for CBCS and NON-CBCS Scheme under VTU.">
<meta name="robots" content="index,follow">
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
<br/><div class="row">
		<div class="col-md-4" align="center">
			<a href="1ox14cs.html"><button class="btn homebutton" style="display:inline-block; vertical-align:middle; padding:15px 10px; box-sizing:border-box; border:2px solid white;"><b>1ox14cs (Non-CBCS)</b></button></a>
		</div>
		<div class="col-md-4" align="center">
			<a href="1ox13cs.html"><button class="btn homebutton" style="display:inline-block; vertical-align:middle; padding:15px 10px; box-sizing:border-box; border:2px solid white;"><b>1ox13cs(Non-CBCS)</b></button>
		</div>
		<div class="col-md-4" align="center">
			<a href="1ox15cs.html"><button class="btn homebutton" style="display:inline-block; vertical-align:middle; padding:15px 10px; box-sizing:border-box; border:2px solid white;"><b>1ox15cs(CBCS)</b></button></a>
		</div>
	</div>
	<br/>
<div class="col-title"><h1 style="text-align:center; color:navy; font-size:40px;"><strong>Class Result</strong></h1></div>
	 </div><hr/>
	<fieldset style="text-align:center;">
 	 <h3 style="text-align:center; font-size:30px;">Enter the first 7 letters of the USN.</h3>
<form method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>>
	 <h3 style="text-align:center;font-size:30px;"><strong>USN:</strong></h3>
	 <input name="usn" placeholder="First 7 digits of usn here" size="20" pattern="[1-4]{1}[a-z A-Z]{2}[1-9]{2}[A-Z a-z]{2}" autocomplete="off" required style="display:inline-block; align:center;" value=""></input>
	 <br/>
	 <input name="scheme" size="20" autocomplete="off" required style="display:none; align:center;" value="<?php echo verify($_GET['scheme']);?>"></input>
	 <br/>
	 <button class="btn" style="display:inline-block; vertical-align:middle; padding:10px 10px; background:inherit; box-sizing:border-box; border:2px solid black;" value="submit1" name="submit"><strong>SUBMIT</strong></button>
</form>
</fieldset>
<hr/>
<div class="footer container-fluid" style="vertical-align:bottom;  width:99%; ">
<a href="https://github.com/rahuljain5" ><img src="./images/github_icon.png" alt="github logo" height="40px" width="40px" ></img></a>
<a href="profile.html" ><img src="./images/hireme_icon.png" alt="Hireme logo" height="40px" width="40px" ></img></a>
<h4 style="float:right;">By <b>Rahul Jain<b></h4>
</div>
</body>
</head>
</html>
