<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <form action="/update-product" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product->id ?>">
        Name: <input type="text" name="tenhh" id="" value="<?= $product->tenhh ?>">
        <br>
        <img src="images/<?= $product->hinh ?>" alt="" width="120" > <br>
        Image: <input type="file" name="hinh" id="">
        <br>
        <br>
        price: <input type="number" name="gia" id="" value="<?=$product->gia ?>">
        <br>
        Quantity: <input type="number" name="soluong" id="" value="<?=$product->soluong ?>">
        <select name="maloai" id="">
            <?php foreach ($categories as $cate) : ?>
                <option value="<?= $cate->id ?>" <?= ($cate->id === $product->maloai) ? 'selected' : '' ?>>
                    <?= $cate->tenloai ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <button type="submit">Update</button>
    </form>
</body>

</html>