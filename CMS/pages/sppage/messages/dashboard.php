<?php

AddDashboardContainer("".
	"<div class=\"card-body\" id=\"calendarDiv0\"></div>".
"");

AddDashboardHeader("".
	"<div class=\"content btn-outline-succes\">".
		"<div onclick=\"ATA.Modules.Messages.MessageList();\" class=\"row\">".
			"<div class=\"col-sm-4\">".
				"<div class=\"icon-big text-center\">".
					"<i class=\"orange fa fa-envelope\"></i>".
				"</div>".
			"</div>".
			"<div class=\"col-sm-8\">".
				"<div class=\"detail text-center\">".
					"<p>Messages</p>".
					"<span id=\"messages_module_number\" class=\"number\">...</span>".
				"</div>".
			"</div>".
		"</div>".
		"<div class=\"footer\">".
			"<hr/>".
			"<div class=\"stats\">".
				"<i class=\"fa fa-envelope\"></i> Active in the last 7 days".
			"</div>".
		"</div>".
	"</div>".
"");

AddExtraJSCode(file_get_contents($myfolder."/pages/sppage/".$file2."/dashboard.js"));

?>