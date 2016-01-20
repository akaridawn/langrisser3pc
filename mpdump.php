#!/usr/bin/php -q
<?php

echo ("mpdump v0.3 (cli)\nCopyright (c) 2003, 2015 Derrick Sobodash\n");
set_time_limit(6000000);

if ($argc < 2) { die; }
else { $path = $argv[1]; }

// Simple routine to read in a directory listing and split it to an array
$mydir="";
$orgfile = "$path";
if ($handle = opendir($orgfile)) {
	while (false !== ($file = readdir($handle))) { 
		$mydir .= $orgfile . "/$file\n";
	}
	closedir($handle);
}
$filelist = split("\n", $mydir);

for ($z=2; $z < (count($filelist)-1); $z++) {
	$fd = fopen ($filelist[$z], "rb");
	$type = fread($fd, 3);
	if($type != "MP" . chr(0)) { break; print "Not an MP file!\n"; }
	
}

?>
