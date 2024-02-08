<?php

require (APPPATH.'/libraries/RestController.php');
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Crud extends RestController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->helper('url_helper');
    }

    public function index_get() {
        $data['news_details'] = $this->crud_model->getAllNews();

        if ($this->input->get('format') === 'json') {
            // Respond with JSON data
            $this->response($data['news_details'], 200);
        } else {
            // Respond with HTML view
            $this->load->view('crud/crud_view', $data);
        }
    }

    public function create_post() {
        $title = $this->post('title');
        $content = $this->post('content');

        $this->crud_model->addNews($title, $content);

        if ($this->input->get('format') === 'json') {
            $this->response(['message' => 'News item created successfully.'], 201);
        } else {
            redirect('crud/index');
        }
    }

    public function edit_post($id) {
        $data['news_details'] = $this->crud_model->getNewsById($id);

        if (empty($data['news_details'])) {
            $this->response(['message' => 'News item not found.'], 404);
        }

        echo "hjdhfjkdgkjdfhgkjdhfjgkd";

        $title = $this->post('title');
        $content = $this->post('content');

        
        $this->crud_model->updateNews($id, $title, $content);

        if ($this->input->get('format') === 'json') {
            $this->response(['message' => 'News item updated successfully.'], 200);
        } else {
            redirect('crud/index');
        }
    }

    public function delete_delete($id) {
        if ($id === NULL) {
            $this->response(['message' => 'Invalid request.'], 400);
        }

        $this->crud_model->deleteNews($id);

        if ($this->input->get('format') === 'json') {
            $this->response(['message' => 'News item deleted successfully.'], 200);
        } else {
            redirect('crud/index');
        }
    }
}
