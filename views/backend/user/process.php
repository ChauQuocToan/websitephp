<?php
use App\Models\User;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;


if (isset($_POST['THEM'])){
    $row =new User;
    $row ->name = $_POST['name'];
    $row ->email = $_POST['email'];
    $row ->username = $_POST['username'];
    $row ->phone = $_POST['phone'];
    $row ->password = $_POST['password'];
    $row ->status = $_POST['status'];
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by =  $_SESSION['user_id'];
    $row-> save();
    MessageArt::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
 header('location:index.php?option=user');
}



if (isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $row = User::find($id);
    $row ->name = $_POST['name'];
    $row ->email = $_POST['email'];
    $row ->username = $_POST['username'];
    $row ->phone = $_POST['phone'];
    $row ->password = $_POST['password'];
    $row ->status = $_POST['status'];
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by =  $_SESSION['user_id'];
    $row-> save();
    MessageArt::set_flash('message',['type'=>'success','msg'=>'Cập nhật thành công']);
 header('location:index.php?option=user');
}