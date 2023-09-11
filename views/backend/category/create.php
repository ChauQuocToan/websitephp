<?php

use App\Models\Category;


$list = Category::where('status','!=','0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item){ 
    $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
    $html_sort_order .= "<option value='" . ($item->sort_order + 1 ) . "'>Sau: " . $item->name . "</option>";
}
?>
<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->       
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Danh Mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Thêm Danh Mục</li>
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
                        <button name="THEM" type="submit" class=" btn btn-sm btn-success">
                            <i class="fas fa-save"></i>Lưu[Thêm]
                        </button>
                        <a class="btn btn-sm btn-info" href="index.php?option=category">
                            <i class="fas fa-arrow-left"></i>Quay Về Danh Sách
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-md-9">
                   <div class="mb-3">
                                <label for="name">Tên chủ đề</label>
                                <input name="name" id="name" type="text" class="form-control" require placeholder="VD: Balo chanel">
                            </div>
                       <div class="mb-3">
                           <label for="metadesc">Mô tả(SE0)</label>
                           <textarea name="metadesc" id="metadesc" class="form-control" required required placeholder="VD: Balo chanel"></textarea>
                       </div>
                       <div class="mb-3">
                           <label for="metakey">Từ khoá(SE0)</label>
                           <textarea name="metakey" id="metakey" class="form-control" required required placeholder="VD: Balo chanel, Balo LOUIS VUITTON"></textarea>
                       </div>
                   </div>
                   <div class="col-md-3">
                        <div class="mb-3">
                           <label for="parent_id">Chủ đề cha</label>
                           <select id="parent_id" name="parent_id" class="form-control">
                               <option value="0">
                                    --Chọn cáp cha--
                               </option>
                               <?=$html_parent_id;?>
                           </select>
                         </div>
                         <div class="mb-3">
                           <label for="sort_order">Vị trí</label>
                           <select id="sort_order" name="sort_order" class="form-control">
                               <option value="0">
                                    --Chọn vị trí--
                               </option>
                               <?=$html_sort_order;?>
                           </select>
                         </div>
                         <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control">
                        </div>
                         <div class="mb-3">
                           <label for="status">Trạng thái</label>
                           <select id="status" name="status" class="form-control">
                               <option value="2">
                                   Chưa xuất bản
                               </option>
                               <option value="1">
                                   Xuất bản
                               </option>
                           </select>
                         </div>
                   </div>
               </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <div class="row">
                    <div class="col-md-12 text-right">
                        <button name="THEM" type="submit" class=" btn btn-sm btn-success">
                            <i class="fas fa-save"></i>Lưu[Thêm]
                        </button>
                        <a class="btn btn-sm btn-info" href="index.php?option=category">
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