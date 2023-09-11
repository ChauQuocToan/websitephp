<?php
use App\Models\slider;
use App\Libraries\MessageArt;

if (isset($_POST['THEM'])){
    $row =new slider;
    $row ->name = $_POST['name'];
    $row ->link = $_POST['link'];
    $row ->position = $_POST['position'];
  
 
    $row ->sort_order = $_POST['sort_order'];
    $row ->status = $_POST['status'];
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by = 1;
    $row-> save();
    $path_dir = "../public/images/slider/";
    $file = $_FILES["img"];
    $path_file = $path_dir . basename($file["name"]);
    $file_extension = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
    if (in_array($file_extension, ['png', 'gif', 'jpg'])) {
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;
        //end uploadfile
        $row->save();
        header('location:index.php?option=slider');
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        header('location:index.php?option=slider&cat=create');
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Hình ảnh không hợp lệ']);
    }
}


if (isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $row = slider::find($id);
    $row ->name = $_POST['name'];
    $row ->link = $_POST['link'];
    $row ->position = $_POST['position'];
  
 
    $row ->sort_order = $_POST['sort_order'];
    $row ->status = $_POST['status'];
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by = 1;
    $row-> save();
    $path_dir = "../public/images/slider/";
    $file = $_FILES["img"];
    $path_file = $path_dir . basename($file["name"]);
    $file_extension = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
    if (in_array($file_extension, ['png', 'gif', 'jpg'])) {
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;
        //end uploadfile
        $row->save();
        header('location:index.php?option=slider');
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        header('location:index.php?option=slider&cat=create');
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Hình ảnh không hợp lệ']);
    }
}