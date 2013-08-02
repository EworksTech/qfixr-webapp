<?php

header('Content-Type: application/json');
$merge = array_merge($dbchamado,$dbcliente);
echo utf8_decode(json_encode($merge));

?> 