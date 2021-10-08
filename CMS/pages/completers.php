<?php
include($myfolder."/pages/htmllib.php");
$lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

	/*
	$obj = simplexml_load_string("<x></x>");
	$obj2 = $obj->addChild("x2");
	$obj2 = "lll";
	$obj2->->addAttribute("param","value");
	<x>
	 <x2 param="value">lll</x2>
	</x>
	*/
	$sidebar = setSIDEBARSection("".
			"<div class=\"sidebar-header\">".
				"<img src=\"assets/img/bootstraper-logo.png\" alt=\"bootraper logo\" class=\"app-logo\">".
			"</div>".
			"<ul class=\"list-unstyled components\">".
				"<li>".
					"<a href=\"dashboard.html\">".FaIcon("home")." Dashboard</a>".
				"</li>".
				"<li>".
					"<a href=\"forms.html\">".FaIcon("file-alt")." Forms</a>".
				"</li>".
				"<li>".
					"<a href=\"tables.html\">".FaIcon("table")." Tables</a>".
				"</li>".
				"<li>".
					"<a href=\"charts.html\">".FaIcon("chart-bar")." Charts</a>".
				"</li>".
				"<li>".
					"<a href=\"icons.html\">".FaIcon("icon")." Icons</a>".
				"</li>".
				"<li>".
					"<a href=\"#uielementsmenu\" data-toggle=\"collapse\" aria-expanded=\"false\" class=\"dropdown-toggle no-caret-down\">".FaIcon("down")." UI Elements</a>".
					"<ul class=\"collapse list-unstyled\" id=\"uielementsmenu\">".
						"<li>".
							"<a href=\"ui-buttons.html\"> Buttons</a>".
						"</li>".
						"<li>".
							"<a href=\"ui-badges.html\"> Badges</a>".
						"</li>".
						"<li>".
							"<a href=\"ui-cards.html\"> Cards</a>".
						"</li>".
						"<li>".
							"<a href=\"ui-alerts.html\"> Alerts</a>".
						"</li>".
						"<li>".
							"<a href=\"ui-tabs.html\"> Tabs</a>".
						"</li>".
						"<li>".
							"<a href=\"ui-date-time-picker.html\"> DateTime Picker</a>".
						"</li>".
						"<li>".
							"<a href=\"ui-calendar.html\"> Calendar</a>".
						"</li>".
						"<li>".
							"<a href=\"ui-content-editor.html\"> Content Editor</a>".
						"</li>".
					"</ul>".
				"</li>".
				"<li>".
					"<a href=\"#authmenu\" data-toggle=\"collapse\" aria-expanded=\"false\" class=\"dropdown-toggle no-caret-down\"><i class=\"fa fa-user-shield\"></i> Authentication</a>".
					"<ul class=\"collapse list-unstyled\" id=\"authmenu\">".
						"<li>".
							"<a href=\"login.html\"><i class=\"fa fa-lock\"></i> Login</a>".
						"</li>".
						"<li>".
							"<a href=\"signup.html\"><i class=\"fa fa-user-plus\"></i> Signup</a>".
						"</li>".
						"<li>".
							"<a href=\"forgot-password.html\"><i class=\"fa fa-user-lock\"></i> Forgot password</a>".
						"</li>".
					"</ul>".
				"</li>".
				"<li>".
					"<a href=\"#pagesmenu\" data-toggle=\"collapse\" aria-expanded=\"false\" class=\"dropdown-toggle no-caret-down\"><i class=\"fa fa-copy\"></i> Pages</a>".
					"<ul class=\"collapse list-unstyled\" id=\"pagesmenu\">".
						"<li>".
							"<a href=\"blank.html\"><i class=\"fa fa-file\"></i> Blank page</a>".
						"</li>".
						"<li>".
							"<a href=\"404.html\"><i class=\"fa fa-info-circle\"></i> 404 Error page</a>".
						"</li>".
						"<li>".
							"<a href=\"500.html\"><i class=\"fa fa-info-circle\"></i> 500 Error page</a>".
						"</li>".
					"</ul>".
				"</li>".
				"<li>".
					"<a href=\"users.html\"><i class=\"fa fa-user-friends\"></i>Users</a>".
				"</li>".
				"<li>".
					"<a href=\"settings.html\"><i class=\"fa fa-cog\"></i>Settings</a>".
				"</li>".
			"</ul>".
	"","active");
	$navbar = setNAVIGATIONTag("". // navbar
			"<button type=\"button\" id=\"sidebarCollapse\" class=\"btn btn-outline-light default-light-menu\"><i class=\"fa fa-bars\"></i><span></span></button>".
			"<div style=\"margin-left:auto!important;display:block;\" class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">".
				"<ul class=\"nav navbar-nav ml-auto\">".
					"<li class=\"nav-item dropdown\">".
						"<div class=\"nav-dropdown\">".
							"<a href=\"\" class=\"nav-item nav-link dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-link\"></i> <span>Quick Links</span> <i style=\"font-size: .8em;\" class=\"fa fa-caret-down\"></i></a>".
							"<div class=\"dropdown-menu dropdown-menu-right nav-link-menu\">".
								"<ul class=\"nav-list\">".
									"<li><a href=\"\" class=\"dropdown-item\"><i class=\"fa fa-list\"></i> Access Logs</a></li>".
									"<div class=\"dropdown-divider\"></div>".
									"<li><a href=\"\" class=\"dropdown-item\"><i class=\"fa fa-database\"></i> Back ups</a></li>".
									"<div class=\"dropdown-divider\"></div>".
									"<li><a href=\"\" class=\"dropdown-item\"><i class=\"fa fa-cloud-download-alt\"></i> Updates</a></li>".
									"<div class=\"dropdown-divider\"></div>".
									"<li><a href=\"\" class=\"dropdown-item\"><i class=\"fa fa-user-shield\"></i> Roles</a></li>".
								"</ul>".
							"</div>".
						"</div>".
					"</li>".
					"<li class=\"nav-item dropdown\">".
						"<div class=\"nav-dropdown\">".
							"<a href=\"\" class=\"nav-item nav-link dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> <span>".(@$ata["Session"]["_WHO"]==1?$ata["Session"]["User"]["Name"]:"User")."</span> <i style=\"font-size: .8em;\" class=\"fa fa-caret-down\"></i></a>".
							"<div class=\"dropdown-menu dropdown-menu-right nav-link-menu\">".
								"<ul class=\"nav-list\">".
									"<li><a href=\"\" class=\"dropdown-item\"><i class=\"fa fa-address-card\"></i> Profile</a></li>".
									"<li><a href=\"\" class=\"dropdown-item\"><i class=\"fa fa-envelope\"></i> Messages</a></li>".
									"<li><a href=\"\" class=\"dropdown-item\"><i class=\"fa fa-cog\"></i> Settings</a></li>".
									"<div class=\"dropdown-divider\"></div>".
									"<li><a href=\"/api/session/singout\" class=\"postlink dropdown-item\"><i class=\"fa fa-sign-out-alt\"></i> Logout</a></li>".
								"</ul>".
							"</div>".
						"</div>".
					"</li>".
				"</ul>".
			"</div>".
	"","navbar navbar-expand-lg navbar-primary bg-primary");
	$headtag = $_head->asXML();
	
	$footer_right = "ATA inc";
	$footer_email = "mustafa.ozver@hotmail.com";
	$footer_address = "2704 Ocean Ave Brooklyn, NY, 11229";
	$footer_phone1_1 = "+15515568360";
	$footer_phone1_2 = "+1 (551) 556 8360";
	$footertag = setFOOTERTag("".
		"<div class=\"container pt-4\">".
			"<div class=\"row row-30\">".
				"<div class=\"col-md-4 col-xl-5\">".
					"<div class=\"pr-xl-4\"><a class=\"brand\" href=\"index.html\"><img class=\"brand-logo-light\" src=\"images/agency/logo-inverse-140x37.png\" alt=\"\" width=\"140\" height=\"37\" srcset=\"images/agency/logo-retina-inverse-280x74.png 2x\"></a>".
						"<p>".$lorem."</p>".
						"<p class=\"rights\"><span>©  </span><span class=\"copyright-year\">2020</span><span> </span><span>".$footer_right."</span><span>. </span><span>All Rights Reserved.</span></p>".
					"</div>".
				"</div>".
				"<div class=\"col-md-4\">".
					"<h5>Contacts</h5>".
					"<dl class=\"contact-list\">".
						"<dt>Address:</dt>".
						"<dd>".$footer_address."</dd>".
					"</dl>".
					"<dl class=\"contact-list\">".
						"<dt>E-Mail:</dt>".
						"<dd><a href=\"mailto:".$footer_email."\">".$footer_email."</a></dd>".
					"</dl>".
					"<dl class=\"contact-list\">".
						"<dt>Phones:</dt>".
						"<dd><a href=\"tel:".$footer_phone1_1."\">".$footer_phone1_2."</a>".// <span>or</span> <a href=\"tel:#\">https://karosearch.com</a>
						"</dd>".
					"</dl>".
				"</div>".
				"<div class=\"col-md-4 col-xl-3\">".
					"<h5>Links</h5>".
					"<ul class=\"nav-list\">".
						"<li><a href=\"#\">About</a></li>".
						"<li><a href=\"#\">Projects</a></li>".
						"<li><a href=\"#\">Blog</a></li>".
						"<li><a href=\"#\">Contacts</a></li>".
						"<li><a href=\"#\">Pricing</a></li>".
					"</ul>".
				"</div>".
			"</div>".
		"</div>".
		"<div class=\"row no-gutters social-container\">".
			"<div class=\"col\"><a class=\"social-inner\" href=\"#\"><i class=\"fa fa-facebook\"></i></a></div>".
			"<div class=\"col\"><a class=\"social-inner\" href=\"#\"><i class=\"fa fa-instagram\"></i></a></div>".
			"<div class=\"col\"><a class=\"social-inner\" href=\"#\"><i class=\"fa fa-twitter\"></i></a></div>".
			"<div class=\"col\"><a class=\"social-inner\" href=\"#\"><i class=\"fa fa-youtube\"></i></a></div>".
		"</div>"
	,"section footer-classic context-dark bg-image");
	if ($onthemainpage) {
		$headertag = setHEADERTag("".
			"<div id=\"demo\" class=\"carousel slide\" data-ride=\"carousel\">".
				"<ul class=\"carousel-indicators\">".
					"<li data-target=\"#demo\" data-slide-to=\"0\" class=\"active\"></li>".
					"<li data-target=\"#demo\" data-slide-to=\"1\"></li>".
					"<li data-target=\"#demo\" data-slide-to=\"2\"></li>".
				"</ul>".
				"<div class=\"carousel-inner\">".
					"<div class=\"carousel-item active\">".
						"<img src=\"img/la.jpg\" alt=\"Los Angeles\" width=\"1100\" height=\"500\">".
						"<div class=\"carousel-caption\">".
							"<h3>Los Angeles</h3>".
							"<p>We had such a great time in LA!</p>".
						"</div>".
					"</div>".
					"<div class=\"carousel-item\">".
						"<img src=\"img/chicago.jpg\" alt=\"Chicago\" width=\"1100\" height=\"500\">".
						"<div class=\"carousel-caption\">".
							"<h3>Chicago</h3>".
							"<p>Thank you, Chicago!</p>".
						"</div>".
					"</div>".
					"<div class=\"carousel-item\">".
						"<img src=\"img/ny.jpg\" alt=\"New York\" width=\"1100\" height=\"500\">".
						"<div class=\"carousel-caption\">".
							"<h3>New York</h3>".
							"<p>We love the Big Apple!</p>".
						"</div>".
					"</div>".
				"</div>".
				"<a class=\"carousel-control-prev\" href=\"#demo\" data-slide=\"prev\">".
					"<span class=\"carousel-control-prev-icon\"></span>".
				"</a>".
				"<a class=\"carousel-control-next\" href=\"#demo\" data-slide=\"next\">".
					"<span class=\"carousel-control-next-icon\"></span>".
				"</a>".
			"</div>".$lorem.""
		,"header");
		$contentsArray = Array();
		/*$url1 = $myfolder."/pages/sppage/";
		$folder1 = opendir($url1);
		while (($file1 = readdir($folder1)) !== false) {
			if (file_exists($url1.$file1."/dashboard.php")) include($url1.$file1."/dashboard.php");
		}
		closedir($folder1);*/
		$contentsection = setCONTENTTag($contentsArray,"1234567890");
	} else {
		if (file_exists($myfolder."/pages/sppage".$ata["URLsPs"]["path"]."/index.php")) {
			$headertag = setHEADERTag("","header");
			$contentsection = setCONTENTTag(Array(),"content");
			include($myfolder."/pages/sppage".$ata["URLsPs"]["path"]."/index.php");
		} else {
			$result = ReadRows("Pages", "URL='".$ata["URLsPs"]["path"]."'");
			if (isset($result["ID"])) {
				$headertag = setHEADERTag("","header");
				$contentsection = setCONTENTTag(Array(),"content");
				include($myfolder."/pages/sppage/index.php");
			} else include($myfolder."/pages/sppage/404.php");
		}
	}
	$htmlextras = setHTMLExtras();
	$bodytag = setBODYTag("".
		$sidebar.
		"<DIV id=\"body\" class=\"active\">".
			$navbar.
			$headertag.
			$contentsection.
			$footertag.
		"</DIV>".
		$htmlextras);
	echo setHTMLTag("".
		$headtag. // head
		$bodytag.
	"");
?>