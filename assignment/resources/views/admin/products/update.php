<?php include_once __DIR__ . "/../header_admin.php" ?>;

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Chỉnh sửa sản phẩm</h5>
            <!--end::Page Title-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Form thông tin sản phẩm mới</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="/admin/product-update" enctype="multipart/form-data">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $product->id ?>">
                    <div class="form-group">
                        <label>Tên Sản Phảm</label>
                        <input type="text" name="title" class="form-control" placeholder="Nhập vào tên danh mục"
                            value="<?= $product->title ?>" />
                        <!-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> -->
                    </div>
                    <div class="form-group">
                        <label>Danh mục Sản Phảm</label>
                        <select name="category_id" id="" class="form-control select2">
                            <?php foreach ($categories as $cate): ?>
                                <option value="<?= $cate->id ?>" <?=($cate->id === $product->category_id) ? 'selected' : '' ?>>
                                    <?= $cate->name ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <!-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> -->
                    </div>
                    <div class="form-group">
                        <label>Hãng Sản Phảm</label>
                        <select name="brand_id" id="" class="form-control select2">
                            <?php foreach ($brands as $brand): ?>
                                <option value="<?= $brand->id ?>" <?=($brand->id === $product->brand_id) ? 'selected' : '' ?>>
                                    <?= $brand->name ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <!-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> -->
                    </div>
                    <div class="form-group">
                        <label>Số lượng Sản Phảm</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Nhập vào tên danh mục"
                            value="<?= $product->quantity ?>" />
                        <!-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> -->
                    </div>
                    <div class="form-group mb-1">
                        <label for="descriptionCategoryInput">Mô tả danh mục</label>
                        <textarea name="description" rows="9" cols="170" class="form-control" id="descriptionCategoryInput"
                            rows="3"><?= $product->description ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label> 
                        <input type="file" name="images" class="form-control" placeholder="Nhập vào tên danh mục"/>
                        <!-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> -->
                        <img src="/images/<?= $product->images ?>" width="120" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
                    <a href="/admin/product" class="btn btn-default">Quay về</a>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div><!--end::Entry-->
<?php include_once __DIR__ . "/../footer_admin.php" ?>;