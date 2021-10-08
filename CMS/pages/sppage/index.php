<?php
$_head->TITLE = $result["Name"];
$LINKdescription["content"] = $result["Description"];
$LINKkeywords["content"] = $result["Keywords"];
$LINKtitle["content"] = $result["Name"];

$headertag = setHEADERTag($result["Header"],"header");
$contentsection = setCONTENTTag(Array($result["Content"]),"content");

?>