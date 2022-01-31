<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Loot Register</title>
    <?php include 'partials/tailwind.php' ?>
</head>

<body>
    <!-- <div class="grid grid-cols-2 "> -->
    <!-- <div class="w-4/6 absolute left-0 h-full bg-no-repeat bg-center" style="background-image: url(public/img/bust-of-neptune.jpg)"> -->
    <!-- <img src="public/img/bust-of-neptune.jpg" alt=""> -->
    <!-- </div> -->

    <div class="w-2/6 absolute right-0 h-full flex flex-col justify-center ">

        <div class="mx-20">
            <div class="logo ">
                <a href="index.php">
                    <img src="public/img/Asset 1@4x2.png" alt="">
                </a>
            </div>
            <form class="" action="register.post.php" method="post">
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input name="name" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                    <input name="username" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
                    <input name="email" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                    <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required type="password">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
                    <input name="phone" class="appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required type="text">
                </div>
                <button type="submit" class="text-gray-800 outline outline-1 border-black bg-white hover:bg-gray-800 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Register</button>
            </form>
        </div>


    </div>
    <!-- 
    </div> -->

</body>

</html>