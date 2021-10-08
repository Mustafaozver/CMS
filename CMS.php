<?php
/*

ATA.PHP V3.0

Çalışma sisteminin ana dosyasıdır
Gerekli ve önemli değilse değişlik yapmayın.

*/

// System setup
$myfolder = "CMS";
include($myfolder."/setup.php");
include($myfolder."/settings.php");
include($myfolder."/libraries.php");

// Page settings
$ata["URLsPs"] = parse_url($_SERVER["REQUEST_URI"]);
$PURLi = explode("/",substr($ata["URLsPs"]["path"],1));

// Database setup
include($myfolder."/database.php");

// Session setup
if ($ata["Session"]["active"]) include($myfolder."/session.php");

// DataSets
include($myfolder."/datasets.php");

// Addons Setup
$folder = opendir($addons);
while (($file = readdir($folder)) !== false) {
	if (file_exists($addons.$file."/index.php")) include($addons.$file."/index.php");
}
closedir($folder);

// Language setup
$ata["Lang"] = ReadCookie("Lang","EN");
include($myfolder."/Langs/".$ata["Lang"].".php");

// Page system setup
switch(strtolower($PURLi[0])) {
	// pages for the system core
	case "api":
		include($myfolder."/APIs/index.php");
	break;
	/*
	case "rss": // cancelled !
		include($myfolder."/rss/index.php");
	break;
	case $ata["Lang"]["download"]: // cancelled !
		include($myfolder."/download/index.php");
	break;
	case $ata["Lang"]["go"]: // cancelled !
		include($myfolder."/go/index.php");
	break;
	*/
	// pages and files for users
	default:
		if (file_exists($myfolder."/pages".$_SERVER["REQUEST_URI"])) {
			if (is_dir($myfolder."/pages".$_SERVER["REQUEST_URI"])) {
				if ($ata["ShowFolders"]) include($myfolder."/pages/folders.php");
			} else {
				include($myfolder."/pages/files.php");
				mysqli_close($_db);
				die();
			}
		}
	case "": // building a page
		libxml_use_internal_errors(true);
		$onthemainpage = strtolower($PURLi[0]) == $ata["Lang"]["mainpage"] || $PURLi[0] == "";
		include($myfolder."/pages/html.php");
		include($myfolder."/pages/head.php");
		include($myfolder."/pages/css.php");
		include($myfolder."/pages/js.php");
		include($myfolder."/pages/body.php");
		include($myfolder."/pages/header.php");
		include($myfolder."/pages/sidebar.php");
		include($myfolder."/pages/contents.php");
		include($myfolder."/pages/footer.php");
		include($myfolder."/pages/starters.php");
		if ($onthemainpage) {
			include($myfolder."/pages/index.php");
		} else switch (strtoupper($PURLi[0])) {
			case "PPL": // people profile page 1234567890 break
			break;
			case "COM": // company page
			break;
		}
		include($myfolder."/pages/completers.php");
	break;
}

// Finish
include($myfolder."/closer.php");
?>