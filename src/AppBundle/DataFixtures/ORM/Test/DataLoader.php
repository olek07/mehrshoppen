<?php
namespace AppBundle\DataFixtures\ORM\Test;

use Faker\Factory;
use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class DataLoader extends AbstractLoader
{
    /**
    * {@inheritDoc}
    */
    public function getFixtures()
    {
        return  [
            __DIR__ . '/user.yml',
            __DIR__ . '/partner.yml',
            __DIR__ . '/intern.yml',
            __DIR__ . '/transaction.yml'
        ];
    }

    public function alias($name) {
        $result = strtolower($name);
        $result = preg_replace('/[^a-z0-9]/', ' ', $result);
        $result = preg_replace('/\s+/ ', '-', $result);

        return $result;
    }
}