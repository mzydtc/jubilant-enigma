<?php
	/**
	* 
	*/
	class DepartmentAction extends Action{
		
		// 查询部门信息
		public function depEdit() {
			sess();
			$d = M('Department');

			//$data = $d->order('createtime desc')->select();
			//$this->assign('data', $data);
			
			$pageArr = page_div($d, '', '个部门', 'createtime desc');

            $this->assign('data', $pageArr['list']);
            $this->assign('page',$pageArr['show']);
			$this->display();
		}

		// 新增部门
		public function addDepProcess() {
			$d = M('Department');

			$data['depname'] = $_POST['depname'];
			date_default_timezone_set('PRC');
            $data['createtime'] = date('Y-m-d H:i:s');

			$insert = $d->add($data);

			if ($insert == false) {
				$this->error('添加失败');
			}

			$this->redirect('__APP__/Department/depEdit');
		}

		// 删除部门
		public function delDep() {
			$d = M('Department');

			$id = $_GET['id'];

			$del = $d->where("id=$id")->delete();

			if (!del) {
				$this->error('删除失败');
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

		public function depQueryToSendMail() {
			$username = sess();
			$d = M('Department');

			$data = $d->select();

			$this->assign('username', $username);
			$this->assign('data', $data);
			$this->display('Index:sendMail');
		}
	}
?>