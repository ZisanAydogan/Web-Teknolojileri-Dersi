<?php
include("api.php");

// Veritabanına bağlan
$con = mysqli_connect("localhost", "root", "", "zisanaydogan");

// Bağlantı kontrolü
if (!$con) {
    die("Veritabanı bağlantısı başarısız " . mysqli_connect_error());
}

$sql = "SELECT * FROM data";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Content-Type: application/json");

    $i = 0;
    $response = array(); // Yeni bir dizi oluştur

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = array(
            'id' => $row['id'],
            'adsoyad' => $row['adsoyad'],
            'telefon' => $row['telefon'],
            'email' => $row['email'],
            'ders' => $row['ders'],
            'mesaj' => $row['mesaj']
        );

        // Sayfanın sonunda belleği temizle
        if ($i % 100 == 0) {
            unset($response);
            $response = array();
        }

        $i++;
    }

    echo json_encode(array("success" => true, "data" => $response), JSON_PRETTY_PRINT);
} else {
    echo json_encode(array("error" => "Veritabanı sorgusu başarısız."), JSON_PRETTY_PRINT);
}

// Veritabanı bağlantısını kapat
mysqli_close($con);
?>
