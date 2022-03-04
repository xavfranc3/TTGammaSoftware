<?php

namespace App\Controller;

use App\Entity\Band;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\services\ExcelImporterService;

class BandController extends AbstractController
{
    /**
     * @Route("/band", name="app_band")
     */
    public function index(): Response
    {
        return $this->render('band/index.html.twig', [
            'controller_name' => 'BandController',
        ]);
    }

    public function uploadXlsx(Request $request, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $file = $request->files->get('file');
        $importerService = new ExcelImporterService();
        $data = $importerService->excelImport($file);
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

            $em->persist($band);
        }
        $em->flush();
        return new JsonResponse();
    }

}
