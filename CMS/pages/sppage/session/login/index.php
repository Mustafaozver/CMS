<?php
$_head->TITLE = "About - ATA.PHP";
$LINKdescription["content"] = "This is a page about me";
$LINKkeywords["content"] = "About, me";
$LINKtitle["content"] = "About Page";

$TargetID = $ata["Session"]["ID"];
AddExtraJSCode("".
	"ATA.id = \"".$TargetID."\";".
"");

$navbar = "";
$headertag = "";
$footertag = "";
$contentsection = "<div class=\"wrapper auth-content\">".
	"<div class=\"card\" style=\"margin-right:auto;margin-left: auto;margin-top:2em;\">".
		"<div class=\"card-body text-center\">".
			"<div class=\"mb-4\">".
				"<h2>Log in</h2>".
				//"<img class=\"brand\" src=\"assets/img/bootstraper-logo.png\" alt=\"bootstraper logo\">".
			"</div>".
			"<h6 class=\"mb-4 text-muted\">Sign in to your account</h6>".
			"<form action=\"/api/session\" method=\"post\">".
				"<input type=\"hidden\" name=\"TargetID\" value=\"".$TargetID."\" />".
				"<input type=\"hidden\" name=\"Task\" value=\"SINGIN\" />".
				"<div class=\"form-group\">".
					"<input name=\"EMail\" type=\"email\" class=\"form-control\" placeholder=\"Email\" required>".
				"</div>".
				"<div class=\"form-group\">".
					"<input name=\"Password\" type=\"password\" class=\"form-control\" placeholder=\"Password\" required>".
				"</div>".
				"<div class=\"form-group text-left\">".
					"<div class=\"custom-control custom-checkbox\">".
						"<input type=\"checkbox\" name=\"remember\" class=\"custom-control-input\" id=\"remember-me\">".
						"<label class=\"custom-control-label\" for=\"remember-me\">Remember me</label>".
					"</div>".
				"</div>".
				"<button class=\"btn btn-primary shadow-2 mb-4\">Login</button>".
			"</form>".
			"<p class=\"mb-2 text-muted\">Forgot password? <a href=\"resetpassword\">Reset</a></p>".
			"<p class=\"mb-0 text-muted\">Don’t have an account? <a href=\"register\">Signup</a></p>".
		"</div>".
	"</div>".
"</div>";

/*



*/

?>