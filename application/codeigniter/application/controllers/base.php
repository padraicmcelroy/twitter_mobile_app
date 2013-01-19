<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	protected $user;
	private $active_menu_elem;

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
		$this->load->library('ion_auth');

		if($this->ion_auth->logged_in())
		{
			$this->user = $this->ion_auth->user()->row();
		}

		$this->load->helper('url');
	}

	protected function set_active_menu_element($menu_element)
	{
		$this->active_menu_elem = $menu_element;
	}

	protected function display_page_with_view($view, $data)
	{
		$menu_data = array(
			'active_menu_elem'=>$this->active_menu_elem,
			'user'=>$this->user
		);

		$this->load->view('header');
	    $this->load->view('menu', $menu_data);
	    $this->load->view($view, $data);
	    $this->load->view('footer');
	}
}