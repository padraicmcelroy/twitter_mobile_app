<?php 

class Migrate extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

    public function index(){
    	$this->load->library('migration');
		if ( ! $this->migration->current()) {
			show_error($this->migration->error_string());
		}else{
			$row = $this->db->get('migrations')->row();
			$migration_number = $row ? $row->version : 0;
			echo "Migrated to Version $migration_number";
		}
    }

    public function testing_setup(){
    	$this->set_db_to_test();
    	
    	$this->load->library('migration');
		if ( ! $this->migration->current()) {
			show_error($this->migration->error_string());
		}else{
			$row = $this->db->get('migrations')->row();
			$migration_number = $row ? $row->version : 0;
			echo "Migrated Test DB to Version $migration_number";
		}
		
    }

    private function set_db_to_test()
    {
    	$this->db = $this->load->database('testing', true);
    }

}
