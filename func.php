<?php
function proc($str)
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
		echo $str;
}
function verify($str)
{
  $data = trim($str);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
