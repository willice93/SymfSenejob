<?php

namespace App\Entity;

use App\Repository\DelivredTaskRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DelivredTaskRepository::class)
 */
class DelivredTask
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taskUrl;


     /**
     * Il y a une seule tachedelivré possible par dev
     * @ORM\OneToOne(targetEntity="App\Entity\Developer")
     * @ORM\JoinColumn(name="developer_id", referencedColumnName="id")
     */
    private $developer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getTaskUrl(): ?string
    {
        return $this->taskUrl;
    }

    public function setTaskUrl(string $taskUrl): self
    {
        $this->taskUrl = $taskUrl;

        return $this;
    }

    /**
     * Get il y a une seule tachedelivré possible par dev
     */ 
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Set il y a une seule tachedelivré possible par dev
     *
     * @return  self
     */ 
    public function setDeveloper($developer)
    {
        $this->developer = $developer;

        return $this;
    }
}
