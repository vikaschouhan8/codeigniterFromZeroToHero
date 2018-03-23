<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CURD using CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
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
		/* li {
			float: left;
		} */
		table, th, td {
			border: 1px solid black;
		}
		td {
			padding: 10px;
		}
		.mydiv {    
			top: 0%;
			left: 32%;
            background-color: #f3f3f3;
        }
	</style>
</head>
<body class="mydiv">

<div id="container" >

	<div id="body">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1">
			</div>			
			<div class="col-md-6">
				<h2><a href="<?php echo base_url().'home/do_logout';?>">Logout</a></h2>
				<h2><a href="<?php echo base_url();?>">home</a></h2>
				<h1 id='form_head'>User Listing</h1>
				
				<?php if (isset($results)) { ?>
					<table class="table table-striped table-bordered table-hover table-condensed" border="1" cellpadding="0" cellspacing="0">
						<tr>
							<th>ID</th>
							<th>NAME</th>
							<th>Surname</th>
							<th>Edit</th>                        
							<th>delete</th>                        										                        
						</tr>
						
						<?php foreach ($results as $data) { ?>
							<tr>
								<td><?php echo $data->id ?></td>                            
								<td><?php echo $data->name ?></td>
								<td><?php echo $data->uploaded_on ?></td>
								<td><a href="<?php echo base_url().'home/input_edit/'.$data->id;?>"> Edit </a> </td>						
								<td><a href="<?php echo base_url().'home/delete/'.$data->id;?>"> Delete </a> </td>
							</tr>
						<?php } ?>
					</table>
				<?php } else { ?>
					<div>No user(s) found.</div>
				<?php } ?>

				<?php if (isset($links)) { ?>
					<h1>
						<?php echo $links ?>
					</h1>                
				<?php } ?>
			</div>

			<div  class="col-md-5">
				<h1>Search entry by: name, mail</h1>
				<form method="POST" action="<?php echo base_url().'home/index/';?>">
					Search:<input type="text" name="name_search" size="50" style="margin-left: 27px;margin-bottom: 20px;">
					<button class="btn btn-success" type="submit" value="search" style="margin:15px"/>Search</button>			
				</form>
				<!-- Search result-->
				<div style="height:300px; overflow:auto">
					<table class="table table-striped table-bordered table-hover table-condensed" border="1" cellpadding="0" cellspacing="0" >
						<thead>
							<tr>
								<td>No.</td>
								<td>Name</td>
								<td>Mail</td>																	
							</tr>
						</thead>
						<tbody>
							<?php 
							if(!empty($record)){
								foreach($record as $row){
								?>					
								<tr>
									<td><?php echo $row->id; ?></td>                            
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->uploaded_on; ?></td>
								</tr>
								<?php 	
								}
							}else{
								echo "<p>no results<p/>";
							}    
							?>					
						</tbody>
					</table>
				</div>

				<!-- end search result -->
			</div>
		</div>

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">
				<a href="<?php echo base_url().'paging/custom';?>">Paginated table example</a>
				<h1>Add new entry form</h1>
				<form method="POST" action="<?php echo base_url().'home/add/';?>">
					<label for="email">Name:</label>
					<input type="text" name="name" size="50" style="margin-left: 27px;margin-bottom: 20px;">
					<label for="email">Email:</label>
					<input type="text" name="uploaded_on" size="50"/ style="margin-left: 10px;">
					<button class="btn btn-primary" type="submit" value="Add" style="margin:15px"/>add</button>
				</form>
			</div>
		</div>
	</div>


		
	</div>

</div>

</body>
</html>

<!-- http://localhost/gallery/ -->
<!-- For session and login in codeingniter: https://www.codeproject.com/Articles/476944/Create-user-login-with-Codeigniter -->
<!-- https://www.youtube.com/watch?v=nhHqiGCG10E -->