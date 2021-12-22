<?php

namespace App\DataFixtures;

use APP\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture

{
    public const AUTHOR_SIMON = 'AUTHOR_SIMON';
    public const AUTHOR_ANE = 'AUTHOR_ANE';

    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author
            ->setFirstname('Simon')
            ->setLastname('Simon')
            ->setCompany('Donkey News')
            ->setShortBio('Journaliste depuis l\'âge de 1 an, j\'aime écrire');
        $manager->persist($author);
        $this->addReference(self::AUTHOR_SIMON, $author);

        $author2 = new Author();
        $author2
            ->setFirstname('L\'ane')
            ->setLastname('dans Shrek')
            ->setCompany('Donkey TV')
            ->setShortBio('Photo-reporter qui suivi les plus grands');
        $manager->persist($author2);
        $this->addReference(self::AUTHOR_ANE, $author2);

        $manager->flush();
    }
}
