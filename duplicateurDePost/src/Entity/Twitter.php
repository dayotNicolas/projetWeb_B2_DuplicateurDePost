<?php

namespace App\Entity;

use App\Repository\TwitterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TwitterRepository::class)
 */
class Twitter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, inversedBy="twitter", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $usermail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $twitter_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $twitter_password;

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

    public function getTwitterLogin(): ?string
    {
        return $this->twitter_login;
    }

    public function setTwitterLogin(string $twitter_login): self
    {
        $this->twitter_login = $twitter_login;

        return $this;
    }

    public function getTwitterPassword(): ?string
    {
        return $this->twitter_password;
    }

    public function setTwitterPassword(string $twitter_password): self
    {
        $this->twitter_password = $twitter_password;

        return $this;
    }
}
