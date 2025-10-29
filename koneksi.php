<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_produk';
    $conn = mysqli_connect($host, $user, $pass, $db);

    mysqli_select_db($conn, $db);

    function formatHarga($harga){
        $rupiah = number_format($harga, 0, ',', '.');
        return $rupiah;
    }

?>