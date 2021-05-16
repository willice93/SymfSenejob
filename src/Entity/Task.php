<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="App\Entity\Categorie", mappedBy="task")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Admin::class, mappedBy="task")
     */
    private $admins;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

   



    public function __construct()
    {
     
      $this->categorie = new ArrayCollection();
      $this->admins = new ArrayCollection();
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

    /**
     * @return Collection|Admin[]
     */
    public function getAdmins(): Collection
    {
        return $this->admins;
    }

    public function addAdmin(Admin $admin): self
    {
        if (!$this->admins->contains($admin)) {
            $this->admins[] = $admin;
            $admin->setTask($this);
        }

        return $this;
    }

    public function removeAdmin(Admin $admin): self
    {
        if ($this->admins->removeElement($admin)) {
            // set the owning side to null (unless already changed)
            if ($admin->getTask() === $this) {
                $admin->setTask(null);
            }
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    
}
