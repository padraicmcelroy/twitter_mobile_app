<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Comments extends CI_Migration {

	public function up() {

		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'tweet_id' => array(
				'type' => 'INT',
			),
			'text' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
		));
		
		$this->dbforge->create_table('comment');
	}

	public function down() {
		$this->dbforge->drop_table('comment');
	}
}