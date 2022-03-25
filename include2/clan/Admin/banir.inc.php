<?if (PT!=1) exit;?>
<?
if($_POST[acao]!="Enviar")
{
?>
<div class="notice notice-info">
Punir Player
</div>
<form  name="form_cad" method="post" action="index.php?sess=banir" onSubmit="return verifica2()">

<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID do Player" required/>
</div>

<div class="form-group">
	<input type="text" class="form-control" name="motivo" id="motivo" placeholder="Motivo" required/>
</div>
<p><b>Exemplos:</b> uso de Hack, uso de bugs do Game, Ofensas contra Player, etc.</p>            

<select name="punicao" id="punicao" class="form-control">
<option value="0" selected="selected">Alerta</option>
<option value="1">Banir</option>
<option value="2">Desbanir</option>
</select><br>
<div class="row">
<div class="col-md-4">
<select name="diadesban"  class="form-control" id="diadesban" class="form-control">
<option value="<? echo date("d"); ?>" selected="selected">Dia</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</div>
<div class="col-md-4">
<select name="mesdesban"  class="form-control" id="mesdesban" class="form-control">
<option selected value="<? echo date("m"); ?>">M&ecirc;s</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
</div>
<div class="col-md-4">
<select name="anodesban"  class="form-control" id="anodesban">
<option selected value="<? echo date("Y"); ?>">Ano</option>
<option value="2050">Permanente</option>
<option value="2020">2020</option>
<option value="2020">2020</option>
<option value="2018">2018</option>
</select>
</div>
</div><br>
<p>Se o Banimento for tempor&aacute;rio informe acima o dia que o player deve ser desbloquiado.</p>
<br>
<input name="acao" type="submit" class="btn btn-primary" id="acao" value="Enviar">
<input name="acao" type="hidden" id="acao" value="Enviar"></td>
<br><br>
                    <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de Puni&ccedil;&otilde;es em Players<br>
                    </strong>1 Passo - Digite a ID do Player que vai receber a puni&ccedil;&atilde;o no campo, id do personagem<br> 
                    2 Passo - Digite em Motivo por que o player est&aacute; recebendo esse Alerta/Ban/UnBan<br>
                    <strong>Exemplos</strong>: uso de Hack, uso de bugs do Game, Ofensas contra Player, etc.<br>
                    3 Passo - Em A&ccedil;&atilde;o a realizar, escolha a puni&ccedil;&atilde;o Alerta/Ban/UnBan<br>
                    4 Passo - Em Data ban Temp, coloque o dia que a conta vai ser desbanida automaticamente exemplo se o ban for de sete(7) dias configure o dia/mes/ano para desbloquear daqui 7 dias.<br />
                    5 Passo - Apos preencher todos campos clique em enviar.</p>
            </form>

<?
           }
        else
           {

if (empty($_POST['idplayer']))
{
echo"<script>alert ('Favor colocar o ID do Player')</script>";
echo"<script>history.go(-1);</script>";
$daerro = "1";
}

if (empty($_POST['motivo']))
{
echo"<script>alert ('Favor colocar o Motivo da Punição')</script>";
echo"<script>history.go(-1);</script>";
$daerro = "1";
}
if ($daerro == "1") {} else {

//Verificando se n&atilde;o vai ter injection no script
$idplayer = $_POST['idplayer'];
$motivo = $_POST['motivo'];
$punicao = $_POST['punicao'];
$diadesban = $_POST['diadesban'];
$mesdesban = $_POST['mesdesban'];
$anodesban = $_POST['anodesban'];

if ($punicao == 0) {
$punicaoNUM = 0;
$punicaoTXT = "Alerta";
}
if ($punicao == 1) {
$punicaoNUM = 1;
$punicaoTXT = "Banido";
}
if ($punicao == 2) {
$punicaoNUM = 0;
$punicaoTXT = "Desbanido";
}


if (anti_sql($idplayer) != 0 || anti_sql($motivo) != 0) {
echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Uso de Caracteres não Permitidos.
</div>";
} else {

				//Verificando se Existe essa ID
				$connection = odbc_connect( $connection_string, $user, $pass );
                $idplayer=$_POST[idplayer];
                $query_verid = "SELECT * FROM [accountdb].[dbo].[".( strtoupper($idplayer[0]) ) ."GameUser] WHERE [userid]='$idplayer'";

                $q_verid = odbc_exec($connection, $query_verid, $query_verid1);
				$qt_verid = odbc_do($connection, $query_verid, $query_verid1);
                $i = 0;
                while(odbc_fetch_row($qt_verid)) $i++;
                           if($i==0) {
                    echo"<div class='notice notice-danger'>
<strong>Erro!</strong> NÃO EXISTE A ID <strong>$_POST[idplayer]</strong> FAVOR CONFERIR A ID NOVAMENTE.
</div>";

						   } else {
					$gm = $_SESSION["NICKGM"];
                    //Tabela separada dos players por letras iniciais
                                        $query = "UPDATE [accountdb].[dbo].[".( strtoupper($idplayer[0]) ) ."GameUser] SET [BlockChk]='$punicaoNUM' WHERE [userid]='$idplayer'";
                    $q = odbc_exec($connection, $query);
                                        $query1 = "UPDATE [accountdb].[dbo].[AllGameUser] SET [BlockChk]='$punicaoNUM' WHERE [userid]='$idplayer'";
                    $q = odbc_exec($connection, $query1);
					$diaban = date("d");
					$mesban = date("m");
					$anoban = date("Y");
					$ip = $_SERVER["REMOTE_ADDR"];
					$datahoje = date("m-d-Y h:i:s A");
                    $query2 = "INSERT INTO [ADM].[dbo].[LogsBan] ([idplayer],[motivo],[punicao],[diaban],[mesban],[anoban],[diadesban],[mesdesban],[anodesban],[gm],[ip],[data]) VALUES ('$idplayer','$motivo','$punicaoTXT','$diaban','$mesban','$anoban','$diadesban','$mesdesban','$anodesban','$gm','$ip','$datahoje')";

					$q = odbc_exec($connection, $query);
                    $q2 = odbc_exec($connection, $query2);

            if ($q && $q2)
            	{
?>
<div class='notice notice-sucesso'>
<strong>Pronto!</strong> ID <strong><? echo $idplayer; ?></strong> recebeu a Puni&ccedil;&atilde;o numero <? echo $punicao; ?>
</div>
<p><strong>Alerta</strong> - 0<BR>
<strong>Banido</strong> - 1<br>
<strong>Desbanido</strong> - 2</span></p>

<?
}}}}}
?>



