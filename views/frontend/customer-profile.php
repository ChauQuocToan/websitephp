<?php
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
?>
<?php require_once('views/frontend/header.php'); ?>
<?php 
$id=$_SESSION['user_id'];
$row=Order::where('user_id','=',$id)->first();
$oder=Orderdetail::where('user_id','=',$row->user_id)->get();
?>
<section class="'content">
<div class="container mt-3">
<div class="row">
    <div class="col-3">
        <?php
          require_once('views/frontend/mod_listcategory.php');
          require_once('views/frontend/mod_listbrand.php');
        ?>
    </div>
    <div class="col-8">
    <section class="maincontent">
        <div class="p-2">
        <h5>Đơn hàng đã mua</h5>
        </div>
    <div class="container bg-light">
            <table class="table table-bordered border-black">

                <tr>
                    <th>pro_id</th>
                    <th>hình</th>
                    <th>Số lượng</th>
                    <th>tổng tiền</th>
                   
                </tr>
                <?php foreach ($oder as $cart) : ?>
                    <?php
                    $product = Product::find($cart['product_id']);
                    ?>
                    <tr>
                      <th><?= $cart['product_id']; ?></th>
                      <th><img class="img-fluid" src="public/images/product/<?= $product->image; ?>" class="rounded mx-auto d-block" width="250" alt="<?= $product->name; ?>"></th>
                      <th><?= $cart->qty; ?></th>
                      <th><?= $cart->amount; ?></th>
                    </tr>
                    <?php endforeach; ?>
                   
                
        
            </table>

    </div>
</section>

    </div>
</div>
</div>
</section>

<?php require_once('views/frontend/footer.php'); ?>