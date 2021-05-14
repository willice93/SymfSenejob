<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
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
    private $userNameAdmin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailAdmin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdpAdmin;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class, inversedBy="admins")
     */
    private $task;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserNameAdmin(): ?string
    {
        return $this->userNameAdmin;
    }

    public function setUserNameAdmin(string $userNameAdmin): self
    {
        $this->userNameAdmin = $userNameAdmin;

        return $this;
    }

    public function getEmailAdmin(): ?string
    {
        return $this->emailAdmin;
    }

    public function setEmailAdmin(string $emailAdmin): self
    {
        $this->emailAdmin = $emailAdmin;

        return $this;
    }

    public function getMdpAdmin(): ?string
    {
        return $this->mdpAdmin;
    }

    public function setMdpAdmin(string $mdpAdmin): self
    {
        $this->mdpAdmin = $mdpAdmin;

        return $this;
    }

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(?Task $task): self
    {
        $this->task = $task;

        return $this;
    }

    
}
