<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Tweets extends CI_Migration {

	public function up() {

		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'tweet' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
		));
		
		$this->dbforge->create_table('tweet');
	}

	public function down() {
		$this->dbforge->drop_table('tweet');
	}
}