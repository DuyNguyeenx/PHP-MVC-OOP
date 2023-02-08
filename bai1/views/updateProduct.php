<?php include_once "header.php" ?>
<article>
    <h2>Update Product</h2>
    <form action="?ctr=update-product&id=<?=$get_id?>" method="post" enctype="multipart/form-data" >
        <input type="text" name="name" id="" placeholder="Name" value="<?= $row['carName'] ?? '' ?>"><br>
        <img src="images/<?= $row['image'] ?? "" ?>" style="max-width:100px ;" alt="">
        <input type="hidden" value="<?= $row['image'] ?>" name="prev_img">
        <input type="file" name="image" id="" placeholder="Image"><br>
        <input type="text" name="price" id="" placeholder="Price" value="<?= $row['price'] ?? '' ?>"><br>
        <input type="text" name="desc" id="" placeholder="Description" value="<?= $row['description'] ?? '' ?>"><br>
        <input type="text" name="version" id="" placeholder="Verison" value="<?= $row['version'] ?? '' ?>"><br>
        <input type="text" name="gear" id="" placeholder="Gear" value="<?= $row['gear'] ?? '' ?>"><br>
        <input type="text" name="origin" id="" placeholder="Origin" value="<?= $row['origin'] ?? '' ?>"><br>
        Brand: <select name="brand_id">
        <?php foreach ($rows_brand as $brand) : ?>
                <option <?= $brand['id'] == $row['brand_id'] ? 'selected' : "" ?> value="<?= $brand['id'] ?? "" ?>">
                  <?= $brand['brandName'] ?? "" ?>
                </option>
                <?php endforeach; ?>
        </select><br>
        <br> <button type="submit" name="up_prd">Update</button>
    </form>
</article>
<?php include_once "footer.php" ?>