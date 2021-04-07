<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
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
    private $docTask;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameTask;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $topicTask;


    /**
     * 
     * @ORM\ManyToMany(targetEntity="App\Entity\Admin", inversedBy="tasks")
     * @ORM\JoinTable(name="tasks_admins")
     */
    private $admin;

     /**
     * 
     * @ORM\OneToMany(targetEntity="App\Entity\Categorie", mappedBy="task")
     */
    private $categorie;



    public function __construct()
    {
      $this->admin = new ArrayCollection();
      $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocTask(): ?string
    {
        return $this->docTask;
    }

    public function setDocTask(string $docTask): self
    {
        $this->docTask = $docTask;

        return $this;
    }

    public function getNameTask(): ?string
    {
        return $this->nameTask;
    }

    public function setNameTask(string $nameTask): self
    {
        $this->nameTask = $nameTask;

        return $this;
    }

    public function getTopicTask(): ?string
    {
        return $this->topicTask;
    }

    public function setTopicTask(string $topicTask): self
    {
        $this->topicTask = $topicTask;

        return $this;
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($admin)
    {
        $this->admin = $admin;

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
