<?php
echo "add cart";
//Lay info product can them vao gio
$id = (int)$_GET['id'];
$item = get_product_by_id($id);

show_array($item);
?>