<?php

$_head = simplexml_load_string("<HEAD></HEAD>");
$_head->addChild("TITLE","ATA.PHP 0");

function addobjtohead($tag) {
	global $_head;
	$obj = $_head->addChild($tag,"");
	return $obj;
}

addobjtohead("META")->addAttribute("charset","UTF-8");

$viewport = addobjtohead("META");
$viewport->addAttribute("name","viewport");
$viewport->addAttribute("content","width=device-width, initial-scale=1");

$windows1254 = addobjtohead("META");
$windows1254->addAttribute("http-equiv","Content-Type");
$windows1254->addAttribute("content","text/html; charset=windows-1254");

$iso8859 = addobjtohead("META");
$iso8859->addAttribute("http-equiv","Content-Type");
$iso8859->addAttribute("content","text/html; charset=iso-8859-9");

$xmturkish = addobjtohead("META");
$xmturkish->addAttribute("http-equiv","Content-Type");
$xmturkish->addAttribute("content","text/html; charset=x-mac-turkish");

addobjtohead("META")->addAttribute("generator","ATA.PHP V3.0");

$xmturkish = addobjtohead("LINK");
$xmturkish->addAttribute("rel","canonical");
$xmturkish->addAttribute("href",$ata["Domain"]);

$icon = addobjtohead("LINK");
$icon->addAttribute("rel","shortcut icon");
$icon->addAttribute("href","/favicon.ico");

$rssURL = addobjtohead("LINK");
$rssURL->addAttribute("title","RSS");
$rssURL->addAttribute("rel","alternate");
$rssURL->addAttribute("type","application/rss+xml");
$rssURL->addAttribute("href","/rss");

$LINKtitle = addobjtohead("LINK");
$LINKtitle->addAttribute("name","title");
$LINKtitle->addAttribute("content","ATA.PHP V3.0");

$LINKdescription = addobjtohead("LINK");
$LINKdescription->addAttribute("name","description");
$LINKdescription->addAttribute("content","a system based on ATA.PHP V3.0");

$LINKkeywords = addobjtohead("LINK");
$LINKkeywords->addAttribute("name","keywords");
$LINKkeywords->addAttribute("content","ATA.PHP, V3.0, ATA.JS");

$LINKauthor = addobjtohead("LINK");
$LINKauthor->addAttribute("name","author");
$LINKauthor->addAttribute("content","Marcus Mustafa OZVER");

$LINKowner = addobjtohead("LINK");
$LINKowner->addAttribute("name","owner");
$LINKowner->addAttribute("content","Marcus Mustafa OZVER");

$LINKcopyright = addobjtohead("LINK");
$LINKcopyright->addAttribute("name","copyright");
$LINKcopyright->addAttribute("content","(C) 2020");

?>