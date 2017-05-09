<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInformationRequest;
use App\Http\Requests\UpdateInformationRequest;
use App\Repositories\InformationRepository;
use App\Repositories\ServerRepository;
use App\Models\Information;
use App\Models\Server;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InformationController extends AppBaseController
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
     * Display the specified Information.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$information = $this->informationRepository->findWhere(["server_id" => $id])->sortByDesc('created_at')->paginate(20);
        $information = Information::where('server_id', $id)->orderBy('created_at', 'desc')->paginate(20);
        $server = $this->serverRepository->find($id);
        if (empty($information)) {
            Flash::error('Server not found');

            return redirect(route('information.index'));
        }

        return view('information.show')->with([
            'information' => $information,
                'server' => $server
        ]);
    }

    /**
     * Remove the specified Information from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $information = $this->informationRepository->findWithoutFail($id);

        if (empty($information)) {
            Flash::error('Information not found');

            return redirect(route('information.index'));
        }

        $this->informationRepository->delete($id);

        Flash::success('Information deleted successfully.');

        return redirect(route('information.show', ['id' => $information->server_id]));
    }
}
