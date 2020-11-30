<?php
namespace App\DataFixtures;
use Faker\Factory;
use App\Entity\Cars;
use Faker\Provider\Fakecar;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Cocur\Slugify\Slugify; /* ajouter slugify */

class AppFixtures extends Fixture
{
 public function load(ObjectManager $manager)
 {
 $faker = Factory::create('Fr-fr');
 $faker->addProvider(new \Faker\Provider\Fakecar($faker));
 $slugify = new Slugify();

 for($i = 1; $i <= 10; $i++) {
 $cars = new Cars();
 $marque = $faker->vehicleBrand();
 $modele = $faker->vehicleModel();
 $kilometre = $faker->randomNumber();
 $prix = $faker->randomNumber();
 $proprietaire = $faker->numberBetween($min = 0, $max = 4);
 $cylindree = $faker->numberBetween($min = 999, $max = 10000);
 $puissance = $faker->numberBetween($min = 1000, $max = 9000);
 $carburant = $faker->vehicleFuelType();
 $mecirculation = $faker->date($format = 'm-Y', $max = 'now');
 $transmission = $faker->vehicleGearBoxType();
 $description = $faker->sentence();
 $options = $faker->paragraph();
 $slug = $slugify->slugify($description);
 $coverImage = $faker->imageUrl(1000,350);

 $cars->setMarque($marque)
 ->setModele($modele)
 ->setKilometre($kilometre)
 ->setPrix($prix)
 ->setProprietaire($proprietaire)
 ->setPuissance($puissance)
 ->setCylindree($cylindree)
 ->setCarburant($carburant)
 ->setMecirculation($mecirculation)
 ->setTransmission($transmission)
 ->setDescription($description)
 ->setOptions($options)
 ->setSlug($slug)
 ->setCoverImage($coverImage);
 $manager->persist($cars);
 }
 $manager->flush();
 }
}