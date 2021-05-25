<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * Les categories sont liées à une tache
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="categorie")
     * @ORM\JoinColumn(name="_id", referencedColumnName="id")
     */
    private $task;

    /**
     * @ORM\ManyToMany(targetEntity=Developer::class, mappedBy="categorie")
     */
    private $developers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $images;


    public function __construct()
    {
        $this->task =new ArrayCollection();
        $this->developers = new ArrayCollection();
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

    /**
     * @return Collection|Developer[]
     */
    public function getDevelopers(): Collection
    {
        return $this->developers;
    }

    public function addDeveloper(Developer $developer): self
    {
        if (!$this->developers->contains($developer)) {
            $this->developers[] = $developer;
            $developer->addCategorie($this);
        }

        return $this;
    }

    public function removeDeveloper(Developer $developer): self
    {
        if ($this->developers->removeElement($developer)) {
            $developer->removeCategorie($this);
        }

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images): self
    {
        $this->images = $images;

        return $this;
    }
}
