<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en"> <!--<![endif]-->
<head>

<meta charsetT="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Twotter - The personal Twitter</title>
<link rel="stylesheet" href="/css/style.css">

</head>
<body>
<div id="frame">
  <div class="title">Welcome to Twotter</div>
  Get twooting
  <form action="/twotter/add" method="post">
  	<textarea id="twoot-input" name="twoot"></textarea><br>
  	<input type="submit" value="Save twoot">
  </form>
  <?foreach($twoots as $twoot):?>
  	<div class="twoot">
  		<div class="msg"><?=$twoot['msg']?></div>
  		<?=$twoot['date']?> -
  		<a href="/twotter/edit/<?=$twoot['id']?>">Edit</a> - 
  		<a href="/twotter/delete/<?=$twoot['id']?>">Delete</a>
  	</div>
  <?endforeach;?>
</div>
</body>
</html>
