<?php
$id = $_POST['id'];
$qty = $_POST['qty'];

//Lay thong tin san pham
$item = get_product_by_id($id);
// show_array($item);

if(isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
    //cap nhat so luong
    $_SESSION['cart']['buy'][$id]['qty'] = $qty;

    //Cap nhat tong tien
    $sub_total = $qty * $item['price'];
    $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;

    //Cap nhat toan bo gio
    update_info_cart();

    //Cap nhat tong gia tri trong gio hang
    $total = get_total_cart();

    //Gia tri tra ve
    $data = array(
        'sub_total' => currency_format($sub_total),
        'total' => currency_format($total)
    );
    

    echo json_encode($data);
}
?>