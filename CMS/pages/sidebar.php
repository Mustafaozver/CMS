<?php

function setSIDEBARSection($innerHTML, $classnames) {
	$body = "<NAV id=\"sidebar\" class=\"".$classnames."\">";
	$body .= $innerHTML;
	$body .= "</NAV>";
	return $body;
}

?>