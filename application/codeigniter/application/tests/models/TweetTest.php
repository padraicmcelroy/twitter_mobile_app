<?php

/**
 * @group Model
 */

class TweetTest extends CIUnit_TestCase
{
	public function setUp()
	{
		parent::tearDown();
		parent::setUp();

		$this->CI->db->query('DELETE FROM tweet');

		$this->CI->load->model('tweetmodel');
	}

	public function test_is_saved_when_no_tweet()
	{
		$this->assertFalse($this->CI->tweetmodel->is_saved('a', 'b'));
	}

	public function test_is_saved_is_false_when_dup_tweet()
	{
		$tweet = 'a';
		$user_img_url = 'url';
		$this->CI->tweetmodel->add_tweet($tweet, $user_img_url);
		$this->assertTrue($this->CI->tweetmodel->is_saved($tweet, $user_img_url));
	}
}
