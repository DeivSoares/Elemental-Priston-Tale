<?
?>
<?
include_once "injection.php";
include_once "../configuraADM.php";
?>
<div class="notice notice-info">
Atualização do Rank
</div>

<?
$dirUserData = "".$rootDir."DataServer/userdata/";  //Diretorio do Server de PT

$connection1 = odbc_connect( $connection_string, $user, $pass );

$query1 = "DELETE [rPTDB].[dbo].[LevelList]";
$q1 = odbc_exec($connection1, $query1);
?>
 <table class ="ui table table-striped table-bordered" style="margin: 0px auto;">
<thead>
<tr><th>Classe</th><th>Char</th><th>Level</th><th>EXP</th></tr>
</thead>
<tbody>
<?
$narq =  count(scan_Dir($dirUserData));
$charDat = scan_Dir($dirUserData);
$total = 0;

for($i=0; $i<$narq; $i++) {
?>
<?         
			  
     	$fOpen = fopen($charDat[$i], "r");                 // Abre o Arquivo .dat
        $fRead =fread($fOpen,filesize($charDat[$i]));      // Le o arquivo .dat
        @fclose($fOpen);                                   // Fecha o arquivo .dat
		
		$charName = trim(substr($fRead,0x10,15),"\x00");  // Pega o Nome do char no offset 0x10
        $charClass =  substr($fRead,0xc4,1);              // Pega o codigo da Classe do char no offset 0xc4
		$charLevel =   substr($fRead,0xc8,1);             // Pega o codigo do Nivel do Char
        $charLevel = ord($charLevel);                     // Converte o Nivel do Char para decimal (ascii)
        			
		      switch (ord($charClass))           // Chavea o valor da classe convertido para decimal (ascii)
                {
                  case 1: $class = 'Lutador';   break;     //Se a chave for 1 é Lutador
                  case 2: $class = 'Mecanico';   break;    //Se a chave for 2 é Mecanico
                  case 3: $class = 'Arqueira';   break;    //Se a chave for 2 é Mecanico
                  case 4: $class = 'Pikeman';   break;     //Se a chave for 2 é Mecanico
                  case 5: $class = 'Atalanta';   break;    //Se a chave for 2 é Mecanico 
                  case 6: $class = 'Cavaleiro';   break;   //Se a chave for 2 é Mecanico 
                  case 7: $class = 'Mago';   break;        //Se a chave for 2 é Mecanico
                  case 8: $class = 'Sacerdotiza';   break; //Se a chave for 2 é Mecanico
				  case 9: $class = 'Assassina';   break; //Se a chave for 2 é Mecanico
				  case 10: $class = 'Shaman';   break;    //Se a chave for 2 é Mecanico
				  case 11: $class = 'Guerreira';   break; //Se a chave for 2 é Mecanico
                }
	    $charClass = $class;
		
		
		$charEXP_ = bin2hex(substr($fRead,0x197,1)).
					bin2hex(substr($fRead,0x196,1)).
					bin2hex(substr($fRead,0x195,1)).
					bin2hex(substr($fRead,0x194,1)).
					bin2hex(substr($fRead,0x14F,1)).
					bin2hex(substr($fRead,0x14E,1)).
					bin2hex(substr($fRead,0x14D,1)).
					bin2hex(substr($fRead,0x14C,1));
		
		$charEXP = hexdec("$charEXP_")
	
?>
	 
    <tr>
      <td><? echo $charClass; ?></td>
      <td><? echo $charName; ?></td>
      <td><? echo $charLevel; ?> </td>
	  <td><? echo $charEXP; ?> </td>
  	
<?	
       	   
       $connection = odbc_connect( $connection_string, $user, $pass );
       $query = "INSERT INTO [rPTDB].[dbo].[LevelList] ([CharName],[CharLevel],[CharClass],[CharEXP],[ID]) values('$charName','$charLevel','$charClass','$charEXP','1')";
       $q = odbc_exec($connection, $query);
 
?>

<?
}
function scan_Dir($dir) {
   $arrfiles = array();
   if (is_dir($dir)) {
       if ($handle = opendir($dir)) {
           chdir($dir);
           while (false !== ($file = readdir($handle))) {
               if ($file != "." && $file != "..") {
                   if (is_dir($file)) {
                       $arr = scan_Dir($file);
                       foreach ($arr as $value) {
                           $arrfiles[] = $dir."/".$value;
                       }
                   } else {
                       $arrfiles[] = $dir."/".$file;
                   }
               }
           }
           chdir("../");
       }
       closedir($handle);
   }
   return $arrfiles;
}
 	
?>
</table>

<div class='notice notice-sucesso'>
Foram lidos: <strong><? echo $i  ?> Dats</strong> - Ultima Leitura as: <strong><? echo $today = date("j/F/Y - g:i a");?></strong>
</div>

<?
exit;
?>    	

