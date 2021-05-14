<?php

namespace App\Entity;

use App\Repository\ClientRepository;
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
     * @ORM\OneToOne(targetEntity=Task::class, mappedBy="client", cascade={"persist", "remove"})
     */
    private $task;


   


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

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(Task $task): self
    {
        // set the owning side of the relation if necessary
        if ($task->getClient() !== $this) {
            $task->setClient($this);
        }

        $this->task = $task;

        return $this;
    }

}
