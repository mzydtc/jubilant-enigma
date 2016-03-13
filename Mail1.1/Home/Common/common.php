<?php
    // 显示登录用户
    function sess() {
        $username = session('username');
        if (empty($username)) {
            header("Content-Type: text/html;charset=utf-8");
            echo '请登录';
            exit();
        }
        return $username;
    }
    
    // 文件上传函数
    function file_upload($file_name, $user_file_dir, $file_tmp) {
        $file_name = iconv("utf-8", "gb2312", $file_name); // 处理文件名中含中文
        $upload_file_to = $user_file_dir . '/' . $file_name;
        if (move_uploaded_file($file_tmp, $upload_file_to)) {
            return true;
        } else {
            return false;
        }
    }    
?>