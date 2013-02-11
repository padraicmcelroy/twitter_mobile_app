<?

class FacebookException extends InputException {}

class Facebook { 

	public static function search_pages($search_term)
	{
		$url_safe_search_term = urlencode($search_term);
		
		$url = "https://graph.facebook.com/search?q=$url_safe_search_term&type=page"; //This is the broken part

		try{
			$json_string = file_get_contents($url);
		}
		catch(ErrorException $e)
		{
			throw new FacebookException("Search term cannot be blank");
		}
		
		$result = json_decode($json_string);
		if(isset($result->data))
		{
			return $result->data;
		}
        return array();
	}
}