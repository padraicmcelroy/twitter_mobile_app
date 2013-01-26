<?

class TweetException extends Exception {}

class Tweet extends ActiveRecord\Model 
{
    static $table_name = 'tweet';

    static $before_save = array('check_if_duplicate');

    public function check_if_duplicate()
    {
        $tweets = self::find('all',
            array('conditions' => 
                array('tweet=? AND user_img_url=?', 
                    $this->tweet,
                    $this->user_img_url
                )
            )
        );
        if(count($tweets) > 0)
        {
            throw new TweetException("This Tweet is a duplicate");
        }
    }

    public static function has_comments_association()
    {   
        if(!property_exists('Tweet', 'has_many'))
        {
            return false;
        }
        return (bool) in_array(array('comments'), self::$has_many);
    }
}
