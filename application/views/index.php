<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<th>No</th>
			<th>BULAN</th>
			<th>PERMINTAAN</th>
			<th>MA 3 BULAN</th>
			<th>DOUBLE MOVING AVERAGE</th>
			<th>NILAI AT</th>
			<th>NILAI BT</th>
			<th>NILAI FT</th>
		</tr>
		<?php foreach ($data as $key => $value) {?>
			<tr>
				<td>No</td>
				<td><?= $value['bulan'] ?></td>
				<td><?=  $value['jumlah'] ?></td>
				<td><?= $value ['result']?> </td>
				<td><?= $value ['result2']?></td>
				<td><?= $value ['at']?></td>
				<td><?= $value ['bt']?></td>
				<td><?= $value ['ft']?></td>
			</tr>
			<?php } ?>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?= $last_ft?></td>
			</tr>
	</table>
	
</body>
</html>
