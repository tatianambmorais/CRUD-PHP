<?php
$server = "localhost";
$user = "root";
$pass = "adminadmin";
$bd = "empresa";

if ($conn = mysqli_connect($server, $user, $pass, $bd)) {
	echo "";
} else
	echo "";

function mensagem($texto, $tipo)
{
	echo "<div class='alert alert-$tipo' role='alert'>
	$texto
  </div>";
}
function mostra_data($data){
	$d=explode('-',$data);
	$escreve=$d[2]."/".$d[1]."/".$d[0];
	return $escreve;}
