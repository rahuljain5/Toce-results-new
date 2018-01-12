<?php
function process($str)
{
	$sub=NULL;
	if(strpos($str,"alert(\"University Seat Number is not available or Invalid..!\");")==false)
			{
			$sub="<div class=\"panel-heading text-center\">";
			$strt=strrpos($str,"<span class=\"glyphicon glyphicon-globe\"></span>");
			$end=strpos($str,"<div class=\"panel-heading text-center\" style=\"background-color: rgba(163, 102, 47, 0.5);color: black;font-size: 15pt;\"><span class=\"glyphicon glyphicon-th-list\">");
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
	//CUrl and return the dom
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
	return $result;
}
?>
