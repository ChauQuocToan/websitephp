<?php
use App\Models\Post;
$slug =$_REQUEST['cat'];
$args_page = [ 
    ['status','=',1],
    ['slug','=', $slug]

];

$row_post = Post::where($args_page)->first();
?>

<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <div class="container">
        <div class="row product-header">
            <div class="col-md-6">
                <img src="public/images/product/<?= $row_post->image; ?>" alt="">
            </div>
            <div class="col-md-6">
                <h1><?= $row_post->title; ?></h1>
                 <p><?= $row_post->detail;?></p>
            </div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>