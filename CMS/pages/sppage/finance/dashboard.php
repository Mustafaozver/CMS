<?php

/*
AddDashboardContainer("".
	"<div class=\"card-body\" id=\"calendarDiv0\"></div>".
"");*/

AddDashboardHeader("".
	"<div class=\"content btn-outline-succes\">".
		"<div onclick=\"ATA.Modules.Finance.MessageList();\" class=\"row\">".
			"<div class=\"col-sm-4\">".
				"<div class=\"icon-big text-center\">".
					"<i class=\"olive fa fa-money\"></i>".
				"</div>".
			"</div>".
			"<div class=\"col-sm-8\">".
				"<div class=\"detail text-center\">".
					"<p>Total</p>".
					"<span id=\"finance_module_number\" class=\"number\">...</span>".
				"</div>".
			"</div>".
		"</div>".
		"<div class=\"footer\">".
			"<hr/>".
			"<div class=\"stats\">".
				"<i class=\"fa fa-money\"></i> <span id=\"finance_module_notification\" class=\"number\">...</span>".
			"</div>".
		"</div>".
	"</div>".
"");

$extracodesFinance = "";
foreach ($ata["Session"]["Finance"] as $param => $value) $extracodesFinance .= "ATA.Modules.Finance.Currencies[\"".$param."\"] = ".$value[1].";";


AddExtraJSCode(file_get_contents($myfolder."/pages/sppage/".$file2."/dashboard.js"));
AddExtraJSCode($extracodesFinance);
?>