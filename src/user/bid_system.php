<?php
include "../util/conn.php";
session_start();

$qry_product_detail = mysqli_query($conn, "select * from barang where id = '" . $_GET['id_product'] . "'");
$dt_product = mysqli_fetch_array($qry_product_detail);
$date = date('Y-m-d H:i:s');
$status = 'available';
$price = $_POST['harga'];

$sql = "insert into lelang (id_barang, tgl_lelang , harga_akhir ,status ,id_masyarakat) 
        values ('" . $dt_product['id'] . "','" . $date . "','" . $price . "','" . $status . "','" . $_SESSION['id'] . "')";


$bid_init = mysqli_query($conn, $sql);



$qry_bid = mysqli_query($conn, "select * from lelang where id = '" . $_GET['id_product'] . "'");
$dt_bid = mysqli_fetch_array($qry_bid);


$update_bid = "update lelang set harga_akhir = " . $price . ", id_masyarakat =" . $_SESSION['id'] . " where id_barang =" . $dt_product['id'] . "";


$bid_update = mysqli_query($conn, $update_bid);

header("location: item.php?id_product=" . $dt_product['id']);
