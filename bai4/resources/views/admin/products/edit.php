<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <form action="/update-product" method="post" enctype="multipart/form-data">
        <!--Lấy id đưa vào form-->
        <input type="hidden" name="id" value="<?= $product->id ?>">
        Name: <input type="text" name="name" value="<?= $product->name ?>">
        <br>
        <img src="images/<?= $product->image ?>" width="100" alt="">
        <br>
        Image: <input type="file" name="image">
        <br>
        Category:
        <select name="cate_id" id="">
            <?php foreach ($categories as $cate) : ?>
                <option value="<?= $cate->id ?>" <?= ($cate->id === $product->cate_id) ? 'selected' : '' ?>>
                    <?= $cate->cate_name ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        price: <input type="number" name="price" value="<?= $product->price ?>">
        <br>
        Short Description
        <textarea name="short_desc" id="" cols="90" rows="5"><?= $product->short_desc ?></textarea>
        <br>
        Detail:
        <textarea name="detail" id="" cols="90" rows="10"><?= $product->detail ?></textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>

</html>