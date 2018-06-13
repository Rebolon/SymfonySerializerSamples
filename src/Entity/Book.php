<?php
namespace Rebolon\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Psr\Log\LoggerInterface;

class Book implements EntityInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Serie
     */
    private $serie;

    /**
     * @var Review[] | ArrayCollection
     */
    private $reviews;

    /**
     * @var ProjectBookCreation[] | ArrayCollection
     */
    private $authors;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Book constructor.
     * The params is only for sample purpose
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->authors = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->logger = $logger;
    }

    /**
     * id can be null until flush is done
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Book
     */
    public function setTitle($title): Book
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Serie
     */
    public function getSerie(): ?Serie
    {
        return $this->serie;
    }

    /**
     * @param Serie $serie
     *
     * @return Book
     */
    public function setSerie(Serie $serie): Book
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * @param ProjectBookCreation $project
     *
     * @return Book
     */
    public function setAuthor(ProjectBookCreation $project): Book
    {
        $this->authors[] = $project;

        return $this;
    }

    /**
     * @param Author $author
     * @param Job $job
     * @return Book
     */
    public function addAuthor(Author $author, Job $job): Book
    {
        $project = (new ProjectBookCreation())
            ->setBook($this)
            ->setAuthor($author)
            ->setRole($job);

        // @test this feature to check that it really works vs if ($this->projectBookCreation->contains($project)) return $this;
        foreach ($this->authors as $projectToCheck) {
            if ($projectToCheck->getAuthor() === $author
                && $projectToCheck->role === $job) {
                return $this;
            }
        }

        $this->setAuthor($project);

        return $this;
    }

    /**
     * Return the list of Authors with their job for this project book creation
     *
     * @return Collection
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    /**
     * @param Review $review
     *
     * @return Book
     */
    public function addReviews(Review $review): Book
    {
        $this->reviews[] = $review;

        return $this;
    }

    /**
     * This removeXXX is mandatory for the Serializer: it test if there is an addXX and remove XX to allow the usage of addXX (quite strange)
     * If id doesn't exists then it will try the setter
     *
     * @param Review $review
     *
     * @return Book
     */
    public function removeReviews(Review $review): Book
    {
        $this->reviews->removeElement($review);

        return $this;
    }

    /**
     * @param Review[]
     *
     * @return Book
     * @throws \Exception
     */
    public function setReviews(array $reviews): Book
    {
        $collection = new ArrayCollection();

        foreach ($reviews as $review) {
            if (!$review instanceof Review) {
                // @todo use a better Exception
                throw new \Exception('must be a Review');
            }

            $collection->add($review);
        }

        $this->reviews = $collection;

        return $this;
    }

    /**
     * @return Review[] | ArrayCollection
     */
    public function getReviews(): ArrayCollection
    {
        return $this->reviews;
    }

    /**
     * @param LoggerInterface $logger
     * @return Book
     */
//    public function setLogger(LoggerInterface $logger): Book
//    {
//        $this->logger = $logger;
//
//        return $this;
//    }
}
