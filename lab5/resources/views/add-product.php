<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <form action="/create-product" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="tenhh" id="">
        <br>
        Image: <input type="file" name="hinh" id="">
        <br>
        <br>
        price: <input type="number" name="gia" id="">
        <br>
        Quantity: <input type="number" name="soluong" id="">
        <br>
        Type:  <select name="maloai" id="">
            <?php foreach ($categories as $cate): ?>
                <option value="<?= $cate->id ?>"><?= $cate->tenloai ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit">Add</button>
    </form>
</body>

</html>