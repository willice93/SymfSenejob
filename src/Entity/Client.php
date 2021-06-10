<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $lastNameClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstNameClient;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $countryClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdpClient;

    /**
     * @ORM\OneToMany(targetEntity=Task::class, mappedBy="client", orphanRemoval=true)
     */
    private $tasks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $compagny;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nickname;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    

   


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastNameClient(): ?string
    {
        return $this->lastNameClient;
    }

    public function setLastNameClient(string $lastNameClient): self
    {
        $this->lastNameClient = $lastNameClient;

        return $this;
    }

    public function getFirstNameClient(): ?string
    {
        return $this->firstNameClient;
    }

    public function setFirstNameClient(string $firstNameClient): self
    {
        $this->firstNameClient = $firstNameClient;

        return $this;
    }

    public function getPhoneClient(): ?int
    {
        return $this->phoneClient;
    }

    public function setPhoneClient(int $phoneClient): self
    {
        $this->phoneClient = $phoneClient;

        return $this;
    }

    public function getAdressClient(): ?string
    {
        return $this->adressClient;
    }

    public function setAdressClient(string $adressClient): self
    {
        $this->adressClient = $adressClient;

        return $this;
    }

    public function getCountryClient(): ?string
    {
        return $this->countryClient;
    }

    public function setCountryClient(string $countryClient): self
    {
        $this->countryClient = $countryClient;

        return $this;
    }

    public function getCityClient(): ?string
    {
        return $this->cityClient;
    }

    public function setCityClient(string $cityClient): self
    {
        $this->cityClient = $cityClient;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->emailClient;
    }

    public function setEmailClient(string $emailClient): self
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    public function getMdpClient(): ?string
    {
        return $this->mdpClient;
    }

    public function setMdpClient(string $mdpClient): self
    {
        $this->mdpClient = $mdpClient;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setClient($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getClient() === $this) {
                $task->setClient(null);
            }
        }

        return $this;
    }
public function __toString(){
        // to show the name of the Category in the select
        return $this->lastNameClient;
        // to show the id of the Category in the select
        // return $this->id;
    }

public function getAvatar(): ?string
{
    return $this->avatar;
}

public function setAvatar(?string $avatar): self
{
    $this->avatar = $avatar;

    return $this;
}

public function getCompagny(): ?string
{
    return $this->compagny;
}

public function setCompagny(?string $compagny): self
{
    $this->compagny = $compagny;

    return $this;
}

public function getWebsite(): ?string
{
    return $this->website;
}

public function setWebsite(?string $website): self
{
    $this->website = $website;

    return $this;
}

public function getNickname(): ?string
{
    return $this->nickname;
}

public function setNickname(?string $nickname): self
{
    $this->nickname = $nickname;

    return $this;
}
    
}
