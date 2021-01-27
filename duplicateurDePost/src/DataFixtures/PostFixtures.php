<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    const POST_COUNT = 25;
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        for ($p = 0; $p < self::POST_COUNT; $p++) {
            $post = new Post();
            $post->setTitre($faker->text(20));
            $post->setMessage($faker->text());
            $this->addReference('post' . $p, $post);
            //            for ($u = 0; $u < random_int(0,5); $u++) {
            $post->setUser($this->getReference('users' . random_int(0, UserFixtures::USER_COUNT - 1)));
            //            }
            $manager->persist($post);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
