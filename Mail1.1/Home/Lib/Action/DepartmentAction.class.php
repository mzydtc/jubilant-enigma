<?php
	/**
	* 
	*/
	class DepartmentAction extends Action{
		
		// 查询部门信息
		public function depEdit() {
			sess();
			$d = M('Department');

			$data = $d->order('createtime desc')->select();
			$this->assign('data', $data);
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

			$this->success('添加成功', '__APP__/Department/depEdit', 3);
		}

		// 删除部门
		public function delDep() {
			$d = M('Department');

			$id = $_GET['id'];

			$del = $d->where("id=$id")->delete();

			if (!del) {
				$this->error('删除失败');
			}

			$this->success('删除成功', '__APP__/Department/depEdit', 3);
		}
	}
?>