<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- container -->
    <div class="max-w-[1440px] mx-auto">
        <!-- header -->
        <header class="px-7 py-5 flex justify-between items-center">
            <a href="#">
                <img src="./img/logo.png" alt="">
            </a>
            <div class="flex gap-6">
                <nav>
                    <ul class="flex gap-8">
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="#">Home</a></li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./pages.html">Pages</a></li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./shop.html">Shop</a></li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./blog.html">Blog</a></li>
                    </ul>
                </nav>
                <a href="./cart.html" class="cursor-pointer">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </header>