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
    $currentPage =(empty($_GET['page'])) ? 1 : $_GET['page'];
	$homeMovies = $moviesManager->findHomeMovies($currentPage);
	$movies = $moviesManager->findTopRated();
	

	$data =[
		"homeMovies" =>$homeMovies,
		"movies"=>$movies,
		// "moviesCount"=>$count,
		"currentPage"=>$currentPage,
	];
       // affiche la vue en lui passant le movies 
        View::show("home.php", "Accueil !",$data);
    }

		/**
	 * Affiche la page de consultation
	 */
	     public function movieDetails()
    {
		$moviesManager = new MoviesManager();
    	$movies = $moviesManager->findTopRated();
        // créé une instance de manager
       $moviesManager = new \Model\Manager\MoviesManager();
       // créé le movies dont l'id est dans l'URL
       $id= $_GET['id'];
       $movie = $moviesManager->findOneById($id);
       if (empty($movie)){
           return $this->error404();
       }

       // affiche la vue en lui passant le movies 
        View::show("movieDetails.php", $movie->getTitle(),["movie"=> $movie,"movies"=> $movies] );
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
		if(!empty($_POST)){
				// validation du fichier uploadé
				// Si le fichier a bien été envoyé ...

			if ($_FILES['imdbId']['error'] !=4){
				//type mime
				$file = $_FILES['imdbId']['tmp_name'];
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mime = finfo_file($finfo,$file);
				finfo_close($finfo);
				$uploadError = null;

				if (substr($mime, 0, 5) !="imdbId"){
					$uploadError = "Mimetype invalide";
				}
				// taille

				if($_FILES['imdbId']['size'] >100000){
					$uploadError = "Fichier trop grand";
				}
				
				// vérifier les erreurs d'upload
				if($_FILES['imdbId']['error'] !==0){
					$uploadError = "Une erreur est survenue";
				}
				// si on a pas d'erreur...
				if($uploadError == null){
					// si ok, on déplace /redimmensionne / contertir en jpg

					$img = new \abeautifulsite\simpleimage($file);
					$destination = uniqid().".jpg"; // nom du fichier
					$img->best_fit(300,300)
						->save(UPLOAD_DIR.  $destination );
					// on hydrate la propriété dans l'objet
					$movies->setImdbId($destination);
				}
			}

			//hydrate l'instance à partir des données du form
			$movies->setTitle($_POST['title']);
			$movies->setcast($_POST['cast']);
			$movies->setDirectors($_POST['directors']);
			$movies->setWriters($_POST['writers']);
			$movies->setRating($_POST['rating']);
			$movies->setRuntime($_POST['runtime']);
			$movies->setTrailerUrl($_POST['trailerUrl']);
			$movies->setDateCreated($_POST['dateCreated']);
			$movies->setPlot($_POST['plot']);
			// $movies->setImdbId($_POST['imdbId']);
			$movies->setYear($_POST['year']);

			// déclenche la validation de l'article retourne true ou false
			if($movies->isValid()){
			// demande au manger de sauvegarder l'instance
				$moviesManager = new \Model\Manager\MoviesManager();
				$moviesManager->create($movies);
			}
		}
		View::show("createMovies.php","Publier un nouvel article !", ["movies" => $movies]);
	
	}
public function toprated()
	{
    $moviesManager = new MoviesManager();
    
	$movies = $moviesManager->findTopRated();

	$currentPage =(empty($_GET['page'])) ? 1 : $_GET['page'];

	$data =[
		"movies" =>$movies,
		"currentPage"=>$currentPage,
	];
       // affiche la vue en lui passant le movies 
        View::show("toprated.php", "Top rated !",$data);
    }

public function connexion(){
		
		

		
			View::show("connexion.php", "connexion !");
	}

public function deconnexion(){
		
		

			View::show("deconnexion.php", "deconnexion !");
	}



public function inscription(){
		
    
		
		View::show("inscription.php", "inscription !");
	}



public function researchResult(){
		$moviesManager = new MoviesManager();
		$search = $moviesManager->findTitleMovies();

				$data =[
			// "movies" =>$movies,
			"search"=>$search,
		];
		View::show("researchResult.php", "researchResult !",$data);
	}



public function nav(){

		$moviesManager = new MoviesManager();
		$movies = $moviesManager->findTopRated();
		View::show("nav.php", "nav !",["movies" => $movies]);
	}

public function research(){
		$moviesManager = new MoviesManager();

		$search = $moviesManager->findTitleMovies();

				$data =[
			"movies" =>$movies,
			"search"=>$search,
		];
			View::show("researchResult.php", "researchResult !",$data);
	}

	public static function asideTopRated()
	{
    $moviesManager = new MoviesManager();
    
	$movies = $moviesManager->findTopRated();

      include("app/templates/asideTopRated.php"); 
    }

	public static function countAll()
	{
	$moviesManager = new MoviesManager();
    
	$movies = $moviesManager->countAll();

      include("app/templates/countall.php");	
	}

}
