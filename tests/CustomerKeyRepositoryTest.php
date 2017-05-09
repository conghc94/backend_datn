<?php

use App\Models\CustomerKey;
use App\Repositories\CustomerKeyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerKeyRepositoryTest extends TestCase
{
    use MakeCustomerKeyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CustomerKeyRepository
     */
    protected $customerKeyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->customerKeyRepo = App::make(CustomerKeyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCustomerKey()
    {
        $customerKey = $this->fakeCustomerKeyData();
        $createdCustomerKey = $this->customerKeyRepo->create($customerKey);
        $createdCustomerKey = $createdCustomerKey->toArray();
        $this->assertArrayHasKey('id', $createdCustomerKey);
        $this->assertNotNull($createdCustomerKey['id'], 'Created CustomerKey must have id specified');
        $this->assertNotNull(CustomerKey::find($createdCustomerKey['id']), 'CustomerKey with given id must be in DB');
        $this->assertModelData($customerKey, $createdCustomerKey);
    }

    /**
     * @test read
     */
    public function testReadCustomerKey()
    {
        $customerKey = $this->makeCustomerKey();
        $dbCustomerKey = $this->customerKeyRepo->find($customerKey->id);
        $dbCustomerKey = $dbCustomerKey->toArray();
        $this->assertModelData($customerKey->toArray(), $dbCustomerKey);
    }

    /**
     * @test update
     */
    public function testUpdateCustomerKey()
    {
        $customerKey = $this->makeCustomerKey();
        $fakeCustomerKey = $this->fakeCustomerKeyData();
        $updatedCustomerKey = $this->customerKeyRepo->update($fakeCustomerKey, $customerKey->id);
        $this->assertModelData($fakeCustomerKey, $updatedCustomerKey->toArray());
        $dbCustomerKey = $this->customerKeyRepo->find($customerKey->id);
        $this->assertModelData($fakeCustomerKey, $dbCustomerKey->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCustomerKey()
    {
        $customerKey = $this->makeCustomerKey();
        $resp = $this->customerKeyRepo->delete($customerKey->id);
        $this->assertTrue($resp);
        $this->assertNull(CustomerKey::find($customerKey->id), 'CustomerKey should not exist in DB');
    }
}
