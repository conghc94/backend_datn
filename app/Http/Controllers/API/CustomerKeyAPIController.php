<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCustomerKeyAPIRequest;
use App\Http\Requests\API\UpdateCustomerKeyAPIRequest;
use App\Models\CustomerKey;
use App\Repositories\CustomerKeyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Webpatser\Uuid\Uuid;
use Response;

/**
 * Class CustomerKeyController
 * @package App\Http\Controllers\API
 */

class CustomerKeyAPIController extends AppBaseController
{
    /** @var  CustomerKeyRepository */
    private $customerKeyRepository;

    public function __construct(CustomerKeyRepository $customerKeyRepo)
    {
        $this->customerKeyRepository = $customerKeyRepo;
    }

    /**
     * Store a newly created CustomerKey in storage.
     * POST /customerKeys
     *
     * @param CreateCustomerKeyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerKeyAPIRequest $request)
    {
        $input = $request->all();
        $input['key'] = Uuid::generate()->string;
        $customerKeys = $this->customerKeyRepository->create($input);
        return $this->sendResponse($customerKeys->toArray(), 'Customer Key created successfully');
    }

}
