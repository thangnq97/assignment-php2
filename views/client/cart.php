<?php require_once __DIR__."/header.php"?>
        <!-- banner -->
        <section class="py-10 text-center flex flex-col gap-5 bg-[#335154]">
            <h2 class="text-[#df453e] font-[800] text-[42px]">Shopping cart</h2>
            <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Cart</span></p>
        </section>
        <!-- main -->
        <main class="grid grid-cols-2 gap-8 px-7">
            <!-- product -->
            <section class="flex flex-col gap-5 px-6 py-6">
                <div class="grid grid-cols-4 border-b">
                    <a href="#">
                        <img src="./img/shopping1.jpg" alt="">
                    </a>
                    <div class="col-span-3 flex flex-col justify-center ">
                        <h4 class="text-[14px] font-[600] text-[#335154] mt-3 mb-2">ROAD BICYCLES</h4>
                        <div class=" flex justify-between">
                            <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">512.00</p>
                            <div class="flex items-center gap-2">
                                <button class="item1_btn_sub text-[25px]">-</button>
                                <input class="item1_input border w-[25px] outline-none border-orange-400 text-center text-[20px]" type="text" value="1">
                                <button class="item1_btn_sum text-[20px]">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-4 border-b">
                    <a href="#">
                        <img src="./img/shopping2.jpg" alt="">
                    </a>
                    <div class="col-span-3 flex flex-col justify-center ">
                        <h4 class="text-[14px] font-[600] text-[#335154] mt-3 mb-2">ROAD BICYCLES</h4>
                        <div class=" flex justify-between">
                            <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">125.00</p>
                            <div class="flex items-center gap-2">
                                <button class="item2_btn_sub text-[25px]">-</button>
                                <input class="item2_input border w-[25px] outline-none border-orange-400 text-center text-[20px]" type="text" value="1">
                                <button class="item2_btn_sum text-[20px]">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- order -->
            <section class="border-l px-6 py-6">
                <h3 class="text-center text-[24px] font-[600] uppercase mb-5">Tóm tắt đơn hàng</h3>
                <div class="flex justify-between mb-3">
                    <p class="text-[14px] font-[600]">Tổng giá trị sản phẩm:</p>
                    <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">$<span class="total_price1">100</span></p>
                </div>
                <div class="flex justify-between mb-3">
                    <p class="text-[14px] font-[600]">Phí vận chuyển:</p>
                    <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">Miễn phí</p>
                </div>
            <hr>
                <div class="flex justify-between mt-3 mb-8">
                    <b class="text-[22px] font-[700]">Tổng tiền:</b>
                    <b class="text-[#df453e] font-[600] text-[20px] text-[df453e] tracking-[1.5px]">$<span class="total_price2">100</span></b>
                </div>
                <div class="flex justify-center">
                    <a href="./contact.html"><button class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Tiến hành đặt hàng</button></a>
                </div>
            </section>
        </main>
<?php require_once __DIR__."/footer.php"?>