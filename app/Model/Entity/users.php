<?php

namespace Model\Entity;

class users
{
	private $users_id;
    private $first_name;
    private $last_name;
    private $user_name;
    private $password;
    private $email;
    private $admin;
    private $token;

    public function getUsers_id(){
		return $this->users_id;
	}

	public function setUsers_id($users_id){
		$this->users_id = $users_id;
	}

	public function getFirst_name(){
		return $this->first_name;
	}

	public function setFirst_name($first_name){
		$this->first_name = $first_name;
	}

	public function getLast_name(){
		return $this->last_name;
	}

	public function setLast_name($last_name){
		$this->last_name = $last_name;
	}

	public function getUser_name(){
		return $this->user_name;
	}

	public function setUser_name($user_name){
		$this->user_name = $user_name;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getAdmin(){
		return $this->admin;
	}

	public function setAdmin($admin){
		$this->admin = $admin;
	}

	public function getToken(){
		return $this->token;
	}

	public function setToken($token){
		$this->token = $token;
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