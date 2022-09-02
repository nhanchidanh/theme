<?php
echo "add cart";
//Lay info product can them vao gio
$id = (int)$_GET['id'];
add_cart($id);

redirect('?mod=cart&act=show')
?>