<?php

use App\Models\Orderdetail;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Orderdetail::find($id);
$row->status = 2;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by= $_SESSION['user_id'];
$row->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Khôi phục thành công']);
header('location: index.php?option=orderdetail&cat=trash');