<?php

namespace App\Entity;

use App\Repository\InstagramRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstagramRepository::class)
 */
class Instagram
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, inversedBy="instagram", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $usermail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $instagram_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $instagram_password;

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

    public function getInstagramLogin(): ?string
    {
        return $this->instagram_login;
    }

    public function setInstagramLogin(string $instagram_login): self
    {
        $this->instagram_login = $instagram_login;

        return $this;
    }

    public function getInstagramPassword(): ?string
    {
        return $this->instagram_password;
    }

    public function setInstagramPassword(string $instagram_password): self
    {
        $this->instagram_password = $instagram_password;

        return $this;
    }
}
