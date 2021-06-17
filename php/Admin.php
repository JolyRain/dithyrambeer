<?php


class Admin implements IUser, IAdmin
{
    private string $login;
    private string $role = Role::ADMIN;
    private $opinions = [];


    public function addUser(IUser $user)
    {
        // TODO: Implement addUser() method.
    }

    public function removeUser(IUser $user)
    {
        // TODO: Implement removeUser() method.
    }

    public function removeProduct(Product $product)
    {
        // TODO: Implement removeProduct() method.
    }

    public function removeUserOpinion(IUser $user, Product $product)
    {
        // TODO: Implement removeUserOpinion() method.
    }

    public function addProduct(Product $product)
    {
        // TODO: Implement addProduct() method.
    }

    public function addOpinion(Product $product, Opinion $opinion)
    {
        // TODO: Implement addOpinion() method.
    }

    public function removeOpinion(Product $product)
    {
        // TODO: Implement removeOpinion() method.
    }
}