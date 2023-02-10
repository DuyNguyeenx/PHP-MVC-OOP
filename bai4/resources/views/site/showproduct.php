<h1>Show Product</h1>
<?php foreach ($products as $product) : ?>
    <div>
        <h3><?php echo $product->name ?></h3>
        <p><?php echo $product->detail ?></p>
    </div>
<?php endforeach ?>