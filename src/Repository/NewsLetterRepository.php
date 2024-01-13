<?php

namespace App\Repository;

use App\Dto\NewsLetterDto;
use App\Entity\NewsLetter;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;



class NewsLetterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewsLetter::class);
    }

    public function save(NewsLetterDto $newsLetterDto): bool
    {
        $newsLetter = new newsLetter();
        $category =$this->getEntityManager()->getRepository(Category::class)
                        ->findOneBy(["name" =>$newsLetterDto->getCategory() ]);
        $newsLetter->setTitle($newsLetterDto->getTitle());
        $newsLetter->setDescription($newsLetterDto->getDescription());
        $newsLetter->setCategory($category);

        $this->getEntityManager()->persist($newsLetter);
        $this->getEntityManager()->flush();
        return true;
    }
}