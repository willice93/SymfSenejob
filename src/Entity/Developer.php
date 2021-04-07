<?php

namespace App\Entity;

use App\Repository\DeveloperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeveloperRepository::class)
 */
class Developer
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
    private $firstNameDeveloper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userNameDeveloper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailDeveloper;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneDeveloper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressDeveloper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastNameDeveloper;

       /**
     * Il y a une seule tache possible par dev
     * @ORM\OneToOne(targetEntity="App\Entity\Task")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     */
    private $task;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="developers")
     * @ORM\JoinTable(name="developers_categorie")
     */
    private $categorie;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstNameDeveloper(): ?string
    {
        return $this->firstNameDeveloper;
    }

    public function setFirstNameDeveloper(string $firstNameDeveloper): self
    {
        $this->firstNameDeveloper = $firstNameDeveloper;

        return $this;
    }

    public function getUserNameDeveloper(): ?string
    {
        return $this->userNameDeveloper;
    }

    public function setUserNameDeveloper(string $userNameDeveloper): self
    {
        $this->userNameDeveloper = $userNameDeveloper;

        return $this;
    }

    public function getEmailDeveloper(): ?string
    {
        return $this->emailDeveloper;
    }

    public function setEmailDeveloper(string $emailDeveloper): self
    {
        $this->emailDeveloper = $emailDeveloper;

        return $this;
    }

    public function getPhoneDeveloper(): ?int
    {
        return $this->phoneDeveloper;
    }

    public function setPhoneDeveloper(int $phoneDeveloper): self
    {
        $this->phoneDeveloper = $phoneDeveloper;

        return $this;
    }

    public function getAdressDeveloper(): ?string
    {
        return $this->adressDeveloper;
    }

    public function setAdressDeveloper(string $adressDeveloper): self
    {
        $this->adressDeveloper = $adressDeveloper;

        return $this;
    }

    public function getLastNameDeveloper(): ?string
    {
        return $this->lastNameDeveloper;
    }

    public function setLastNameDeveloper(string $lastNameDeveloper): self
    {
        $this->lastNameDeveloper = $lastNameDeveloper;

        return $this;
    }

    /**
     * Get il y a une seule tache possible par dev
     */ 
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set il y a une seule tache possible par dev
     *
     * @return  self
     */ 
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
}
