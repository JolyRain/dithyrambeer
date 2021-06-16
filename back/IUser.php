<?php


interface IUser
{

    public function addProduct(Product $product);

    public function addOpinion(Product $product, Opinion $opinion);

    public function removeOpinion(Product $product);

}