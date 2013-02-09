<?

class Comment extends LoudActiveRecord
{
    static $table_name = 'comment';

    static $belongs_to = array(
        array('tweet')
    );

    public function set_text($text)
    {
    	//put in logic to throw an error if $text is blank
    	$this->assign_attribute('text', $text);
    }
}
