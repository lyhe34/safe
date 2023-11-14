<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/storage')]
class StorageController extends AbstractController
{
    #[Route('/', name: 'app_storage')]
    public function index(): Response
    {
        return $this->render('storage/index.html.twig', [
        ]);
    }
}
