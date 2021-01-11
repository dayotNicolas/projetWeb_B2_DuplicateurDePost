<?php

namespace App\Entity;

use App\Repository\FacebookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacebookRepository::class)
 */
class Facebook
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, inversedBy="facebook", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $usermail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facebook_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facebook_password;

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

    public function getFacebookLogin(): ?string
    {
        return $this->facebook_login;
    }

    public function setFacebookLogin(string $facebook_login): self
    {
        $this->facebook_login = $facebook_login;

        return $this;
    }

    public function getFacebookPassword(): ?string
    {
        return $this->facebook_password;
    }

    public function setFacebookPassword(string $facebook_password): self
    {
        $this->facebook_password = $facebook_password;

        return $this;
    }
}
