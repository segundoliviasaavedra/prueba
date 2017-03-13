<?php
Class ClearPar
{
public function build($parentesis)
	{			 
$alm="";
$cantidad_caract=strlen($parentesis);
$x=0;
echo "<center>Muestra solo Parentesis Completo</center>";	
for($i=0; $i<$cantidad_caract;$i++) 
{ 
		if($x<=$cantidad_caract-2)
		{
		$parentesis1= substr($parentesis,$x,1);
		$parentesis2= substr($parentesis,$x+1,1);
					if($parentesis1=="(" and $parentesis2==")"){
					$alm=$alm."()";
					$x=$x+2;
					}
			else{$x=$x+1;}
		}
}
	return $alm;
	}
}
if (isset($_REQUEST['palabra']) ) {
      $parentesis= $_GET['palabra'];	 
	  $objeto= new ClearPar();
      $result = $objeto->build($parentesis);
echo "<center>".$result."</center><br>";

}
?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Ejercio ClearPar</title>				
	</head>
	<body>
	
		<h1 align="center">ClearPar</h1>
	
	<form name="form1" method="get" action="ClearPar.php">
	<center><table width="50%">
	<tr>
	<td>
	Ingrese Parentesis:</td><td> <input type="text" name="palabra" id="palabra"></td><td> <input type="submit" value="Result"></td>
	</form>
	</table></center>
	<br><br>
		
	</body>
</html>



