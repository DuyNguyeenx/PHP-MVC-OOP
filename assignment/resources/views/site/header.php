<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="mx-[10px] max-w-[1440px] mx-auto">
    <section class="bg-[#253796] flex justify-around ">
    <a href="/home"><img class="py-[30px] " src="images/logo.png" alt=""></a>
    <form class="bg-[#AE2B2B] flex h-[76px] w-[482px] rounded-[50px]  my-[25px]">
        <input type="text" name="" id="" value="Tìm sản phẩm" class="pl-[37px] bg-[#AE2B2B] rounded-l-[50px] text-[32px] text-white border-r-2 border-black">
        <button class="ml-[20px] w-[40px]"><img src="images/icons/magnifying.svg" alt=""></button>
    </form>
    <div class="flex  pl-[20px]">
        <a href="/cart" class="flex">
            <p class="text-[30px] text-white my-[30px] w-[91px] leading-[35px]">Giỏ Hàng</p>
            <img src="images/icons/bag.svg" class="w-[62px]" alt="">
        </a>
        <?php if (!isset($_SESSION['user'])) :  ?>
        <a href="/signin" class="">
            <p class="my-[30px] ml-[50px] w-[198px] h-[65px] bg-[#FFFFFF] text-[32px] text-center pt-[5px]">Đăng nhập</p>
        </a>
        <?php else : ?>
                    <?php $user = $_SESSION['user']; ?>
                    
                    <div class="pl-[40px] pt-[32px] text-white font-medium text-[20px]">
                        <div>
                            <a class=" " href=""><?= $user->full_name ?></a>
                        </div>
                        <a class=" underline" href="/log_out">Log out</a>
                    </div>
                <?php endif; ?>
    </div>
    </section>

    <section>
                <ul class="flex text-[32px] justify-around border-black border-b-2 pb-[8px] pt-[8px]">
                    <li><a href="" class=" border-r-2 border-black  pr-[40px] pb-[12px] pt-[10px] hover:text-orange-400">Thực phẩm chức năng
                    </a></li>
                    <li><a href="" class="  pr-[120px] pb-[12px] border-r-2 border-black pt-[10px] hover:text-orange-400">Thuốc</a></li>
                    <li><a href="" class=" border-r-2 border-black pr-[120px] pb-[12px] pt-[10px] hover:text-orange-400">Thiết Bị Y Tế</a></li>
                    <li><a href="/contact" class=" pb-[10px] hover:text-orange-400" >Thông tin hỗ trợ</a></li>
                </ul>
            </section>