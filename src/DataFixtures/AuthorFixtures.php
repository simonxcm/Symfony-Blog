<?php

namespace App\DataFixtures;

use APP\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author
            ->setFirstname('Simon')
            ->setLastname('Coscino')
            ->setCompany('Donkey News')
            ->setShortBio('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

        $manager->persist($author);

        $manager->flush();
    }
}
