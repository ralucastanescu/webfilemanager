<?php

class Users extends CI_Controller {

    public function register() {

        $data['title'] = 'Register';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordconfirmation', 'Confirm Password', 'required', 'matches["password"]');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            $passwrodEncrypted = md5($this->input->post('password'));
            $this->usermodel->register($passwrodEncrypted);

            $this->session->set_flashdata('user_registered', 'User sucessfully registered!');

            redirect('files');

        }
    }

    public function login() {

        $data['title'] = 'Log in';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $userId = $this->usermodel->login($username, $password);

            if($userId) {

                $userData = array(
                    'user_id' => $userId,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($userData);


                $this->session->set_flashdata('user_loggedin', 'Hello ' . $username .  ' are now logged in!');
                redirect('files');

            } else {
                $this->session->set_flashdata('failed_login', 'Incorrect user information! Please try again.');
            }


            redirect('users/login');

        }
    }

    public function logout() {

        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('user_loggedout', 'You have been logged out!');
        redirect('users/login');

    }

    public function check_username_exists($username) {

        $this->form_validation->set_message('check_username_exists', 'The username is taken. Please choose a different one.');

        if($this->usermodel->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }

    }

    public function check_email_exists($email) {

        $this->form_validation->set_message('check_email_exists', 'The email has already been used.');

        if($this->usermodel->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }

    }

}