
<?




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8_encode" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Painel Free IP </title>
	
</head>
<br><br><br>


<form method="post" onSubmit="disabledBttn(this)" action="ip.php">

         <td><table width="800" border="0" align="center" cellpadding="4" cellspacing="2">
               
                 
                  </tr>
            
	  

              <td colspan="2" align="center"><input name="acao" type="submit" class="button" id="acao" value="Liberar IP"></td>
              </tr>
					
          


<?



if(!$_POST[acao]!="Liberar IP")

{

		
//Obtendo login e senha
$ip = $_SERVER["REMOTE_ADDR"];
$datahoje = date("m-d-Y h:i:s A");



			
	include_once "incluir/configura.php";
    
		$connection = odbc_connect($connection_string, $user, $pass);

	$query23 = "delete [PrimeRPG].[dbo].[RequestIP] where ipaddress = '$ip'"; 
	$q23 = odbc_exec($connection, $query23);
		
	$query22 = "INSERT INTO [PrimeRPG].[dbo].[RequestIP]  (ipaddress, included, datetm, Font) 
	VALUES ('$ip',0,'$datahoje', 'Web Site')"; 
	$q22 = odbc_exec($connection, $query22);
	

if($q22){

			echo '<script>alert("Dados inceridos com sucesso!");</script>';

		}
		
		else{
			echo '<script>alert("Erro ao Modificar os dados!");history.go(-1);</script>';
		}



}           

?>





   <table width="800" border="0" align="center" cellpadding="4" cellspacing="2">  <tr>
         
        </tr>
		
				<br><br>
             			<center>Dev: Draco<br>	<a href="http://www.PrimeRPG.com/">www.PrimeRPG.com</a><br> <br><a style="color:#5671AB"><a style="color:#271BCD"></strong> 
              </tr></td>
      </table>
	  