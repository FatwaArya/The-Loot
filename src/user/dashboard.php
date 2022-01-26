<?php include '../util/conn.php';
require_once '../util/guard.php';
checkLogin();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/output.css">
    <title>The Loot Bid</title>

</head>

<body class="h-screen overflow-hidden flex items-center justify-center " style="background: #edf2f7;">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
        <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
            <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-silk font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">The Loot</a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200  rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="dashboard.php">Auction</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900  bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="profile.php">Profile</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="history.php">History</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="../util/logout.php">Log Out</a>

            </nav>

        </div>
        <!-- code here -->
        <div class="flex flex-col mx-auto ">
            <div class="header mx-auto font-silk mt-10">
                <h1 class="font-bold text-center text-5xl">Auction Dashboard</h1>
                <p class="text-2xl text-center mt-1">Bid your item here.</p>
            </div>

            <div class="mt-20 mx-36">
                <h1 class="font-OpenSauce text-left text-base font-bold mb-2">Featured Items</h1>

                <?php include "../util/conn.php";
                $qry_product = mysqli_query($conn, "select * from barang");

                ?>

                <div class="grid grid-cols-4 gap-4">
                    <?php while ($dt_product = mysqli_fetch_array($qry_product)) { ?>

                        <div class="font-OpenSauce flex flex-col justify-between">

                            <img class="object-scale-down h-48 w-96" src="../admin/product_img/<?= $dt_product['img'] ?>" alt="product image">

                            <div class="px-5 pb-5 mt-5">

                                <h3 class="my-1 text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $dt_product['nama_barang'] ?></h3>
                                </a>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-xl font-light text-gray-900 dark:text-white">$<?= $dt_product['harga_awal'] ?></span>
                                    <a href="item.php?id_product=<?= $dt_product['id'] ?>" class="text-white bg-black hover:bg-gray-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-none text-sm px-5 py-2 text-center ">Bid</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>



</body>

</html>