<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once $application_folder."/controllers/base.php";

class Tweet extends Base {

	/**
	 * Index
	 *
	 * Show a list of the users saved tweets
	 *
	 * When you access a controller without an action, the index it loaded first, imagine it as the index file if the controller were a folder.
	 */
	public function index() {

		$this->set_active_menu_element('my_tweets');

		$tweets = $this->tweetmodel->get_all();

		$data = array(
			'tweets'=>$tweets
		);

		$this->display_page_with_view('view_list', $data);
	}

	/**
	 * Search
	 *
	 * Search twitter for tweets mentioning a keyword
	 *
	 */
	public function search(){
		
		$this->set_active_menu_element('search');
		
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

		$this->load->helper('text');

		$this->display_page_with_view('search', $data);
	}

	/**
	 * Add
	 *
	 * Add a new tweet
	 *
	 */
	public function add()
	{
		$tweet = $this->input->post('tweet');
		$user_img_url = $this->input->post('user_img_url');

		$this->tweetmodel->add_tweet($tweet, $user_img_url);
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
