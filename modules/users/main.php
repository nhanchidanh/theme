<?php
//Xuat du lieu
$sql = "SELECT * FROM tbl_users";
$result = mysqli_query($conn, $sql);
$list_users = array();
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_users[] = $row;
    }
}
// show_array($list_users);
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = 0;
                                    foreach ($list_users as $user) {
                                        $temp++;
                                    ?>
                                        <tr>
                                            <td><?php echo $temp; ?></td>
                                            <td><?php echo $user['user_id']; ?></td>
                                            <td><?php echo $user['fullname']; ?></td>
                                            <td><?php echo $user['username']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td><?php echo $user['gender']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <p>Có <?php echo $num_rows; ?> thành viên</p>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>