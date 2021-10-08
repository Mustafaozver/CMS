<?php

function setNAVIGATIONTag($innerHTML, $classnames) {
	return "<NAV id=\"navbar\" class=\"".$classnames."\">".$innerHTML."</NAV>";
}

function setHEADERTag($innerHTML, $classnames) {
	$_body = "<HEADER id=\"header\" class=\"".$classnames."\">";
	$_body .= $innerHTML."</HEADER>";
	return $_body;
}

?>