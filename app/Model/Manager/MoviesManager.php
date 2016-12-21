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
    
    public function findAll()
    {
        $sql = "SELECT id, imdbId, title, year, cast, directors, writers, plot, rating, votes,runtime, trailerUrl, dateCreated, dateModified
        FROM movies";
        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\Movies');

        return $results;
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

}