<?php

function FaIcon($type) {
	return "<I class=\"fa fa-".$type."\"></I>";
}

function BoBtn($innerHTML, $classnames) {
	return "<BUTTON type=\"button\" class=\"btn ".$classnames."\">".$innerHTML."</BUTTON>";
}

function BoNum($innerHTML, $type) {
	return "<SPAN class=\"badge badge-".$type."\">".$innerHTML."</SPAN>";
}

function BoCard($title,$img,$innerHTML,$innerHTML2) {
	return "".
	"<div class=\"col-md-12\">".
		"<div class=\"row\">".
			"<div class=\"col-md-12\">".
				"<div class=\"card\">".
					(count($img)>0?"<img class=\"card-img-top\" src=\"".$img."\">":"").
					(count($title)>0?"<h5 class=\"card-header\">".$title."</h5>":"").
					"<div class=\"card-body\">".
						"<p class=\"card-text\">".$innerHTML."</p>".
					"</div>".
					(count($innerHTML2)>0?"<div class=\"card-footer\">".$innerHTML2."</div>":"").
				"</div>".
			"</div>".
		"</div>".
	"</div>";
}

function BoAlert($title, $innerHTML, $type) {
	return "<div class=\"alert alert-".$type."\"><h5 class=\"alert-title\">".$title."</h5>".$innerHTML."</div>";
}

function setHTMLExtras() {
	$body = "<div class=\"modal\" tabindex=\"-1\" id=\"modalwindow\" role=\"dialog\">".
		"<div class=\"modal-dialog\" role=\"document\">".
			"<div class=\"modal-content\">".
				"<div class=\"modal-header\">".
					"<h5 class=\"modal-title\">Modal title</h5>".
					"<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\" onclick=\"ATA.modalWindow_setresult(false);\">".
						"<span aria-hidden=\"true\">&times;</span>".
					"</button>".
				"</div>".
				"<div class=\"modal-body\">".
				"</div>".
				"<div class=\"modal-footer\">".
					"<button id=\"modalWindow_NOButton\" style=\"display:none;\" type=\"button\" class=\"btn btn-primary\" onclick=\"ATA.modalWindow_setresult('NO');\">NO</button>".
					"<button id=\"modalWindow_YESButton\" style=\"display:none;\" type=\"button\" class=\"btn btn-primary\" onclick=\"ATA.modalWindow_setresult('YES');\">YES</button>".
					"<button id=\"modalWindow_OKButton\" style=\"display:none;\" type=\"button\" class=\"btn btn-primary\" onclick=\"ATA.modalWindow_setresult('OK');\">OK</button>".
					"<button id=\"modalWindow_CloseButton\" style=\"display:none;\" type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\" onclick=\"ATA.modalWindow_setresult(false);\">Close</button>".
				"</div>".
			"</div>".
		"</div>".
	"</div>";
	
	return $body;
}

?>