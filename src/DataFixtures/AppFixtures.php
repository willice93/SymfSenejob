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

    public const ADMIN_USER_REFERENCE = 'admin-user';
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
       $manager->flush();
      // $this->addReference(self::ADMIN_USER_REFERENCE, $admin);
      

        
        for ($i = 0; $i < 20; $i++) {
                        
                        $task= new Task();
                       // $task->setAdmin($this->getReference(AppFixtures::ADMIN_USER_REFERENCE));
                        $task->getAdmin($admin);
                         $task->setDocTask('https://place-hold.it/300x500');
                        $task->setNameTask($faker->word);
                         $task->setTopicTask($faker->word);
                        
                            $manager->persist($task);

        }
                             $manager->flush();



           
      for ($i = 0; $i < 4; $i++) {

            $developer=new Developer();
            $developer->setFirstNameDeveloper($faker->firstname);
            $developer->setUserNameDeveloper($faker->name);
            $developer->setEmailDeveloper($faker->email);
            $developer->setPhoneDeveloper($faker->phonenumber);
            $developer->setAdressDeveloper($faker->address);
            $developer->setLastNameDeveloper($faker->lastname);

            $manager->persist($developer);
      }

            $manager->flush();

            $categorie=new Categorie();
            $categorie->setNameCat($faker->name);
            $manager->persist($categorie);
            $task->getCategorie($categorie);
            $developer->getCategorie($categorie); 

            $manager->flush();
    }
    


   
}
