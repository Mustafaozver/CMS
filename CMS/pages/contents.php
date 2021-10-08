<?php

function setCONTENTTag($innerHTML, $classnames) {
	$_body = "<DIV id=\"content\" class=\"".$classnames."\">";
	if (is_array($innerHTML)) {
		$_body .= "<DIV class=\"container-fluid\">";
		for ($i=0;$i<count($innerHTML);$i++) {
			$_body .= "<DIV class=\"row\">".$innerHTML[$i]."</DIV>";
		}
		$_body .= "</DIV></DIV>";
	} else {
		$_body .= $innerHTML."</DIV>";
	}
	return $_body;
}

?>