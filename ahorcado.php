<?php

if(isset($_POST['resultado'])){
	$p=$_POST['resultado'];
	echo '<pre>';
	print_r($_POST['letras']);
	echo '</pre>';
}
else{
	include 'palabras.php';
	$p=$palabras[rand(1,count($palabras))-1];
}

function formulario_resolver($p){
	$r=null;
	$r.='<form method="post">';
	for($i=0;$i<strlen($p);$i++){
		if(isset($_POST['letras'][$i]))
			$v=$_POST['letras'][$i];
		else $v='';
		$r.='<input name="letras[]" value="'.$v.'" size="1">';
	}
	$r.='<input type="hidden" name="resultado" value="'.$p.'">';
	$r.='<button>Resolver</button>';
	$r.='</form>';
	return $r;
}

echo formulario_resolver($p);