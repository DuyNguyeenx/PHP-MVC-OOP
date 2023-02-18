<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>

<body>
<!-- <?php if ($message != '') : ?>
        <p><?= $message ?></p>
    <?php endif ?> -->
    <table border="1">
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Ma loai</th>
        <th>
            <a href="/create-product">Thêm</a>
        </th>

        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product->id ?></td>
                <td><?= $product->tenhh ?></td>
                <td>
                    <img src="images/<?= $product->hinh ?>" width="120" alt="">
                </td>
                <td><?= $product->gia ?></td>
                <td><?= $product->soluong ?></td>
                <td><?= $product->maloai ?></td>
                <td>
                    <a href="/update-product?id=<?= $product->id ?>">Edit</a>
                    <a href="/delete-product?id=<?= $product->id ?>" onclick="return confirm('Ban co muon xoa khong?')">Delete</a>
                </td>   
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>