<div class="row-fluid">
    <div class="span12">
      <h2>Tweets</h2>
      <p class="text-info">View a list of your favourite tweets.</p>
    </div>
</div>
<?foreach($tweets as $tweet):?>
	<div class="row-fluid">
        <div class="span12">
	    	<div class="well tweet">
			<img class="tweet_pic" src="<?=$tweet->user_img_url?>"/>
	    		<?=$tweet->tweet?>
	    		<a class="btn btn-danger pull-right" href="/tweets/delete/<?=$tweet->id?>">Delete</a>
	    		<div class="clearfix"></div>
	    		<?if(Tweet::has_comments_association()):?>
		    		<h5>Comments (<?=count($tweet->comments)?>)</h5>
	    			<?
	    			$number = 1;
	    			foreach($tweet->comments as $comment):?>
	    				<div class="comment">
	    					<?=$number++?>. <?=$comment->text?>
	    				</div>
	    			<?endforeach;?>
	    			<form class="comment_form" action="/tweets/add_comment/<?=$tweet->id?>" method="post">
	    				<textarea class="span9" name="comment"></textarea>
	    				<input class="btn" type="submit" value="Save Comment"/>
	    			</form>	   
	    		<?endif;?> 
	      	</div>
		</div>
     	</div>
 <?endforeach;?>  


