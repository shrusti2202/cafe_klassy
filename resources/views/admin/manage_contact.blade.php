@extends('admin.layout.main_structure')

@section('main_code')
<!DOCTYPE html>
<html>

<head>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>

<body>

	<h1 ALIGN='center' style='color:grey'>CONTACTS</h1>


	<div class="panel-body" style="font-size:20px">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (!empty($contact_arr)) {
						foreach ($contact_arr as $w) {
					?>
							<tr>
								<td><?php echo $w->id; ?></td>
								<td><?php echo $w->name; ?></td>
								<td><?php echo $w->email; ?></td>
								<td><?php echo $w->subject; ?></td>
								<td><?php echo $w->message; ?></td>
								<td>
									<a class="btn btn-success" class="btn btn-primary"><?php echo $w->status; ?></a>
									<a class="btn btn-success" href="edit?editcat=<?php echo $w->id; ?>" class="btn btn-primary">Edit</a>
									<a href="delete_contact/<?php echo $w->id; ?>" type="submit" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php
						}
					} else {
						?>
						<tr>
							<td align="center" colspan="4"> Data Not Found </td>
						</tr>
					<?php
					}
					?>

				</tbody>
			</table>
		</div>
	</div>


</body>

</html>

@endsection