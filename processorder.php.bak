<?php
// creat short variable
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$address = $_POST['address'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$date= date('H:i,jS F Y');
?>
<html>
<head>
<title>Bob' Auto Parts - Order Results</title>
</head>
<body>

<h1>Bob' Auto Parts</h1>
<h2>Order Results</h2>
<?php 
	echo"<p>Order processed at ".date('H:i jS F Y')."</p>";
	echo"<p>Your order is follows:</p>";
	//订单总数
	$totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;
    //echo "Items order : $totalqty<br/>";
	//订单详细显示
	//先判断订单是否为空，在依次判断每项单独的订单
	if($totalqty == 0){
		echo "<h2>You did not order anything on previous page!</h2><br/>";
	}else{
	   if($tireqty > 0){
	   echo $tireqty."tires<br/>";
	}
	   if($oilqty > 0){
	   echo $oilqty."bottle of oil<br/>";
	}
	   if($sparkqty > 0){
	   echo $sparkqty."spark plugs<br/>";
	   }
	}
	
	//订单总数
    $totalamout = 0.00;

	define('TIREPRICE',100);
	define('OILPRICE',10);
	define('SPARKPRICE',4);

	$totalamount = $tireqty*TIREPRICE 
				+ $oilqty*OILPRICE
				+ $sparkqty*SPARKPRICE;
	//小数点用“.” 千位分割符用“ ”
	$totalamout = number_format($totalamount,2,'.','');

	//关于<p></p>段落与<br/>换行  <p>空白高度 <br/>只是换行 <p>=2个<br/>
	echo "<p>Total of order is: $".$totalamout."<p/>";
	//运送地址
	echo "<p>Address to ship to is ".$address."</p>";

	//先拼接要打印的字符串,tires轮胎,spark plugs 火花塞
	$outputstring = $date."\t".$tireqty."tires\t".$oilqty."oil\t"
	.$sparkqty."spark plugs\t\$".$totalamount."\t".$address."\n";
	echo $outputstring;

	//open file for appending
	//这里用了相对路径，但是出现了错误，先用绝对路径
	// @ $fp = fopen("C:\wamp\www\orders\orders.txt","ab");
	$fp = fopen("$DOCUMENT_ROOT/../orders/orders.txt","ab");
	 flock($fp,LOCK_EX);

	 //人性化错误提示
	 if(!$fp){
		 echo"<p><strong>Your order could not be processed at this time .
		                 please try again later.
		 </strong></p></body></html>";
		exit;
	 }


	fwrite($fp , $outputstring , strlen($outputstring));
	fclose($fp);

	echo"<p>Order Written</p>";




	//$taxrate = 0.10;  //local tax10%
	//$totalamout = $totalamout*(1+$taxrate);
	//echo "Total include tax :$".number_format($totalamout,2)."<br/>";

?>
</body>
