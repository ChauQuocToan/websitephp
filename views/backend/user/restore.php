<?php

use App\Models\User;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = User::find($id);
$row->status = 2;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by= $_SESSION['user_id'];
$row->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Khôi phục thành công']);
header('location: index.php?option=user&cat=trash');
