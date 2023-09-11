<?php
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;
use App\Libraries\Cart;

if(isset($_REQUEST['addcart']))
{
    $id =$_REQUEST['addcart'];
    $product =Product::find($id);
    $cart_item=array(
        'id'=>$product->id,
        'price'=>$product->price,
        'qty'=>1,
        'amount'=>$product->price
    );
    
    if(isset($_SESSION['contentcart']))
    {   
        $carts = $_SESSION['contentcart'];
        if((Cart::cart_exists($carts,$id)==true))
        {
           $carts =Cart::cart_update($carts,$id,1);
        }
        else{
    //ch
            $carts[]=$cart_item;
        }
        $_SESSION['contentcart']= $carts;
    }
    else
    {
        $carts[]=$cart_item;
        $_SESSION['contentcart']= $carts;
    }
    header("location:index.php?option=cart");
}
if(isset($_REQUEST['delcart'])){
    $id =$_REQUEST['delcart'];
    if(isset($_SESSION['contentcart']))
    {
        $carts = $_SESSION['contentcart'];
       $carts= Cart::cart_delete($carts,$id);
       $_SESSION['contentcart']= $carts;
    }
    header("location:index.php?option=cart"); 
}
if(isset($_POST['updateCart']))
{
    $arr_qty=$_POST['qty'];
    foreach($arr_qty as $id=>$number)
    {
        $carts = $_SESSION['contentcart'];
        $carts =Cart::cart_update($carts,$id,$number,"update");
        $_SESSION['contentcart']= $carts;
    }
    header("location:index.php?option=cart");
}
if(isset($_REQUEST['checkoutCart'])){
    $user =User::find($_SESSION['user_id']);
    $date=getdate();
    $order=new Order();
    $order->code=$date[0];
    $order->user_id= $_SESSION['user_id'];
    $order->sum= $_POST['sum'];
   if($_POST['dellveryaddress']!=null){
        $order->address=$_POST['dellveryaddress'];
    }
    else{
        $order->address= $user['address'];
    }
    if($_POST['dellveryname']!=null){
        $order->name=$_POST['dellveryname'];
    }
    else{
        $order->name= $user['name'];
    }
    if($_POST['dellveryphone']!=null){
        $order->phone=$_POST['dellveryphone'];
    }
    else{
        $order->phone= $user['phone'];
    }
    if($_POST['dellveryemail']!=null){
        $order->email=$_POST['dellveryemail'];
    }
    else{
        $order->email= $user['email'];
    }


    
    $order->created_at = date('Y-m-d H:i:s');
    $order->status=1;
    if($order-> save()){
        $carts = $_SESSION['contentcart'];
        foreach($carts as $cart){
            $orderdetail= new Orderdetail();
            $orderdetail->order_id=$order->id;
            $orderdetail->status=1;
            $orderdetail->product_id=$cart['id'];
            $orderdetail->price=$cart['price'];
            $orderdetail->qty=$cart['qty'];
            $orderdetail->user_id= $_SESSION['user_id'];
            $orderdetail->amount=$cart['amount'];
            $orderdetail->save();   
        }
      
    }
    unset($_SESSION['contentcart']);    
    header("location:index.php?option=cart");
    
}
if(isset($_REQUEST['checkout']))
{
    require_once('views/frontend/cart-checkout.php');
}
else{
    require_once('views/frontend/cart-content.php');
}

