<?php
namespace Rebolon\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Author implements EntityInterface
{
    private $id;

    private $firstname;

    private $lastname;

    private $books;

    /**
     * Author constructor.
     */
    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    /**
     * id can be null until flush is done
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return Author
     */
    public function setFirstname($firstname): Author
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     * @return Author
     */
    public function setLastname($lastname): Author
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Return the list of Books for all projects book creation of this author
     *
     * @return Collection
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return trim($this->getFirstname() . ' ' . $this->getLastname());
    }
}
