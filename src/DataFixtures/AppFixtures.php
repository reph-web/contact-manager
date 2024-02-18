<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $categories=[];

        $prive = new Categorie();
        $prive->setImage('https://picsum.photos/id/342/200/300')
            ->setLibelle('Privé')
            ->setDescription('Catégorie pour les contacts du privé');
        $manager->persist($prive);
        $categories[]=$prive;

        $sport = new Categorie();
        $sport->setImage('https://picsum.photos/id/73/200/300')
            ->setLibelle('Sport')
            ->setDescription('Catégorie pour les contacts du sport');
        $manager->persist($sport);
        $categories[]=$sport;

        $profesionnel = new Categorie();
        $profesionnel->setImage('https://picsum.photos/id/5/200/300')
            ->setLibelle('Professionnel')
            ->setDescription('Catégorie pour les contacts du professionnel');
        $manager->persist($profesionnel);
        $categories[]=$profesionnel;

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
                    ->setSex($sexe)
                    ->setCategorie($categories[mt_rand(0, 2)]);
            $manager->persist($contact);
        }
        $manager->flush();
    }
}
