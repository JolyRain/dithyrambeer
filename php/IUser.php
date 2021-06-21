<?php


interface IUser
{

    public function addProduct(Product $product);

    public function addOpinion(Product $product, Opinion $opinion);

    public function removeOpinion(Product $product);

    public function getOpinCount(): int;

    public function getID(): int;

    public function getLogin(): string;

    public function getEmail(): string;

    public function getRole(): string;

    public function getPass(): string;

    public function setLogin($login): void;

    public function setEmail($email): void;

    public function setPass($pass): void;

    public function setRole(string $role): void;

    public function setOpinCount(array $opinions): void;


}