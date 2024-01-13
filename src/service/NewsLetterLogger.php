<?php
namespace App\service;
use Psr\Log\LoggerInterface;
class NewsLetterLogger
{
    private $logger;

    public function __construct(LoggerInterface $appLogger)
    {
        $this->logger = $appLogger;
    }

    public function create($message)
    {
        $this->logger->info($message);
    }
}
