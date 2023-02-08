<?php include_once "header.php" ?>
<article>
    <h2>Add Product</h2>
    <form action="?ctr=add-product" method="post" enctype="multipart/form-data" >
        <input type="text" name="name" id="" placeholder="Name"><br>
        <input type="file" name="image" id=""><br>
        <input type="text" name="price" id="" placeholder="Price"><br>
        <input type="text" name="desc" id="" placeholder="Description"><br>
        <input type="text" name="version" id="" placeholder="Verison"><br>
        <input type="text" name="gear" id="" placeholder="Gear"><br>
        <input type="text" name="origin" id="" placeholder="Origin"><br>
        Brand: <select name="brand_id">
            <?php foreach($brand as $brands): ?>
                <option value="<?= $brands['id']?>"><?= $brands['brandName']?></option>
            <?php endforeach?>
        </select><br>
        <br> <button type="submit" name="add_prd">Add</button>
    </form>
</article>
<?php include_once "footer.php" ?>