<?php
 namespace App\UseCase\NewsLetter;

 use Symfony\Component\HttpFoundation\RequestStack;

 use App\Repository\NewsLetterRepository;
 use Symfony\Component\HttpFoundation\Request;
 use  App\Entity\NewsLetter;
 use App\Dto\NewsLetterDto;
 use App\UseCase\NewsLetter\DataBuilder;
 use App\Exception\RequestValidatorException;
 use App\service\NewsLetterLogger;
 class NewsLetterPost
 {
    private $request;
    public function __construct( 
        private NewsLetterRepository $newsLetterRepository,
        private DataBuilder $dataBuilder,
        private RequestStack $requestStack,
        private NewsLetterLogger $logger
        )
    {
        $this->request = $this->requestStack->getCurrentRequest();
    }
   public function create(): bool | String
        { 
        try 
            {
            return  $this->newsLetterRepository->save( 
                        $this->dataBuilder->prepareData( 
                        $this->request->toArray()
                        )
                    );
        } 
        catch (RequestValidatorException | \Exception $e)
        {
            $this->logger->create($e->getMessage());
            return $e->getMessage();
        }
        }
}