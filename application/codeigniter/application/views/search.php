  <div class="row-fluid">
    <div class="span12">
      <h2>Search</h2>

      <form action="#" method="post" class="form-inline">
		  <input type="text" class="input" value="<?=$search_term?>" placeholder="Search Term" name="search">
		  <button type="submit" class="btn btn-primary">Search Twitter</button>
	  </form>

    </div>
    <?foreach($tweets as $tweet):?>
	    <div class="span9">
	    	<div class="well">
	    		<img class="tweet_pic" src="<?=$tweet->profile_image_url_https?>"/>
	      		<?=$tweet->text?>
	      	</div>
		</div>
		<div class="span2">
			<form action="/tweet/add" method="post">
				<input type="hidden" name="tweet" value="<?=$tweet->text?>"/>
				<input type="submit" class="btn" value="Save"/>
			</form>
		</div>
    <?endforeach;?>
  </div>

