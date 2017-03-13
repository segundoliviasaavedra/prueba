<?php
require "php-json-file-decode/json-file-decode.class.php";
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(['templates.path' => 'vista']);
$app->contentType('text/html; charset=utf-8');
$app->get('/', function() use ($app) {
    try {
        
    } catch(Exception $e) {
        $app->flash('error', $e->getMessage());
        $app->redirect('/error');
    }
    $app->redirect('/prueba/serviceweb/index');
});

$app->get('/index', function() use($app){
	$leer = new json_file_decode();
$archivo=$leer->json("employees.json");
if(isset($_REQUEST['Palabra'])){
		$Palabra=$_REQUEST['Palabra'];}
	else{$Palabra="";}
echo "<!DOCTYPE html>";
echo "<head><title>SISTEMA DE GESTION COMERCIAL</title></head>";
echo "<link href='mora.css' rel='stylesheet' type='text/css'>";
echo "<body>";	
echo "<table width='100%' border='0'>
    <tr>
      <td height='20'>&nbsp;</td> 
    </tr>
    <tr>
      <td height='20'>
	  <div align='center'>";
echo  "<html><h1>Listado de Empleados</h1></html>";
echo " <form name='form1' method='GET' action='index'>
       <input type='text' name='Palabra' value=$Palabra>
	   <input  type='submit' value='Email'>";	  
echo "</form>";
    
	 echo " </div>
      </td>
    </tr>
    <tr>
      <td height='23' >
        <table width='100%'  border='2' cellpadding='0' cellspacing='0' class='over_externo'>
          <tr>
            <td><table id='grid_1' class='over_externo' style='cursor:default' width='100%' border='2' cellpadding='0' cellspacing='0'>
                <tr height='20'>
                  <td width='20' height='20' align='center' class='out' onMouseDown='this.className='over';'  onMouseUp='this.className='out';'>Name</td>
                  <td width='25' height='20' align='center' class='out' onMouseDown='this.className='over';'  onMouseUp='this.className='out';'>Email</td>
				  <td width='17' height='20' align='center' class='out' onMouseDown='this.className='over';'  onMouseUp='this.className='out';'>Position</td>
				  <td width='14' height='20' align='center' class='out' onMouseDown='this.className='over';'  onMouseUp='this.className='out';' >Salary</td>
				  <td width='10' height='20' align='center' class='out' onMouseDown='this.className='over';'  onMouseUp='this.className='out';' >Acciones</td>
               </tr> "; 
if ($Palabra=="")
{
	for($x =0; $x < count($archivo["employees"]); $x++)
	{ 
	echo "<td>".$archivo["employees"][$x]["name"]."</td><td>".$archivo["employees"][$x]["email"]."</td><td>".$archivo["employees"][$x]["position"]."</td><td>".$archivo["employees"][$x]["salary"]."</td>";
	echo "<td><a target='_blank' href='mostrardetalle?name=".$archivo["employees"][$x]["name"]."&email=".$archivo["employees"][$x]["email"]."&phone=".$archivo["employees"][$x]["phone"]."&address=".$archivo["employees"][$x]["address"]."&position=".$archivo["employees"][$x]["position"]."&salary=".$archivo["employees"][$x]["salary"]."'><img src=eye.gif></a></td>";
	echo "</tr>";
	} }	else	{
			for($x =0; $x < count($archivo["employees"]); $x++)
		{
			if ($Palabra==$archivo["employees"][$x]["email"])
			{
echo "<td>".$archivo["employees"][$x]["name"]."</td><td>".$archivo["employees"][$x]["email"]."</td><td>".$archivo["employees"][$x]["position"]."</td><td>".$archivo["employees"][$x]["salary"]."</td>";
	echo "<td><a target='_blank' href='mostrardetalle?name=".$archivo["employees"][$x]["name"]."&email=".$archivo["employees"][$x]["email"]."&phone=".$archivo["employees"][$x]["phone"]."&address=".$archivo["employees"][$x]["address"]."&position=".$archivo["employees"][$x]["position"]."&salary=".$archivo["employees"][$x]["salary"]."'><img src=eye.gif></a></td>";
		  
	      echo "</tr>";
			break;
			}
		}
	}	
 echo "  </table></td>
   </tr>
   </table></td>
   </tr>
</table>   
</body>
</html>";
});
$app->get('/mostrardetalle', function() use($app){

$app->render('mostrardetalle.php');
});

$app->get('/exportarxml', function() use($app){
	echo "<!DOCTYPE html>";
echo "<head><title>SISTEMA DE GESTION COMERCIAL</title></head>";
echo "<link href='mora.css' rel='stylesheet' type='text/css'>";
echo "<body>";
echo  "<html><center><p>Reporte de Salarios en Dolares</p></center></html>";
echo  " <div align='center'>Formato:  1,000.00 
	   <form name='form1' method='GET' action='exportarxml'>
	   <table>
	   <tr>
	   <td>Salario Minimo $</td><td><input type='text' name='minimo' value=''></td>
	   <td>Salario Maximo $</td><td><input type='text' name='maximo' value=''></td>
	  <td><input  type='submit'  value='Buscar'></td>
	  </tr>
	  <table>
	   </form>
       </div>";
if(isset($_REQUEST['minimo']) and  isset($_REQUEST['maximo'])){
	$minimo=$_REQUEST['minimo'];
	$maximo=$_REQUEST['maximo'];
	$mensaje="El archivo xml ha sido Generado";
	$xml = new DomDocument('1.0', 'UTF-8');
	
	$sueldo= $xml->createElement('sueldo');	
	$sueldo = $xml->appendChild($sueldo);	
    $datos = $xml->createElement('datos');	
	$datos = $sueldo->appendChild($datos);
	$leer = new json_file_decode();
    $archivo=$leer->json("employees.json");
	$datos->setAttribute('seccion', 'sueldo');
	for($x =0; $x < count($archivo["employees"]); $x++)
	{ 
	$xsalario= substr($archivo["employees"][$x]["salary"],1);
	if ($xsalario>=$minimo  and  $xsalario<=$maximo){
	echo substr($archivo["employees"][$x]["salary"],1)."<br>";
	$nombre=$archivo["employees"][$x]["name"];
	$email=$archivo["employees"][$x]["email"];
	$position=$archivo["employees"][$x]["position"];
	$salary=$archivo["employees"][$x]["salary"];
	$autor = $xml->createElement('nombre',$nombre);
    $autor = $datos->appendChild($autor);
    $correo = $xml->createElement('email',$email);
    $correo = $datos->appendChild($correo);
    $pos = $xml->createElement('posicion',$position);
    $pos = $datos->appendChild($pos);
    $sal = $xml->createElement('salario',$salary);
    $sal = $datos->appendChild($sal);
	}
 
	}
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('reporte.xml');
echo "<script type='text/javascript' charset='utf-8'>document.location ='reporte.xml'</script>";
}
	else{
		$minimo=0;
		$maximo=0;
	}
});

$app->run();

?>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>