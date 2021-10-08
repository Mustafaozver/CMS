<?php

function ReadCookie($cookie, $value=false) {
	global $ata;
	if (isset($_COOKIE[$ata["Session"]["Name"]."_".$cookie])) return $_COOKIE[$ata["Session"]["Name"]."_".$cookie];
	else if (!$value) WriteCookie($cookie, $value);
	return $value;
}

function WriteCookie($cookie, $value) {
	global $ata;
	setcookie($ata["Session"]["Name"]."_".$cookie, $value, 0, '/');
	$_COOKIE[$ata["Session"]["Name"]."_Lang"] = $value;
}

function ReadSetting($param) {
	global $ata;
	$result = ReadRows("settings","Name=\"".$param."\" AND UserID=".((@$ata["Session"]["_WHO"] == 1)?$ata["Session"]["ID"]:"0"));
	if (isset($result["ID"])) return $result["Value"];
	else if (isset($result[0])) $result[0]["Value"];
	else {
		$result = ReadRows("settings","Name=\"".$param."\" AND UserID=0");
		if (isset($result["ID"])) return $result["Value"];
		else if (isset($result[0])) $result[0]["Value"];
		else return false;
	}
}

function WriteSetting($param, $value) {
	global $ata;
	$esql = "";
	if (@$ata["Session"]["_WHO"] == 1) $esql = " AND UserID=".$ata["Session"]["ID"];
	else $esql = " AND UserID=0";
	if (!RunQuery("UPDATE settings SET value=\"".$value."\" WHERE Name=\"".$param."\"".$esql)) {
		return RunQuery("INSERT INTO settings (Name,Value,UserID) VALUES (\"".$value."\",\"".$param."\"".((@$ata["Session"]["_WHO"] == 1)?$ata["Session"]["ID"]:0).");");
	}
	return false;
}

$ata["clientside"] = array();
$ata["clientside"]["VERSION"] = "ATA.JS V3.0 System Core";
$ata["clientside"]["Domain"] = $ata["Domain"];
$ata["clientside"]["Lang"] = $ata["Lang"];
$ata["clientside"]["Mobile"] = $ata["mobile"];
$ata["clientside"]["Domain"] = $ata["Domain"];

$datasetsurl = $myfolder."/datasets/";
if (isset($_SESSION[$session_name])) { // datasets depend on sessions
	include($datasetsurl."user.php");
	include($datasetsurl."campany.php");
	include($datasetsurl."finance.php");
} else { // other datasets
	
}

?>