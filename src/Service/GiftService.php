<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class GiftService {
    public $gifts = ['flowers', 'perfume', 'cheesecake'];

    public function __construct(LoggerInterface $logger)
    {
        $logger->info('Just some random gifts');
        shuffle($this->gifts);
    }
}
