<?php
    class UserAction extends Action{
        
        // 检查登录信息
        public function login() {
            // 如果已经成功登录，在不关闭浏览器的情况下禁止再次登录
            if (!empty($_SESSION['username'])) {
                header("Content-Type: text/html;charset=utf-8");
                echo '请重新打开浏览器再登录另一账户';
                exit();
            }
            
            $u = M('User');
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            $save = $_POST['save'];
            
            if ($save == "on") { // 如果勾选保存用户名
                cookie('username', $username, (3600 * 24 * 10)); // 保存用户名cookie十天
            }

            if (!empty($username) && !empty($password)) {
                $data = $u->where("username='$username'")->field('username,password')->find();
                if ($data['username'] == 'admin') {
                    if ($data['password'] == md5($password)) {
                        session('username', $username); // 将用户名存入session
                        $this->redirect('Index/background'); // 登录成功跳转到指定页面
                    } else {
                        $this->error('用户名或密码错误');
                    }
                } else {
                    if ($data['password'] == md5($password)) {
                        session('username', $username); // 将用户名存入session
                        $this->redirect('Index/main'); // 登录成功跳转到指定页面
                    } else {
                        $this->error('用户名或密码错误');
                    }
                }
            } else {
                $this->error('用户名或密码不能为空');
            }
        }
        
        // 编辑用户
        public function userEdit() {
            sess();
            $u = M('User');
            
            //$data = $u->order('registertime desc')->select();
            //$this->assign('data', $data);
            
            $pageArr = page_div($u, '', '位用户', 'convert(username using gbk) asc');

            $this->assign('data', $pageArr['list']);
            $this->assign('page',$pageArr['show']);
            $this->display();
        }
        
        // 新增用户
        public function addUserProcess() {
            $u = M('User');
            
            // 向mail_user表中添加记录
            $data['username'] = $_POST['username'];
            $data['password'] = md5('avic514');
            $data['depname'] = $_POST['depname'];
            date_default_timezone_set('PRC');
            $data['registertime'] = date('Y-m-d H:i:s');
            $insert = $u->add($data);
            
            // 为新用户创建数据表
            $sql = "create table mail_list_by_" . $data['username'] . "(
                    id int(4) auto_increment primary key,
                    revfrom varchar(30),
                    sendto varchar(30),
                    title text(100),
                    content longtext,
                    time datetime,
                    stat int(2),
                    attach int(2),
                    filename varchar(120)
                    );";
            $create = mysql_query($sql);
            
            if (!$insert || !$create) {
                $this->error('用户添加失败');
            }
            
            // 创建用户附件文件夹
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . $data['username'])) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . "/MailFile/" . $data['username']);
            }

            $this->redirect('__APP__/User/userEdit');
        }
        
        // 删除用户
        public function delUser() {
            $u = M('User');
            
            for ($i = 0; $i < count($_POST['select']); $i++) {
                $arr[] = $_POST['select'][$i];
                $arr = explode(",", $_POST['select'][$i]);

                $res = $u->where("id=$arr[0]")->delete();
                $sql = "drop table mail_list_by_" . $arr[1] . "";
                $drop = mysql_query($sql);

                if (!$res || !$drop) {
                    continue;
                }
            }
            $this->redirect('__APP__/User/userEdit');
            
        }

        // 修改用户信息
        public function modiUser(){
            sess();
            $u = M('User');

            $id = $_GET['id'];
            $username = $_GET['username'];

            $data = $u->where("id=$id")->find();

            $dep = R('Department/depQueryToModiUser'); // 得到Department模块depQueryToModiUser方法返回值
            $this->assign('dep', $dep);

            $this->assign('id', $id);
            $this->assign('username', $username);

            $this->assign('username', $data['username']);
            $this->assign('depname', $data['depname']);
            $this->display();
        }

        public function modiUserProcess() {
            $u = M('User');

            $id = $_GET['id'];
            $username = $_GET['username'];

            $data['username'] = $_POST['username'];
            $data['depname'] = $_POST['depname'];

            if (!empty($password)) {
                $data['password'] = $_POST['password'];
            } else {
                $data['password'] = md5('avic514');
            }
            $update = $u->where("id=$id")->save($data);

            $sql = "alter table mail_list_by_" . $username . " rename to 
                    mail_list_by_" . $data['username'] . "";
            $alter = mysql_query($sql);

            if ($update == false || $alter == false) {
                $this->error('修改失败', '__APP__/User/userEdit', 3);
            }

            $this->redirect('__APP__/User/userEdit');
        }

        public function getUserByDep() {
            $u = M('User');

            $where['depname'] = $_GET['dep'];

            $data = $u->where($where)->select();
            $user_arr = array();
            for ($i= 0; $i < count($data); $i++) { 
                $user_arr[] = $data[$i]['username'];
                # code...
            }
            $this->ajaxReturn($user_arr, '', 1);
        }

        public function getPass() {
            $username = sess();
            $origin = md5($_POST['origin']);
            $password = $_POST['confirm'];

            $u = M('User');
            $where['username'] = $username;
            $data = $u->where($where)->field("username,password")->find();
            
            $cmp = strcmp($origin, $data['password']);
            
            if ($cmp == 0) {
                $this->ajaxReturn($data, "correct", 1);
            } else {
                $this->ajaxReturn($origin, "wrong", 0);
            }
        }

        public function modiPassProcess() {
            $newpass = $_POST['confirm'];
            $username = sess();

            $u = M('User');
            $where['username'] = $username;
            $data['password'] = md5($newpass);
            $save = $u->where($where)->save($data);

            if (!$save) {
                $this->error('修改失败');
            }
            if ($username == 'admin') {
                $this->success('修改成功', "__APP__/Index/background", 2);
            } else {
                $this->success('修改成功', "__APP__/Index/main", 2);
            }
        }

        public function userSearch() {
            $username = $_POST['rev'];

            $u = M('User');
            $where['username'] = $username;
            $data = $u->where($where)->find();
            if (!empty($data)) {
                $this->ajaxReturn($data['username'], "correct", 1);
            } else {
                $this->ajaxReturn(0, "null", 0);
            }
        }

    }
?>