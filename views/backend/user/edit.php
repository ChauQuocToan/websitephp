<?php

use App\Models\Category;
use App\Models\Brand;
use App\Models\User;

$id = $_REQUEST['id'];


$row = User::find($id);
$list_category = Category::where('status', '!=', '0')->get();

$list_brand = Brand::where('status', '!=', '0')->get();
$html_category_id = '';
$html_brand_id = '';

foreach ($list_category as $category) {
    if ($category->id == $row->category_id) {
        $html_category_id .= "<option selected value='" . $category->id . "'>" . $category->name . "</option>";
    } else {
        $html_category_id .= "<option  value='" . $category->id . "'>" . $category->name . "</option>";
    }
}
foreach ($list_brand as $brand) {
    if ($brand->id == $row->brand_id) {
        $html_brand_id .= "<option  selected value='" . $brand->id . "'>" . $brand->name . "</option>";
    } else {
        $html_brand_id .= "<option  value='" . $brand->id . "'>" . $brand->name . "</option>";
    }
}
?>
<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
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
                            <a class="btn btn-sm btn-info" href="index.php?option=user">
                                <i class="fas fa-arrow-left"></i>Quay Về Danh Sách
                            </a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-9">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name">Tên thành viên</label>
                                        <input name="name" id="name" type="text" class="form-control" required placeholder="" value="<?= $row->name; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">email</label>
                                        <textarea name="email" id="email" class="form-control" required required placeholder=""><?= $row->email; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">phone</label>
                                        <textarea name="phone" id="phone" class="form-control" required required placeholder=""><?= $row->phone; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username">username</label>
                                        <textarea name="username" id="username" class="form-control" required required placeholder=""><?= $row->username; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">password</label>
                                        <textarea name="password" id="password" class="form-control" required required placeholder=""><?= $row->password; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
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
                            <a class="btn btn-sm btn-info" href="index.php?option=user">
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