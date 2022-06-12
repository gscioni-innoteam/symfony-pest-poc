<?php

declare(strict_types=1);

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

uses(WebTestCase::class);

it('should call happiness endpoint', function (int $value, string $result) {
    $client = static::createClient();
    $client->request('GET', '/happiness/' . $value);

    $arrayResponse = json_decode($client->getResponse()->getContent(), true);

    $this->assertResponseIsSuccessful();
    $this->assertEquals($result, $arrayResponse['status']);
})->with('happiness_dataset');
