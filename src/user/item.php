<?php include "../util/conn.php";
include "../util/guard.php";

checkLogin();

$qry_product_detail = mysqli_query($conn, "select * from barang where id = '" . $_GET['id_product'] . "'");
$dt_product = mysqli_fetch_array($qry_product_detail);

$qry_bid = mysqli_query($conn, "select * from lelang where harga_akhir = (select max(harga_akhir)from lelang where id_barang= '" . $_GET['id_product'] . "')  ");
$dt_bid = mysqli_fetch_array($qry_bid);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidding <?= $dt_product['nama_barang'] ?></title>
    <link rel="stylesheet" href="../../public/css/output.css">
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css" />

    <style>
        body {
            color: #333333;
            max-width: 650px;
            margin: 0 auto;
            padding: 0 16px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>

</head>

<body>
    <div class="mt-10">
        <a href="dashboard.php">
            <img src="../../public/img/Asset 1@4x2.png" alt="">

        </a>
    </div>
    <div>
        <div>
            <p class="text-2xl font-silk">Bidding <?= $dt_product['nama_barang'] ?></p>
            <img src="../admin/product_img/<?= $dt_product['img'] ?>">
            <div class="mt-5">
                <p>Registered: <?= $dt_product['tgl_daftar'] ?></p>
                <p>Starting Amount: $<?= $dt_product['harga_awal'] ?></p>
                <p>Highest bid: $<?php

                                    if (!isset($dt_bid['harga_akhir'])) {
                                        echo $dt_product['harga_awal'];
                                    } else {
                                        echo $dt_bid['harga_akhir'];
                                    }


                                    ?> </p>
                <p><?= ucfirst($dt_bid['status']) ?></p>
            </div>

        </div>


        <form class="mt-5" action="bid_system.php?id_product=<?= $_GET['id_product'] ?>" method="post" name="bid-form" onsubmit="checkHighestBid() ">
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                <input name="harga" id="price" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" required="">
            </div>

            <div class="flex justify-between">

                <button id="sumbit" type="submit" class="text-gray-800 outline outline-1 border-black bg-white hover:bg-gray-800 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Bid</button>
            </div>
        </form>



    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

    </script>

    <script>
        function checkHighestBid() {
            let inputPrice = document.getElementById('price').value;

            if (inputPrice <= <?php

                                if (!isset($dt_bid['harga_akhir'])) {
                                    echo $dt_product['harga_awal'];
                                } else {
                                    echo $dt_bid['harga_akhir'];
                                }


                                ?>) {

                alert('Bid More!')
                event.preventDefault();
            }
        }
    </script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
    <script src="../path/to/@themesberg/flowbite/dist/flowbite.bundle.js"></script>

</body>

</html>