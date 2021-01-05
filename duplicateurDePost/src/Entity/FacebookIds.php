<?php

namespace App\Entity;

use App\Repository\FacebookIdsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacebookIdsRepository::class)
 */
class FacebookIds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     */
    private $facebook_login;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $facebook_passwd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacebookLogin(): ?Users
    {
        return $this->facebook_login;
    }

    public function setFacebookLogin(?Users $facebook_login): self
    {
        $this->facebook_login = $facebook_login;

        return $this;
    }

    public function getFacebookPasswd(): ?string
    {
        return $this->facebook_passwd;
    }

    public function setFacebookPasswd(string $facebook_passwd): self
    {
        $this->facebook_passwd = $facebook_passwd;

        return $this;
    }
}
