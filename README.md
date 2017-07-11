# Présentation

Voici un script très noob qui permet d'afficher une liste de fichiers du plus récent au plus vieux et son contenu.

Pour ma part, il me permet notamment d'afficher des fichiers html de chartes graphiques générés par [Flaticon](http://flaticon.com) et [Paletton](http://paletton.com) et de les garder dans les sources de mes projets.

Le code est très commenté si besoin.

# Bidouilles diverses

La structure de la page est réalisée à l'aide [des tabs](https://jqueryui.com/tabs/#default) de JQuery User Interface.

## Nombre de fichiers par défaut

Par défaut, ce sont les 5 derniers fichiers du plus récent au plus vieux qui seront affichés. Pour changer cette valeur, il faut modifier cet array :

        $last5 = array_slice($fichiers, 0, 5);
        
## Afficher du contenu formaté ou du code

En fonction de l'usage, il peut être intéressant d'afficher directement des pages HTML, auquel cas le code html va être interprété par défaut, ou bien le contenu source, auquel cas la modification se fait ici :

    /* On affiche maintenant le contenu de chaque fichier correspondant */
    foreach ($last5 as $fichier) {	
      echo '<div id="tabs-'.$nbi.'">'; // on peut mettre d'autres balises dans les div, telles que p ou pre.
      include 'pages/'.$fichier; // on fait un include, il faut donc repréciser le chemin du dossier ici
      echo '</div>';	
      $nbi++;	// idem, on rajoute +1 à la variable pour obtenir #tabs-1, #tabs-2, #tabs-3...	
    }
