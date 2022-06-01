<HTML>
<HEAD>
<TITLE>Lider BC</TITLE>

<style>
.clan-img {
  width: 32px;
  height: 32px;
  margin-top: .6rem;
}
</style>
</HEAD>
<body style="background-color: transparent" leftmargin="0" topmargin="0" marginwidth="0" marginheight="1" ALLOWTRANSPARENCY="true">
<?php
$IP = "http://189.79.242.5:3120631206/clancontent/"; 
	$fOpen = fopen("C:/Server/BlessCastle.dat", "r");
	$fRead =fread($fOpen,4096);
	@fclose($fOpen);

   	$bc1 = bin2hex(substr($fRead,0x4,1));
	$bc2 = bin2hex(substr($fRead,0x5,1));
	$bc3 = bin2hex(substr($fRead,0x6,1));
	$bc4 = bin2hex(substr($fRead,0x7,1));

	$bc = hexdec("$bc4"."$bc3"."$bc2"."$bc1");
    $caminho ="C:/inetpub/wwwroot/clancontent";
    if(file_exists("$caminho/$bc.bmp")) {



    $connection = odbc_connect( 'DRIVER={SQL Server};SERVER=PTL\SQLEXPRESS;DATABASE=ClanDb', 'sa', '#$pdl32xq' );

    $query = "SELECT * FROM [ClanDb].[dbo].[CL]  WHERE [MIconCnt]='$bc'";
    $q = odbc_exec($connection, $query);
    $clan = odbc_fetch_array($q);
	
	$clanname = $clan['ClanName'];
	$lider = $clan['ClanZang'];
	
	?>
	
<center>
        <div class="clan-img" style="background: url('<?php echo $IP; echo $bc; ?>.bmp') no-repeat center center; background-size: cover;"></div>
               </center>
               <p style="color: #ACA8A5; text-align: center; margin-top: 5px; margin-bottom: 0px;"><?php echo $clanname; ?></p>
               <p style="color: #ACA8A5; text-align: center; margin-top: 3px; margin-bottom: 0px;">L&iacute;der: <?=$lider?></p>
	<?php
    } else {
     echo "<center><span style=\"color: #ACA8A5;\"></br></br>Sem Lider Atual";
    
    }            
?>
</font></td>
</tr>
</table>

</body>
</html>