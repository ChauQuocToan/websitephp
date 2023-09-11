<?php

use App\Models\Product;
use App\Libraries\Phantrang;
//phan trang
$limit = 12;
$page = Phantrang::pageCurrent();
$offset = Phantrang::pageOffset($page, $limit);
$total = Product::where('status', '=', 1)->count();
$pageNumber = ceil($total / $limit);

$list_product = Product::where('status', '=', 1)
    ->skip($offset)
    ->take($limit)
    ->orderBy('created_at', 'DESC')->get();
?>
<?php require_once('views/frontend/header.php'); ?>

<section class="maincontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3 my-5">
                <?php
                require_once('views/frontend/mod_listcategory.php');
                require_once('views/frontend/mod_listbrand.php');
                ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">
                    TẤT CẢ SẢN PHẨM
                </h2>
                <div class="row">
                    <?php foreach ($list_product as $product) : ?>
                        <div class="col-md-3 mb-3">
                            <div class="product-item border border-3">
                                <div class="position-relative text-center">
                                    <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                        <img class="img-fluid" src="public/images/product/<?= $product->image; ?>" class="rounded mx-auto d-block" width="250" alt="<?= $product->name; ?>">
                                    </a>
                                </div>
                                <h3 class="product-name text-center">
                                    <a class="linh" href="index.php?option=product&id=<?= $product->slug; ?>">
                                        <?= $product->name; ?>
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <div class="row">
                                        <div class="product-price linh">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-center">Gía bán:<?= number_format($product->price); ?>VNĐ</p>
                                                </div>
                                                <div class="text-center">
                                                    <a href="index.php?option=cart&addcart=<?= $product->id; ?>">
                                                        <div class="mua anh1 my-3">
                                                            <button type="button" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i>Thêm vào giỏ hàng</button>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product'); ?></div>
    </div>

    </div>
</section>

<?php require_once('views/frontend/footer.php'); ?>