<?php

use App\Models\Orderdetail;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Orderdetail::find($id);
if($row==null)
{ 
    MessageArt::set_flash('message',['type'=>'success','msg'=>'Mẫu tin không tồn tại']);
    header('location: index.php?option=orderdetail');
}
$row->status = ($row['status']==1) ? 2 : 1;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by= $_SESSION['user_id'];
$row->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Thay đổi trạng thái thành công']);
header('location: index.php?option=orderdetail');
