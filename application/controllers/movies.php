<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movies extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function type($slug = NULL) {
        
        $this->data['movie_data'] = null;

        if($slug == "films") {
            $this->data['title'] = "Фильмы";
            $this->data['movie_data'] = $this->films_model->getFilms(false, 10, 1);
        }

        if($slug == "serials") {
            $this->data['title'] = "Сериалы";
            $this->data['movie_data'] = $this->films_model->getFilms(false, 10, 2);
        }

        if($this->data['movie_data'] == null) {
            show_404();
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/type', $this->data);
        $this->load->view('templates/footer');
    }

    public function ratings($slug = NULL) {
        
        $this->data['movie_data'] = null;

        if($slug == "films") {
            $this->data['title'] = "Рейтинг фильмов";
            $this->data['movie_data'] = $this->films_model->getFilmsByRatingById(8, 1);
        }

        if($slug == "serials") {
            $this->data['title'] = "Рейтинг сериалов";
            $this->data['movie_data'] = $this->films_model->getFilmsByRatingById(8, 2);
        }

        if($this->data['movie_data'] == null) {
            show_404();
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/ratings', $this->data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL) {
        
        $movie_slug = $this->films_model->getFilms($slug, false, false);

        if(empty($movie_slug)) {
            show_404();
        }

        $this->data['title'] = $movie_slug['name'];
        $this->data['year'] = $movie_slug['year'];
        $this->data['rating'] = $movie_slug['rating'];
        $this->data['descriptions_movie'] = $movie_slug['descriptions'];
        $this->data['player_code'] = $movie_slug['player_code'];
        $this->data['producer'] = $movie_slug['producer'];


        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/view', $this->data);
        $this->load->view('templates/footer');

    }

}