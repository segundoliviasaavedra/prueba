<?php
Class CompleteRange
{
public function build($datos)
	{	
	
	//separa la coma los numeros ingresados
	$coma = ","; 
	$resp="";
	$arreglo = split($coma,$datos); 
	//cuenta la cantidad de numeros ingresado separados por la coma
	$count = count($arreglo); 
	//toma el primer valor
	$c1= $arreglo[0];
	//toma el ultimo numero ingresado
	$c2=$arreglo[$count-1];
			for($i=$c1; $i<=$c2;$i++) 
			{ 
			$resp=$resp. $i.','; 
			}
			return $resp;
	}
	}
if (isset($_REQUEST['palabra']) )
{
	//toma el dato de la caja de texto
	$datos= $_GET['palabra'];
	
	$bar = new CompleteRange();
    $var1= $bar->build($datos);
	echo $var1; 
}

?>
<html>
	<head>
	<meta charset="UTF-8"/>
	<title>Ejercicio CompleteRange</title>		
	</head>
	<body>	
	<h1 align="center">CompleteRange</h1>
	<form name="form1" method="get" action="CompleteRange.php">
	<center><table width="50%">
	<tr>
	<td colspan="5"><p>Formato a Ingresar:: 1,2,3...</p></td><br>
	</tr>
	<tr>
	<td>
	Ingrese Datos:</td><td> <input type="text" name="palabra" id="palabra"></td><td> <input type="submit" value="Result"></td>
	</form>
	</table></center>
	</body>
</html>