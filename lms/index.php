<?php
	session_start();
	require('reusable/header.php');
	include('reusable/conn.php');
	function get_user_issue_book_count(){
		include('reusable/conn.php');
		$user_issue_book_count = 0;
		$query = "select count(*) as user_issue_book_count from issued_books where student_id = $_SESSION[id]";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$user_issue_book_count = $row['user_issue_book_count'];
		}
		return($user_issue_book_count);
	}
	function get_user_book_count(){
		include('reusable/conn.php');
		$user_book_count = 0;
		$query = "select count(*) as user_book_count from books";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$user_book_count = $row['user_book_count'];
		}
		return($user_book_count);
	}
?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
			</div>	
		</div>
	</nav><br>
	<span><marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<div class="row">
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Book Issued</div>
				<div class="card-body">
					<p class="card-text">No of book issued: <?php echo get_user_issue_book_count();?></p>
					<a class="btn btn-success" href="view_issued_book.php">View Issued Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Books</div>
				<div class="card-body">
					<p class="card-text">No of book issued: <?php echo get_user_book_count();?></p>
					<a class="btn btn-success" href="view_books.php">View all Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
<?php
	require('reusable/footer.php');
?>