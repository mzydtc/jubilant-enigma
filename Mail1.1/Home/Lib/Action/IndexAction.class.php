<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    
    // 显示登录页面
    public function index(){
        $this->display();
    }
    
    // 邮箱首页
    public function welcome() {
        $username = sess();
        //$this->assign('username', $username);
        $this->display();
    }

    public function main() {
        $username = sess();
        $this->assign('username', $username);
        $this->display();
    }
    
    // 后台管理页面
    public function background() {
        sess();
        $this->assign('username', $username);
        $this->display();
    }
    
    // 新邮件
    public function sendMail() {
        $username = sess();
        $this->assign('username', $username);
        $this->display();
    }
    
    // 退出登录
    public function exitLogin() {
        session('username', null);
        $this->success('退出成功，返回登录页面中...', '__APP__/Index/index', 3);
    }
    
    // 文件下载
    public function fileDownload() {
        $username = sess();
        $file_name = urldecode($_GET['filename']);
        $file_path = $_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . $username . "/" . $file_name;
        
        $file_name = iconv("utf-8", "gb2312", $file_name);
        $file_path = iconv("utf-8", "gb2312", $file_path);
        
        if (!file_exists($file_path)) {
            $this->error('文件不存在');
        }
        
        $fp = fopen($file_path, "r");
        $file_size = filesize($file_path);
        
        header("Content-type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: $file_size");
        header("Content-Disposition: attachment; filename=" . $file_name);
        
        $buffer = 1024;
        while (!feof($fp)) {
            $file_data = fread($fp, $buffer);
            echo $file_data;
        }
        
        fclose($fp);
    }
    
    // 新增用户
    public function addUser() {
        sess();
        $this->display();
    }


    // 新增部门
    public function addDep() {
        sess();
        $this->display();    
    }
}