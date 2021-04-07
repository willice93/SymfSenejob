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
     * Il y a une seule tache possible par client
     * @ORM\OneToOne(targetEntity="App\Entity\Task")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
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

    /**
     * Get il y a une seule tache possible par client
     */ 
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set il y a une seule tache possible par client
     *
     * @return  self
     */ 
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }
}
