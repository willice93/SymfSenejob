<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Task;
use App\Entity\User;
use App\Entity\Admin;
use App\Entity\Client;
use App\Entity\Categorie;
use App\Entity\Developer;
use App\Entity\DelivredTask;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
       private $passwordEncoder;

       public function __construct(UserPasswordEncoderInterface $passwordEncoder)
       {
           $this->passwordEncoder = $passwordEncoder;
       }
    
    public function load(ObjectManager $manager)
    {
       //importation de faker librairie
        $faker = Faker\Factory::create('fr_FR');
        //creation d'un seul user admin dans User
        $roles[]='ROLE_ADMIN';
        $user=new User;
        $user->setEmail('willice@dev2sd.fr')
            ->setRoles($roles)
           ->setPassword($this->passwordEncoder->encodePassword(
                           $user,
                           'password'
                       ));
            $manager->persist($user);

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
                          $task->setDocTask($faker->imageUrl($width = 271, $height = 179));
                         $task->setDocTask('https://place-hold.it/271x179');
                        $task->setNameTask($faker->word);
                         $task->setTopicTask($faker->realText($maxNbChars = 200, $indexSize = 2));
                         $task->setClient($client);
                         $task->setCreatAt($faker->dateTime($max = 'now', $timezone = null));
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
                              $cat->setImages('https://place-hold.it/300x300');
                            
                             
                             $manager->persist($cat);
        }
                              $manager->flush();
    }
    


   
}
