<?php

$jsf = "/js/"; // $myfolder."/pages/js/";
function addjs($jsfile) {
	global $_head;
	$link = $_head->addChild("SCRIPT","");
	$link->addAttribute("type","text/javascript");
	$link->addAttribute("src",$jsfile);
}

addjs($jsf."jquery.min.js");
addjs($jsf."jquery.form.js");
addjs($jsf."jquery-ui.js");
addjs($jsf."bootstrap.min.js");
addjs($jsf."bootstrap.bundle.min.js");
addjs($jsf."Chart.min.js");
addjs($jsf."dhtml-suite-for-applications.js");
addjs($jsf."js.js");

?>