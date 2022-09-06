<?php
$id = (int)$_GET['id'];

?>
<?php

if (isset($_POST['btn_update'])) {
   $error = array();
   $alert = array();

   //Kiem tra fullname
   if (empty($_POST['fullname'])) {
      $error['fullname'] = "Không được để trống fullname";
   } else {
      $fullname = $_POST['fullname'];
   }

   //Kiem tra gioi tinh
   if (empty($_POST['gender'])) {
      $error['gender'] = "Không để trống giới tính";
   } else {
      $gender = $_POST['gender'];
   }

   //Ket luan
   if (empty($error)) {
      // $sql = "UPDATE `tbl_users` set `fullname` = '$fullname', `gender` = '$gender' where `user_id` = {$id}";
      // if (mysqli_query($conn, $sql)) {
      //    $alert['success'] = "Cập nhật dữ liệu thành công";
      // } else {
      //    echo "Loi" . mysqli_error($conn);
      // }
      $data = array(
         'fullname' => $fullname,
         'gender' => $gender
      );
      if (db_update("tbl_users",$data, "user_id = $id")) {
         $alert['success'] = "Cập nhật dữ liệu thành công";
      } 
   }
}

// $sql = "SELECT * from `tbl_users` where `user_id` = {$id}";
// $result = mysqli_query($conn, $sql);
// $item = mysqli_fetch_array($result);

$item = db_fetch_row("SELECT * from `tbl_users` where `user_id` = {$id}");

?>

<div id="main-content-wp" class="detail-news-page">
   <div class="wp-inner clearfix">
      <?php require 'inc/sidebar.php'; ?>
      <div id="content" class="fl-right">
         <div class="section" id="detail-news-wp">
            <div class="section-head">
               <a href="?mod=users&act=add" class="section-title">Thêm mới</a>
               <p class="success">
                  <?php
                  if (!empty($alert['success'])) {
                     echo $alert['success'];
                  }
                  ?>
               </p>
            </div>
            <div class="section-detail">
               <div class="content-news">
                  <form action="" method="post">
                     <div class="form-group">
                        <label for="fullname">Họ và tên:</label>
                        <input id="fullname" value="<?php if(!empty($item['fullname'])) echo($item['fullname']); ?>" class="form-control" type="text" name="fullname">
                        <?php
                        if (!empty($error['fullname'])) {
                           echo $error['fullname'];
                        }
                        ?>
                     </div>
                     <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <select id="gender" class="form-control" name="gender">
                           <option>Chọn giới tính</option>
                           <option <?php if(isset($item['gender']) && $item['gender'] = 'male') echo "selected='selected'" ?>>male</option>
                           <option <?php if(isset($item['gender']) && $item['gender'] = 'female') echo "selected='selected'" ?>>female</option>
                        </select>
                        <?php
                        if (!empty($error['gender'])) {
                           echo $error['gender'];
                        }
                        ?>
                     </div>
                     <input class="btn btn-primary" value="Cập nhật" name="btn_update" type="submit" />
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<p class="success"></p>