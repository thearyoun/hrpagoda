<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_users extends Security {

	public function index() {
		$data['title'] = "Manage Users";
		
		$data['users'] = $this -> Globals -> select_join_get_only_fields('user_roles', $arr_fields = array('users.user_id', 'users.username', 'users.email', 'users.phone', 'users.status', 'users.created_at', 'roles.name'), $arr_join = array('users' => array('using_user_id' => 'user_id'), 'roles' => array('using_role_id' => 'role_id')), $join_type = 'INNER', $arr_where = NULL, $limit = NULL, $sort = NULL);
		$this -> load -> view('backend/index', $data);
	}

	public function settings() {
		$data['title'] = "Settings";
		$this -> load -> view('backend/index', $data);
	}

	public function create_user() {
		$data['title'] = "Create User";
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this -> form_validation -> set_rules('username', 'Username ', 'required|min_length[2]|max_length[25]');
		//$this -> form_validation -> set_rules('username_en', 'Username English', 'required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('phone', 'Phone', 'required');

		$this -> form_validation -> set_rules('password', 'Password', 'required|matches[conf_password]|min_length[6]|max_length[50]');
		$this -> form_validation -> set_rules('conf_password', 'Password Confirmation', 'required|min_length[6]|max_length[50]');

		if ($this -> form_validation -> run() === FALSE) {
			//$data['locations']=$this->Globals->select_all('locations');
			//$data['departments']=$this->Globals->select_all('departments');
			$data['roles'] = $this -> Globals -> select_where('roles', array('status' => 1));
			//$data['branches'] = $this -> Globals -> select_where('branches', array('status' => 1));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('email' => $this -> input -> post('email', TRUE), 'password' => sha1($this -> input -> post('password', TRUE)), 'username' => $this -> input -> post('username', TRUE),
			'address' => $this -> input -> post('address', TRUE), 'phone' => $this -> input -> post('phone', TRUE),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_insert_last_id = $this -> Globals -> insert_get_last_id('users', $data);
			if ($is_insert_last_id) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$data_role = array('using_user_id' => $is_insert_last_id, 'using_role_id' => $this -> input -> post('role'), 'status' => 1, 'created_at' => null);
				$this -> Globals -> insert('user_roles', $data_role);

				$this -> session -> set_flashdata('success', 'User account  was created success !.');
				redirect('manage_users/create_user');

			} else {
				$this -> session -> set_flashdata('error', 'User account  was created fail !.');
				redirect('manage_users/create_user');
			}
		}

	}

	public function update_user($user_id = 0) {
		$data['title'] = "Update User";
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this -> form_validation -> set_rules('username', 'Username', 'required|min_length[2]|max_length[25]');
		//$this -> form_validation -> set_rules('username_en', 'Username English', 'required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('phone', 'Phone', 'required');

		$this -> form_validation -> set_rules('password', 'Password', 'required|matches[conf_password]|min_length[6]|max_length[50]');
		$this -> form_validation -> set_rules('conf_password', 'Password Confirmation', 'required|min_length[6]|max_length[50]');

		if ($this -> form_validation -> run() === FALSE) {
			//$data['locations']=$this->Globals->select_all('locations');
			//$data['departments']=$this->Globals->select_all('departments');
			$data['roles'] = $this -> Globals -> select_where('roles', array('status' => 1));
			$data['user_data'] = $this -> Globals -> select_where('users', array('user_id' => $user_id));
			//$data['branches'] = $this -> Globals -> select_where('branches', array('status' => 1));
			$data['user_role'] = $this -> Globals -> select_where('user_roles', array('using_user_id' => $user_id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('email' => $this -> input -> post('email', TRUE), 'password' => sha1($this -> input -> post('password', TRUE)), 'username' => $this -> input -> post('username', TRUE),
			//'website'=>$this->input->post('website',TRUE),
			'address' => $this -> input -> post('address', TRUE), 'phone' => $this -> input -> post('phone', TRUE),
			//'company_name'=>$this->input->post('company_name',TRUE),
			//'using_location_id'=>$this->input->post('location',TRUE),
			//'using_department_id'=>$this->input->post('department',TRUE),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('users', $data, array('user_id' => $user_id));
			$data_role = array('using_role_id' => $this -> input -> post('role'));
			$is_updated_role = $this -> Globals -> update('user_roles', $data_role, array('using_user_id' => $user_id));
			if ($is_updated || $is_updated_role) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');

				$this -> session -> set_flashdata('success', 'User account  was updated success !.');
				redirect('manage_users');

			} else {
				$this -> session -> set_flashdata('error', 'User account  was updated fail !.');
				redirect('manage_users');
			}
		}

	}

	public function delete_user($user_id = 0) {
		$is_deleted = $this -> Globals -> delete('users', array('user_id' => $user_id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'User account  was deleted success !.');
			redirect('users');

		} else {
			$this -> session -> set_flashdata('error', 'User account  was deleted fail !.');
			redirect('users');
		}
	}

	public function create_role() {
		$data['title'] = "Create Role";
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this -> form_validation -> set_rules('role_name', 'Role Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['permissions'] = $this -> Globals -> select_all('permissions');
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('role_name', TRUE), 'description' => $this -> input -> post('role_desc', TRUE), 'status' => $this -> input -> post('status', TRUE), 'created_at' => null);
			$permissions = $this -> input -> post('permissions', TRUE);
			$is_inserted_last_id = $this -> Globals -> insert_get_last_id('roles', $data);
			if ($is_inserted_last_id) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				foreach ($permissions as $permission) {
					$data = array('using_role_id' => $is_inserted_last_id, 'using_permission_id' => $permission, 'status' => 1, 'created_at' => null);
					$this -> Globals -> insert('role_permissions', $data);
				}
				$this -> session -> set_flashdata('success', 'User access level  was created success !.');
				redirect('manage_users/create_role');

			} else {
				$this -> session -> set_flashdata('error', 'User access level  was created fail !.');
				redirect('manage_users/create_role');
			}
		}
	}

	public function roles() {
		$data['title'] = "List Roles";
		$data['roles'] = $this -> Globals -> select_all('roles');
		$this -> load -> view('backend/index', $data);
	}

	public function update_role($role_id = 0) {
		$data['title'] = "Update Role";
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this -> form_validation -> set_rules('role_name', 'Role Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['permissions'] = $this -> Globals -> select_all('permissions');
			$data['role_data'] = $this -> Globals -> select_where('roles', array('role_id' => $role_id));
			$data['role_permissions'] = $this -> Globals -> select_where('role_permissions', array('using_role_id' => $role_id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('role_name', TRUE), 'description' => $this -> input -> post('role_desc', TRUE), 'status' => $this -> input -> post('status', TRUE), 'created_at' => null);
			$permissions = $this -> input -> post('permissions', TRUE);
			$is_updated = $this -> Globals -> update('roles', $data, array('role_id' => $role_id));
			
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$is_deleted = $this -> Globals -> delete('role_permissions', array('using_role_id' => $role_id));
				if ($is_deleted) {
					foreach ($permissions as $permission) {
						$data = array('using_role_id' => $role_id, 'using_permission_id' => $permission, 'status' => 1, 'created_at' => null);
						$this -> Globals -> insert('role_permissions', $data);
					}
					$this -> session -> set_flashdata('success', 'User access level  was updated success !.');
					redirect('manage_users/update_role/' . $role_id);
				} else {
					$this -> session -> set_flashdata('error', 'There is something went wrong !');
					redirect('manage_users/update_role/' . $role_id);
				}

			
		}
	}

	public function delete_role($role_id = 0) {
		$is_deleted = $this -> Globals -> delete('roles', array('role_id' => $role_id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'User access level  was deleted success !.');
			redirect('manage_users/roles');

		} else {
			$this -> session -> set_flashdata('error', 'User access level  was deleted fail !.');
			redirect('manage_users/roles');
		}
	}

}
