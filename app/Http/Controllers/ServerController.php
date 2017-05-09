<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\UpdateServerRequest;
use App\Repositories\ServerRepository;
use App\Repositories\InformationRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SetupRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServerController extends AppBaseController
{
    /** @var  Repository */
    private $serverRepository;
    private $informationRepository;
    private $setupRepository;

    public function __construct(ServerRepository $serverRepo, InformationRepository $informationRepo, SetupRepository $setupRepo)
    {
        $this->serverRepository = $serverRepo;
        $this->informationRepository = $informationRepo;
        $this->setupRepository = $setupRepo;
    }

    /**
     * Display a listing of the Server.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serverRepository->pushCriteria(new RequestCriteria($request));
        $servers = $this->serverRepository->all();

        return view('servers.index')
            ->with('servers', $servers);
    }

    public function getData($id){
        $information = $this->informationRepository->findByField('server_id', $id)->sortByDesc('created_at')->first();
        if(empty($information)){
            return $this->sendError("Data not found");
        }
        return $this->sendResponse($information, "Data loaded success!");
    }
    /**
     * Show the form for creating a new Server.
     *
     * @return Response
     */
    public function create()
    {
        return view('servers.create');
    }

    /**
     * Store a newly created Server in storage.
     *
     * @param CreateServerRequest $request
     *
     * @return Response
     */
    public function store(CreateServerRequest $request)
    {
        $input = $request->all();

        $server = $this->serverRepository->create($input);

        Flash::success('Server saved successfully.');

        return redirect(route('servers.index'));
    }

    /**
     * Display the specified Server.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $server = $this->serverRepository->findWithoutFail($id);
        $setups = $this->setupRepository->all();
        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }
        return view('servers.show', compact('server', 'setups'));
    }

    /**
     * Show the form for editing the specified Server.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $server = $this->serverRepository->findWithoutFail($id);

        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }

        return view('servers.edit')->with('server', $server);
    }

    /**
     * Update the specified Server in storage.
     *
     * @param  int              $id
     * @param UpdateServerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServerRequest $request)
    {
        $server = $this->serverRepository->findWithoutFail($id);

        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }

        $server = $this->serverRepository->update($request->all(), $id);

        Flash::success('Server updated successfully.');

        return redirect(route('servers.index'));
    }

    /**
     * Remove the specified Server from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $server = $this->serverRepository->findWithoutFail($id);

        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }

        $this->informationRepository->findByField('server_id', $server->id)->delete();
        $this->serverRepository->delete($id);

        Flash::success('Server deleted successfully.');

        return redirect(route('servers.index'));
    }
}
