<?php
use App\Models\Brand;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;



if (isset($_POST['THEM'])){
    $row =new Brand;
    $row ->name = $_POST['name'];
    $row ->metadesc = $_POST['metadesc'];
    $row ->metakey = $_POST['metakey'];
    $row ->slug = $_POST['slug'];
    $row ->sort_order = $_POST['sort_order'];
    $row ->status = $_POST['status'];
    $row ->slug = Mystring::str_slug($_POST['name']);
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by = 1;
    $row-> save();
 header('location:index.php?option=Brand');
 MessageArt::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
}

if (isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $row = Brand::find($id);
    $row ->name = $_POST['name'];
    $row ->metadesc = $_POST['metadesc'];
    $row ->metakey = $_POST['metakey'];
    $row ->slug = $_POST['slug'];
    $row ->sort_order = $_POST['sort_order'];
    $row ->status = $_POST['status'];
    $row ->slug = Mystring::str_slug($_POST['name']);
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by = 1;
    $row-> save();
 header('location:index.php?option=Brand');
 MessageArt::set_flash('message',['type'=>'success','msg'=>'Cập nhật thành công']);
}