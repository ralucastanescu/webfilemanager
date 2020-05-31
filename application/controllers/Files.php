<?php

class Files extends CI_Controller {

    public function index() {

        $data['title'] = 'Files';

        $data['files'] = $this->filesmodel->get_files();

        $this->load->view('templates/header');
        $this->load->view('files/index', $data);
        $this->load->view('templates/footer');

    }

    public function view($id = NULL) {
        $data['file'] = $this->filesmodel->get_files($id);

        if(empty($data['file'])) {
            show_404();
        }

        $data['title'] = $data['file']['title'];
        $this->load->view('templates/header');
        $this->load->view('files/view', $data);
        $this->load->view('templates/footer');
    }

    public function newFile() {

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['title'] = 'Add new file';

        $this->form_validation->set_rules('title', 'Title',
            'required');
        $this->form_validation->set_rules('description', 'Description',
            'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('files/newFile', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './assets/uploadedFiles';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|txt|zip|gzip|tar|targz|doc|docx|pdf';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $file = '';
                $this->session->set_flashdata('not_created_file', $errors);
            } else {
                $data = array('upload_file' => $this->upload->data());
                $file['file'] = $_FILES['userfile']['name'];
                $file['path'] = '/assets/uploadedFiles/' . $_FILES['userfile']['name'];
                $message = 'The file has been successfully uploaded!';
            }

            $this->session->set_flashdata('created_file', 'The file has been successfully created!');

            $this->filesmodel->create_file($file);
            redirect('files');
        }

    }

    public function delete($id) {

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $this->filesmodel->delete_file($id);

        $this->session->set_flashdata('deleted_file', 'The file has been sucessfully deleted!');

        redirect('files');

    }

    public function edit($id) {

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['file'] = $this->filesmodel->get_files($id);

        if($this->session->userdata('user_id') != $data['file']['user_id']) {
            redirect('files');
        }

        if(empty($data['file'])) {
            show_404();
        }

        $data['title'] = 'Edit file';
        $this->load->view('templates/header');
        $this->load->view('files/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update() {

        $this->filesmodel->update_file();

        $this->session->set_flashdata('updated_file', 'The file has been successfully updated!');

        redirect('files');


    }

}