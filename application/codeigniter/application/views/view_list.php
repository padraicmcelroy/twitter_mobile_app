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
	    		<a class="btn btn-danger pull-right" href="/tweet/delete/<?=$tweet->id?>">Delete</a>
	    		<div class="clearfix"></div>
	      	</div>
		</div>
     	</div>
 <?endforeach;?>  


