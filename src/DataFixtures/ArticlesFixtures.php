<?php

namespace App\DataFixtures;

use APP\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 50; $i++) {

        $article = new Articles();
        $article
            ->setTitle('First article title')
            ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ')
            ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_SIMON))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
        }
        $manager->persist($article);
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
