<?php
    class ListByUserAction extends Action{
        
        // 收件箱
        public function revBox() {
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username);
            
            $pageArr = page_div($l, 'stat=0', '封邮件', 'time desc');

            $this->assign('data', $pageArr['list']);
            $this->assign('page',$pageArr['show']);
            $this->display();
        }
        
        // 发件箱
        public function sendBox() {
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username);

            $pageArr = page_div($l, 'stat=1', '封邮件', 'time desc');

            $this->assign('data', $pageArr['list']);
            $this->assign('page',$pageArr['show']);
            $this->display();
        }
        
        // 垃圾箱
        public function garbageBox() {
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username);
            
            $pageArr = page_div($l, 'stat=2', '封邮件', 'time desc');

            $this->assign('data', $pageArr['list']);
            $this->assign('page',$pageArr['show']);
            $this->display();
        }
        
        // 发送邮件
        public function send() {
            $username = sess();
            $title = $_POST['title'];
            $sendto = $_POST['sendto'];
            $sendto_arr = explode(";", $_POST['sendto']); // 用“;”符号分隔收件人表单提交的字符串
            $content = $_POST['content'];
        
            date_default_timezone_set('PRC');
            $time = date('Y-m-d H:i:s');
        
            $file_size = $_FILES['file']['size'];
            if ($file_size > (100 * 1024 * 1024)) {
                $this->error('附件大小不能超过100MB');
            }
        
            $file_name = $_FILES['file']['name'];
            //$file_name = iconv("utf-8", "gb2312", $file_name); // 处理文件名中含中文
            $file_tmp = $_FILES['file']['tmp_name'];
        
            // 如果邮件不带附件
            if (empty($file_tmp)) {
                send_mail($username, $title, $sendto, $sendto_arr, $content, $time, 0, '');// 函数在common.php文件内定义
    
                $this->success('发送成功', '__APP__/ListByUser/sendBox', 1);
                exit();
            }
        
            // 判断是否上传成功
            if (!is_uploaded_file($file_tmp)) {
                $this->error('附件上传失败');
            }
            
            $user_file_dir = array(); // 用户文件目录
            // 如果收件人数大于1
            if (count($sendto_arr) > 1) {
                for ($i=0; $i < (count($sendto_arr) - 1); $i++) { 
                    $user_file_dir[] = iconv("utf-8", "gb2312",  $_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . $sendto_arr[$i]); // 处理新建目录中含有中文
                }
            # code...
            } else {
                $user_file_dir[] = iconv("utf-8", "gb2312",  $_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . $sendto_arr[0]);
            }

            if (!move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . iconv("utf-8", "gb2312", $file_name))){
                $this->error('附件发送失败');
            }   

            for ($i = 0; $i < count($user_file_dir); $i++) { 
                // 如果用户目录存在则直接上传文件至该目录，否则新建用户目录
                if (is_dir($user_file_dir[$i])) {

                    if(!file_upload($file_name, $user_file_dir[$i], $file_tmp)) {
                        $this->error('发送失败');
                    }

                } else {

                    mkdir($user_file_dir[$i]);

                    if(!file_upload($file_name, $user_file_dir[$i], $file_tmp)) {
                        $this->error('发送失败');
                    }

                }
            }
            unlink($_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . iconv("utf-8", "gb2312", $file_name));

            send_mail($username, $title, $sendto, $sendto_arr, $content, $time, 1, $file_name);

            $this->success('发送成功', '__APP__/ListByUser/sendBox', 1);
        }
        
        // 执行放入垃圾箱与永久删除操作
        public function operation() {
            $id = $_GET['id']; // 邮件id
            $oper = $_GET['oper']; // 执行的操作，放入垃圾箱或永久删除
        
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username);
        
            // 如果放入垃圾箱
            if ($oper == 'temp_del') {
                $data['stat'] = 2;
                $res = $l->where("id=$id")->save($data);
                if ($res == false) {
                    $this->error('操作失败');
                }
                $this->success('操作成功');
            }
        
            // 如果点击永久删除链接
            if ($oper == 'perm_del') {
                $res = $l->where("id=$id")->delete();
                if ($res == false) {
                    $this->error('操作失败');
                }
                $this->success('操作成功');
            }
        }
        
        // 收件箱、垃圾箱邮件详细信息
        public function revDetail() {
            $id = $_GET['id'];
            
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
            
            $l = M('List_by_' . $username);
            
            $data = $l->where("id=$id")->select();
            $this->assign('data', $data);
            $filename = urlencode($data[0]['filename']);
            $this->assign('filename', $filename);
            $this->display();
        }
        
        // 发件箱邮件详细信息
        public function sendDetail() {
            $id = $_GET['id'];
        
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username);
        
            $data = $l->where("id=$id")->select();
            $this->assign('data', $data);
            $filename = urlencode($data[0]['filename']);
            $this->assign('filename', $filename);
            $this->display();
        }
    }
?>