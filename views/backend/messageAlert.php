<?php

use App\Libraries\MessageArt;

?>
<?php if ( MessageArt::has_flash('message')) : ?>
    <?php $messgae = MessageArt::get_flash('message');?>
    <div class="alert alert-<?= $messgae['type']; ?> alert-dismissible fade show" role="alert">
        <strong>Thông Báo</strong> <?= $messgae['msg']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>