<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>File System Parser</title>	
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <style>
  /* Un tout petit peu de CSS, qui ne gère véritablement que le footer */
  #fspFooter { border:1px solid #c5c5c5; margin-top:5px; border-radius:3px; text-align: center; font-size: 9px;}
  </style>
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

    /* On affiche maintenant le contenu de chaque fichier correspondant */
    foreach ($last5 as $fichier) {	
		echo '<div id="tabs-'.$nbi.'">'; // on peut mettre d'autres balises dans les div, telles que p ou pre.
		include 'pages/'.$fichier; // on fait un include, il faut donc repréciser le chemin du dossier ici
		echo '</div>';	
		$nbi++;	// idem, on rajoute +1 à la variable pour obtenir #tabs-1, #tabs-2, #tabs-3...	
    }
}
else {
	echo '<p>Merci de rajouter des fichiers dans <a href="/pages">le répertoire "pages"</a>.';
}
?>
</div>
<div id="fspFooter">
<p>Par <a href="http://www.stephanemanet.com">Stéphane Manet</a> sous <a target="_blank" href="LICENSE">licence GNU GPL v3</a></p><a class="github-button" href="https://github.com/stephanemanet" aria-label="Follow @stephanemanet on GitHub">Follow @stephanemanet</a>
</div>
  <script>
  /* et on attaque le jquery, en l'occurrence on s'appuie sur une fonctionnalité de base de UI */	  
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>

<script async defer src="https://buttons.github.io/buttons.js"></script>  
</body>
</html>
