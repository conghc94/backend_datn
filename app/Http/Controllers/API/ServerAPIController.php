<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServerAPIRequest;
use App\Http\Requests\API\UpdateServerAPIRequest;
use App\Models\Server;
use App\Repositories\ServerRepository;
use App\Repositories\CustomerKeyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServerController
 * @package App\Http\Controllers\API
 */

class ServerAPIController extends AppBaseController
{
    /** @var  ServerRepository */
    private $serverRepository;
    private $customerKeyRepository;

    public function __construct(ServerRepository $serverRepo, CustomerKeyRepository $customerKeyRepo)
    {
        $this->serverRepository = $serverRepo;
        $this->customerKeyRepository = $customerKeyRepo;
    }

    /**
     * Store a newly created Server in storage.
     * POST /servers
     *
     * @param CreateServerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServerAPIRequest $request)
    {
        $input = $request->all();
        try {
            $key = $input['key'];
            $customerKey = $this->customerKeyRepository->findByField('key', $key)->first();

            if ($customerKey == null) {
                return $this->sendError('The customer key is not found!');
            } else {
                $server = $this->serverRepository->findByField('mac_address', $input['mac_address'])->first();
                if ($server != null) {
                    if ($server->customer_key . equalTo($customerKey->customer_key)) {
                        $server = $this->serverRepository->update($request->all(), $server->id);
                        return $this->sendResponse($server->toArray(), 'The Server is registered already by you!');
                    }else{
                        return $this->sendError('The mac address is registered already!');
                    }
                } else {
                    $input['customer_id'] = $customerKey->customer_id;
                    $server = $this->serverRepository->create($input);
                    return $this->sendResponse($server->toArray(), 'Server saved successfully');
                }
            }
        }
        catch (\Exception $e){
            return $this->sendError('Error when create a server!', 400);
        }
    }
}
