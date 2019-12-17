<div style="margin:10px"><a href="index.php">Otra palabra</a></div>
<?php
$vocales=['A','E','I','O','U'];
if(isset($_POST['resultado'])){
	$p=$_POST['resultado'];
}
else{
	include 'palabras.php';
	$p=$palabras[rand(1,count($palabras))-1];
	$p=filtra_palabra($p);
	$_POST['intentos']=0;
	$_POST['fallos']='';
}
if(isset($_POST['letra'])){
	$l=strtoupper($_POST['letra']);
	if(in_array($l,$vocales)) unset($_POST['letra']);
	else{
		for($i=0;$i<iconv_strlen($p);$i++){
			if($l==$p[$i]){
				$_POST['letras'][$i]=$l;
				$acierto=1;
			}
		}
		if(!isset($acierto)){
			$_POST['intentos']++;
			$_POST['fallos'].=' '.strtoupper($_POST['letra']);
		}
		else if(isset($_POST['letras'])){
			$faltan=null;
			$consonantes=0;
			for($i=0;$i<iconv_strlen($p);$i++)
				if(!in_array($p[$i],$_POST['letras']))
					$faltan[]=$p[$i];
			foreach($faltan as $f)
				if(!in_array($f,$vocales))
					$consonantes++;
			if(!$consonantes)
				for($i=0;$i<iconv_strlen($p);$i++)
					$_POST['letras'][$i]=$p[$i];
		}
	}
}
if(isset($_POST['letras'])){
	if($p==implode($_POST['letras']))
		echo '<div style="font-size:3em">¡Enhorabuena!</div>';
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
		$r.='<input name="letras[]" value="'.$v.'" size="1" style="text-align:center">';
	}
	$r.='<input type="hidden" name="resultado" value="'.$p.'">';
	$r.='<input type="hidden" name="intentos" value="'.$_POST['intentos'].'">';
	$r.='<input type="hidden" name="fallos" value="'.$_POST['fallos'].'">';
	//$r.='<button>Resolver</button>';
	$r.='</form>';
	return $r;
}
function formulario_probar($p){
	$r=null;
	$r.='<form method="post">';
	$r.='<input name="letra" maxlength="1" size="1" autofocus>';
	if(isset($_POST['letras'])) for($i=0;$i<iconv_strlen($p);$i++){
		if(!isset($_POST['letras'][$i])) $_POST['letras'][$i]='';
		$r.='<input type="hidden" name="letras[]" value="'.$_POST['letras'][$i].'">';
	}
	$r.='<input type="hidden" name="resultado" value="'.$p.'">';
	$r.='<input type="hidden" name="intentos" value="'.$_POST['intentos'].'">';
	$r.='<input type="hidden" name="fallos" value="'.$_POST['fallos'].'">';
	$r.='<button>Probar</button>';
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
echo formulario_probar($p);
echo $_POST['intentos'].' intentos : '.$_POST['fallos'];
$txt=null;
switch($_POST['intentos']){
	case 0: break;
	case 1:
		$txt.='-'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 2:
		$txt.='-----'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 3:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|'."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 4:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='| '."\r\n";
		$txt.='| '."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 5:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='| '."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 6:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|  /'."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 7:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|  / \\'."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 8:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='|  -|'."\r\n";
		$txt.='|  / \\'."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 9:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='|  -|-'."\r\n";
		$txt.='|  / \\'."\r\n";
		$txt.='|███████'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 10:
	case 12:
	case 14:
	case 16:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='|  -|-'."\r\n";
		$txt.='|█ / \\ █'."\r\n";
		$txt.='--------'."\r\n";
		break;
	case 11:
	case 13:
	case 15:
		$txt.='-----'."\r\n";
		$txt.='|   |'."\r\n";
		$txt.='|   O'."\r\n";
		$txt.='|  -|-'."\r\n";
		$txt.='|  / \\'."\r\n";
		$txt.='|█     █'."\r\n";
		$txt.='--------'."\r\n";
		break;
}
echo '<div>';
echo '<pre>';
echo $txt;
echo '</pre>';
echo '</div>';