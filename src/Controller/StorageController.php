<?php

namespace App\Controller;

use App\Repository\DirectoryRepository;
use App\Repository\FileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/storage')]
class StorageController extends AbstractController
{
    #[Route('/', name: 'app_storage')]
    public function index(DirectoryRepository $directoryRepository, FileRepository $fileRepository, Security $security): Response
    {
        $user = $security->getUser();
        $rootDirectories = $directoryRepository->findAllAtPath("");
        $rootFiles = null;

        return $this->render('storage/index.html.twig', [
            'rootDirectories' => $rootDirectories,
            'rootFiles' => $rootFiles,
        ]);
    }
}
