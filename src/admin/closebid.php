<?php include '../util/conn.php';
require_once '../util/guard.php';
checkLogin();
allow_page_access_exclusive(["admin", "staff"]);

$id = $_GET['id']

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Closing Bid on <?= $item['nama_barang'] ?></title>
    <link rel="stylesheet" href="../../public/css/output.css">
</head>

<body>


    <?php $sql = "select barang.nama_barang , lelang.id_barang , masyarakat.nama , lelang.id_masyarakat , lelang.tgl_lelang, lelang.harga_akhir , lelang.status, lelang.id
                                        FROM lelang
                                        INNER JOIN barang ON lelang.id_barang = barang.id
                                        INNER join masyarakat on lelang.id_masyarakat = masyarakat.id 
                                        where lelang.id = '" . $id . "';";
    $result = mysqli_query($conn, $sql);
    $item = mysqli_fetch_assoc($result);
    ?>

    <div class="flex flex-col mx-auto w-4/12 justify-center mt-10">
        <form class="border-2 border-black" action="closebid.post.php?id=<?= $_GET['id']
                                                                            ?>" method="post">
            <div class="mb-6">
                <label for="item" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Item name</label>
                <h1><?= $item['nama_barang'] ?></h1>


            </div>
            <div class="mb-6">
                <label for="bid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">close bid</label>
                <select id="avail" name="status" class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="available">available</option>
                    <option value="sold out">sold out</option>

                </select>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

</body>

</html>