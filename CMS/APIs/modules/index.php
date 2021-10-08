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
$response["API"] = "Module API";

// Special Response
$response["Flags"] = array();
$response["Code"] = "";
$response["Method"] = $_SERVER['REQUEST_METHOD'];

if ($ata["Session"]["_WHO"] == 1) {
	if (count($PURLi) > 2) {
		if (file_exists($myfolder."/pages/sppage/".$PURLi[2]."/api.php")) {
			$response["Code"] .= file_get_contents($myfolder."/APIs/".$PURLi[1]."/js.js");
			include($myfolder."/pages/sppage/".$PURLi[2]."/api.php");
		} else $response["Error"] = "Module not found!";
	} else $response["Error"] = "Module is needed!";
} else $response["Error"] = "No Permission!";
// Finish
echo json_encode($response);
exit();
?>