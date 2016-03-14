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
            
            $pageArr = page_div($u, '', '位用户', 'registertime desc');

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
            
            $this->success('添加成功', '__APP__/User/userEdit', 1);
        }
        
        // 删除用户
        public function delUser() {
            $u = M('User');
            
            $id = $_GET['id'];
            $username = $_GET['username'];
            
            $res = $u->where("id=$id")->delete();
            
            $sql = "drop table mail_list_by_" . $username . "";
            $drop = mysql_query($sql);
            
            if ($res == false || $drop == false) {
                $this->error('用户删除失败');
            }
            
            $this->success('用户删除成功', '__APP__/User/userEdit', 3);
        }

        // 修改用户信息
        public function modiUser(){
            sess();
            $u = M('User');

            $id = $_GET['id'];
            $username = $_GET['username'];

            $data = $u->where("id=$id")->find();

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

            $this->success('修改成功', '__APP__/User/userEdit', 3);
        }
    }
?>