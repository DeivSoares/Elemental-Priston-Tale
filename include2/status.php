<center>
<?php
$server['host'] = "192.168.1.90";
$server['port'] = "33003";
$connection = @fsockopen($server['host'], $server['port'], $ERROR_NO, $ERROR_STR, (float)1.5);
if($connection)
{
    fclose($connection);
    echo "<li class='nav-account__item nav-account__item--wishlist'>
					<p class='royal'>Servidor <span class='online'>Online</span></p>
				</li>
				<li class='nav-account__item nav-account__item--wishlist'>
					<p class='versao'>Versão <span class='online'>1.0</span></p>
				</li>";
}
else
{
    echo  "<li class='nav-account__item nav-account__item--wishlist'>
					<p class='royal'>Servidor <span class='offline'>Offline</span></p>
				</li>
				<li class='nav-account__item nav-account__item--wishlist'>
					<p class='versao'>Versão <span class='offline'>1.0</span></p>
				</li>";
}
?>
