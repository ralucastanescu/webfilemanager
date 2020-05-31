<?php

class UserModel extends CI_Model {

    public function register($passwordEncrypted) {

        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $passwordEncrypted,
        );

        return $this->db->insert('users', $data);
    }

    public function login($username, $password) {

        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $user = $this->db->get('users');

        if($user->num_rows() == 1) {
            return $user->row(0)->id;
        } else {
            return false;
        }

    }

    public function check_username_exists($username) {

        $qb = $this->db->get_where('users', array('username' => $username));

        if(empty($qb->row_array())) {
            return true;
        } else {
            return false;
        }

    }

    public function check_email_exists($email) {

        $qb = $this->db->get_where('users', array('email' => $email));

        if(empty($qb->row_array())) {
            return true;
        } else {
            return false;
        }

    }

}