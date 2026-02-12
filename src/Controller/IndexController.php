<?php

namespace App\Controller;

use App\Entity\Articles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $em): Response
    {
        $articles = $em->getRepository(Articles::class)->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'Fred',
            'articles' => $articles
        ]);
    }

    // Exemple de route multiple
    #[Route('/create', name: 'create')]
    #[Route('/edit/{firstname}/{lastname}', name: 'edit')]
    public function edit(?string $firstname, ?string $lastname = null): Response
    {
        return new Response('Hello ' . $firstname . ' ' . $lastname . ' !');
    }
}
