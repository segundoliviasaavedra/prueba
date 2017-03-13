<?php
Class ChangeString
{
public function build($texto)
	{	
		$ban=0;	
		$res="";
	    $tamaño=strlen($texto);		
				for($i=0; $i < $tamaño; $i++) 
				{  			
			   //$text captura los datos ingresado;
				$text= substr($texto,$i,1);
				//$val convertir a mayusculas; 
				$val=STRTOUPPER($text);				
					for($x=65; $x<=90; $x++) 
					{
						//$alfabetico para la comparacion; 
						$caracter = chr($x);
						//$val almacena los datos de $caracter
						if($val==$caracter)
						{
						//toma esl codigo asscci y suma 1						
						$n=$x+1;
						//si ingresa z, que muestre a
						if($n==91)
						{
						$n=65;
						}
						//Muestra el asscci sumado 1, luego convertido a caracter
						$resp=chr($n);
						echo $resp;
						 } 
					}
			}
			
	}
}	

if (isset($_REQUEST['palabra']) ) {
	$texto = $_GET['palabra'];
	$bar = new ChangeString();
	$var1 = $bar->build($texto);
}
echo "<br>"; 
//echo $resp;
echo "<br>";  
//}      
?>
<html>
	<head>
	<meta charset="UTF-8"/>
	<title>Ejercio Changetring</title>
	</head>
	<body>	
	<h1 align="center">ChangeString</h1>	
	<form name="form1" method="get" action="ChangeString.php">
	<center><table width="50%">
	<tr><td>Ingrese Letras :</td><td> <input type="text" name="palabra" id="palabra"></td><td> <input type="submit" value="Result"></td>
	</form>
	</table></center>
	</body>
</html