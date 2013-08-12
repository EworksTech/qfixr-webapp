<?php

header('Content-Type: application/json');
if($tecnico == NULL){
	$tecnico["status"] = "error";
} 
echo utf8_decode(json_encode($tecnico));

?> 