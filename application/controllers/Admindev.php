<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'Security.php';

class Admindev extends Security
{


    public function index()
    {
        $data['title'] = "Welcome";
        $data['posts'] = $this->Globals->select_all('posts', 10);
//        $data['comments']=$this->Globals->select_join_get_only_fields('comments', $arr_fields = array('comments.post_id','members.membername','members.email','members.phone','members.status','members.created_date','roles.name'),$arr_join = array('members' => array('using_member_id' => 'member_id'),'roles' => array('using_role_id' => 'role_id')), $join_type = 'INNER', $arr_where = NULL, $limit = NULL,$sort=NULL);

        $this->load->view('backend/index', $data);

    }

    public  function create()
    {
        $data['title'] = "Welcome";
//        $data['posts'] = $this->Globals->select_all('posts', 10);
        $this->load->view('backend/index', $data);

    }

    public function get_employee_info()
    {
        $employee_id = $this->input->post('employee_id');
        $data = $this->Globals->select_where('employees', array('employee_id' => $employee_id));
        $emp_detail = "";
        foreach ($data->result() as $row) {
            $emp_detail .= "#" . $row->username_kh . "#" . $row->using_department_id;
        }
        echo $emp_detail;
    }

    public function publish_new_event()
    {
        $this->form_validation->set_rules('body', 'body', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'body' => $this->input->post('body', true),
                'title' => $this->input->post('title', true),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->Globals->insert('posts', $data);
            $this->session->set_flashdata('success', "Event was created successfully.");
            redirect('/admindev/create');
        } else {
            redirect('/admindev/create');
        }
    }

    public function publish_comments()
    {
        $this->form_validation->set_rules('comment', 'comment', 'required');
        //$this->form_validation->set_rules('post_id', 'post_id', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'comment' => $this->input->post('comment', true),
                'post_id' => $this->input->post('post_id', true),
                'user_id' => $this->session->userdata("user_id"),
                'user_type' => $this->session->userdata("user_type"),
                'time' => date('Y-m-d H:i:s'),
            ];
            $this->Globals->insert('comments', $data);
            $this->session->set_flashdata('success', "Event was created successfully.");
            redirect('/admindev');
        } else {
            redirect('/admindev');
        }
    }


    public function setting_profile()
    {
        $data['title'] = "Setting Profile";
        //$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username_kh', 'Username khmer', 'required|min_length[2]|max_length[25]');
        $this->form_validation->set_rules('username_en', 'Username English', 'required|min_length[2]|max_length[25]');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        $this->form_validation->set_rules('password', 'Password', 'matches[conf_password]');
        $this->form_validation->set_rules('conf_password', 'Password Confirmation', '');

        if ($this->form_validation->run() === FALSE) {
            $data['locations'] = $this->Globals->select_all('locations');
            $data['departments'] = $this->Globals->select_all('departments');
            $data['roles'] = $this->Globals->select_where('roles', array('status' => 1));
            $data['user_data'] = $this->Globals->select_where('users', array('user_id' => $this->session->userdata('user_login_access')));
            //$data['user_role']=$this->Globals->select_where('user_roles',array('using_user_id'=>$user_id));
            $this->load->view('index', $data);
        } else {
            //$activation_key=random_string('alnum', 12);
            if ($this->input->post('password') == "") {
                $data = array(
                    'email' => $this->input->post('email', TRUE),
                    //'password'=>sha1($this->input->post('password',TRUE)),
                    'username_en' => $this->input->post('username_en', TRUE),
                    'username_kh' => $this->input->post('username_kh', TRUE),
                    //'website'=>$this->input->post('website',TRUE),
                    'address' => $this->input->post('address', TRUE),
                    'phone' => $this->input->post('phone', TRUE),
                    'mobile' => $this->input->post('mobile', TRUE),
                    //'company_name'=>$this->input->post('company_name',TRUE),
                    'using_location_id' => $this->input->post('location', TRUE),
                    'using_department_id' => $this->input->post('department', TRUE)

                );
            } else {
                $data = array(
                    'email' => $this->input->post('email', TRUE),
                    'password' => sha1($this->input->post('password', TRUE)),
                    'username_en' => $this->input->post('username_en', TRUE),
                    'username_kh' => $this->input->post('username_kh', TRUE),
                    //'website'=>$this->input->post('website',TRUE),
                    'address' => $this->input->post('address', TRUE),
                    'phone' => $this->input->post('phone', TRUE),
                    'mobile' => $this->input->post('mobile', TRUE),
                    //'company_name'=>$this->input->post('company_name',TRUE),
                    'using_location_id' => $this->input->post('location', TRUE),
                    'using_department_id' => $this->input->post('department', TRUE)

                );
            }


            $is_updated = $this->Globals->update('users', $data, array('user_id' => $this->session->userdata('user_login_access')));

            if ($is_updated) {
                //$activation_key=random_string('alnum', 12);
                //$email=$this->input->post('email');


                $this->session->set_flashdata('success', 'Your profile was updated success !.');
                redirect('welcome/setting_profile');

            } else {
                $this->session->set_flashdata('error', 'Your profile was updated fail !.');
                redirect('welcome/setting_profile');
            }
        }


    }

    public function logout()
    {
        $this->User->logout();
    }

    public function profile()
    {
        $data['title'] = "profile";
        $data['profile'] = $this->Globals->select_where('users', array('user_id' => $this->session->userdata('user_login_access')));
        $this->load->view('index', $data);
    }
}
