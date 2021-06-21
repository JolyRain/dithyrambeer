<?php


class Product
{
    private string $id;
    private string $name;
    private int $rating = 0;
    private int $opinCount = 0;
    private $opinions = [];



    public function addOpinion($opinion) {
//        $this->opinions.add($opinion);
        $this->opinCount++;
    }

    public function removeOpinion($opinion) {
//        $this->opinions.remove($opinion);
        $this->opinCount--;
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @return int
     */
    public function getOpinCount(): int
    {
        return $this->opinCount;
    }

    /**
     * @return array
     */
    public function getOpinions(): array
    {
        return $this->opinions;
    }


}