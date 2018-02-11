<?php
function process($str)
{
	$sub=NULL;
	if(strpos($str,"alert(\"University Seat Number is not available or Invalid..!\");")==false)
			{
			$sub="<div class=\"panel-heading text-center\">";
			$strt=strrpos($str," <img src=\"../images/vtulogosmall_2.png\" style=\"left:30%;position: absolute;text-align: center;\">") + 97;
			$end=strpos($str,"<div class=\"panel-heading text-center\" style=\"color:#0e1819;font-size: 12pt;background-color:#68d37b99\"><span class=\"glyphicon glyphicon-th-list\"></span>");
			$end-=$strt;
			$sub.=substr($str,$strt,$end);
			$sub.="</div></div></div>";
			}
	return $sub;
}
function display($str)
{
		ob_start();
		echo $str;
		ob_flush();
		flush();
}
function verify($str)
{
  $data = trim($str);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function fetch_result($id, $url)
{
	//CURL and return the dom
	$ch = curl_init();
	$curlConfig = array(
	    CURLOPT_URL            => $url,
	    CURLOPT_POST           => true,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_POSTFIELDS     => array('usn' => $id)
	);
	curl_setopt_array($ch, $curlConfig);
	$result = curl_exec($ch);
	curl_close($ch);
	// echo $result;
	return $result;
}
?>
