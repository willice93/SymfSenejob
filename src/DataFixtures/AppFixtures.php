<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Task;
use App\Entity\Admin;
use App\Entity\Categorie;
use App\Entity\Developer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    
    public function load(ObjectManager $manager)
    {
       //importation de faker librairie
        $faker = Faker\Factory::create('fr_FR');
       //creation d'un admin 
       $admin= new Admin();
       $admin->setUserNameAdmin($faker->lastname);
       $admin->setEmailAdmin($faker->email);
       $admin->setMdpAdmin('password');
       $manager->persist($admin);

       for ($i=0; $i <20 ; $i++)
       {

       
                         $task= new Task();
                         $task->setDocTask('https://place-hold.it/300x500');
                        $task->setNameTask($faker->word);
                         $task->setTopicTask($faker->word);
                          $manager->persist($task);
                         $phone= (int) $faker->phoneNumber;
                             $developer= new Developer;
                              $developer->setFirstNameDeveloper($faker->lastname);
                              $developer->setUserNameDeveloper($faker->lastname);
                              $developer->setEmailDeveloper($faker->email);
                              $developer->setPhoneDeveloper($phone);
                              $developer-> setAdressDeveloper($faker->address);
                              $developer->setLastNameDeveloper($faker->lastname);
                              $developer->setTask($task);
                              $manager->persist($developer);
                                

                             $cat= new Categorie ;
                              $cat->setNameCat($faker->word);
                              $cat->addDeveloper($developer);
                              $cat->setTask($task);
                            
                             
                              $manager->persist($cat);
        }
                              $manager->flush();
    }
    


   
}
