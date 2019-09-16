<?php


namespace App\Parser;


class ParseObject
{
    private $title;
    private $description;
    private $image;
    private $isbn;
    private $author;
    private $genre;

    public function __toString()
    {
        return $this->getTitle();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setTitle($plaintext)
    {
        $this->title = $plaintext;
    }

    public function setDescription($plaintext)
    {
        $this->description = $plaintext;
    }

    public function setImage($param)
    {
        $this->image = $param;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
