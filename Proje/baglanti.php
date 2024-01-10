<?php

$vt_sunucu="localhost"; //veri tabanı sunucum
$vt_kullanici="root"; 
$vt_sifre="";
$vt_adi="zisanaydogan"; //veri tabanı adımız

$baglan=mysqli_connect($vt_sunucu,$vt_kullanici, $vt_sifre, $vt_adi);

if(!$baglan)
{
    die("Veritabanı bağlantı işlemi başarısız".mysqli_connect_error());
}

?>