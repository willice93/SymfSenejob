<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $nameCat;


    /**
     * 
     * @ORM\ManyToMany(targetEntity="App\Entity\Developer", mappedBy="categorie")
     */
    private $developer;

    /**
     * Les categories sont liées à une tache
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="categorie")
     * @ORM\JoinColumn(name="_id", referencedColumnName="id")
     */
    private $task;


    public function __construct()
    {
        $this->task =new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCat(): ?string
    {
        return $this->nameCat;
    }

    public function setNameCat(string $nameCat): self
    {
        $this->nameCat = $nameCat;

        return $this;
    }

    /**
     * Get the value of developer
     */ 
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Set the value of developer
     *
     * @return  self
     */ 
    public function setDeveloper($developer)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Get les categories sont liées à une tache
     */ 
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set les categories sont liées à une tache
     *
     * @return  self
     */ 
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }
}
