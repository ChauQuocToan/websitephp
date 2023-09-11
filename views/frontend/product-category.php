<?php

use App\Models\Category;
use App\Models\Product;
use App\Libraries\Phantrang;

$slug = $_REQUEST['cat'];
$row_cat = Category::where([['status', '=', 1], ['slug', '=', $slug]])->first();
$list_category_id = array();
array_push($list_category_id, $row_cat->id);
$list_category1 = Category::where([['status', '=', '1'], ['parent_id', '=', $row_cat->id]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_category_id, $row_cat1->id);
        $list_category2 = Category::where([['status', '=', '1'], ['parent_id', '=', $row_cat1->id]])
            ->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2); {
                array_push($list_category_id, $row_cat2->id);
                $list_category3 = Category::where([['status', '=', '1'], ['parent_id', '=', $row_cat2->id]])
                    ->get();
                if (count($list_category3) > 0) {
                    foreach ($list_category3 as $row_cat3) {
                        array_push($list_category_id, $row_cat3->id);
                    }
                }
            }
        }
    }
}
//phân trang 
$page = Phantrang::pageCurrent();
$limit = 6;
$offset = Phantrang::pageOffset($page, $limit);

$total = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)->count();
$pageNumber = ceil($total / $limit);
$pageLink = "";
for ($i = 1; $i <= $pageNumber; $i++) {
    $pageLink .= "<a href='index.php?option=product&cat=" . $slug . "&page=$i'>$i</a>";
}
//end
$product_list = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->take($limit)
    ->get();
?>
<?php require_once('views/frontend/header.php'); ?>
<section class="'content my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3 my-5">
                <?php
                require_once('views/frontend/mod_listcategory.php');
                require_once('views/frontend/mod_listbrand.php');
                ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center linh"><?= $row_cat->name; ?></h2>
                <div class="row">
                    <?php foreach ($product_list as $product) : ?>
                        <div class="col-md-3 mb-3">
                            <div class="product-item border border-3">
                                <div class="position-relative">
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
            <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product&cat=' . $slug); ?></div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>