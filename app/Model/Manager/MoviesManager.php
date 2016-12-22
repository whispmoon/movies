<?php

namespace Model\Manager;
use Model\Entity\Movies;
use Model\Db;
use PDO;

/**
 * Contient toutes les méthodes faisant des requêtes à la base de données
 */
class MoviesManager
{
    // requetes sql vers la bdd
    // public function findAll()
    public function findOneById($id)
    {
        $sql = "SELECT id,imdbId, title, year, cast, directors, writers, plot, rating, votes,runtime, trailerUrl, dateCreated, dateModified
        FROM movies
        WHERE id= :id";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(":id",$id);// donne une valeur au parametre

        $stmt->execute();
        $result = $stmt->fetchObject('\Model\Entity\Movies');

        return $result;   
    }
    
    public function create(Movies $movies){
        $sql = "INSERT INTO movies (id,imdbId, title, year, cast, directors, writers, plot, rating, votes,runtime, trailerUrl, dateCreated, dateModified)
                         VALUES (:id,:imdbId, :title, :year, :cast, :directors, :writers, :plot, :rating, :votes,:runtime, :trailerUrl, :dateCreated, NOW())";

        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue("title",$movies->getTitle());
        $stmt->bindValue("imdbId",$movies->getImdbId());
        $stmt->bindValue(":year", $movies->getYear());
        $stmt->bindValue(":cast", $movies->getCast());
        $stmt->bindValue("directors",$movies->getDirectors());
        $stmt->bindValue("writers",$movies->getWriters());
        $stmt->bindValue("plot",$movies->getPlot());
        $stmt->bindValue("rating",$movies->getRating());
        $Rtmt->bindValue("votes",$movies->getVotes());
        $stmt->bindValue("runtime",$movies->getRuntime());
        $stmt->bindValue("trailerUrl",$movies->getTrailerUrl());
        return $stmt->execute();
    }
        public function findTopRated()
    {
        $sql = "SELECT id, imdbId, title, year, cast, directors, writers, plot, rating, votes,runtime, trailerUrl, dateCreated, dateModified
        FROM movies WHERE rating > 8.5 ORDER BY rating DESC";
        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\Movies');

        return $results;
    }

    public function countAll(){
        $sql = "SELECT COUNT (*) FROM movies";
        $stmt= $dbh->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return $count;
    }

public function findHomeMovies($page){

        $numPerPage =15; //nbre de film par page
        $offset =($page-1)*$numPerPage; //nbre de films à sauter
        $sql = "SELECT *
                FROM movies
                ORDER BY rating DESC
                LIMIT $numPerPage  
                OFFSET $offset";
                //LIMIT : nbre de lignes à récupérer
                //offset permet de dire le nbre de lignes à sauter (ici il commence à la 7eme ligne)        //ici on va se connecter à la db
        $dbh = Db::getDbh();        //on prépare la requête avec la fonction interne à PHP
        $stmt= $dbh->prepare($sql);
        //on l'execute avec la fonction interne à PHP
        $stmt->execute();
        //fetchAll parcourt les résultats
        $results =$stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\Movies');
        return $results;    }

        public function findTitleMovies(){

        $search = $_GET['research'];
        $sql = "SELECT * FROM movies WHERE title LIKE :search";
        $dbh = Db::getDbh();
        $stmt= $dbh->prepare($sql);
        $stmt->bindValue(":search", '%'.$search.'%');
        $stmt->execute();
        $search = $stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\Movies');
        // var_dump($search);
        return $search;
        }

}

        