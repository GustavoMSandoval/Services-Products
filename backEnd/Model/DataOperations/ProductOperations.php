<?php 

class ProductOperations {

    private string $id_client;
    private string $image;
    private string $name;
    private string $description;
    private float  $price;


    function productRegister(string $email, string $image, string $name, string $description, float $price) {

        
        require_once __DIR__ .'/../includes/dbh.select.inc.php';
        require_once  __DIR__ . '/../includes/dbh.insert.inc.php';

        $insertProduct = new InsertDb();
        

        $insertProduct -> insertProductDB($email, $image, $name, $description, $price);
        


    }
    





    /**
     * Get the value of id_client
     */
    public function getIdClient(): string
    {
        return $this->id_client;
    }

    /**
     * Set the value of id_client
     */
    public function setIdClient(string $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
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
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}