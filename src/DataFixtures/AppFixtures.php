<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $genders = ["male", "female"];
        $faker = Factory::create("fr_FR");

        for($i=0; $i<100; $i++){
            $sexe = mt_rand(0,1);
            if($sexe){
                $type = 'women';
             }else{
                $type = 'men';
             }
            $contact = new Contact();
            $contact->setName($faker->lastName())
                    ->setFirstName($faker->FirstName($genders[$sexe]))
                    ->setCP($faker->numberBetween(10000, 95000))
                    ->setStreet($faker->streetAddress())
                    ->setCity($faker->city())
                    ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg")
                    ->setMail($faker->email())
                    ->setSex($sexe);
            $manager->persist($contact);
        }
        $manager->flush();
    }
}
