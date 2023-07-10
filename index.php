<?
session_start();

if($_GET["session"]=="Cerrar")
{
	$_SESSION=array();
	session_destroy();
}

$_CONTENIDO = "contenido/";

include_once('server.php');

$Sqli = new SQLi();


if($_SESSION["logon"]!=""){




	$Contenido=$_CONTENIDO."bienvenida.php";

	if(isset($_GET["q"]))
		$Contenido=$_CONTENIDO.$_GET["q"].".php";


	include("plantilla.html");
	
}



if(!isset($_SESSION["logon"]) && isset($_POST["Usuario"]) && isset($_POST["Clave"])){
$Resultado="";



if($Sqli->esUsuario($_POST["Usuario"], $_POST["Clave"]))
{
	
	$_SESSION["logon"]=$_POST["Usuario"];
	$_SESSION["admin"]=$Sqli->esAdmin($_POST["Usuario"]);
        unset($_POST["Usuario"]);
	unset($_POST["Clave"]);
	
	
	
}
else
{
	 unset($_POST["Usuario"]);
	unset($_POST["Clave"]);
        $Resultado="?result=novalido";
        
}
	echo "<script>window.location.assign('index.php".$Resultado."');</script>";

}

if(!isset($_SESSION["logon"]) && !isset($_POST["Usuario"]) && !isset($_POST["Clave"]))
{
	include("login.html");
	
}


?>
