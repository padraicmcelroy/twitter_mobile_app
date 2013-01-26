<?php

/**
 * @group Model
 */
class TweetModelTest extends CIUnit_TestCase
{
	public function setUp()
	{
		$this->CI->db->query('DELETE FROM tweet');

		$this->CI->load->model('tweetmodel');
	}

	public function test_save_tweet()
	{
		$tweet_msg = 'a';
		$user_img_url = 'url';

		$this->CI->tweetmodel->add_tweet($tweet_msg, $user_img_url);
		
		$tweets = $this->CI->tweetmodel->get_all();
		$tweet = $tweets[0];
		$this->assertEquals($tweet_msg, $tweet->tweet);
		$this->assertEquals($user_img_url, $tweet->user_img_url);
	}

	public function test_save_mutiple_tweet()
	{
		$this->CI->tweetmodel->add_tweet('a', 'as');
		$this->CI->tweetmodel->add_tweet('aa', 'as');
		
		$tweets = $this->CI->tweetmodel->get_all();
		$count_tweets = count($tweets);
		$this->assertEquals(2, $count_tweets);
	}

	public function test_cant_save_duplicate_tweet()
	{
		$tweet_msg = 'a';
		$user_img_url = 'url';
		$this->CI->tweetmodel->add_tweet($tweet_msg, $user_img_url);

		$this->CI->tweetmodel->add_tweet($tweet_msg, $user_img_url);
		
		$tweets = $this->CI->tweetmodel->get_all();
		$count_tweets = count($tweets);
		$this->assertEquals(1, $count_tweets);
	}

	public function test_is_saved()
	{
		$tweet = 'a';
		$user_img_url = 'url';

		$is_saved = $this->CI->tweetmodel->is_saved($tweet, $user_img_url);

		$this->assertFalse($is_saved);
	}

	public function test_is_saved_when_tweet_exists()
	{
		$tweet_msg = 'a';
		$user_img_url = 'url';
		$this->CI->tweetmodel->add_tweet($tweet_msg, $user_img_url);

		$is_saved = $this->CI->tweetmodel->is_saved($tweet_msg, $user_img_url);

		$this->assertTrue($is_saved);
	}

	public function test_delete_tweet()
	{	
		$tweet_msg = 'a';
		$user_img_url = 'url';
		$this->CI->tweetmodel->add_tweet($tweet_msg, $user_img_url);
		$tweets = $this->CI->tweetmodel->get_all();
		$tweet = $tweets[0];

		$this->CI->tweetmodel->delete_tweet($tweet->id);
		
		$tweets = $this->CI->tweetmodel->get_all();
		$count_tweets = count($tweets);
		$this->assertEquals(0, $count_tweets);
	}
}
