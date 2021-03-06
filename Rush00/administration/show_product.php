<?php 
	include "../layout/header.php";

	if ((!estConnecte() && !estAdmin()) || (estConnecte() && !estAdmin())) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

?>

	<div class="content">
		<h1>Tout les produits</h1>
		<table class="cart_table">
			<tbody>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Content</th>
					<th>Category</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<?php 
				$sql = "SELECT p.id, p.name, p.content, p.price, p.category_id, c.name as cat_name FROM products p LEFT JOIN categories c ON (p.category_id = c.id);";
				$resultat = mysqli_query($bdd, $sql);
				while ($d = mysqli_fetch_assoc($resultat)) {?>
					<tr>
						<td><?php echo $d['id']; ?></td>
						<td><?php echo $d['name']; ?></td>
						<td><?php echo $d['content']; ?></td>
						<td><?php echo $d['cat_name']; ?></td>
						<td><a href="update_product.php?id=<?php echo $d['id']; ?>"><img src="http://www.freeiconspng.com/uploads/blue-refresh-icon-png-6.png" height="20" salt=""></a></td>
						<td><a href="delete_product.php?id=<?php echo $d['id']; ?>"><img src="http://findicons.com/files/icons/1262/amora/128/delete.png" height="20" alt=""></a></td>
					</tr>
				<?php
				}
				mysqli_free_result($resultat);
				?>
			</tbody>

		</table>

	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>		