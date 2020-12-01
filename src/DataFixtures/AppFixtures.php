<?php
        namespace App\DataFixtures;
        use Faker\Factory;
        use App\Entity\Cars;
        use App\Entity\Image;
        use Faker\Provider\Fakecar;
        use Doctrine\Persistence\ObjectManager;
        use Doctrine\Bundle\FixturesBundle\Fixture;
        //use Cocur\Slugify\Slugify; /* ajouter slugify */

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    $faker = Factory::create('Fr-fr');
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    //$slugify = new Slugify();

    for($c = 1; $c <= 10; $c++) {
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
        $options ='<p>'.join('</p><p>',$faker->sentences(8)).'</p>';
        //$slug = $slugify->slugify($description);
        

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
        //->setSlug($slug)
        ->setCoverImage('https://picsum.photos/1000/350');
        $manager->persist($cars);
 
        for($i=1; $i <= rand(2,5); $i++){
            $image = new Image();
            $image->setUrl('https://picsum.photos/200/200')
                ->setCaption($faker->sentence())
                ->setCars($cars);
            $manager->persist($image);    
        }
    }

     $manager->flush();
 }
}
