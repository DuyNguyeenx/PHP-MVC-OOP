<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <table border="1">
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>
            <a href="create-product">Thêm</a>
        </th>

        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product->id ?></td>
                <td><?= $product->name ?></td>
                <td>
                    <img src="images/<?= $product->image ?>" width="120" alt="">
                </td>
                <td>Action</td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>