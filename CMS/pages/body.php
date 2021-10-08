<?php

$_body = simplexml_load_string("<BODY></BODY>");
function setBODYTag($innerHTML) {
	global $_body;
	$content_ = "%%CONTENT%%";
	$_body->addChild("DIV",$content_)->addAttribute("class","wrapper");
	setSTARTERTag($_body,"");
	return str_replace($content_,$innerHTML,$_body->asXML());
}

?>