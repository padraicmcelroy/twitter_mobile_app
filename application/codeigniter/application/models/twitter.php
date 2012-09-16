<?

/**
 * Twitter Class
 *
 * A simple model that connects to twitter and performs a search.
 */
class Twitter {

	function __construct() {        
       
    }

    /**
     * Has Internet Access
     *
     * Check that there is internet access.
     *
     */
    public function has_internet_access(){
    	$page = @file_get_contents('http://www.google.com');
    	if($page){
    		return true;
    	}
    	return false;
    }

    /**
     * Search
     *
     * Search twitter for a term, return the result as an array of objects
     *
     */
    public function search($search_term=''){
    	if($search_term == ''){
    		return array();
    	}
    	$url_safe_search_term = urlencode($search_term);
    	$tweets = json_decode(@file_get_contents('http://search.twitter.com/search.json?q='.$url_safe_search_term));
    	return $tweets->results;
    }

    /**
     * Get Example Search Results
     *
     * If there is no internet access, this should be called, returning sample results.
     *
     */
    public function get_example_search_result(){
    	$tweets = json_decode(file_get_contents(APPPATH.'models/test_tweet_data/example_search_result.json'));
    	return $tweets->results;
    }
}
