<?php

$palabras=[
	'fondo',
	'hondo',
	'abuela',
	'santander',
];

include 'palabras.php';

$n=round(rand());
$p=$palabras[rand(1,count($palabras))-1];

echo $p;