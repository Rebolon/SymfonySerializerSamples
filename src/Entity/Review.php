<?php
namespace Rebolon\Entity;

class Review implements EntityInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * @var string
     */
    private $username;

    /**
     * id can be null until flush is done
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Review
     */
    public function setId(int $id): Review
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Review
     */
    public function setContent($content): Review
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     * @return Review
     */
    public function setDate(\DateTimeInterface $date): Review
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Review
     */
    public function setUsername(string $username): Review
    {
        $this->username = $username;

        return $this;
    }
}
