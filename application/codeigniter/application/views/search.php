  <div class="row-fluid">
    <div class="span12">
      <h2>Search</h2>

      <form action="#" method="post" class="form-inline">
		  <input type="text" class="input" value="<?=$search_term?>" placeholder="Search Term" name="search">
		  <button type="submit" class="btn btn-primary">Search Twitter</button>
	  </form>

    </div>
  </div>
  
  <?foreach($tweets as $tweet):?>
    <div class="row-fluid">
	    <div class="span12">
	    	<div class="span10">
		    	<div class="well">
		    		<img class="tweet_pic" src="<?=$tweet->profile_image_url_https?>"/>
		      		<?=$tweet->text?>
		      		<div class="clearfix"></div>
		      	</div>
		    </div>
		    <div class="span2">
	    		<form action="/tweet/add" method="post">
					<input type="hidden" name="tweet" value="<?=$tweet->text?>"/>
					<input type="submit" class="btn" value="Save"/>
				</form>
		    </div>
		</div>
  	</div>
  <?endforeach;?>

