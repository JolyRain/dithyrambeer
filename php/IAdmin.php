<?php


interface IAdmin
{
    public function addUser(IUser $user);

    public function removeUser(IUser $user);

    public function removeProduct(Product $product);

    public function removeUserOpinion(IUser $user, Product $product);


}