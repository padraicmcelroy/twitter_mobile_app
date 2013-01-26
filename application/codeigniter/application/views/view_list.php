<div class="row-fluid">
    <div class="span12">
      <h2>Tweets</h2>
      <p class="text-info">View a list of your favourite tweets.</p>
    </div>
</div>
<?foreach($tweets as $tweet):?>
	<div class="row-fluid">
        <div class="span12">
	    	<div class="well">
			<img class="tweet_pic" src="<?=$tweet->user_img_url?>"/>
	    		<?=$tweet->tweet?>
	    		<a class="btn btn-danger pull-right" href="/tweets/delete/<?=$tweet->id?>">Delete</a>
	    		<div class="clearfix"></div>
	    		<?if(isset($tweet->comments):?>
	    			<?foreach($tweet->comments as $comment):?>
	    				<?=$comment->text?>
	    				<hr/>
	    			<?endforeach;?>
	    			<form action="/tweets/add_comment/<?=$tweet->id?>" method="post" >
	    				<textarea name="comment"></textarea>
	    				<input type="submit" value="Save Comment"/>
	    			</form>
	    		<?endif;?>
	      	</div>
		</div>
     	</div>
 <?endforeach;?>  


