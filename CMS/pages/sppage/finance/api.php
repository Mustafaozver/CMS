<?php

try {
	$r = new HttpRequest('http://example.com/form.php', HttpRequest::METH_POST);
	$response["Code"] .= "console.log(".$r->send()->getBody().");";
} catch (Exception $e) {
	
}


if (isset($_REQUEST["RUNTIME"])) {
	$response["Type"] = "RUNTIME";
	$response["Data"] = Array();
};

$currencyname = @$_REQUEST["CURR"];
$time = @$_REQUEST["TIME"];

switch(@$_REQUEST["F"]) {
	default:
		$response["Code"] .= "ATA.Modules.Finance.Currency = \"".$ata["Company"]["Currency"]."\";";
		$response["Code"] .= "ATA.Modules.Finance.CurrencySign = ".json_encode($ata["Session"]["Finance"][$ata["Company"]["Currency"]][2]).";";
	case "CHECK":
		$response["Code"] .= "setTimeout(\"ATA.Modules.Finance.Check();\",".(1000*60*5).");";
	break;
	case "CURRENCY":
		//$___xx = rand(1000, 1000+5)/1000;
		$Currency_Value = isset($ata["Session"]["Finance"][$currencyname])?$ata["Session"]["Finance"][$currencyname][1]:0;
		//$Currency_Name = isset($ata["Session"]["Finance"][$currencyname])?$ata["Session"]["Finance"][$currencyname][0]:"None";
		$Currency_Symbol = isset($ata["Session"]["Finance"][$currencyname])?strtoupper($currencyname):0;
		$response["Code"] .= "ATA.Modules.Finance.Currencies[\"".$Currency_Symbol."\"] = ".number_format($Currency_Value, 2, '.', '').";";
	break;
	case "CURRENCYALL":
		$response["Code"] .= "(async function(){";
		$currencynames = explode(",",strtoupper($currencyname));
		for ($_i=0;$_i<count($currencynames);$_i++) {
			$response["Code"] .= "ATA.Modules.Finance.Currencies[\"".$currencynames[$_i]."\"] = ".number_format($ata["Session"]["Finance"][$currencynames[$_i]][1], 2, '.', '').";";
		}
		$response["Code"] .= "setTimeout(\"ATA.Modules.Finance.Check2();\",".(1000*5).");";
		$response["Code"] .= "})();";
	break;
	case "ASSET":
		$Currency_Symbol = isset($ata["Session"]["Finance"][$currencyname])?strtoupper($currencyname):0;
		$Currency_Value = ReadRows("Balances", "UserID='".$ata["Session"]["User"]["ID"]."' AND Currency='".$Currency_Symbol."'");
		if ($Currency_Value) $response["Code"] .= "ATA.Modules.Finance.Assets[\"".$Currency_Symbol."\"] = ".$Currency_Value["Volume"].";";
		else $response["Code"] .= "ATA.Modules.Finance.Assets[\"".$Currency_Symbol."\"] = 0;";
		//$response["Code"] .= "setTimeout(\"ATA.Modules.Finance.Check2();\",".(1000*60*5).");";
	break;
	
	
	
	
	
	case "LIST":
		$response["Code"] .= "(async function(){".
			"var code = await ATA.ReadHttpData(\"/api/modules/messages\",{F:\"WINDOW\"});".
			"ATA.modalWindow(code.Title,code.Body);".
		"})();";
	break;
}

//$response["Code"] .= "console.log(".json_encode($response["Code"]).");";
?>