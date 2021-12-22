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
        $article1 = new Articles();
        $article1
            ->setTitle('La vie est belle')
            ->setDescription('C\est un bel article')
            ->setContent('Ceci est le premier article de mon blog')
            ->setSlug('lavieestbelle')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_SIMON))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article1);
        
        $article2 = new Articles();
        $article2
            ->setTitle('Crypto')
            ->setDescription('Toutes les news sur la crypto')
            ->setContent('Le deuxieme article de mon Blog')
            ->setSlug('crypto')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_SIMON))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article2);
        
        $article3 = new Articles();
        $article3
            ->setTitle('MJ is alive!')
            ->setDescription('Mickael Jackson is alive')
            ->setContent('Le troisième article de mon Blog')
            ->setSlug('mj')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_ANE))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article3);

        $article4 = new Articles();
        $article4
            ->setTitle('Everything')
            ->setDescription('The brand new book about everything')
            ->setContent('Le quatrième article de mon Blog')
            ->setSlug('everything')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_ANE))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article4); 

        $manager->flush();

        $article5 = new Articles();
        $article5
            ->setTitle('Nothing')
            ->setDescription('The brand new book about nothing')
            ->setContent('Le cinquièeme article de mon Blog')
            ->setSlug('nothing')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_SIMON))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article5); 

        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
