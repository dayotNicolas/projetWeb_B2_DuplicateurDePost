<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    const USER_COUNT = 5;
    private $userPasswordEncore;

    public function __construct(UserPasswordEncoderInterface  $userPasswordEncoder)
    {
        $this->userPasswordEncore = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

        $password = $this->userPasswordEncore->encodePassword(new Users(), 'password');

        for ($u = 0; $u < self::USER_COUNT; $u++) {
            $user = new Users();
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setEmail($faker->email);
            $user->setPassword($password);
            $user->setBirthDate(new \DateTime());
            $user->setCity($faker->city);
            $user->setPostalCode($faker->postcode);
            $user->setAddress($faker->address);
            $user->setUpdatedAt(new \DateTime());
            $this->addReference('users' . $u, $user);
            dump('users' . $u);

            $manager->persist($user);
        }
        $manager->flush();
    }

    //public function getDependencies()
    //{
    //    return [
    //        PostFixtures::class,
    //    ];
    //}
}
