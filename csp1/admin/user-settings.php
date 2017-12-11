<?php
	$user = new User;

	$user->findAll();

	$users = $user->data();
?>

<div class="container">
	<h3>User Settings</h3>
	<div class="row">
		<div class="col s12">
			<button class="btn" type="button" onclick="window.location='?page=register'">
				<i class="material-icons">playlist_add</i>Create New User
			</button>
			<br>
			<table class="table table-bordered table-hover footable" style="margin-top: 10px;">
				<thead>
				<tr>
					<th></th>
					<th class="col s12">Name</th>
					<th class="center" data-breakpoints="xs sm">Permision</th>
					<th class="center" data-breakpoints="xs sm">Date Registered</th>
					<th class="center" data-breakpoints="xs sm">Last Login</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
<?php
	foreach ($users as $user) {
		if($user->iLogged == 1) {
			$textColor = "green-text text-darken-2";
		} else {
			$textColor = "red-text text-darken-2";
		}
?>

					<tr>
						<td><i class="material-icons <?php echo $textColor; ?>">account_circle</i></td>
						<td><?php echo $user->vName; ?></td>
						<td class="center"><?php echo ""; ?></td>
						<td class="center"><?php echo ""; ?></td>
						<td></td>
						<td class="center">
							<a class="" href="" title="Edit"><i class="material-icons">edit</i></a>
							<a class="" href="" title="Delete"><i class="material-icons">delete</i></a>
						</td>
					</tr>

<?php
	}
?>
				</tbody>
			</table>
		</div>
	</div>
</div>