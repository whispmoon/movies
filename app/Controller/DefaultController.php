<?php

namespace Controller;

use View\View; //on peut donc utiliser cette classe comme View au lieu de \View\View
use Model\Manager\MoviesManager;

class DefaultController 
{
	/**
	 * Affiche la page d'accueil
	 */
	public function home()
	{
    $moviesManager = new MoviesManager();
    $movies = $moviesManager->findAll();

       // affiche la vue en lui passant le movies 
        View::show("home.php", "Accueil !",["movies"=> $movies]);
    }

		/**
	 * Affiche la page de consultation
	 */
	     public function moviesDetails()
    {
        // créé une instance de manager
       $moviesManager = new \Model\Manager\MoviesManager();
       // créé le movies dont l'id est dans l'URL
       $id= $_GET['id'];
       $movie = $moviesManager->findOneById($id);
       if (empty($movie)){
           return $this->error404();
       }

       // affiche la vue en lui passant le movies 
        View::show("movieDetails.php", $movie->getTitle(),["movies"=> $movie] );
    }

	/**
	 * Affiche la page d'erreur 404
	 */
	public function error404()
	{
		//envoie une entête 404 (pour notifier les clients que ça a foiré)
		header("HTTP/1.0 404 Not Found");
		View::show("errors/404.php", "Oups ! Perdu ?");
	}
    //Crée un nouvel article. affiche et traite le formulaire
    public function createMovies()
    {
             // on crée une nouvelle instance d'article
            $movies = new \Model\Entity\Movies();

            // Si le formuklaire est soumis ...
        if(!empty($_movies)){

            // validation du fichjier uploadé


            // Si le fichier a bien été envoyé ...
if ($_FILES['image']['error'] !=4){
            //type mime
            $file = $_FILES['image']['tmp_name'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo,$file);
            finfo_close($finfo);

            $uploadError = null;
            if (substr($mime, 0, 5) !="image"){
                $uploadError = "Mimetype invalide";
            }
            // taille
            if($_FILES['image']['size'] >100000){
                $uploadError = "Fichier trop grand";
            }
            
            // vérifier les erreurs d'upload

            if($_FILES['image']['error'] !==0){
                $uploadError = "Une erreur est survenue";
            }
            // si on a pas d'erreur...
            if($uploadError == null){
            // si ok, on déplace /redimmensionne / contertir en jpg

            $img = new \abeautifulsite\simpleimage($file);
            $destination = uniqid().".jpg"; // nom du fichier
            $img->best_fit(300,300)
                ->desaturate()->save(UPLOAD_DIR.  $destination );
            // on hydrate la propriété dans l'objet
            $movies->setImage($destination);
            }
}

            //hydrate l'instance à partir des données du form
            $movies->setTitle($_POST['title']);
            $movies->setContent($_POST['content']);
            // déclenche la validation de l'article retourne true ou false
            if($movies->isValid()){

            

           // demande au manger de sauvegarder l'instance
            $moviesManager = new \Model\Manager\MoviesManager();
            $moviesManager->create($movies);
        }
        }
        View::show("movies_create.php","Publier un nouvel article !", ["movies" => $movies]);
   
    }

}