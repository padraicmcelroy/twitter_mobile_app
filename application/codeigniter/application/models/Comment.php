<?

class CommentException extends Exception {}

class Comment extends LoudActiveRecord
{
    static $table_name = 'comment';

    static $belongs_to = array(
        array('tweet')
    );
}
