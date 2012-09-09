<?

class TweetModel extends CI_Model {

	function __construct() {        
       
    }

    public function get_all(){
    	$query = $this->db->get('tweet', 10);
        return $query->result();
    }

    public function add_tweet($tweet){

    	$data = array();
    	$data['tweet'] = $tweet;
        $this->db->insert('tweet', $data);
    }

    public function delete_tweet($tweet_id){;
        $this->db->where('id', $tweet_id);
		$this->db->delete('tweet'); 
    }
}
