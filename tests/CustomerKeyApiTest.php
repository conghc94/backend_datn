<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerKeyApiTest extends TestCase
{
    use MakeCustomerKeyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCustomerKey()
    {
        $customerKey = $this->fakeCustomerKeyData();
        $this->json('POST', '/api/v1/customerKeys', $customerKey);

        $this->assertApiResponse($customerKey);
    }

    /**
     * @test
     */
    public function testReadCustomerKey()
    {
        $customerKey = $this->makeCustomerKey();
        $this->json('GET', '/api/v1/customerKeys/'.$customerKey->id);

        $this->assertApiResponse($customerKey->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCustomerKey()
    {
        $customerKey = $this->makeCustomerKey();
        $editedCustomerKey = $this->fakeCustomerKeyData();

        $this->json('PUT', '/api/v1/customerKeys/'.$customerKey->id, $editedCustomerKey);

        $this->assertApiResponse($editedCustomerKey);
    }

    /**
     * @test
     */
    public function testDeleteCustomerKey()
    {
        $customerKey = $this->makeCustomerKey();
        $this->json('DELETE', '/api/v1/customerKeys/'.$customerKey->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/customerKeys/'.$customerKey->id);

        $this->assertResponseStatus(404);
    }
}
