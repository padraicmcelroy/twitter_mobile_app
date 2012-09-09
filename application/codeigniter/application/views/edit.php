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
  <div class="title">Edit Twoot #<?=$id?></div>
  <form action="/twotter/save_edit/<?=$id?>" method="post">
  	<textarea name="twoot"><?=$twoot['msg']?></textarea>
	<br>
  	<input type="submit">
  </form>
</div>
</body>
</html>
