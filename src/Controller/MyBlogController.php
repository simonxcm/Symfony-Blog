<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyBlogController extends AbstractController
{
    #[Route('/my_blog', name: 'homepage')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
        return $this->render('my_blog/index.html.twig', [
            'articles' => $articlesRepository->findAll(),
        ]);
    }
}
