<?php

use App\Models\Brand;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Brand::find($id);
$row->delete();
header('location: index.php?option=Brand');
MessageArt::set_flash('message',['type'=>'success','msg'=>'Xoá khỏi CSDL thành công']);
header('location: index.php?option=category');
