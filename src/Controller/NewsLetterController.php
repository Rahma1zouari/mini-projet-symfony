<?php

namespace App\Controller;

use App\UseCase\NewsLetter\NewsLetterPost;
use  App\Entity\NewsLetter;
use App\Repository\CategoryRepository;
use App\Repository\NewsLetterRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsLetterController extends AbstractController
{
    #[Route('/news', name: 'news', methods:'post')]
    public function postNews(
        NewsLetterPost $newsLetterPost
        ): JsonResponse
    {
        return $this->json([
            'message' => $newsLetterPost->create(),
         ]);
    }

}
