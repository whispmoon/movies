<?php

namespace Model\Entity;

class movies
{
	private $id;
    private $imdbId;
    private $title;
    private $year;
    private $cast;
    private $directors;
    private $writers;
    private $plot;
    private $rating;
    private $votes;
    private $runtime;
    private $trailerUrl;
    private $dateCreated;
    private $dateModified;

public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getImdbId(){
		return $this->imdbId;
	}

	public function setImdbId($imdbId){
		$this->imdbId = $imdbId;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getYear(){
		return $this->year;
	}

	public function setYear($year){
		$this->year = $year;
	}

	public function getCast(){
		return $this->cast;
	}

	public function setCast($cast){
		$this->cast = $cast;
	}

	public function getDirectors(){
		return $this->directors;
	}

	public function setDirectors($directors){
		$this->directors = $directors;
	}

	public function getWriters(){
		return $this->writers;
	}

	public function setWriters($writers){
		$this->writers = $writers;
	}

	public function getPlot(){
		return $this->plot;
	}

	public function setPlot($plot){
		$this->plot = $plot;
	}

	public function getRating(){
		return $this->rating;
	}

	public function setRating($rating){
		$this->rating = $rating;
	}

	public function getVotes(){
		return $this->votes;
	}

	public function setVotes($votes){
		$this->votes = $votes;
	}

	public function getRuntime(){
		return $this->runtime;
	}

	public function setRuntime($runtime){
		$this->runtime = $runtime;
	}

	public function getTrailerUrl(){
		return $this->trailerUrl;
	}

	public function setTrailerUrl($trailerUrl){
		$this->trailerUrl = $trailerUrl;
	}

	public function getDateCreated(){
		return $this->dateCreated;
	}

	public function setDateCreated($dateCreated){
		$this->dateCreated = $dateCreated;
	}

	public function getDateModified(){
		return $this->dateModified;
	}

	public function setDateModified($dateModified){
		$this->dateModified = $dateModified;
	}


	private $validationErrors = []; //contient les erreurs de validation

	/**
	 * Retourne un booléen en fonction de si l'entité est valide pour une insertion en bdd
	 */
	public function isValid()
	{
		$isValid = true;

		//valider les données de l'instance ici 

		return $isValid;
	}

	/**
	 * getter pour les erreurs de validation
	 */
	public function getValidationErrors()
	{
		return $this->validationErrors;
	}




}