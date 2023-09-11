<?php

use App\Models\Product;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;



if (isset($_POST['THEM'])) {
    $row = new Product;
    $row->name = $_POST['name'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->detail = $_POST['detail'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->category_id = $_POST['category_id'];
    $row->brand_id = $_POST['brand_id'];
    $row->qty = $_POST['qty'];
    $row->price = $_POST['price'];
    $row->pricesale = $_POST['pricesale'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    //upload file
    $path_dir = "../public/images/product/";
    $file = $_FILES["img"];
    $path_file = $path_dir . basename($file["name"]);
    $file_extension = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
    if (in_array($file_extension, ['png', 'gif', 'jpg'])) {
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;
        //end uploadfile
        $row->save();
        header('location:index.php?option=product');
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        header('location:index.php?option=product&cat=create');
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Hình ảnh không hợp lệ']);
    }
}

if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $row = Product::find($id);
    $row->name = $_POST['name'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->detail = $_POST['detail'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->category_id = $_POST['category_id'];
    $row->brand_id = $_POST['brand_id'];
    $row->qty = $_POST['qty'];
    $row->price = $_POST['price'];
    $row->pricesale = $_POST['pricesale'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    //upload file
    if (strlen($_FILES["img"]['name']) != 0) {
        $path_dir = "../public/images/product/";
        $file = $_FILES["img"];
        $path_file = $path_dir . basename($file["name"]);
        $file_extension = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
        if (!in_array($file_extension, ['png', 'gif', 'jpg'])) {
            header('location:index.php?option=product&cat=edit');
            MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Hình ảnh không hợp lệ']);
        }
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        $path_delete = $path_dir . $row->image;
        if (file_exists($path_delete)) {
            unlink($path_delete);
        }
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;
        //end uploadfile
    }
    $row->save();
    header('location:index.php?option=product');
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
}
