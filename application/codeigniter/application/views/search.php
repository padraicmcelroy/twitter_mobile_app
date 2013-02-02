  <div class="row-fluid">
    <div class="span12">
      <h2>Search</h2>

      <form action="#" method="post" class="form-inline">
		  <input type="text" class="input" value="<?=$search_term?>" placeholder="Search Term" name="search">
		  <button type="submit" class="btn btn-primary">Search</button>
	  </form>

    </div>
  </div>
  <div class="row-fluid">
  	<div class="span12">
  		<h3>Facebook Pages <?=count($facebook_pages)?></h3>
  		<form id="facebook_page_form" method="get" action="#" target="_blank" class="form form-inline">
	  		<select id="facebook_page">
	  		<option>(None selected)</option>
	  		<?foreach($facebook_pages as $key=>$page):?>
				<option value="http://facebook.com/<?=$page->id?>">
					<?=($key+1)?>. 
					<?=$page->name?>
				</option>
			<?endforeach;?>
			</select>
			<input type="button" value="Open page" id="facebook_page_view" class="btn">
		</form>
  </div>
  <h3>Twitter Results</h3>
  <?foreach($tweets as $tweet):?>
    <div class="row-fluid">
	    <div class="span12">
	    	<div class="span12">
	    		<form class="well" action="/tweets/add" method="post">
		    		<div>
		    			<img class="tweet_pic" src="<?=$tweet->profile_image_url_https?>"/>
		    			<h4><?=$tweet->from_user?></h4>
		      			<?=highlight_phrase($tweet->text, $search_term, '<span style="color:#990000">', '</span>')?>
		      		</div>
					<input type="hidden" name="tweet" value="<?=$tweet->text?>"/>
					<input type="hidden" name="user_img_url" value="<?=$tweet->profile_image_url_https?>"/>
					<input type="submit" class="btn btn-success pull-right" value="Save"/>
					
		      		<div class="clearfix"></div>
		      	</form>
		    </div>
		</div>
  	</div>
  <?endforeach;?>

