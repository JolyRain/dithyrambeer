<?php


class User implements IUser
{
    private string $login;
    private string $role = Role::USER;
    private $opinions = [];


    public function addOpinion(Product $product, Opinion $opinion)
    {
        // TODO: Implement addOpinion() method.
    }

    public function removeOpinion(Product $product)
    {
        // TODO: Implement removeOpinion() method.
    }

    public function addProduct(Product $product)
    {
        // TODO: Implement addProduct() method.
    }
}