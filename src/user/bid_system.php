<?php
include "../util/conn.php";
session_start();

$qry_product_detail = mysqli_query($conn, "select * from barang where id = '" . $_GET['id_product'] . "'");
$dt_product = mysqli_fetch_array($qry_product_detail);
$checkExist = "select exists(select * from lelang where id_barang = " . $_GET['id_product'] . ")";
$qry_Exist = mysqli_query($conn, $checkExist);
$resultExist = mysqli_fetch_array($qry_Exist);

if ($resultExist[0] == 0) {

    echo $resultExist[0];
    $date = date('Y-m-d H:i:s');
    $status = 'available';
    // $price = $_POST['harga'];

    $sql = "insert into lelang (id_barang, tgl_lelang , harga_akhir ,status ,id_masyarakat) 
        values ('" . $dt_product['id'] . "','" . $date . "','" . $_POST['harga'] . "','" . $status . "','" . $_SESSION['id'] . "')";


    $bid_init = mysqli_query($conn, $sql);
} else if ($resultExist[0] == 1) {
    echo $resultExist[0];
    $qry_bid = mysqli_query($conn, "select * from lelang where id = '" . $_GET['id_product'] . "'");
    $dt_bid = mysqli_fetch_array($qry_bid);


    $update_bid = "update lelang set harga_akhir = " . $_POST['harga'] . ", id_masyarakat =" . $_SESSION['id'] . " where id_barang =" . $dt_product['id'] . "";


    $bid_update = mysqli_query($conn, $update_bid);
} else {
    echo 'Look through your code again, dumbass!!';
}






header("location: item.php?id_product=" . $dt_product['id']);
