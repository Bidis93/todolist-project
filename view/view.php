<?php ob_start(); ?>

<?php foreach ($get_select as $get_selection) : ?>
	<ul>
	 <li><?= $get_selection['labeltache'] ?></li>
	 <li><?= $get_selection['description'] ?></li>
	</ul>
	<form action="" method="post">
	<input value="<?= $get_selection['labeltache'] ?>" name="labeltache">
	<input value="<?= $get_selection['description'] ?>" name="description">
	<button type="submit" value="<?= $get_selection['tacheid']?>" name="edit">Modifier</button>
	<button type="submit" value="<?= $get_selection['tacheid']?>" name="delete">Supprimer</button>
</form>



<?php endforeach; ?>


<?php $contenu = ob_get_clean(); ?>
