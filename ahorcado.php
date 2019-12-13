<?php

if(isset($_GET['letras'])){
	echo '<pre>';
	print_r($_GET['letras']);
	echo '</pre>';
}

$palabras=[
	'fondo',
	'hondo',
	'abuela',
	'santander',
];

include 'palabras.php';

$n=round(rand());
$p=$palabras[rand(1,count($palabras))-1];

function formulario_resolver($p){
	$r=null;
	$r.='<form>';
	for($i=0;$i<strlen($p);$i++)
		$r.='<input name="letras[]" size="1">';
	$r.='<button>Resolver</button>';
	$r.='</form>';
	return $r;
}

echo formulario_resolver($p);