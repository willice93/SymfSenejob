<?php

namespace App\Entity;

use App\Repository\DeveloperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="developers")
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $balance;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $created;

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
     * @return Collection|Categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(?int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

}
