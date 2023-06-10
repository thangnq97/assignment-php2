<?php require_once __DIR__."/header.php"?>
        <!-- banner -->
        <section class="py-10 text-center flex flex-col gap-5 bg-[#335154]">
            <h2 class="text-[#df453e] font-[800] text-[42px]">Product detail</h2>
            <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Product detail</span></p>
        </section>
        <!-- main -->
        <main class="bg-[#f0f2f2] grid grid-cols-2 px-[50px] py-[69px]">
            <div>
                <img src="./imgs/<?= $product->image?>" alt="">
            </div>
            <div class="py-5 px-4 flex flex-col gap-[50px] justify-center">
                <div class="flex flex-col gap-[22px]">
                    <h3 class="text-[43px] font-[700] tracking-[1.5px] text-[#1b3e41]"><?= number_format($price)?></h3>
                    <p class="text-[16px] font-[400] leading-[24px] text-[#393939] "><?= $product->detail?></p>
                </div>
                <div class="flex gap-5 items-center">
                    <div class="flex gap-3">
                        <button class="item1_btn_sub text-[25px]">-</button>
                        <input class="item1_input border w-[25px] outline-none border-orange-400 text-center text-[20px]" type="text" value="1">
                        <button class="item1_btn_sum text-[20px]">+</button>
                    </div>
                    <div>
                        <button class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Đặt hàng</button>
                    </div>
                </div>
            </div>
</main><?php require_once __DIR__."/footer.php"?>