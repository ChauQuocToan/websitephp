<?php

use App\Models\User;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = User::find($id);
$row->status = 0;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by= $_SESSION['user_id'];
$row->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Xoá vào thùng rác thành công']);
header('location: index.php?option=user');
