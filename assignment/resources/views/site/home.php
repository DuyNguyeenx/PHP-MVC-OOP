<?php include_once __DIR__."/header.php" ?>

    <section class="">
        <img src="images/banner.png" alt="">
    </section>
    <div class=" flex justify-center list-none ">

      <div class=" ">
        <div class=" text-center py-4 pb-4 font-bold text-4xl text-red-600 ">
          <p>Sản Phẩm</p>
        </div>
        <!-- <nav>
          <li>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
          </li>
        </nav> -->
        <div class="grid grid-cols-4 gap-32 flex justify-center ">
          
          <?php foreach($products as $product) : ?>
            <div class="py-4">
              <a href="/detail?id=<?= $product->id ?>" class="text-center text-base font-bold  ">
              <img class="mb-[20px] mx-[30px]" src="/images/<?= $product->images ?>" alt="" width="200">
                <li><?= $product->title ?></li>
                  <li class="py-2 text-red-600"><?= $product->price ?>đ</li>
                </a>
              </div>
              <?php endforeach ?>
          
          
          
          
          
          
          
          
        </div>
        
      </div>
    </div>
    <?php include_once __DIR__."/footer.php" ?>