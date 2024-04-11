<?php

$configs = require_once __DIR__.'config.inc.php'; 

$iva = $configs['valor_iva'];  
$precioInicial = $argv[1];
$precioConIVA = $precioInicial * (1 + $iva);

echo "Valor del IVA: ".($iva * 100).".PHP_EOL";
echo "Sin IVA: \$$precioInicial, con IVA: \$$precioConIVA".PHP_EOL;
