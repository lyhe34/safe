<?php

namespace App\Controller;

use App\Repository\DirectoryRepository;
use App\Repository\FileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/storage')]
class StorageController extends AbstractController
{
    private $directoryRepository;
    private $fileRepository;
    private $security;

    public function __construct(DirectoryRepository $directoryRepository, FileRepository $fileRepository, Security $security)
    {
        $this->directoryRepository = $directoryRepository;
        $this->fileRepository = $fileRepository;
        $this->security = $security;
    }

    #[Route('/', name: 'app_storage')]
    public function index(): Response
    {
        $user = $this->security->getUser();

        $rootDirectories = $this->directoryRepository->findAllAtPath("", $user);
        $rootFiles = $this->fileRepository->findAllAtPath("", $user);
        
        return $this->render('storage/index.html.twig', [
            'rootDirectories' => $rootDirectories,
            'rootFiles' => $rootFiles,
        ]);
    }

    #[Route('/getdirectories/{path}')]
    public function getDirectories(string $path) : JsonResponse
    {
        $user = $this->security->getUser();

        $directories = $this->directoryRepository->findAllAtPath($path, $user);

        return new JsonResponse($directories);
    }

    #[Route('/getdirectorycontent')]
    public function getDirectoryContent() : JsonResponse
    {
        return new JsonResponse();
    }
}
