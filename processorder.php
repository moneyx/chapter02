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
	//��������
	$totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;
    //echo "Items order : $totalqty<br/>";
	//������ϸ��ʾ
	//���ж϶����Ƿ�Ϊ�գ��������ж�ÿ����Ķ���
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
	
	//��������
    $totalamout = 0.00;

	define('TIREPRICE',100);
	define('OILPRICE',10);
	define('SPARKPRICE',4);

	$totalamount = $tireqty*TIREPRICE 
				+ $oilqty*OILPRICE
				+ $sparkqty*SPARKPRICE;
	//С�����á�.�� ǧλ�ָ���á� ��
	$totalamout = number_format($totalamount,2,'.','');

	//����<p></p>������<br/>����  <p>�հ׸߶� <br/>ֻ�ǻ��� <p>=2��<br/>
	echo "<p>Total of order is: $".$totalamout."<p/>";
	//���͵�ַ
	echo "<p>Address to ship to is ".$address."</p>";

	//��ƴ��Ҫ��ӡ���ַ���,tires��̥,spark plugs ����
	$outputstring = $date."\t".$tireqty."tires\t".$oilqty."oil\t"
	.$sparkqty."spark plugs\t\$".$totalamount."\t".$address."\n";
	echo $outputstring;

	//open file for appending
	//�����������·�������ǳ����˴������þ���·��
	// @ $fp = fopen("C:\wamp\www\orders\orders.txt","ab");
	$fp = fopen("$DOCUMENT_ROOT/../orders/orders.txt","ab");
	 flock($fp,LOCK_EX);

	 //���Ի�������ʾ
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
