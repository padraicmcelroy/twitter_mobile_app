<?
/**
 * I have purposely managled this class.
 *
 * Try to fix the indenation and lines
 */

class TwitterException extends InputException { }

class Twitter { 

    const apiUrl = 'http://search.twitter.com/search.json';

    public static function has_internet_access(){
        $page = @file_get_contents('http://www.google.com');
        if($page)
        {
            return true;
    	}
        return false;
    }

    public static function search($search_term='')
    {
        if($search_term == '')
        { 
            throw new InputException("The searchterm cannot be blank");
        }
    	$url_safe_search_term = urlencode($search_term);
        $tweets = json_decode(@file_get_contents(self::apiUrl.'?q='.$url_safe_search_term.'&lang=en'));
    	return $tweets->results;
    }

    public static function get_example_search_result()
    {
        $tweets = json_decode(file_get_contents(APPPATH.'models/test_tweet_data/example_search_result.json'));
        return $tweets->results;
    }
}
