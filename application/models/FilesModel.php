<?php

class FilesModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_files($id = NULL) {

        $this->db->select('files.id, files.title, files.description, 
            files.attachment, files.created_at, files.user_id, files.tag, files.original_name, users.username');
        $this->db->order_by('files.id', 'DESC');
        $this->db->join('users', 'users.id = files.user_id');

        if(empty($id)) {

            $query = $this->db->get('files');
            return $query->result_array();

        }
        else {

            $query = $this->db->get_where('files', array('files.id' => $id));
            return $query->row_array();

        }

    }

    public function get_user_files($userId) {

        $this->db->select('files.id, files.title, files.description, 
            files.attachment, files.created_at, files.user_id, files.tag, files.original_name, users.username');
        $this->db->order_by('files.id', 'DESC');
        $this->db->join('users', 'users.id = files.user_id');

        $query = $this->db->get_where('files', array('files.user_id' => $userId));
        return $query->result_array();

    }

    public function create_file($file) {

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'user_id' => $this->session->userdata('user_id'),
            'tag' => $this->input->post('tag'),
            'attachment' => $file['file'],
            'original_name' => $file['original_name']
        );

        return $this->db->insert('files', $data);
    }

    public function delete_file($id) {

        $attachment = $this->db->select('attachment')->get_where('files', array('id' => $id))->row()->attachment;

        $cwd = getcwd();
        $file_path = $cwd."/assets/uploadedFiles/";
        chdir($file_path);
        unlink($attachment);
        chdir($cwd);

        $this->db->where('id', $id);
        $this->db->delete('files');

        return true;

    }

    public function update_file() {

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'tag' => $this->input->post('tag'),
            'updated_at' => date("Y-m-j H:i:s")
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('files', $data);

    }

}