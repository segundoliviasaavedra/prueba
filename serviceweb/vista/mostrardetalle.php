<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="mora.css" rel="stylesheet" type="text/css">
<head>
 </head>
<body>
<h1>Detalle Personale</h1>   


<table id="tabla1">
										<tr>
                                        <td>Name</td><td><input type="hidden" name="codname" id="codname" size="30" value="<?php if(isset($_GET['email'])){ echo $_GET['email'];} ?>" required>
										<input type="text" name="name" id="name" size="30" value="<?php if(isset($_GET['name'])){ echo $_GET['name'];} ?>" required readonly>
										</td>
										</tr>
										<tr>
                                        <td>Email</td><td><input type="text" name="email" id="email" size="30" value="<?php if(isset($_GET['email'])){ echo $_GET['email'];}?>" required readonly></td>
										</tr>
										<tr>
										<td>phone</td><td><input type="text" name="phone" id="phone" size="30" value="<?php if(isset($_GET['phone'])){ echo $_GET['phone'];} ?>" required readonly></td>
										</tr>
										<tr>											
										<td>Address</td><td><input type="text" name="address" id="address" size="30" value="<?php if(isset($_GET['address'])){ echo $_GET['address'];} ?>" required readonly></td>
										</tr>
										<tr>
										<td>position</td><td><input type="text" name="position" id="position" size="30" value="<?php if(isset($_GET['position'])){ echo $_GET['position'];} ?>" required readonly></td>										
									   	</tr>
										<tr>
										<td>salary</td><td><input type="text" name="salary" id="salary" size="30" value="<?php if(isset($_GET['salary'])){ echo $_GET['salary'];} ?>" required readonly></td>										
									   	</tr>
										<tr>
										<td>skill</td><td>
										<?php 
										if(isset($_GET['detalle'])){
											$detalle=$_GET['detalle'];
											echo $detalle;
										
										}
										 ?>
										
										</td>										
									   	</tr>
										</table>
</body>
</html>
