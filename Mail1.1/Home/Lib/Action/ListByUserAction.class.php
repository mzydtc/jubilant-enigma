<?php
    class ListByUserAction extends Action{
        
        // 收件箱
        public function revBox() {
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username . '');
            $data = $l->order('time desc')->where('stat=0')->select(); // 根据邮件发送时间降序查询
            $this->assign('data', $data);
            $this->display();
        }
        
        // 发件箱
        public function sendBox() {
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username . '');
            $data = $l->order('time desc')->where('stat=1')->select(); // 根据邮件发送时间降序查询
            $this->assign('data', $data);
            $this->display();
        }
        
        // 垃圾箱
        public function garbageBox() {
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username . '');
            $data = $l->order('time desc')->where('stat=2')->select(); // 根据邮件发送时间降序查询
            $this->assign('data', $data);
            $this->display();
        }
        
        // 发送邮件
        public function send() {
            $username = sess();
            $title = $_POST['title'];
            $sendto = $_POST['sendto'];
            $content = $_POST['content'];
        
            date_default_timezone_set('PRC');
            $time = date('Y-m-d H:i:s');
        
            $file_size = $_FILES['file']['size'];
            if ($file_size > (100 * 1024 * 1024)) {
                $this->error('附件大小不能超过100MB');
            }
        
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
        
            // 首先判断是否有附件
            if (empty($file_tmp)) {
                $l1 = M('List_by_' . $username . '');
                $data1['sendto'] = $sendto;
                $data1['title'] = $title;
                $data1['content'] = $content;
                $data1['time'] = $time;
                $data1['stat'] = 1;
                $data1['attach'] = 0;
                $data1['filename'] = '';
                $res1 = $l1->add($data1);
        
                $l2 = M('List_by_' . $sendto . '');
                $data2['revfrom'] = $username;
                $data2['title'] = $title;
                $data2['content'] = $content;
                $data2['time'] = $time;
                $data2['stat'] = 0;
                $data2['attach'] = 0;
                $data2['filename'] = '';
                $res2 = $l2->add($data2);
        
                if ($res1 == false || $res2 == false) {
                    $this->error('发送失败');
                }
        
                $this->success('发送成功', '__APP__/ListByUser/sendBox', 5);
                exit();
            }
        
            // 判断是否上传成功
            if (!is_uploaded_file($file_tmp)) {
                $this->error('附件上传失败');
            }
        
            // 把文件转存到指定用户目录
            $user_file_dir = iconv("utf-8", "gb2312",  $_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . $sendto); //处理新建目录中含有中文
        
            // 如果用户目录存在则直接上传文件至该目录，否则新建用户目录
            if (is_dir($user_file_dir)) {
                if(!file_upload($file_name, $user_file_dir, $file_tmp)) {
                    $this->error('发送失败');
                }
        
                $l1 = M('List_by_' . $username . '');
                $data1['sendto'] = $sendto;
                $data1['title'] = $title;
                $data1['content'] = $content;
                $data1['time'] = $time;
                $data1['stat'] = 1;
                $data1['attach'] = 1;
                $data1['filename'] = $file_name;
                $res1 = $l1->add($data1);
        
                $l2 = M('List_by_' . $sendto . '');
                $data2['revfrom'] = $username;
                $data2['title'] = $title;
                $data2['content'] = $content;
                $data2['time'] = $time;
                $data2['stat'] = 0;
                $data2['attach'] = 1;
                $data2['filename'] = $file_name;
                $res2 = $l2->add($data2);
        
                if ($res1 == false || $res2 == false) {
                    $this->error('发送失败');
                }
        
                $this->success('发送成功', '__APP__/ListByUser/sendBox', 5);
            } else {
                mkdir($user_file_dir);
                if(!file_upload($file_name, $user_file_dir, $file_tmp)) {
                    $this->error('发送失败');
                }
        
                $l1 = M('List_by_' . $username . '');
                $data1['sendto'] = $sendto;
                $data1['title'] = $title;
                $data1['content'] = $content;
                $data1['time'] = $time;
                $data1['stat'] = 1;
                $data1['attach'] = 1;
                $data1['filename'] = $file_name;
                $res1 = $l1->add($data1);
        
                $l2 = M('List_by_' . $sendto . '');
                $data2['revfrom'] = $username;
                $data2['title'] = $title;
                $data2['content'] = $content;
                $data2['time'] = $time;
                $data2['stat'] = 0;
                $data2['attach'] = 1;
                $data2['filename'] = $file_name;
                $res2 = $l2->add($data2);
        
                if ($res1 == false || $res2 == false) {
                    $this->error('发送失败');
                }
        
                $this->success('发送成功', '__APP__/ListByUser/sendBox', 5);
            }
        }
        
        // 执行放入垃圾箱与永久删除操作
        public function operation() {
            $id = $_GET['id']; // 邮件id
            $oper = $_GET['oper']; // 执行的操作，放入垃圾箱或永久删除
        
            $username = sess(); // 得到session中的用户名
            $this->assign('username', $username); // 显示登录的用户名
        
            $l = M('List_by_' . $username . '');
        
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
            
            $l = M('List_by_' . $username . '');
            
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
        
            $l = M('List_by_' . $username . '');
        
            $data = $l->where("id=$id")->select();
            $this->assign('data', $data);
            $filename = urlencode($data[0]['filename']);
            $this->assign('filename', $filename);
            $this->display();
        }
    }
?>