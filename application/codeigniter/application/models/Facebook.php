<?

class Facebook { 

	public static function search_pages($search_term)
	{
		$url_safe_search_term = urlencode($search_term);
		
		$url = ""; //This is the broken part

		$json_string = @file_get_contents($url);
		$result = json_decode($json_string);
		if(isset($result->data))
		{
			return $result->data;
		}
        return array();
	}
}