<?php
namespace Rebolon\Entity;

class Job implements EntityInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $translation;

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
    public function getTranslation(): ?string
    {
        return $this->translation;
    }

    /**
     * @param string $translation
     * @return Job
     */
    public function setTranslation($translation): Job
    {
        $this->translation = $translation;

        return $this;
    }
}
