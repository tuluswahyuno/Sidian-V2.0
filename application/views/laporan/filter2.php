<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Data Filter</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha512-iQQV+nXtBlmS3XiDrtmL+9/Z+ibux+YuowJjI4rcpO7NYgTzfTOiFNm09kWtfZzEB9fQ6TwOVc8lFVWooFuD/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

	<div class="container">
			<br>
			<h1 align="center"><?php echo $title ?? '-'?></h1>
			<br>
		<div class="row">
			<!-- <div class="row"> -->
			<div class="col-md-3">
				<form action="" id="FormLaporan">
					<select name="" id="profesi" class="form-control">
						<option value="0">Show All</option>
						<?php foreach ($profesi as $row) : ?>
							<option value="<?php echo $row->id_profesi ?>"><?php echo $row->nama_profesi ?></option>
						<?php endforeach ?>
					</select>
					<br>
					<button type="submit" class="btn btn-primary">Show Data</button>
				</form>
			</div>
			<div class="col-md-9">
				<div id="result"></div>
		</div>
		</div>
	</div>
	<!-- </div> -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		$(document).ready(function(){
			$("#FormLaporan").submit(function(e){
				e.preventDefault();
				var id = $("#profesi").val();
				// console.log(id);

				var url = "<?= site_url('Cetak/filter/')?>" + id;
				$('#result').load(url);
			})
		});
	</script>

</body>
</html>