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
            ->setDescription('Il n\'y a pas de bonne ou de mauvaise situation')
            ->setContent('Vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous, je dirais que c’est d’abord des rencontres. Des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi.')
            ->setSlug('lavieestbelle')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_SIMON))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article1);
        
        $article2 = new Articles();
        $article2
            ->setTitle('Crypto')
            ->setDescription('Toutes les news sur la crypto')
            ->setContent('Une cryptomonnaie, dite aussi cryptoactif, cryptodevise, monnaie cryptographique ou encore cybermonnaie, est une monnaie numérique émise de pair à pair (actif numérique), sans nécessité de banque centrale, utilisable au moyen d\'un réseau informatique décentralisé. ')
            ->setSlug('crypto')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_SIMON))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article2);
        
        $article3 = new Articles();
        $article3
            ->setTitle('MJ is alive!')
            ->setDescription('Mickael Jackson is alive')
            ->setContent('Reconnu comme l\’artiste le plus titré de tous les temps, il est une figure principale de l\'histoire de l\'industrie du spectacle et l\'une des icônes culturelles majeures du XXe siècle. ')
            ->setSlug('mj')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_ANE))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article3);

        $article4 = new Articles();
        $article4
            ->setTitle('Everything')
            ->setDescription('The brand new book about everything')
            ->setContent('Go to read this amazing book')
            ->setSlug('everything')
            ->setAuthor($this->getReference(AuthorFixtures::AUTHOR_ANE))
            ->setCategory($this->getReference(CategoryFixtures::TECHNOLOGY));
            $manager->persist($article4); 

        $manager->flush();

        $article5 = new Articles();
        $article5
            ->setTitle('Nothing')
            ->setDescription('The brand new book about nothing')
            ->setContent('Go to read this amazing book')
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
