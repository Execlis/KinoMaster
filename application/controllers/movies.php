<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movies extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function view($slug = NULL) {
        
        $movie_slug = $this->films_model->getFilms($slug, false, false);

        if(empty($movie_slug)) {
            show_404();
        }

        $this->data['title'] = $movie_slug['name'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/view', $this->data);
        $this->load->view('templates/footer');

    }

}