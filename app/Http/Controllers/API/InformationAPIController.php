<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInformationAPIRequest;
use App\Http\Requests\API\UpdateInformationAPIRequest;
use App\Models\Information;
use App\Repositories\InformationRepository;
use App\Repositories\ServerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InformationController
 * @package App\Http\Controllers\API
 */

class InformationAPIController extends AppBaseController
{
    /** @var  InformationRepository */
    private $informationRepository;
    private $serverRepository;

    public function __construct(InformationRepository $informationRepo, ServerRepository $serverRepo)
    {
        $this->informationRepository = $informationRepo;
        $this->serverRepository = $serverRepo;
    }

    /**
     * Store a newly created Information in storage.
     * POST /information
     *
     * @param CreateInformationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInformationAPIRequest $request)
    {
        $input = $request->all();
        try{
            $mac_address = $input['mac_address'];
            $server = $this->serverRepository->findByField('mac_address', $mac_address)->first();
            if($server == null){
                return $this->sendError('The mac address is not found!');
            }else{
                $input['server_id'] = $server->id;
                $information = $this->informationRepository->create($input);
                return $this->sendResponse($information->toArray(), 'Information saved successfully');
            }
        }
        catch (\Exception $e){
            return $this->sendError('Error when saving data!');
        }
    }
}
