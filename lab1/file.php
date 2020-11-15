<?php

	$q="php_control.txt";
	$q1=getenv("REMOTE_ADDR");
	$q2=date("M d,Y"); 
	$f=fopen($q,"a");
	fputs($f,$q2);
	fputs($f,"$q1");
	fclose($f);
	
?>