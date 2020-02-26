<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    /**
     * @Route("/continent", name="continent")
     */
    public function index(ContinentRepository $repo)
    {
        $result = $repo->findAll();
        $arr = [];
        $countries = [];
        foreach ($result as $key=>$value)
        {
            foreach ($value->getCountries() as $country)
            {
                $countriesArr = [
                    "id" => $country->getId(),
                    "name" => $country->getName(),
                    "code" => $country->getCode(),
                    "value" => $country->getValue()
                ];
                $countries[] = $countriesArr;
            }
            $obj = [
                "id" => $value->getId(),
                "name" => $value->getName(),
                "pollution" => $value->getPollution(),
                "countries" => $countries
            ];
            $arr[] = $obj;
        }

        return $this->json($arr);
    }
}
