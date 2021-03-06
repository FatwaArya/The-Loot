<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'tailwind.php' ?>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css" />


</head>


<body>

    <nav class="my-3 flex justify-end">
        <div class="container flex flex-wrap justify-between items-center mx-auto ">
            <a href="#" class="no-underline">
                <img class="scale-100 " src="public/img/Asset 1@4x2.png" alt="The Loot">

            </a>
            <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col mt-4 font-OpenSauce font-medium md:flex-row md:space-x-8 md:mt-0 md:text-sm ">

                    <li>
                        <a href="../UKL_lelang/login.php" class="block py-2 pr-4 pl-3 text-gray-700  ">Purchase</a>
                    </li>
                    <li>
                        <a href="../UKL_lelang/login.php" class="block py-2 pr-4 pl-3 text-gray-700  ">Auctions</a>
                    </li>
                    <li>
                        <a href="../UKL_lelang/login.php" class="block py-2 pr-4 pl-3 text-gray-700  ">Information</a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
</body>

</html>