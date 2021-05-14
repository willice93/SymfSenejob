<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Task;
use App\Entity\Admin;
use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\DelivredTask;
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
         $phone= (int) $faker->phoneNumber;

                $client=new Client();
                $client->setLastNameClient($faker->lastname);
                $client->setFirstNameClient($faker->firstname);
                $client->setPhoneClient($phone);
                $client->setAdressClient($faker->address);
                $client->setCountryClient($faker->country);
                $client->setCityClient($faker->city);
                $client->setEmailClient($faker->email);
                $client->setMdpClient('password');
                
                $manager->persist($client);

       
                         $task= new Task();
                         $task->setDocTask('https://place-hold.it/300x500');
                        $task->setNameTask($faker->word);
                         $task->setTopicTask($faker->word);
                         $task->setClient($client);
                          $manager->persist($task);
                         
                             $developer= new Developer;
                              $developer->setFirstNameDeveloper($faker->lastname);
                              $developer->setUserNameDeveloper($faker->lastname);
                              $developer->setEmailDeveloper($faker->email);
                              $developer->setPhoneDeveloper($phone);
                              $developer-> setAdressDeveloper($faker->address);
                              $developer->setLastNameDeveloper($faker->lastname);
                              $developer->setTask($task);
                              $manager->persist($developer);
                                


                  $delivred=new DelivredTask();
                  $delivred->setText($faker->realText(200));
                  $delivred->setTaskUrl('https://github.com/moisebi/resavo.git');
                  $delivred->setDeveloper($developer);
                  $manager->persist($delivred);
                  
                             $cat= new Categorie ;
                              $cat->setNameCat($faker->word);
                              $cat->addDeveloper($developer);
                              $cat->setTask($task);
                            
                             
                              $manager->persist($cat);
        }
                              $manager->flush();
    }
    


   
}
