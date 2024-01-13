<?php
namespace App\UseCase\NewsLetter;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Dto\NewsLetterDto;
use App\Exception\RequestValidatorException;
class DataBuilder{

    public function __construct(private ValidatorInterface $validator)
    {
        
    }
    public function prepareData(array $dataNews)
    {
    $newsLetterDto = new NewsLetterDto();
    $newsLetterDto->setTitle($dataNews['title'] ?? null);
    $newsLetterDto->setDescription($dataNews['description']);
    $newsLetterDto->setCategory($dataNews['category']);
    $errors = $this->validator->validate($newsLetterDto);
    if (count($errors) > 0) {
        throw new RequestValidatorException($errors[0]->getMessage()) ;

    }
    return $newsLetterDto;
    }
}