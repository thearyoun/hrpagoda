<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{

    function get_form_take_leave()
    {
        $this->db->select("*");
        $result = $this->db->get("permissions_take_leave");
        if ($result->num_rows() > 0) {
            $this->session->set_userdata("monk_allow", $result->row()->monk_allow);
            $this->session->set_userdata("member_allow", $result->row()->member_allow);
        } else {
            $this->session->set_userdata("monk_allow", 1);
            $this->session->set_userdata("member_allow", 1);
        }
    }

    function login($username, $password)
    {
        $query = $this->db->get_where('users', array('username' => $username, 'password' => sha1($password), 'status' => 1), 1);
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $role_id = $this->Globals->select_string('user_roles', 'using_role_id', array('using_user_id' => $row->user_id));

            $this->db->select("permissions.name,role_id");
            $this->db->from("user_roles");
            $this->db->join("roles", "roles.role_id=user_roles.using_role_id");
            $this->db->join("role_permissions", "role_permissions.using_role_id=roles.role_id");
            $this->db->join("permissions", "permissions.permission_id=role_permissions.using_permission_id");
            $this->db->where("role_permissions.using_role_id", $role_id);
            $this->db->group_by('permissions.name');
            $query_role = $this->db->get();
            //$query_role = $this -> db -> get_where('pos_permissions', array('per_use_role_id' => $username));
            foreach ($query_role->result() as $row_r) {
                $this->session->set_userdata($row_r->name, 1);
            }
            $this->session->set_userdata("role", $query_role->row()->role_id);
            $this->session->set_userdata("user_id", $row->user_id);
            $this->session->set_userdata("perm_num", $query_role->num_rows());

            $this->session->set_userdata('user_login_access', $row->user_id);
            $this->session->set_userdata('user_login_username', $row->username);
            $this->session->set_userdata('use_branch_id', $row->use_branch_id);
            $this->get_form_take_leave();
            //$this -> session -> set_userdata('author_group_id', $row -> using_author_group_id);
            return true;
        }
    }

    function login_monk($username, $password)
    {
        $query = $this->db->get_where('monks', array('user_account' => $username, 'user_password' => sha1($password), 'status' => 1), 1);
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $this->session->set_userdata("user_id", $row->id);
            $this->session->set_userdata("monk_id", $row->id);
            $this->session->set_userdata("username", $row->username);
            $this->session->set_userdata('user_login_access', $row->id);
            $this->get_form_take_leave();
            return true;
        }
        return false;
    }

    function login_member($username, $password)
    {
        $query = $this->db->get_where('members', array('user_account' => $username, 'user_password' => sha1($password), 'status' => 1), 1);
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $this->session->set_userdata("member_id", $row->id);
            $this->session->set_userdata("user_id", $row->id);
            $this->session->set_userdata("username", $row->username);
            $this->session->set_userdata('user_login_access', $row->id);
            $this->session->set_userdata('manager', $row->manager);
            $this->get_form_take_leave();
            return true;
        }
        return false;

    }

    /*
     Logs out a user by destorying all session data and redirect to login
     */
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    /*
     Determins if a user is logged in
     */
    function is_logged_in()
    {
        return $this->session->userdata('user_login_access') != false;
    }

    public function get_saving_downline($member_code = 0, $level = 0, $from_date = null, $to_date = null, $emp_code = null)
    {
        $wehre_data = "";

        if ($emp_code != null) {
            $wehre_data .= " AND s.use_user_id = " . $emp_code;
        }

        if ($from_date != null && $to_date != null) {

            $query = $this->db->query("
			SELECT
				p.member_id AS id,
				p.member_code AS code_number,
				p.full_name AS full_name,
				s.saving_date,
				s.amount,
				s.remarks,
				DATEDIFF(s.available_date,s.saving_date) AS day_num,
				 (p.user_level - $level) AS levels,
				parent.member_id AS parent,
				grandparent.member_id AS grandparent,
				grandparent1.member_id AS grandparent1,
				grandparent2.member_id AS grandparent2,
				grandparent3.member_id AS grandparent3,
				grandparent4.member_id AS grandparent4,
				grandparent5.member_id AS grandparent5,
				grandparent6.member_id AS grandparent6,
				grandparent6.member_id AS grandparent7,
				grandparent6.member_id AS grandparent8,
				grandparent6.member_id AS grandparent9,
				grandparent6.member_id AS grandparent10
			FROM
				members p
			INNER JOIN savings s ON s.use_member_id = p.member_id
			LEFT JOIN members parent ON p.referral_code = parent.member_code
			LEFT JOIN members grandparent ON parent.referral_code = grandparent.member_code
			LEFT JOIN members grandparent1 ON grandparent.referral_code = grandparent1.member_code
			LEFT JOIN members grandparent2 ON grandparent1.referral_code = grandparent2.member_code
			LEFT JOIN members grandparent3 ON grandparent2.referral_code = grandparent3.member_code
			LEFT JOIN members grandparent4 ON grandparent3.referral_code = grandparent4.member_code
			LEFT JOIN members grandparent5 ON grandparent4.referral_code = grandparent5.member_code
			LEFT JOIN members grandparent6 ON grandparent5.referral_code = grandparent6.member_code
			LEFT JOIN members grandparent7 ON grandparent6.referral_code = grandparent7.member_code
			LEFT JOIN members grandparent8 ON grandparent7.referral_code = grandparent8.member_code
			LEFT JOIN members grandparent9 ON grandparent8.referral_code = grandparent9.member_code
			LEFT JOIN members grandparent10 ON grandparent9.referral_code = grandparent10.member_code
			WHERE
			 $member_code IN(

					parent.member_code,
					grandparent.member_code,
					grandparent1.member_code,
					grandparent2.member_code,
					grandparent3.member_code,
					grandparent4.member_code,
					grandparent5.member_code,
					grandparent6.member_code,
					grandparent7.member_code,
					grandparent8.member_code,
					grandparent9.member_code,
					grandparent10.member_code
			)
			AND saving_date BETWEEN '$from_date' and '$to_date' $wehre_data
			ORDER BY parent,grandparent,grandparent1
		");
        } else {
            $query = $this->db->query("
			SELECT
				p.member_id AS id,
				p.member_code AS code_number,
				p.full_name AS full_name,
				s.saving_date,
				s.amount,
				s.remarks,
				DATEDIFF(s.available_date,s.saving_date) AS day_num,
				 (p.user_level - $level) AS levels,
				parent.member_id AS parent,
				grandparent.member_id AS grandparent,
				grandparent1.member_id AS grandparent1,
				grandparent2.member_id AS grandparent2,
				grandparent3.member_id AS grandparent3,
				grandparent4.member_id AS grandparent4,
				grandparent5.member_id AS grandparent5,
				grandparent6.member_id AS grandparent6,
				grandparent6.member_id AS grandparent7,
				grandparent6.member_id AS grandparent8,
				grandparent6.member_id AS grandparent9,
				grandparent6.member_id AS grandparent10

			FROM
				members p
			INNER JOIN savings s ON s.use_member_id = p.member_id
			LEFT JOIN members parent ON p.referral_code = parent.member_code
			LEFT JOIN members grandparent ON parent.referral_code = grandparent.member_code
			LEFT JOIN members grandparent1 ON grandparent.referral_code = grandparent1.member_code
			LEFT JOIN members grandparent2 ON grandparent1.referral_code = grandparent2.member_code
			LEFT JOIN members grandparent3 ON grandparent2.referral_code = grandparent3.member_code
			LEFT JOIN members grandparent4 ON grandparent3.referral_code = grandparent4.member_code
			LEFT JOIN members grandparent5 ON grandparent4.referral_code = grandparent5.member_code
			LEFT JOIN members grandparent6 ON grandparent5.referral_code = grandparent6.member_code
			LEFT JOIN members grandparent7 ON grandparent6.referral_code = grandparent7.member_code
			LEFT JOIN members grandparent8 ON grandparent7.referral_code = grandparent8.member_code
			LEFT JOIN members grandparent9 ON grandparent8.referral_code = grandparent9.member_code
			LEFT JOIN members grandparent10 ON grandparent9.referral_code = grandparent10.member_code
			WHERE
			 $member_code IN(

					parent.member_code,
					grandparent.member_code,
					grandparent1.member_code,
					grandparent2.member_code,
					grandparent3.member_code,
					grandparent4.member_code,
					grandparent5.member_code,
					grandparent6.member_code,
					grandparent6.member_code,
					grandparent7.member_code,
					grandparent8.member_code,
					grandparent9.member_code,
					grandparent10.member_code
			)
			ORDER BY parent,grandparent,grandparent1
		");
        }
        return $query;
    }

    public function get_tree($member_code = 0, $level = 0, $from_date = null, $to_date = null)
    {
        $wehre_data = "";

        if ($from_date != null && $to_date != null) {

            $query = $this->db->query("
			SELECT
				p.member_id AS id,
				p.member_code AS code_number,
				p.full_name AS full_name,
				p.passport,
				p.dob,
				p.created_at,
				p.status,
				p.referral_code,
				 (p.user_level - $level) AS levels,
				parent.member_id AS parent,
				grandparent.member_id AS grandparent,
				grandparent1.member_id AS grandparent1,
				grandparent2.member_id AS grandparent2,
				grandparent3.member_id AS grandparent3,
				grandparent4.member_id AS grandparent4,
				grandparent5.member_id AS grandparent5,
				grandparent6.member_id AS grandparent6,
				grandparent6.member_id AS grandparent7,
				grandparent6.member_id AS grandparent8,
				grandparent6.member_id AS grandparent9,
				grandparent6.member_id AS grandparent10
			FROM
				members p
			LEFT JOIN members parent ON p.referral_code = parent.member_code
			LEFT JOIN members grandparent ON parent.referral_code = grandparent.member_code
			LEFT JOIN members grandparent1 ON grandparent.referral_code = grandparent1.member_code
			LEFT JOIN members grandparent2 ON grandparent1.referral_code = grandparent2.member_code
			LEFT JOIN members grandparent3 ON grandparent2.referral_code = grandparent3.member_code
			LEFT JOIN members grandparent4 ON grandparent3.referral_code = grandparent4.member_code
			LEFT JOIN members grandparent5 ON grandparent4.referral_code = grandparent5.member_code
			LEFT JOIN members grandparent6 ON grandparent5.referral_code = grandparent6.member_code
			LEFT JOIN members grandparent7 ON grandparent6.referral_code = grandparent7.member_code
			LEFT JOIN members grandparent8 ON grandparent7.referral_code = grandparent8.member_code
			LEFT JOIN members grandparent9 ON grandparent8.referral_code = grandparent9.member_code
			LEFT JOIN members grandparent10 ON grandparent9.referral_code = grandparent10.member_code
			WHERE
			 $member_code IN(

					parent.member_code,
					grandparent.member_code,
					grandparent1.member_code,
					grandparent2.member_code,
					grandparent3.member_code,
					grandparent4.member_code,
					grandparent5.member_code,
					grandparent6.member_code,
					grandparent7.member_code,
					grandparent8.member_code,
					grandparent9.member_code,
					grandparent10.member_code
			)
			AND created_at BETWEEN '$from_date' and '$to_date'
			ORDER levels ASC
		");
        } else {
            $query = $this->db->query("
			SELECT
				p.member_id AS id,
				p.member_code AS code_number,
				p.full_name AS full_name,
				p.passport,
				p.dob,
				p.status,
				p.created_at,
				p.referral_code,
				 (p.user_level - $level) AS levels,
				parent.member_id AS parent,
				grandparent.member_id AS grandparent,
				grandparent1.member_id AS grandparent1,
				grandparent2.member_id AS grandparent2,
				grandparent3.member_id AS grandparent3,
				grandparent4.member_id AS grandparent4,
				grandparent5.member_id AS grandparent5,
				grandparent6.member_id AS grandparent6,
				grandparent6.member_id AS grandparent7,
				grandparent6.member_id AS grandparent8,
				grandparent6.member_id AS grandparent9,
				grandparent6.member_id AS grandparent10

			FROM
				members p

			LEFT JOIN members parent ON p.referral_code = parent.member_code
			LEFT JOIN members grandparent ON parent.referral_code = grandparent.member_code
			LEFT JOIN members grandparent1 ON grandparent.referral_code = grandparent1.member_code
			LEFT JOIN members grandparent2 ON grandparent1.referral_code = grandparent2.member_code
			LEFT JOIN members grandparent3 ON grandparent2.referral_code = grandparent3.member_code
			LEFT JOIN members grandparent4 ON grandparent3.referral_code = grandparent4.member_code
			LEFT JOIN members grandparent5 ON grandparent4.referral_code = grandparent5.member_code
			LEFT JOIN members grandparent6 ON grandparent5.referral_code = grandparent6.member_code
			LEFT JOIN members grandparent7 ON grandparent6.referral_code = grandparent7.member_code
			LEFT JOIN members grandparent8 ON grandparent7.referral_code = grandparent8.member_code
			LEFT JOIN members grandparent9 ON grandparent8.referral_code = grandparent9.member_code
			LEFT JOIN members grandparent10 ON grandparent9.referral_code = grandparent10.member_code
			WHERE
			 $member_code IN(

					parent.member_code,
					grandparent.member_code,
					grandparent1.member_code,
					grandparent2.member_code,
					grandparent3.member_code,
					grandparent4.member_code,
					grandparent5.member_code,
					grandparent6.member_code,
					grandparent6.member_code,
					grandparent7.member_code,
					grandparent8.member_code,
					grandparent9.member_code,
					grandparent10.member_code
			)
			ORDER BY levels ASC
		");
        }
        return $query;
    }

    public function count_direct_line_member($member_code)
    {
        $this->db->select('COUNT( referral_code ) AS total_direct_line_member');
        $this->db->from('members');
        $this->db->where('referral_code', $member_code);
        return $this->db->get()->row()->total_direct_line_member;
    }
}
