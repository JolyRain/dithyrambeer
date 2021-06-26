<?php

class User implements IUser
{
    private string $id;
    private string $login;
    private string $email;
    private string $pass;
    private string $role = Role::USER;
    private $opinCount = 0;

    public function __construct($login, $email = null, $pass = null)
    {
        if ($email == null or $pass == null) {
            $this->createByID($login);
        } else {
            $this->createByData($login, $email, $pass);
        }
    }

    private function createByID($id)
    {
        $db = $this->dataBase();
        $this->id = $id;
        $this->login = mysqli_query($db, "select `login` from `users` where `user_id` = '$id'");
        $this->email = mysqli_query($db, "select `email` from `users` where `user_id` = '$id'");
        $this->pass = mysqli_query($db, "select `pass` from `users` where `user_id` = '$id'");
        $this->opinCount = mysqli_fetch_row(mysqli_query($db, "select `opin_count` from `users` where `user_id` = '$id'"));
        $db->close();
    }

    private function createByData(string $login, string $email, string $pass)
    {
        $this->login = $login;
        $this->email = $email;
        $this->pass = $pass;
        $this->opinCount = 0;
    }


    private function dataBase()
    {
        require 'engine/connect.php';
        global $connect;
        return $connect;
    }

    public function addProduct(Product $product)
    {
        $db = $this->dataBase();
        mysqli_query($db,
            "INSERT INTO `products` (`product_id`, `name`, `rating`, `opin_count`) 
VALUES ('$product->getID()', '$product->getName()', '$product->getRating()', '$product->getOpinCount()')");
        $db->close();
    }

    public function addOpinion(Product $product, Opinion $opinion)
    {
        $db = $this->dataBase();
        mysqli_query($db,
            "INSERT INTO `opinions` (`user_id`, `product_id`, `rate`, `review`)
VALUES ('$this->id', $product->getID()', '$opinion->get()', '$product->getOpinCount()')");
        $db->close();

    }

    public function removeOpinion(Product $product)
    {
        // TODO: Implement removeOpinion() method.
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function getOpinCount(): int
    {
        return $this->opinCount;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param bool|mysqli_result|string $pass
     */
    public function setPass($pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @param array $opinCount
     */
    public function setOpinCount(array $opinCount): void
    {
        $this->opinCount = $opinCount;
    }


}