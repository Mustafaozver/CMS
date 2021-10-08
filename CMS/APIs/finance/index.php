<?php
/*

ATA.PHP V3.0
Örnek API dosyası

*/

// Setup
$response = array();
$response["VERSION"] = $ata["clientside"]["VERSION"];
$response["TargetID"] = @$_POST["TargetID"];
$response["Time"] = $ata["Time"];
$response["API"] = "Finance API";

// Special Response
$response["Flags"] = array();
$response["Code"] = "";
$response["Method"] = $_SERVER['REQUEST_METHOD'];
// temp
/*
$response["Code"] .= "console.log(\"Sistem Cevabı\");";
$response["Code"] .= "console.log(ATA.Flags);";
$response["Code"] .= file_get_contents($myfolder."/APIs/".$PURLi[1]."/js.js");*/


$_f = isset($_REQUEST["F"])?$_REQUEST["F"]:"";
$Currencies = Array();

switch($_f) {
	default:
	case "":
		foreach ($ata["Session"]["Finance"] as $param => $value) {
			$Currencies["".$param] = $value[1];
		}
	break;
	case "ONE":
	case "1":
		$currencyname = @$_REQUEST["CURR"];
		$time = @$_REQUEST["TIME"];
		if(isset($currencyname)) {
			if(isset($time)) {
				$Currency_Value = isset($ata["Session"]["Finance"][$currencyname])?$ata["Session"]["Finance"][$currencyname][1]:0;
				//$Currency_Name = isset($ata["Session"]["Finance"][$currencyname])?$ata["Session"]["Finance"][$currencyname][0]:"None";
				$Currency_Symbol = isset($ata["Session"]["Finance"][$currencyname])?strtoupper($currencyname):0;
				$Currencies[$Currency_Symbol] = $Currency_Value;
			} else {
			}
		} else {
			if(isset($time)) {
			} else {
			}
		}
	break;
}

$response["Code"] .= "____(".json_encode($Currencies).");";

// Finish
echo json_encode($response);
exit();
?>