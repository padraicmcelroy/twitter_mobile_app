<?

class Comment extends ActiveRecord\Model 
{
    static $table_name = 'comment';

    static $belongs_to = array(
        array('tweet')
    );
}
