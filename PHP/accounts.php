<?php
// Kết nối database và thông tin chung
 $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
 require_once "$rootDir/BTL/core/init.php";

 
// Nếu đăng nhập
if ($user) 
{
    // Nếu tồn tại POST action
    if (isset($_POST['action']))
    {
        // Xử lý POST action
        $action = trim(addslashes(htmlspecialchars($_POST['action'])));
 
        // Thêm tài khoản
        if ($action == 'add_acc') 
        {
            // Xử lý các giá trị
            $un_add_acc = trim(htmlspecialchars(addslashes($_POST['un_add_acc'])));
            $pw_add_acc = trim(htmlspecialchars(addslashes($_POST['pw_add_acc'])));
            $repw_add_acc = trim(htmlspecialchars(addslashes($_POST['repw_add_acc'])));
 
            // Các biến xử lý thông báo
            $show_alert = '<script>$("#formAddAcc .alert").removeClass("hidden");</script>';
            $hide_alert = '<script>$("#formAddAcc .alert").addClass("hidden");</script>';
            $success = '<script>$("#formAddAcc .alert").attr("class", "alert alert-success");</script>';
 
            // Kiểm tra tên đăng nhập
            $sql_check_un_exist = "SELECT TenTaiKhoan FROM taikhoan WHERE TenTaiKhoan = '$un_add_acc'";
 
            if ($un_add_acc == '' || $pw_add_acc == '' || $repw_add_acc == '') {
                echo $show_alert.'Vui lòng điền đầy đủ thông tin.';
            } else if (strlen($un_add_acc) < 6 || strlen($un_add_acc) > 32) {
                echo $show_alert.'Tên đăng nhập nằm trong khoảng 6-32 ký tự.';
            } else if (preg_match('/\W/', $un_add_acc)) {
                echo $show_alert.'Tên đăng nhập không chứa kí tự đậc biệt và khoảng trắng.';
            } else if ($db->num_rows($sql_check_un_exist)) {
                echo $show_alert.'Tên đăng nhập đã tồn tại.';
            } else if (strlen($pw_add_acc) < 6) {
                echo $show_alert.'Mật khẩu quá ngắn.';
            } else if ($pw_add_acc != $repw_add_acc) {
                echo $show_alert.'Mật khẩu nhập lại không khớp.';
            } else {
                $pw_add_acc = md5($pw_add_acc);
                $sql_add_acc = "INSERT INTO accounts VALUES (
                    '',
                    '$un_add_acc',
                    '$pw_add_acc',
                    '',
                    '',
                    '0',
                    '0',
                    '$date_current',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                )";
                $db->query($sql_add_acc);
                $db->close();
 
                echo $show_alert.$success.'Thêm tài khoản thành công.';
                new Redirect($_DOMAIN.'accounts'); // Trở về trang danh sách tài khoản
            }
        }
        // Mở tài khoản
        // Khoá tài khoản
        // Xoá tài khoản
    }
    else
    {
        new Redirect($_DOMAIN); // Trở về trang index
    }
}
else
{
    new Redirect($_DOMAIN); // Trở về trang index
}