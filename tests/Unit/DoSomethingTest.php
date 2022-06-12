<?php

declare(strict_types=1);

use App\DTO\HappinessDTO;
use App\Services\DoSomethingService;

test('should call happiness service', function (int $value, string $result) {
    $service = new DoSomethingService();

    expect($service->makeMeHappy(HappinessDTO::create($value)))->toBe($result);
})->with('happiness_dataset');
