<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Loot</title>
    <?php include 'partials/tailwind.php' ?>
    <?php include './partials/font.php' ?>

</head>



<body class="m-0 p-0 bg-[#eeeeee] selection:bg-gray-900 selection:text-secondary">

    <?php include './partials/navbar.php' ?>

    <div class="flex justify-evenly">
        <div class="">

            <img class="mx-5 object-scale-down max-w-5xl max-h-[53rem]" src="public/img/bust-of-neptune.jpg" alt="bust of neptune">

        </div>
        <div class="hero-text ">
            <div class="mb-12">
                <h1 class="font-serif font-silk text-9xl border-t-4 border-gray-900">Bust of Neptune</h1>

                <p class=" mb-7 font-OpenSauce font-medium text-2xl ml-auto">
                    Lambert-Sigisbert Adam
                </p>
                <a href="login.php" class="border-b-2 border-gray-700">ENQUIRE</a>

            </div>

            <div class="flex justify-between">
                <div>
                    <img src="public/img/martin.jpg" alt="martin frileux au luxembourg" class=" object-scale-down max-w-md max-h-[24rem]">
                    <p class="mt-2 mb-7">Martin Frileux au Luxembourg <br>
                        Alice Bailly</p>
                    <a href="#" class="  border-b-2 border-gray-700">ENQUIRE</a>
                </div>
                <div class="">
                    <img src="public/img/Les ferdeaux.jfif" alt="Les fardeaux" class="object-scale-down max-w-md max-h-[24rem]">
                    <p class="mt-2 mb-7">Les fardeaux
                        <br>
                        Ernest Biéler
                    </p>
                    <a href="#" class="  border-b-2 border-gray-700">ENQUIRE</a>
                </div>
            </div>

        </div>
    </div>
</body>

</html>