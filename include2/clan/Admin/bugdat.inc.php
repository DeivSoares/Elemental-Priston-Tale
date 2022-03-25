<?
if (PT!=1) exit;
?>
<?
include_once "injection.php";
include_once "../configuraADM.php";
?>

<table class ="ui table table-striped table-bordered" style="margin: 0px auto;">
            <tr>
              <td>Conta</td>
              <td>Char</td>
              <td>Bugado</font></strong></div></td>
              <td>Pasta - Arquivo</td>
            </tr>
            <?
$narq =  count(scan_Dir($dirUserData));     // Rastreia as sub-pastas da userdata
$charDat = scan_Dir($dirUserData);          // Pega os nomes dos arquivos para re-passalos para o leitor
$conta = 0;

for($i=0; $i<$narq; $i++) {                 //enquanto existir arquivos
?>
<?        
           
        $fOpen = fopen($charDat[$i], "r");                 // Abre o Arquivo .dat
        $fRead =fread($fOpen,filesize($charDat[$i]));      // Le o arquivo .dat
        @fclose($fOpen);                                   // Fecha o arquivo .dat
      
      $charName = trim(substr($fRead,0x10,15),"\x00");  // Pega o Nome do char no offset 0x10
        $charAcc =  trim(substr($fRead,0x2c0,15),"\x00");              // Pega a ACC do dat
      $charLevel =   substr($fRead,0xc8,1);             // Pega o codigo do Nivel do Char
        $charLevel = ord($charLevel);                     // Converte o Nivel do Char para decimal (ascii)
      
       if(!is_numeric($charLevel) OR $charLevel == 0) {  //se level nao for numerico ou valor = 0
           $conta=$conta+1;                                //Some +1 ao contador        
           $bug = "Sim";                                   // Seta variavel como sim
           $pasta = $charDat[$i];                         // Seta variavel com o caminho completo do arquivo
               }
            else                                        // caso contrario
               {       
                 $bug = "Nao";                               // Seta variavel como nao  
                 $pasta = $charDat[$i];                   // Seta variavel com o caminho completo do arquivo
              }   
?>
              <tr>
                <?
         if($bug == Nao )   // Se a varivel for igual a Não escrever com letra de cor 0000FF (Azul)
         {
         ?>
                <td ><? echo $charAcc; ?></td>
                <td ><? echo $charName; ?></td>
                <td ><font color="green" ><? echo $bug; ?></font></td>
                <td ><? echo $pasta; ?></td>
                <?
           }
         else      // Caso contrario escrever com letra de cor FF0000 (Vermelha)
         {
        ?>
                <td ><? echo $charAcc; ?></td>
                <td ><? echo $charName; ?></td>
                <td ><font color="red" ><? echo $bug; ?></font></td>
                <td ><? echo $pasta; ?></td>
                <?        
        }
           ?>
                <?
}  
//Bloco da função para varredura dos diretorio em modo recursivo
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
            </table><br>
<div class='notice notice-info'>
Foram lidos: <strong><? echo $i  ?> .dat </strong> - Corrompidos : <strong><? echo $conta  ?> .dat</strong>
</div>
        

</body>
</html>