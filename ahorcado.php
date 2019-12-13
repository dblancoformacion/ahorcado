<?php

if(isset($_POST['resultado'])){
	$p=$_POST['resultado'];
}
else{
	include 'palabras.php';
	$p=$palabras[rand(1,count($palabras))-1];
	$p=filtra_palabra($p);
}

function formulario_resolver($p){
	$r=null;
	$r.='<form method="post">';
	for($i=0;$i<iconv_strlen($p);$i++){
		if(
			isset($_POST['letras'][$i]) and
			$_POST['letras'][$i]==$p[$i]
		)
			$v=$_POST['letras'][$i];
		else $v='';
		$r.='<input name="letras[]" value="'.$v.'" size="1">';
	}
	$r.='<input type="hidden" name="resultado" value="'.$p.'">';
	$r.='<button>Resolver</button>';
	$r.='</form>';
	return $r;
}
function filtra_palabra($p){
	$p=strtoupper($p);
	foreach([
		'Á'=>'A',
		'É'=>'E',
		'Í'=>'I',
		'Ó'=>'O',
		'Ú'=>'U',
		'á'=>'A',
		'é'=>'E',
		'í'=>'I',
		'ó'=>'O',
		'ú'=>'U',
		'ñ'=>'N',
	] as $i=>$f)
		$p=str_replace($i,$f,$p);
	return $p;
}
echo formulario_resolver($p);