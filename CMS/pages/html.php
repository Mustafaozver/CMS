<?php

$_html = simplexml_load_string("<HTML>\n</HTML>");
$_html->addAttribute("lang","tr-TR");
$_html->addAttribute("dir","ltr");
$_html->addAttribute("xmlns","http://www.w3.org/1999/xhtml");

function setHTMLTag($innerHTML) {
	global $_html;
	$body = " <!DOCTYPE HTML><HTML";
	foreach($_html->attributes() as $key => $value) {
		$body .= " ".$key."=\"".((string) $value)."\"";
	}
	$body .= ">".$innerHTML."</HTML>";
	return $body;
}

?>