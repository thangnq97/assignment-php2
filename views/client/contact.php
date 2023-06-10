<?php require_once __DIR__."/header.php"?>
        <!-- banner -->
        <section class="py-10 text-center flex flex-col gap-5 bg-[#335154]">
            <h2 class="text-[#df453e] font-[800] text-[42px]">Contact us</h2>
            <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Contact Us</span></p>
        </section>
        <!-- main -->
        <main class="my-[64px] px-9 grid grid-cols-2 gap-5">
            <!-- get info -->
            <section>
                <h2 class="font-[800] text-[42px] leading-[52px] text-[#335154] mb-[52px]">Get Info</h2>
                <div class="grid grid-cols-2 gap-y-10">
                    <div class="grid grid-cols-5 gap-4">
                        <div class="border border-red-400 flex justify-center items-center">
                            <i class="text-black fa-sharp fa-solid fa-location-dot"></i>
                        </div>
                        <div class="col-span-4">
                            <h4 class="text-[20px] font-[400] tracking-[1px]">LOCATION</h4>
                            <p class="text-[14px] font-[400] text-[#393939]">Trịnh Văn Bô - Hà Nội</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4">
                        <div class="border border-red-400 flex justify-center items-center">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="col-span-4">
                            <h4 class="text-[20px] font-[400] tracking-[1px]">PHONE</h4>
                            <p class="text-[14px] font-[400] text-[#393939]">(+84)344750590</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4">
                        <div class="border border-red-400 flex justify-center items-center">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="col-span-4">
                            <h4 class="text-[20px] font-[400] tracking-[1px]">EMAIL</h4>
                            <p class="text-[14px] font-[400] text-[#393939]">thangnqph28950@fpt.edu.vn</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4">
                        <div class="border border-red-400 flex justify-center items-center">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="col-span-4">
                            <h4 class="text-[20px] font-[400] tracking-[1px]">OPENING HOURS</h4>
                            <p class="text-[14px] font-[400] text-[#393939]">Mon-Sat 09:00 AM - 18:00 PM</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- form -->
            <section>
                <form class="form w-[80%]" action="">
                    <input class="user_name border pl-3 py-3 outline-none w-full mb-4" type="text" placeholder="Your name">
                    <div class="mb-4 flex justify-between">
                        <input class="email border pl-3 py-3 outline-none w-[48%]" type="text" placeholder="Your address">
                        <input class="phone border pl-3 py-3 outline-none w-[48%]" type="text" placeholder="Your phone">
                    </div>
                    <textarea class="message border pl-3 py-3 outline-none w-full mb-4" placeholder="Message" name="" id="" cols="30" rows="5"></textarea>
                    <input class="w-full bg-red-500 text-white h-[50px] cursor-pointer uppercase text-[]" type="submit" value="submit">
                </form>
            </section>
        </main>
<?php require_once __DIR__."/footer.php"?>