<?php

function setFOOTERTag($innerHTML, $classnames) {
	$body = "<FOOTER id=\"footer\" style=\"background-color:#2d3246;\" class=\"".$classnames."\">";
	$body .= $innerHTML;
	$body .= "</FOOTER>";
	return $body;
}

?>