<?$active_menu_elem = isset($active_menu_elem)? $active_menu_elem: '';?>

  <div class="row-fluid">
    <div class="span12">
      <div class="navbar">
        <div class="navbar-inner">
          <a class="brand" href="/">Tweetlist</a>
          <ul class="nav">
            <li <?=($active_menu_elem == 'my_tweets')? 'class="active"' :''?>><a href="/">My Tweets</a></li>
            <?if($user):?>
              <li <?=($active_menu_elem == 'search')? 'class="active"' :''?>><a href="/search">Search</a></li>
            <?endif;?>
          </ul>
          <?if($user):?>
            <span class="pull-right">Hello <?=$user->first_name?> <?=$user->last_name?> | <a href="/auth/logout" class="">Logout</a></span>
          <?else:?>
            <a href="/auth/login" class="btn pull-right">Login</a>
          <?endif;?>
        </div>
      </div>
    </div>
  </div> 