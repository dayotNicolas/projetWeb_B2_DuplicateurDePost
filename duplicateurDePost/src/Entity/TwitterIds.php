<?php

namespace App\Entity;

use App\Repository\TwitterIdsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TwitterIdsRepository::class)
 */
class TwitterIds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, inversedBy="twitterIds", cascade={"persist", "remove"})
     */
    private $twitter_login;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $twitter_passwd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTwitterLogin(): ?Users
    {
        return $this->twitter_login;
    }

    public function setTwitterLogin(?Users $twitter_login): self
    {
        $this->twitter_login = $twitter_login;

        return $this;
    }

    public function getTwitterPasswd(): ?string
    {
        return $this->twitter_passwd;
    }

    public function setTwitterPasswd(string $twitter_passwd): self
    {
        $this->twitter_passwd = $twitter_passwd;

        return $this;
    }
}
