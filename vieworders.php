<?php
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>

<body>
<?php
$fp = fopen("$DOCUMENT_ROOT/../orders/orders.txt",'rd');

while(!feof($fp)){
$order=fgetS($fp,999);
echo $order."<br/>";
}
?>
</body>
<html>