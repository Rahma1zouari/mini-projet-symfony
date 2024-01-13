<?php 
namespace App\tests\UseCase\NewsLetter;
use PHPUnit\Framework\TestCase;
use App\UseCase\NewsLetter\NewsLetterPost;
use App\Repository\NewsLetterRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use App\UseCase\NewsLetter\DataBuilder;
use App\service\NewsLetterLogger;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class NewsLetterPostTest extends TestCase
{
    


/*
    private NewsLetterRepository $newsLetterRepository,
    private DataBuilder $dataBuilder,
    private RequestStack $requestStack,
    private NewsLetterLogger $logger*/

    public function testFunctionCreate(): void
    {

        $newsLetterRepository = $this->createMock(NewsLetterRepository::class);
        $newsLetterRepository->expects($this->once())->method('save')->willReturn(true);
        $dataBuilder = new DataBuilder();
        $newsLetterPost = new NewsLetterPost($newsLetterRepository, RequestStack::class,NewsLetterLogger::class);
        $newsLetterPost->create( );
        $this->assertSame(1,1);
    }
}