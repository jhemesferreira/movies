<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The dark knight')
              ->setReleaseYear(2008)
              ->setDescription('This is the description of The dark knight')
              ->setImagePath('https://cdn.pixabay.com/photo/2015/04/23/21/59/tree-736877_960_720.jpg')

              //Add Data to Pivot Table
              ->addActor($this->getReference('actor_1'))
              ->addActor($this->getReference('actor_2'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Avengers: End game')
              ->setReleaseYear(2019)
              ->setDescription('This is the description of Avengers: End game')
              ->setImagePath('https://cdn.pixabay.com/photo/2016/09/14/08/18/film-1668918_960_720.jpg')

              //Add Data to Pivot Table
              ->addActor($this->getReference('actor_3'))
              ->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);


        $manager->flush();
    }
}
