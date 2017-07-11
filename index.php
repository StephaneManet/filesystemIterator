<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Outils</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
 
<h1>File System Parser</h1>
<div><p>Voici un script ulra noob pour afficher les fichiers d'un répertoire.</p></div>
<div id="tabs">
<?php
$iter = new FilesystemIterator('pages');
$nbf = 1; // comme "nombre de fichiers", il va permettre d'incrémenter l'id "tab-x" des liens dans la liste
$nbi = 1; // (comme "nombre d'includes"), il va permettre la même incrémentation, mais pour la partie div
$fichiers = array();

foreach ($iter as $v) {
    if ($iter->isFile()) {
        $fichiers[$v->getMTime()] = $v->getBasename(); // $v->getRealpath();
    }
}
if ($fichiers) {

    krsort($fichiers);
	/* On affiche les 5 derniers fichiers que l'on classe en tableau */
    $last5 = array_slice($fichiers, 0, 5);
    /* var_dump($last5); */
	
	
	
	/* On commence à afficher la liste des fichiers */
	echo '<ul>';
    foreach ($last5 as $fichier) {	
		echo '<li><a href="#tabs-'.$nbf.'">'.$fichier.'</a></li>';
		$nbf++;	// on rajoute +1 à la variable pour obtenir #tabs-1, #tabs-2, #tabs-3...	
	}
	echo '</ul>';

		
    foreach ($last5 as $fichier) {	
		echo '<div id="tabs-'.$nbi.'"><p>';
		include 'pages/'.$fichier; // on fait un include, il faut donc repréciser le chemin du dossier ici
		echo '</p></div>';	
		$nbi++;	// idem, on rajoute +1 à la variable pour obtenir #tabs-1, #tabs-2, #tabs-3...	
    }
}
?>
</div>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</body>
</html>