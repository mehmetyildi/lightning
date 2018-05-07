<?php  

//veriyabanı ulaşım bilgileri
$username="root";
$password="Bursa16.";
$sunucu="localhost";
$database="magexpress";


$baglan=mysql_connect($sunucu,$username,$password);
mysql_query("SET NEMES UTF8");//türkçe karakter doğrulaması

if(!$baglan){
	echo "Baglantı Hatası".mysql_errno();
	exit();
}

$db=mysql_select_db($database);
if(!$db){
	echo "Veritabanı hatası".mysql_error();
	echo "<br>";
	
	exit();
}
?>