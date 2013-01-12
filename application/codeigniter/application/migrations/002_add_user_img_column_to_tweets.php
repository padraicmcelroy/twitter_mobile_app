<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User_Img_Column_To_Tweets extends CI_Migration {

	public function up() {

		$fields = array(
                        'user_img_url' => array('type' => 'varchar(160)')
		);
		$this->dbforge->add_column('tweet', $fields);
	}

	public function down() {
		$this->dbforge->drop_column('tweet', 'user_img_url');
	}
}
