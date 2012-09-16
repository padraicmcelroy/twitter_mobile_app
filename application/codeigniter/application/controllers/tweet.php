<?php 

class Tweet extends CI_Controller {

	/**
	 * Construct
	 *
	 * Auto load models and helpers used by this controller
	 *
	 * This code is called before any function, so it makes sense to include the helpers, libraries and models that are used in the controller
	 */
	public function __construct() {
		parent::__construct();

		$this->load->model('twitter');
		$this->load->model('tweetmodel');

		$this->load->helper('url');
	}

	/**
	 * Index
	 *
	 * Show a list of the users saved tweets
	 *
	 * When you access a controller without an action, the index it loaded first, imagine it as the index file if the controller were a folder.
	 */
	public function index() {

		//Tell the menu which button should be active for this action.
		$active_menu_elem = 'my_tweets';
		$menu_data = array(
			'active_menu_elem'=>$active_menu_elem
		);

		$tweets = $this->tweetmodel->get_all();

		$data = array(
			'tweets'=>$tweets
		);

		$this->load->view('header');
	    $this->load->view('menu', $menu_data);
	    $this->load->view('view_list', $data);
	    $this->load->view('footer');
	}

	/**
	 * Search
	 *
	 * Search twitter for tweets mentioning a keyword
	 *
	 */
	public function search(){
		// This helper is only used by this "action", so it shouldn't be autoloaded in the contructor.
		$this->load->helper('text');

		//Tell the menu which button should be active for this action.
		$active_menu_elem = 'search';
		$menu_data = array(
			'active_menu_elem'=>$active_menu_elem
		);

		$search_term = $this->input->post('search');

		//Chec for internet access, if there is none load example tweets
		if($this->twitter->has_internet_access()){
			$tweets = $this->twitter->search($search_term);
		}else{
			$tweets = $this->twitter->get_example_search_result();
		}

		//prepare the data for the view
		$data = array(
			'tweets'=>$tweets,
			'search_term'=>$search_term
		);

		$this->load->view('header');
	    $this->load->view('menu', $menu_data);
	    $this->load->view('search', $data);
	    $this->load->view('footer');
	}

	/**
	 * Add
	 *
	 * Add a new tweet
	 *
	 */
	public function add(){
		$this->tweetmodel->add_tweet($this->input->post('tweet'));
		redirect('/');
	}

	/**
	 * Delete
	 *
	 * Delete a saved tweet
	 *
	 */
	public function delete($tweet_id){
		$this->tweetmodel->delete_tweet($tweet_id);
		redirect('/');
	}
}
