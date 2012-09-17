<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User_Img_Column_To_Tweets extends CI_Migration {

	public function up() {

		$fields = array(
                        'column_name' => array('type' => 'varchar(160)')
		);
		$this->dbforge->add_column('table_name', $fields);
	}

	public function down() {
		$this->dbforge->drop_column('table_name', 'column_name');
	}
}
