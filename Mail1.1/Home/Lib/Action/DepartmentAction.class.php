<?php
	/**
	* 
	*/
	class DepartmentAction extends Action{
		
		// 查询部门信息
		public function depEdit() {
			sess();
			$d = M('Department');
			
			$pageArr = page_div($d, '', '个部门', 'convert(depname using gbk) asc');

            $this->assign('data', $pageArr['list']);
            $this->assign('page', $pageArr['show']);
			$this->display();
		}

		// 新增部门
		public function addDepProcess() {
			$d = M('Department');

			$data['depname'] = $_POST['depname'];
			date_default_timezone_set('PRC');
            $data['createtime'] = date('Y-m-d H:i:s');

			$insert = $d->add($data);

			if (!$insert) {
				$this->error('添加失败');
			}

			$this->redirect('__APP__/Department/depEdit');
		}

		// 删除部门
		public function delDep() {
			$d = M('Department');
	
			for ($i = 0; $i < count($_POST['select']); $i++) {
                    $id = $_POST['select'][$i];
                    $res = $d->where("id=$id")->delete();
                    if (!$res) {
                        continue;
                    }
                }

			$this->redirect('__APP__/Department/depEdit');
		}

		public function depQueryToAddUser() {
			sess();
			$d = M('Department');

			$data = $d->select();

			$this->assign('data', $data);
			$this->display('Index:addUser');
		}

		public function depQueryToEditUser() {
			sess();
			$d = M('Department');

			$data = $d->select();

			$this->assign('data', $data);
			$this->display('User:userEdit');
		}

		public function depQueryToModiUser() {
			sess();
			$d = M('Department');

			$data = $d->select();

			return $data;
		}

		public function depQueryToSendMail() {
			$username = sess();
			$d = M('Department');

			$data = $d->select();

			$this->assign('username', $username);
			$this->assign('data', $data);
			$this->display('Index:sendMail');
		}

		public function depQueryToResend() {
			$username = sess();
			$d = M('Department');

			$data = $d->select();
			return $data;

			//$this->assign('username', $username);
			//$this->assign('data', $data);
			//$this->display('ListByUser:resend');
		}

		// 通过隐藏域决定操作
    	public function hidJump() {
        	$oper = $_REQUEST['oper'];

        	if ($oper == 'add') {
            	$this->addDepProcess();
        	} else if ($oper == 'del'){
            	$this->delDep();
        	}
    	}
    	
	}
?>