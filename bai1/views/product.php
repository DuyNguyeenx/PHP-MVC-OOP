<?php include_once "header.php" ?>

<a href="?ctr=addProduct">
    Add Product
</a>

<article>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Version</th>
                <th>Gear</th>
                <th>Origin</th>
                <th>Action</th>
            </tr>
        </thead> 
        
        <tbody>
        <?php if (count($products) == 0) : ?>
        <?php else : ?>
            <?php foreach ($products as $product) :?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['carName'] ?></td>
                    <td><img src="images/<?= $product['image'] ?? "" ?>" style="width: 100px;"></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['version'] ?></td>
                    <td><?= $product['gear'] ?></td>
                    <td><?= $product['origin'] ?></td>
                    <td><?= $product['brandName'] ?></td>
                    <td>
                        <a href="?ctr=editProduct&id=<?= $product['id'] ?>">Update</a>
                        <a href="?ctr=delete&id=<?= $product['id'] ?? "" ?>" onclick="return confirm('Ban co muon xoa khong?') ">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</article>
<?php include_once "footer.php" ?>