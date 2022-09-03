<?php

if (isset($_POST['btn_add'])) {
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

   //Kiem tra tên đăng nhập
   if (empty($_POST['username'])) {
      $error['username'] = "Không để trống tên đăng nhập";
   } else {
      $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
      if (!preg_match($pattern, $_POST['username'])) {
         $error['username'] = "Tên đăng nhập phải từ 6-32 kí tự";
      } else {
         $username = $_POST['username'];
      }
   }

   //Kiem tra password
   if (empty($_POST['password'])) {
      $error['password'] = "Không để trống mật khẩu";
   } else {
      $pattern = '/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/';
      if (!preg_match($pattern, $_POST['password'])) {
         $error['password'] = "Mật khẩu không đúng định dạng";
      } else {
         $password = $_POST['password'];
      }
   }

   //kiem tra email
   if (empty($_POST['email'])) {
      $error['email'] = "Không để trống email";
   } else {
      $pattern = '/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/';
      if (!preg_match($pattern, $_POST['email'])) {
         $error['email'] = "Email không đúng định dạng";
      } else {
         $email = $_POST['email'];
      }
   }

   //Ket luan
   if (empty($error)) {
      $sql = "INSERT INTO `tbl_users` (`fullname`,`email`,`password`,`username`,`gender`)" . "VALUES ('{$fullname}','{$email}',md5('{$password}'),'{$username}','{$gender}')";
      if (mysqli_query($conn, $sql)) {
         $alert['success'] = "Thêm dữ liệu thành công";
      } else {
         echo "Loi" . mysqli_error($conn);
      }
   }
}
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
                        <input id="fullname" class="form-control" type="text" name="fullname">
                        <?php
                        if (!empty($error['fullname'])) {
                           echo $error['fullname'];
                        }
                        ?>
                     </div>
                     <div class="form-group">
                        <label for="username">Tên đăng nhập:</label>
                        <input id="username" class="form-control" type="text" name="username">
                        <?php
                        if (!empty($error['username'])) {
                           echo $error['username'];
                        }
                        ?>
                     </div>
                     <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" class="form-control" type="email" name="email">
                        <?php
                        if (!empty($error['email'])) {
                           echo $error['email'];
                        }
                        ?>
                     </div>
                     <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input id="password" class="form-control" type="password" name="password">
                        <?php
                        if (!empty($error['password'])) {
                           echo $error['password'];
                        }
                        ?>
                     </div>
                     <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <select id="gender" class="form-control" name="gender">
                           <option>Chọn giới tính</option>
                           <option>male</option>
                           <option>female</option>
                        </select>
                        <?php
                        if (!empty($error['gender'])) {
                           echo $error['gender'];
                        }
                        ?>
                     </div>
                     <input class="btn btn-primary" value="ĐĂNG KÝ" name="btn_add" type="submit" />
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<p class="success"></p>