<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    function index()
    {
        if ($this->User->is_logged_in()) {
            redirect('admindev');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'callback_login_check');
            $this->form_validation->set_rules('user_type', 'User Type', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('backend/login');
            } else {
                $lang = $this->input->post("language");
                $user_type = $this->input->post("user_type");
                $this->session->set_userdata('language', $lang);
                $this->session->set_userdata('user_type', $user_type);
                if ($user_type == "admin") {
                    redirect('manage_monks');
                } else if ($user_type == "monk") {
                    redirect('manage_monk_account');
                } else if ($user_type == "member") {
                    redirect('manage_member_account');
                }

            }
        }
    }

    function login_check($username)
    {
        $password = $this->input->post("password");
        $user_type = $this->input->post("user_type");

        if ($user_type == "admin") {
            if (!$this->User->login($username, $password)) {
                $this->form_validation->set_message('login_check', '<b>Username / Password is  incorrect !</b>');
                return false;
            }
        } else if ($user_type == "monk") {
            if (!$this->User->login_monk($username, $password)) {
                $this->form_validation->set_message('login_check', '<b>Username / Password is  incorrect !</b>');
                return false;
            }
        } else if ($user_type == "member") {
            if (!$this->User->login_member($username, $password)) {
                $this->form_validation->set_message('login_check', '<b>Username / Password is  incorrect !</b>');
                return false;
            }
        }

        return true;
    }
}