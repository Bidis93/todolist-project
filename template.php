<!doctype html>

<html>
	<head>
		<title>Exercice 1 PDO</title>
		<meta charset="utf-8">
	</head>
<body>
	<form action="" method="post">
		<div>
			<label>
				catégorie tache :
					<input type="text" name="categorie" value="">
			</label>
		</div>
      <div>
        <label>
          titre :
          <input type="text" name="labeltache" value="">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"></textarea>
        </label>
      </div>

      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
		<section>
		<?= $contenu ?>
		</section>
    <a href="controler/signoutController.php">déconnexion</a>
</body>
	</html>
