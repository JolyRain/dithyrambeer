<?php


class Product
{
    private $name;
    private $rating;
    private $opinionsAmount;
    private $opinions;

    public function addOpinion($opinion) {
//        $this->opinions.add($opinion);
        $this->opinionsAmount++;
    }

    public function removeOpinion($opinion) {
//        $this->opinions.remove($opinion);
        $this->opinionsAmount--;
    }

}