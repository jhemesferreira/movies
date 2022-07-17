<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public const LIST_ACTOR = [
        'actor_1' => 'Christian Bale', 
        'actor_2' => 'Heath Ledger', 
        'actor_3' => 'Robert Downey JR', 
        'actor_4' => 'Chris Evans'
    ];
    public function load(ObjectManager $manager): void
    {
        $listPersistedActors = [];
        foreach (self::LIST_ACTOR as $key => $name) {
            $actor = new Actor();
            $actor->setName($name);
            $manager->persist($actor);
            $listPersistedActors[$key] = $actor;
        }

        $manager->flush();

        foreach (self::LIST_ACTOR as $key => $name){
            $this->addReference($key, $listPersistedActors[$key]);
        }
    }
}
