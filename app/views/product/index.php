<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Product Catalog</title>
  </head>
  <body>
	  <div class='container'>
	  	<h1>Product Catalog</h1>
	  		<a href='/login/logout'>Log out</a><br />

	  		<a href='/product/create' class='btn btn-success'>Add an item</a>
			<table class="table table-striped">
				<tr><th></th><th>Name</th><th>Price</th><th>Actions</th></tr>
				<?php
					foreach ($data['items'] as $item){
						echo "<tr><td></td><td>$item->name</td><td>$item->price</td><td>
						<a href='/product/detail/$item->product_id' class='btn btn-primary'>Details</a>
						<a href='/product/edit/$item->product_id' class='btn btn-warning'>Edit</a>
						<a href='/product/delete/$item->product_id' class='btn btn-danger'>Delete</a>
						<a href='/product/addPicture/$item->product_id' class='btn btn-primary'>Add a picture</a>
						</td><th></th></tr>";
					}
				?>
			</table>
	  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>