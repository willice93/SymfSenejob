<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Task;
use App\Entity\Admin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       //importation de faker librairie
        $faker = Faker\Factory::create('fr_FR');
       //creation d'un admin 
       $admin=new Admin();
       $admin->setUserNameAdmin($faker->lastname);
       $admin->setEmailAdmin($faker->email);
       $admin->setMdpAdmin('password');
       $manager->persist($admin);
       

       

       


        
        
        for ($i = 0; $i < 20; $i++) {
                        
                        $task= new Task();
   
                         $task->setDocTask('https://place-hold.it/300x500');
                        $task->setNameTask($faker->word);
                         $task->setTopicTask($faker->word);
                        
                            $manager->persist($task);

                            $manager->flush();
        }
    }
}
