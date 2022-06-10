<?php

declare(strict_types=1);

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

uses(WebTestCase::class);

it('should be happy', function (int $value, string $result) {
    $client = static::createClient();
    $client->request('GET', '/happiness/' . $value);

    $arrayResponse = json_decode($client->getResponse()->getContent(), true);

    $this->assertResponseIsSuccessful();
    $this->assertEquals($result, $arrayResponse['status']);
})->with(static function (): ?\Generator {
    yield [7, 'happy'];
    yield [5, 'sad'];
    yield [10, 'happy'];
    yield [1, 'sad'];
});
