<?php

namespace App\DataFixtures;

use APP\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const TECHNOLOGY = 'TECHNOLOGY';

    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Technology');
        $manager->persist($category);  
        $this->addReference(self::TECHNOLOGY, $category);
  
        $manager->flush();
    }
}
