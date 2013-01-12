<?
/**
 * TweetModel
 *
 * Model representing tweets saved by our system
 *
 * Currently this is a very simple that demonstrates how to get and save data from a DB.
 *
 */
class TweetModel extends CI_Model {

	function __construct() {        
       
    }

    /**
     * Get all
     *
     * Return all the saved tweets
     *
     */
    public function get_all(){
    	$query = $this->db->get('tweet');
        return $query->result();
    }

    /**
     * Add Tweet
     *
     * Add a tweets and save it
     *
     */
    public function add_tweet($tweet, $user_img_url=''){

        $this->db->where('tweet', $tweet);
        $this->db->where('user_img_url', $user_img_url);
        $old_tweet = $this->db->get('tweet');

        if(!count($old_tweet->result()) > 0){
            $data = array();
            $data['tweet'] = $tweet;
            $data['user_img_url'] = $user_img_url;
            $this->db->insert('tweet', $data);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete Tweet
     *
     * Delete a tweet by its ID
     *
     */
    public function delete_tweet($tweet_id){;
        $this->db->where('id', $tweet_id);
		$this->db->delete('tweet'); 
    }
}
