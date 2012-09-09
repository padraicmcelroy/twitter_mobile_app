<?

class Twoots {

	function __construct() {        
        $this->init_session_data();
    }

    private function init_session_data(){
		if(!isset($_SESSION['twoots'])){
			$_SESSION['twoots'] = array();
		}
	}

	public function get_all(){		
		return array_reverse($_SESSION['twoots']);
	}

	public function get($id){
		return $_SESSION['twoots'][$id];
	}

	public function append_twoot($twoot_data){	
		$date = new DateTime();
		$twoot_data['date'] = $date->format('d/m/Y H:i:s');
		$twoot_data['id'] = count($_SESSION['twoots']);
		$_SESSION['twoots'][$twoot_data['id']] = $twoot_data;
	}

	public function edit_twoot($id, $twoot_data){
		$date = new DateTime();
		$twoot_data['date'] = $date->format('d/m/Y H:i:s');
		$twoot_data['id'] = $id;
		$_SESSION['twoots'][$id] = $twoot_data;
	}

	public function delete_twoot($id){
		unset($_SESSION['twoots'][$id]);
	}
	
	public function delete_all_twoots(){
		$_SESSION['twoots'] = array();
	}
}
