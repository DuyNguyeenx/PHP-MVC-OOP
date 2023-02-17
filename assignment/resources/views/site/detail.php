<?php include_once __DIR__."/header.php" ?>
        <section>
            <div class="grid grid-cols-2 gap-[93px]">
                <div>
                    <img class="ml-[164px] mt-[100px] mb-[28px]" width="500px" src="images/anh3.png" alt="">
                </div>
                <div class="mt-[23px]">
                    <div class="flex"><p class="text-[24px] font-medium ">Thương hiệu: <span class="text-blue-800"><?= $product->b_name ?></span> </p>
                    
                    <p class="mx-[15px]">|</p>
                    <p class="text-[24px] font-medium ">Tình trạng: <?= $product->quantity == 0 ? "hết hàng" : "còn hàng" ?></p></div>
                    <p class="text-[36px] font-medium my-[12px]" ><?= $product->title ?></p>
                    <h3 class="text-[40px] font-bold"><?= $product->price ?>đ</h3>
                    <input type="hidden" name="category" value="<?= $product->category_id . "|" . $product->b_name ?>">
                    <p class="text-[24px] font-medium  w-[473px]">Chi Tiet San Pham:  <?= $product->description ?><br>
                        
                    </p>
                    <form class="text-white text-[30px] font-bold" action="/addProduct" method="post">
                    <input type="text" hidden name="title" value="<?= $product->title  ?>">
                    <input type="text" hidden name="price" value="<?= $product->price  ?>">
                    <input type="text" hidden name="images" value="<?= $product->images  ?>">
                    <p class="text-[24px] text-black font-medium">Chọn Số lượng:</p>
                    <div class="flex mb-[20px] w-[120px] border-red border-2">
                        <button type="button" onClick='decreaseCount(event, this)' class="text-black rounded-l-lg outline-none border-solid border-black w-[23px] h-[33px]"><span class="down">-</span></button>
                        <input name="numberQuantity" class="text-black outline-none border-solid border-black text-center w-[80px]" type="text" value="1">
                        <button type="button" onClick='increaseCount(event, this)' class="text-black rounded-r-lg outline-none border-solid border-black w-[23px]"><span class="up">+</span></button>
                    </div>
                        <button type="submit" class=" bg-[#302887] rounded-[40px] w-[359px] py-[8px] mr-[14px]">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </section>
        <section class="mt-[60px] ml-[79px] mr-[46px]">
            <div class="flex mb-[40px]">
                <div class="">
                    <img src="images/ngoi-sao.png" alt="">
                </div>
                <p class="text-[32px] font-bold ml-[21px] mt-[15px]">Sản phẩm mới nhất</p>
            </div>
            <div class="grid grid-cols-3 gap-[56px] mb-[20px]">
            <?php foreach ($hds as $san_pham) : ?>
                <a href="/detail?id=<?= $san_pham->id ?>">
                <div class="bg-[#F7EEEE] block text-center font-bold rounded-[20px]">
                    <img src="/images/<?= $san_pham->images ?>" class="w-[225px] mx-[85px] mt-[17px]">
                    <p class="text-[20px] my-[20px]"><?= $san_pham->title ?></p>
                    <p class="text-[20px] my-[20px]"><?= $san_pham->price ?></p>
                    <button type="submit" class="bg-[#DFA40D] rounded-[40px] text-[30px] w-[180px] py-[10px] mb-[26px]">Mua</button>
                </div>
                </a> 
                <?php endforeach; ?>
            </div>
        </section>
        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16">
  <div class="px-20 mx-auto">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments</h2>
    </div>
    <form class="mb-6" action="/post_comment?id=<?php echo $product->id ?>" method="post">
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Yo ur comment</label>
            <textarea id="comment" rows="6"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..." required name="description"></textarea>
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Post comment
        </button>
    </form>
    
    <?php foreach ($comments as $comment) : ?>
    <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
        <footer class="flex justify-between items-center pb-[20px]">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                        class="mr-2 w-6 h-6 rounded-full"
                        src="images/<?= $comment->image ?>"
                        alt=""><?= $comment->full_name ?></p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23"
                        title="June 23rd, 2022"><?= $comment->created_at ?></time></p>
                
            </div>
            
        </footer>
        <p class="text-gray-500 dark:text-gray-400"><?= $comment->description ?></p>
    </article>
    <?php endforeach; ?>
  </div>
  <script type="text/javascript">
    function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
    }

    function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value) ? 0 : value;
            value--;
            input.value = value;
        }
    }
</script>
  <?php include_once __DIR__."/footer.php" ?>