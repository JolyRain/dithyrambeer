<?php


class Admin extends User implements IAdmin
{
    private string $role = Role::ADMIN;

    public function addUser(User $user)
    {

        // TODO: Implement addUser() method.
    }

    public function removeUser(User $user)
    {
        // TODO: Implement removeUser() method.
    }

    public function removeProduct(Product $product)
    {
        // TODO: Implement removeProduct() method.
    }

    public function removeUserOpinion(User $user, Product $product)
    {
        // TODO: Implement removeUserOpinion() method.
    }
}