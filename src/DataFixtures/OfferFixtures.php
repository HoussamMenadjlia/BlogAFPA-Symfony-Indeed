<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OfferFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

        for($i=0; $i<10; $i++){

            $offer = new Offer();
            $offer
                ->setTitle($faker->sentence($nbWords=3, $variableNbWords = true))
                ->setContent($faker->sentence($nbWords=20, $variableNbWords = true))
                ->setAddress($faker->streetAddress())
                ->setPostalCode($faker->postcode())
                ->setCity($faker->city())
                ->setCreatedAt($faker->dateTimeAD($max = 'now', $timezone =null))
                ->setUpdatedAt($faker->dateTimeAD($max = 'now', $timezone =null))
                ->setEndedAt($faker->dateTimeAD($max = 'now', $timezone =null));
               

                $contract = $this->getReference("contract_" . rand(0,2));
                $offer->setContract($contract);

                $contract_type = $this->getReference("contract_type" . rand(0, 1));
                $offer->setContractType($contract_type);

                $manager->persist($offer);
        }

        $manager->flush();
    }
}
