  <div class="row-fluid">
    <div class="span12">
      <h2>Tweets</h2>
      <p class="text-info">View a list of your favourite tweets.</p>
    </div>

    <?foreach($tweets as $tweet):?>
	    <div class="span9">
	    	<div class="well">
	    		<?=$tweet->tweet?>
	      	</div>
		</div>
		<div class="span2">
			<a class="btn btn-danger" href="/tweet/delete/<?=$tweet->id?>">Delete</a>
		</div>
    <?endforeach;?>  
  </div>

