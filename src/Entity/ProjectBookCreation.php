<?php
namespace Rebolon\Entity;

class ProjectBookCreation implements EntityInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Job
     */
    private $job;

    /**
     * @var Book
     */
    //private $book;

    /**
     * @var Author
     */
    private $author;

    /**
     * mandatory for api-platform to get a valid IRI
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Job
     */
    public function getJob(): Job
    {
        return $this->job;
    }

    /**
     * @param Job $job
     * @return ProjectBookCreation
     */
    public function setJob(Job $job): ProjectBookCreation
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return Book
     */
//    public function getBook(): Book
//    {
//        return $this->book;
//    }

    /**
     * @param Book $book
     * @return $this
     */
//    public function setBook(Book $book): ProjectBookCreation
//    {
//        $this->book = $book;
//
//        return $this;
//    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     * @return $this
     */
    public function setAuthor(Author $author): ProjectBookCreation
    {
        $this->author = $author;

        return $this;
    }
}
