<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<div class="container">
	<h2 class="text-center">Welcome Mr. Bassam ^_^</h2>
	<h1 class="text-center">This is a simple Unlimited Tree Branchs</h1>
<form method="POST" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Branch name</label>
    <input type="text" class="form-control col-3" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brnch Name">
  </div>

  <label for="exampleInputEmail1">Branch Parent </label>
  <select name="parent_id" class="form-control col-3">
  <?php
  foreach($parent_data as $parent)
  {?>
	  <option value="<?=$parent->id?>"><?=$parent->name?></option>

 <?php }?>
</select>
<br>
  <button type="submit" class="btn btn-primary">Add</button>
</form>

<div id="container">
	<h1>Branches tree!</h1>

<?=$branches?>
</div>

</body>
</html>
