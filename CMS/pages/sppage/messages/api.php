<?php

if (isset($_REQUEST["RUNTIME"])) {
	$response["Type"] = "RUNTIME";
	$response["Data"] = Array();
	//$response["Data"]["Mustafa"] = "ÖZVER".file_get_contents($myfolder."/pages/sppage/".$PURLi[2]."/dashboard.js");
};

switch(@$_REQUEST["F"]) {
	default:
		$response["Code"] .= "setTimeout(\"ATA.Modules.Messages.Check();\",5000);";
		$response["Code"] .= "ATA.Modules.Messages.Messages=".CountRows("messages", "ReadType=0 AND ToID=".$ata["Session"]["User"]["ID"]."").";";
	break;
	case "READ":
		$MessageID = "".@$_REQUEST["MessageID"];
	break;
	case "LIST":
		$response["Code"] .= "(async function(){".
			"var code = await ATA.ReadHttpData(\"/api/modules/messages\",{F:\"WINDOW\"});".
			"ATA.modalWindow(code.Title,code.Body);".
		"})();";
	break;
	case "WINDOW":
		$response["Title"] = "Messages";
		$response["Body"] = file_get_contents($myfolder."/pages/sppage/".$PURLi[2]."/dashboard_window.html");
		$response["Code"] .= "(async function(){".
			"$(\"#messages_module_list\").html(\"\");".
			"$(\"#messages_module_conlist .tab-content\").html(\"\");".
			"var code = await ATA.ReadHttpData(\"/api/modules/messages\",{F:\"GETMESSAGES\"});".
			"for (var i=0;i<code.Messages.length;i++) {".
				"var Title = code.Messages[i].Title;".
				"var Content = code.Messages[i].Content;".
				"var Time = code.Messages[i].Time;".
				"var FromID = code.Messages[i].FromID;".
				"$(\"#messages_module_list\").append(\"<a class=\\\"nav-link\\\" id=\\\"v-pills-\"+i+\"-tab\\\" data-toggle=\\\"pill\\\" href=\\\"#v-pills-\"+i+\"\\\" role=\\\"tab\\\" aria-controls=\\\"v-pills-\"+i+\"\\\" aria-selected=\\\"true\\\">\"+Title+\"</a>\");".
				"$(\"#messages_module_conlist .tab-content\").append(\"<div class=\\\"tab-pane fade\\\" id=\\\"v-pills-\"+i+\"\\\" role=\\\"tabpanel\\\" aria-labelledby=\\\"v-pills-\"+i+\"-tab\\\">\"+Content+\"</div>\");".
			"}".
		"})();";
	break;
	case "GETMESSAGES":
		$messages = ReadRows("messages", "ToID=".$ata["Session"]["User"]["ID"]." ORDER BY 'Time' DESC LIMIT 0,5");
		$response["Messages"] = $messages;
	break;
}
?>