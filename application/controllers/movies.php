<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movies extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }

// MOVIES

    public function type($slug = NULL) {
        $this->load->library('pagination');
        
        $this->data['movie_data'] = null;

        $offset = $this->uri->segment(4);

        $row_count = 5;

        $count = 0;

        if($slug == "films") {
            $count = count($this->films_model->getMoviesOnPage(0, 1));
            $p_config['base_url'] = '/movies/type/films/';
            $this->data['title'] = "Фильмы";
            $this->data['movie_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 1);
        }

        if($slug == "serials") {
            $count = count($this->films_model->getMoviesOnPage(0, 2));
            $p_config['base_url'] = '/movies/type/serials/';
            $this->data['title'] = "Сериалы";
            $this->data['movie_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 2);
        }

        if($this->data['movie_data'] == null) {
            show_404();
        }

        // Pagination config
        $p_config['total_rows'] = $count;
        $p_config['per_page'] = $row_count;

        $p_config['first_link'] = "Первая";
        $p_config['last_link'] = "Последняя";
        $p_config['full_tag_open'] = "<ul class='pagination'>";
        $p_config['full_tag_close'] = "</ul>";
        $p_config['num_tag_open'] = "<li>";
        $p_config['num_tag_close'] = "</li>";
        $p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $p_config['cur_tag_close'] = "<span class = 'sr-only'></span></a></li>";
        $p_config['next_tag_open'] = "<li>";
        $p_config['next_tagl_close'] = "</li>";
        $p_config['prev_tag_open'] = "<li>";
        $p_config['prev_tagl_close'] = "</li>";
        $p_config['first_tag_open'] = "<li>";
        $p_config['first_tagl_close'] = "</li>";
        $p_config['last_tag_open'] = "<li>";
        $p_config['last_tagl_close'] = "</li>";

        //init pagination
        $this->pagination->initialize($p_config);

        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/type', $this->data);
        $this->load->view('templates/footer');
    }

// RATINGS

    public function ratings($slug = NULL) {
        $this->load->library('pagination');

        $this->data['movie_data'] = null;

        $offset = $this->uri->segment(4);

        $row_count = 10;

        $count = 0;

        if($slug == "films_rating") {
            $count = count($this->films_model->getMoviesOnPage(0, 1));
            $p_config['base_url'] = '/movies/ratings/films_rating/';
            $this->data['title'] = "Рейтинг фильмов | <a href='/movies/ratings/serials_rating/'> сериалов</a>";
           // $this->data['title_two'] = '<a href="/movies/ratings/serials/"> сериалов</a>';
            $this->data['movie_data'] = $this->films_model->getFilmsByRatingById($row_count, $offset, 1);
        }

        if($slug == "serials_rating") {
            $count = count($this->films_model->getMoviesOnPage(0, 2));
            $p_config['base_url'] = '/movies/ratings/serials_rating/';
            $this->data['title'] = "Рейтинг <a href='/movies/ratings/films_rating/'>фильмов </a>| сериалов";
           // $this->data['title_two'] = '<a href="/movies/ratings/films/"> фильмов</a>';
            $this->data['movie_data'] = $this->films_model->getFilmsByRatingById($row_count, $offset, 2);
        }

        if($this->data['movie_data'] == null) {
            show_404();
        }

        // Pagination config
        $p_config['total_rows'] = $count;
        $p_config['per_page'] = $row_count;

        $p_config['first_link'] = "Первая";
        $p_config['last_link'] = "Последняя";
        $p_config['full_tag_open'] = "<ul class='pagination'>";
        $p_config['full_tag_close'] = "</ul>";
        $p_config['num_tag_open'] = "<li>";
        $p_config['num_tag_close'] = "</li>";
        $p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $p_config['cur_tag_close'] = "<span class = 'sr-only'></span></a></li>";
        $p_config['next_tag_open'] = "<li>";
        $p_config['next_tagl_close'] = "</li>";
        $p_config['prev_tag_open'] = "<li>";
        $p_config['prev_tagl_close'] = "</li>";
        $p_config['first_tag_open'] = "<li>";
        $p_config['first_tagl_close'] = "</li>";
        $p_config['last_tag_open'] = "<li>";
        $p_config['last_tagl_close'] = "</li>";

        //init pagination
        $this->pagination->initialize($p_config);

        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/ratings', $this->data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL) {
        
        $movie_slug = $this->films_model->getFilms($slug, false, false);

        if(empty($movie_slug)) {
            show_404();
        }

        $this->load->model('comments_model');
        $this->data['comments'] = $this->comments_model->getComments($movie_slug['id'], 100);

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