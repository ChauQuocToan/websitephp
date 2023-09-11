<?php

use App\Models\Menu;

$agrs_footer = [
    ['status', '=', 1],

    ['position', '=', 'footerMenu']
];
$list_menu_footer = Menu::where($agrs_footer)->get();
?>


<section>
    <div class="container">
        <h3>THÔNG TIN CHÍNH SÁCH</h3>
        <ul>
            <?php foreach ($list_menu_footer as $menu_footer) : ?>
                <li><a class="text-dark" style="text-decoration: none" href="<?= $menu_footer->link; ?>"> <?= $menu_footer->name; ?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>