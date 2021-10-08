<?php

$ExtraJSCodes = Array();

function IUJavascript() {
	global $ExtraJSCodes;
	global $ata;
	$jscodes = "
$(document).ready(function(){
	ATA.Setups.push(function() {
		console.log(\"ATA started at \"+ATA.startTime+\".\");
	});
	ATA.Loops.push(function(ndate) {
		console.log(\"ATA updated periodically at \"+ndate+\".\");
	});
    ATA.setup();
	ATA.id = \"".$ata["Session"]["ID"]."\";
	ATA.sessionName = \"".$ata["Session"]["Name"]."\";
});";
	$jscodes .= implode(";", $ExtraJSCodes);
	//$jscodes = str_replace("\n","",$jscodes);
	//$jscodes = str_replace("\r","",$jscodes);
	return str_replace("\n","",$jscodes);
}

function AddExtraJSCode($code) {
	global $ExtraJSCodes;
	array_push($ExtraJSCodes, $code);
}

function setSTARTERTag(&$body, $index) {
	global $ata;
	$body->addChild("SCRIPT","ATA.clientside = ".json_encode($ata["clientside"]).";");
	$body->addChild("SCRIPT","eval(atob(\"".base64_encode(IUJavascript())."\"));");
	return $body;
}

?>