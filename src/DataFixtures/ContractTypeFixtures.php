<?php

namespace App\DataFixtures;

use App\Entity\ContractType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContractTypeFixtures extends Fixture
{
    const CONTRACT_TYPES = ["Temps plein", "Temps partiel"];

    public function load(ObjectManager $manager)
    {
        foreach(self::CONTRACT_TYPES as $key => $value) {
            
            $slug = strtolower(trim($value));

            $contract_type = new ContractType();
            $contract_type->setName($value);
            $contract_type->setSlug($slug);
            
            

            $this->addReference("contract_type_$key", $contract_type);
            $manager->persist($contract_type);
        }


        $manager->flush();
    }
}