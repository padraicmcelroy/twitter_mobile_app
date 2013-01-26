<?php

/**
 * @group Model
 */
class TweetModelTest extends CIUnit_TestCase
{
	public function setUp()
	{
		$this->CI->db->query('DELETE FROM tweet');
		$this->CI->load->model('tweet');
	}

	public function test_save_tweet()
	{
		$tweet_msg = 'a';
		$user_img_url = 'url';

		$tweet = new Tweet();
		$tweet->tweet =$tweet_msg;
		$tweet->user_img_url = $user_img_url;
		$tweet->save();

		$id = $tweet->id;
		$tweet_reloaded = Tweet::find_by_id($id);
		$this->assertEquals($tweet_msg, $tweet_reloaded->tweet);
		$this->assertEquals($user_img_url, $tweet_reloaded->user_img_url);
	}


	/**
	 * @expectedException TweetException
	 */
	public function test_cant_save_duplicate_tweet()
	{
		$tweet_msg = 'a';
		$user_img_url = 'url';
		$tweet = new Tweet();
		$tweet->tweet =$tweet_msg;
		$tweet->user_img_url = $user_img_url;
		$tweet->save();

		$tweet = new Tweet();
		$tweet->tweet =$tweet_msg;
		$tweet->user_img_url = $user_img_url;
		$tweet->save();
	}


	public function test_check_if_duplicate()
	{
		$tweet_msg = 'a';
		$user_img_url = 'url';
		$tweet = new Tweet();
		$tweet->tweet =$tweet_msg;
		$tweet->user_img_url = $user_img_url;
		$tweet->save();

		$tweet = new Tweet();
		$tweet->tweet =$tweet_msg;
		$tweet->user_img_url = $user_img_url;

		$is_duplicate = false;
		try 
		{
			$tweet->check_if_duplicate();
		}
		catch (TweetException $e)
		{
			$is_duplicate = true;
		}

		$this->assertTrue($is_duplicate);
	}
}
