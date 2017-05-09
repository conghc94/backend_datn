<?php

use Faker\Factory as Faker;
use App\Models\CustomerKey;
use App\Repositories\CustomerKeyRepository;

trait MakeCustomerKeyTrait
{
    /**
     * Create fake instance of CustomerKey and save it in database
     *
     * @param array $customerKeyFields
     * @return CustomerKey
     */
    public function makeCustomerKey($customerKeyFields = [])
    {
        /** @var CustomerKeyRepository $customerKeyRepo */
        $customerKeyRepo = App::make(CustomerKeyRepository::class);
        $theme = $this->fakeCustomerKeyData($customerKeyFields);
        return $customerKeyRepo->create($theme);
    }

    /**
     * Get fake instance of CustomerKey
     *
     * @param array $customerKeyFields
     * @return CustomerKey
     */
    public function fakeCustomerKey($customerKeyFields = [])
    {
        return new CustomerKey($this->fakeCustomerKeyData($customerKeyFields));
    }

    /**
     * Get fake data of CustomerKey
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCustomerKeyData($customerKeyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'customer_id' => $fake->randomDigitNotNull,
            'key' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $customerKeyFields);
    }
}
