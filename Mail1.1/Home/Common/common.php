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
        # code...
    
        if(!copy($_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . $file_name, $upload_file_to)) {
            return false;
        }
        return true;        
    }

    // 分页
    // $obj:实例化的模型对象
    // $where:where条件
    // $header:头部描述信息，如“条记录”
    // $order:order by查询条件
    function page_div($obj, $where, $header, $order) {
        import("ORG.Util.Page");
        $count = $obj->where($where)->count();
        $page = new Page($count, 10);
        $page->setConfig('header', $header);
        $show = $page->show();
        $list = $obj->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
        $arr = array('show' => $show, 'list' => $list);
        return $arr;
    }

    // 发送邮件函数
    function send_mail($username, $title, $sendto, $sendto_arr, $content, $time, $attach, $filename) {
        $l1 = M('List_by_' . $username); // 实例化发件人对象

        if (count($sendto_arr) == 2) {
            $data1['sendto'] = $sendto_arr[0]; // 如果收件人数为1人，数据表以xxx表示
        } else if (count($sendto_arr) > 2) {
            $data1['sendto'] = $sendto; // 如果收件人数大于1，数据表以xxx;xxx;表示
        }

        $data1['title'] = $title;
        //$data1['sendto'] = $sendto_arr; 
        $data1['content'] = $content;
        $data1['time'] = $time;
        $data1['stat'] = 1;
        $data1['attach'] = $attach; // 0为无附件，1为有附件
        $data1['filename'] = $filename;
        $res1 = $l1->add($data1);
        if (!res1) {
            $this->error('发送失败');
        }

        $data2['revfrom'] = $username;
        $data2['title'] = $title;
        $data2['content'] = $content;
        $data2['time'] = $time;
        $data2['stat'] = 0;
        $data2['attach'] = $attach;
        $data2['filename'] = $filename;
            var_dump($sendto_arr);
        //$sendto = explode(";", $sendto); // 用“;”符号分隔收件人表单提交的字符串
        for ($i = 0; $i < (count($sendto_arr) - 1); $i++) {
            $l2 = M('List_by_' . $sendto_arr[$i]); // 根据数组长度实例化收件人对象
            $res2 = $l2->add($data2);
            if (!res2) {
                $this->error('发送失败');
            }
            # code...
        }

    }

    // 转发邮件函数
    function resend_mail($username, $title, $sendto, $sendto_arr, $content, $time, $attach, $filename) {
        $l1 = M('List_by_' . $username); // 实例化发件人对象

        if (count($sendto_arr) == 1) {
            $data1['sendto'] = $sendto_arr[0]; // 如果收件人数为1人，数据表以xxx表示
        } else if (count($sendto_arr) > 1) {
            $data1['sendto'] = $sendto; // 如果收件人数大于1，数据表以xxx;xxx;表示
        }

        $data1['title'] = $title;
        //$data1['sendto'] = $sendto_arr; 
        $data1['content'] = $content;
        $data1['time'] = $time;
        $data1['stat'] = 1;
        $data1['attach'] = $attach; // 0为无附件，1为有附件
        $data1['filename'] = $filename;
        $res1 = $l1->add($data1);
        if (!res1) {
            $this->error('发送失败');
        }

        $data2['revfrom'] = $username;
        $data2['title'] = $title;
        $data2['content'] = $content;
        $data2['time'] = $time;
        $data2['stat'] = 0;
        $data2['attach'] = $attach;
        $data2['filename'] = $filename;
        //$sendto = explode(";", $sendto); // 用“;”符号分隔收件人表单提交的字符串
        for ($i = 0; $i < count($sendto_arr); $i++) {
            $l2 = M('List_by_' . $sendto_arr[$i]); // 根据数组长度实例化收件人对象
            $res2 = $l2->add($data2);
            if (!res2) {
                $this->error('发送失败');
            }
            # code...
        }

    }        
?>