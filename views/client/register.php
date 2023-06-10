<?php require_once __DIR__."/header.php"?>

<main class="flex mt-[64px] gap-[50px]">
    <div class="flex-[1]">
        <img src="./imgs/banner.png" alt="">
    </div>
    <div class="flex flex-[1] flex-col gap-[30px]">
        <h3 class="text-black text-[22px] font-semibold text-center">Register</h3>
        <form action="" method="POST" class="flex flex-col gap-[25px]">
            <div class="flex flex-col gap-[10px]">
                <label for="">username</label>
                <div>
                    <input class="border pl-3 py-3 outline-none w-[48%] focus:border-blue-300" placeholder="username" name="username" type="text">
                    <p class="text-red-500 font-[300] text-[15px]"><?= $err['username'] ?? '';?></p>
                </div>
                </div>
            <div class="flex flex-col gap-[10px]">
                <label for="">email</label>
                <div>
                    <input class="border pl-3 py-3 outline-none w-[48%] focus:border-blue-300" placeholder="email" name="email" type="email">
                    <p class="text-red-500 font-[300] text-[15px]"><?= $err['email'] ?? '';?></p>
                </div>
            </div>
            <div class="flex flex-col gap-[10px]">
                <label for="">password</label>
                <div>
                    <input class="border pl-3 py-3 outline-none w-[48%] focus:border-blue-300" placeholder="password" name="password" type="password">
                    <p class="text-red-500 font-[300] text-[15px]"><?= $err['password'] ?? '';?></p>
                </div>
            </div>
            <div class="flex flex-col gap-[10px]">
                <div><input type="submit" value="submit" class="px-[10px] py-[5px] bg-[#df453e] text-white hover:bg-[#335154] hover:text-[#df453e] rounded"></div>
            </div>
        </form>
    </div>
</main>

<?php require_once __DIR__."/footer.php"?>