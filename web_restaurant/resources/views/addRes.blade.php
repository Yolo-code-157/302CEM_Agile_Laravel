<?php
 // include("addRestaurant.php");
  //addRes();
?>
<x-app-layout>
<html lang="en">
  <head>
	<title>Hello, Restaurant!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--  Fonts and icons  -->
      <!-- Fonts and icons -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link href="/assets/css/addRes.css" rel="stylesheet" />
  </head>
  <body>


<div class="page-header header-filter" data-parallax="true" style="background-image: url('img/bg2.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Add Restaurant</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-left">
	<form name="Add Res" action="" method="POST">
  <input type="text" class="form-control" placeholder="Restaurant Name" name="Name" required><br>
	<br>
	<input type="text" class="form-control" placeholder="Postcode" name="Postcode" required><br>
	<br>
	<input type= "file" name="Pic"  class="form-control" accept="image/* " required><br>
	<br>
	<input type="text" class="form-control" placeholder="Type of Food Served" name="FoodType" required><br>
	<br>
	<div class="form-group">
	<label for="exampleMessage" class="bmd-label-floating">Your Message</label>
    <textarea class="form-control" rows="4" name="Description"></textarea><br>
	</div>
	<br>
	<input type="submit" class="btn btn-primary btn-round" name="add_res"><br>
	</form>
    </div>
  </div>
</div>
@include('footer')
</x-app-layout>