<?php

use App\Models\Menu;

$id = $_REQUEST['id'];
$row = Menu::find($id);
$list = Menu::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) {
    if ($item->id == $row->parent_id) {
        $html_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
    } else {
        $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
    }
    if ($item->sort_oder == $row->sort_oder) {
        $html_sort_order .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau: " . $item->name . "</option>";
    } else {
        $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau: " . $item->name . "</option>";
    }

}
?>
<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật Danh Mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật Danh Mục</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class=" btn btn-sm btn-success">
                                <i class="fas fa-save"></i>Lưu[cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=menu">
                                <i class="fas fa-arrow-left"></i>Quay Về Danh Sách
                            </a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <label for="name">Tên chủ đề</label>
                                <input name="name" value="<?= $row['name']; ?>" id="name" type="text" class="form-control" require placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="link">link</label>
                                <textarea name="link" id="link" class="form-control" required required placeholder=""><?= $row['link']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="type">kiểu menu</label>
                                <textarea name="type" id="type" class="form-control" required required placeholder=""><?= $row['type']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="position">vị trí</label>
                                <textarea name="position" id="position" class="form-control" required required placeholder=""><?= $row['position']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parent_id">chọn cáp cha</label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option value="0">
                                        --Chọn cáp cha--
                                    </option>
                                    <?= $html_parent_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">thứ tự</label>
                                <select id="sort_order" name="sort_order" class="form-control">
                                    <option value="0">
                                        --Chọn thứ tự--
                                    </option>
                                    <?= $html_sort_order; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2" <?= ($row->status == 2) ? 'selected' : ''; ?>>--Chưa xuất bản--</option>
                                    <option value="1" <?= ($row->status == 1) ? 'selected' : ''; ?>>--Đã xuất bản--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class=" btn btn-sm btn-success">
                                <i class="fas fa-save"></i>Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=menu">
                                <i class="fas fa-arrow-left"></i>Quay Về Danh Sách
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>


</form>


<?php require_once('../views/backend/footer.php'); ?>