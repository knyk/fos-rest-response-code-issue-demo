<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FooControllerTest extends WebTestCase
{
    public function testResponseCodeOnValidationErrorShouldBe422(): void
    {
        $client = self::createClient();

        $client->request('POST', '/foo/bar');

        $this->assertEquals(422, $client->getResponse()->getStatusCode());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(422, $responseData['code']);
    }
}
