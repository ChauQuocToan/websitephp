<?php

use App\Models\Category;
use App\Models\Product;

$list_category = Category::where([['status', '=', '1'], ['parent_id', '=', 0]])
     ->orderBy('sort_order', 'ASC')
     ->get();


?>
<?php require_once('views/frontend/header.php'); ?>
<section class="'content s2">
     <?php require_once('views/frontend/mod_slider.php'); ?>
     <!--end section_slider-->
     <section class="content">
          <div class="container s2">
               <?php foreach ($list_category as $row_cat) : ?>
                    <?php
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
                    $product_list = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)
                         ->orderBy('created_at', 'DESC')
                         ->take(10)
                         ->get();
                    ?>
                    <h3 class="text-center mau">
                         <a class="toan" href="index.php?option=product&cat=<?= $row_cat->slug; ?>">
                              <?= $row_cat->name; ?>
                         </a>
                    </h3>
                    <div class="row">
                         <?php foreach ($product_list as $product) : ?>
                              <div class="col-md-3 mb-3">
                                   <div class="product-item border border-3 toan">
                                        <div class="position-relative text-center">
                                             <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                                  <img class="img-fluid" src="public/images/product/<?= $product->image; ?>" class="rounded mx-auto d-block" width="300" height="300" alt="">
                                             </a>
                                        </div>
                                        <h3 class="product-name text-center toan">
                                             <a class="toan" href="index.php?option=product&id=<?= $product->slug; ?>">
                                                  <?= $product->name; ?>
                                             </a>
                                        </h3>
                                        <div class="product-price toan">
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
                         <?php endforeach; ?>
                    </div>
               <?php endforeach; ?>
               <hr>
             
     </section>
     <?php require_once('views/frontend/footer.php'); ?>