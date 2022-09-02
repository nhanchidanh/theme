<?php
//Xoa sp nao?
$id = (int) $_GET['id'];

delete_cart($id);
redirect("?mod=cart&act=show");
?>