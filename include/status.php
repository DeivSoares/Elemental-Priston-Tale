<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<script>
function click() {
if (event.button==2||event.button==3) {
oncontextmenu='return false';
}
}
document.onmousedown=click
document.oncontextmenu = new Function("return false;")
</script> 
<html>
<head>
<?php
$server['host'] = "142.44.204.43";
$server['port'] = "80";
$connection = @fsockopen($server['host'], $server['port'], $ERROR_NO, $ERROR_STR, (float)1.5);
if($connection)
{
    fclose($connection);
    echo "<img src='images/on.png'>";

}
else
{
    echo "<img src='images/off.png'>";
}
?>
</body>
</html>