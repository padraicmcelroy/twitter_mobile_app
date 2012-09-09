<?php 

class Tweet extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model('twitter');

        $this->load->helper('url');
    }

	public function index() {

		$active_menu_elem = 'my_tweets';
		$menu_data = array(
			'active_menu_elem'=>$active_menu_elem
		);

		$this->load->model('tweetmodel');
		$tweets = $this->tweetmodel->get_all();

		$data = array(
			'tweets'=>$tweets
		);

		$this->load->view('header');
      	$this->load->view('menu', $menu_data);
      	$this->load->view('view_list', $data);
      	$this->load->view('footer');
	}

	public function search(){
		$active_menu_elem = 'search';
		$menu_data = array(
			'active_menu_elem'=>$active_menu_elem
		);

		$search_term = $this->input->post('search');

		if($this->twitter->has_internet_access()){
			$tweets = $this->twitter->search($search_term);
		}else{
			$tweets = $this->twitter->get_example_search_result();
		}

		$data = array(
			'tweets'=>$tweets,
			'search_term'=>$search_term
		);

		$this->load->view('header');
      	$this->load->view('menu', $menu_data);
      	$this->load->view('search', $data);
      	$this->load->view('footer');
	}

	public function add(){
		$this->load->model('tweetmodel');
		$this->tweetmodel->add_tweet($this->input->post('tweet'));
		redirect('/');
	}

	public function delete($tweet_id){
		$this->load->model('tweetmodel');
		$this->tweetmodel->delete_tweet($tweet_id);
		redirect('/');
	}
}
