<?php

function RandomString($len) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randstring = '';
	for ($i = 0; $i < $len; $i++) $randstring = $characters[rand(0, strlen($characters))];
	return $randstring;
}

?>