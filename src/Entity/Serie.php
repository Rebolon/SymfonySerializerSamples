<?php
namespace Rebolon\Entity;

class Serie implements EntityInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
     * @return Serie
     */
    public function setId(int $id): Serie
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Serie
     */
    public function setName($name): Serie
    {
        $this->name = $name;

        return $this;
    }
}
