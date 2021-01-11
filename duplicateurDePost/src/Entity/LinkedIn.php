<?php

namespace App\Entity;

use App\Repository\LinkedInRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkedInRepository::class)
 */
class LinkedIn
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, inversedBy="linkedIn", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $usermail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkedIn_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkedIn_password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsermail(): ?Users
    {
        return $this->usermail;
    }

    public function setUsermail(Users $usermail): self
    {
        $this->usermail = $usermail;

        return $this;
    }

    public function getLinkedInLogin(): ?string
    {
        return $this->linkedIn_login;
    }

    public function setLinkedInLogin(string $linkedIn_login): self
    {
        $this->linkedIn_login = $linkedIn_login;

        return $this;
    }

    public function getLinkedInPassword(): ?string
    {
        return $this->linkedIn_password;
    }

    public function setLinkedInPassword(string $linkedIn_password): self
    {
        $this->linkedIn_password = $linkedIn_password;

        return $this;
    }
}
