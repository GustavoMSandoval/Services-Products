<?php

class ClientOperations {
    
    private string $image = '';
    private string $name = '';
    private string $email = '';
    private string $password = '';
    private string $phoneNumber = '';
    
    


    function clientRegister (string $image,string $name,string $email,string $password,string $phoneNumber) {
        
        require_once __DIR__ .'/../includes/dbh.select.inc.php';
        require_once  __DIR__ . '/../includes/dbh.insert.inc.php';

        $verificationClient = new SelectDb();
        $insertClient = new InsertDb();
        

        if($verificationClient -> selectClient($email, $password) != true) {
            $insertClient -> insertClientDB($image ,$name, $email, $password, $phoneNumber);
            header("Location: ../../frontEnd/View/dashboard/dashboard.php?email={$email}" );
        } else {
            header("Location: ../../frontEnd/View/form/form.html");
        }
        

    }

    function clientLogin(string $email, string $password) {
        require_once __DIR__ .'/../includes/dbh.select.inc.php';

        $selectClient = new SelectDb();

        if($selectClient -> selectClient($email, $password) == true) {
            header("Location: ../../frontEnd/View/dashboard/dashboard.php?email={$email}" );
        } else {
            header("Location: ../../frontEnd/View/form/form.html");
        }

    }



    /*Getters*/ 

     /**
     * Get the value of name
     */
    public function getImage(): string 
    {
        return $this->image;
    }
    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }
     /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /*Setters*/


     /**
     * Set the value of image
     */

    public function setImage(string $image): self 
    {
        $this->name = $image;

        return $this;
    }
    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    /**
     * Set the value of phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}