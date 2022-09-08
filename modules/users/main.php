<?php
//Xuat du lieu
// $sql = "SELECT * FROM tbl_users";
// $result = mysqli_query($conn, $sql);
// $list_users = array();
// $num_rows = mysqli_num_rows($result);
// if ($num_rows > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $list_users[] = $row;
//     }
// }


$num_rows = db_num_rows("SELECT * from tbl_users where gender = 'male'");

//So luong ban ghi tren trang
$num_per_page = 6;
//tong so ban ghi
$total_row = $num_rows;

//Tong so trang
$num_page = ceil($total_row/$num_per_page);


$page = isset($_GET['page'])?(int)$_GET['page']:1;
$start = ($page-1)*$num_per_page;

$list_users = get_users($start, $num_per_page, "gender = 'male'");

// show_array($list_users);

foreach ($list_users as &$user) {
    $user['url_update'] = "?mod=users&act=update&id={$user['user_id']}";
    $user['url_delete'] = "?mod=users&act=delete&id={$user['user_id']}";
}

unset($user);


?>
<div id="main-content-wp" class="detail-news-page">
    <div class="wp-inner clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-news-wp">
                <div class="section-head">
                    <a href="?mod=users&act=add" class="section-title">Thêm mới</a>
                    <h3 class="section-title">Danh sách thành viên</h3>
                </div>
                <div class="section-detail">
                    <div class="content-news">
                        <?php
                        if (!empty($list_users)) {
                        ?>
                            <table class="table table-light">
                                <thead class="thead-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Id</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Giới tính</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = $start;
                                    foreach ($list_users as $user) {
                                        $temp++;
                                    ?>
                                        <tr>
                                            <td><?php echo $temp; ?></td>
                                            <td><?php echo $user['user_id']; ?></td>
                                            <td><?php echo $user['fullname']; ?></td>
                                            <td><?php echo $user['username']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td><?php echo show_gender($user['gender']); ?></td>
                                            <td><a href="<?php echo $user['url_update'] ?>">Sửa</a> | <a href="<?php echo $user['url_delete'] ?>">Xóa</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <p style="float: left;">Có <?php echo $num_rows; ?> thành viên</p>
                            <style>
                                /* pagging CSS */
                                .pagging {
                                    float: right;

                                }

                                .pagging li {
                                    float: left;
                                }

                                .pagging li a {
                                    display: block;
                                    padding: 5px 6px;
                                }
                                .active {
                                    color: red;
                                }
                            </style>
                            <ul class="pagging">
                                <li><a href="#">Trước</a></li>
                                <li><a class="active" href="?mod=users&act=main&page=1">1</a></li>
                                <li><a href="?mod=users&act=main&page=2">2</a></li>
                                <li><a href="?mod=users&act=main&page=3">3</a></li>
                                <li><a href="?mod=users&act=main&page=4">4</a></li>
                                <li><a href="#">Sau</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        <?php
                        } else {
                            print "Không có thành viên nào.";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>