<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;



class MyBlogController extends AbstractController
{
    #[Route('/my_blog', name: 'homepage')]
    public function index(ArticlesRepository $articlesRepository, Request $request, PaginatorInterface $paginatorInterface): Response
    {

        $datas = $articlesRepository->findBy([], ['id' => 'asc']);

        $articles = $paginatorInterface->paginate(
        $datas,
        $request->query->getInt('page',1),
        6
        );

        return $this->render('my_blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}





