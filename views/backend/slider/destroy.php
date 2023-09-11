<?php

use App\Models\slider;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = slider::find($id);
$row->delete();
header('location: index.php?option=slider');
MessageArt::set_flash('message',['type'=>'success','msg'=>'Xoá khỏi CSDL thành công']);
header('location: index.php?option=slider');
