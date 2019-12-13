<?php

$palabras=[
	'fondo',
	'hondo',
	'abuela',
	'santander',
];

$n=round(rand());
$p=$palabras[rand(1,count($palabras))-1];

echo $p;