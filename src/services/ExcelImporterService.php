<?php

namespace App\services;

use App\Entity\Band;
use Doctrine\ORM\EntityManager;
use Shuchkin\SimpleXLSX;

class ExcelImporterService {

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function importBandDataToDatabase($file) {
        $data = $this->excelImport($file);
        foreach ($data as $bandData) {
            $band = new Band();
            $band->setName($bandData['Nom du groupe']);
            $band->setOrigin($bandData['Origine']);
            $band->setCity($bandData['Ville']);
            $band->setStartYear($bandData['Année début']);
            $band->setEndYear($bandData['Année séparation']);
            $band->setFounders($bandData['Fondateurs']);
            $band->setMembers($bandData['Membres']);
            $band->setGenre($bandData['Courant musical']);
            $band->setDescription($bandData['Présentation']);
            $this->em->persist($band);
        }
        $this->em->flush();
    }

    public function excelImport($file) {
        $xlsx = new SimpleXLSX($file);
        if($xlsx->success()) {
            $columnNames = $rows = [];
            foreach ($xlsx->rows() as $columns => $rowCell) {
                if ($columns === 0) {
                    $columnNames = $rowCell;
                    continue;
                }
                $rows[] = array_combine($columnNames, $rowCell);
            }
        print_r($rows);
        return $rows;
        }
        else{
            echo SimpleXLSX::parseError();
        }
    }
}