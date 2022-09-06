<?php
$id = (int)$_GET['id'];

db_delete("tbl_users", "user_id = $id");
redirect("?mod=users&act=main");
?>