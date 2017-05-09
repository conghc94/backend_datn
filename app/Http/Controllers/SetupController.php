<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSetupRequest;
use App\Http\Requests\UpdateSetupRequest;
use App\Repositories\SetupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SetupController extends AppBaseController
{
    /** @var  SetupRepository */
    private $setupRepository;

    public function __construct(SetupRepository $setupRepo)
    {
        $this->setupRepository = $setupRepo;
    }

    /**
     * Display a listing of the Setup.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->setupRepository->pushCriteria(new RequestCriteria($request));
        $setups = $this->setupRepository->paginate(2);
        $setups[0]->status = "warning"; $setups[1]->status = "danger";
        return view('setups.index')
            ->with('setups', $setups);
    }

    /**
     * Show the form for creating a new Setup.
     *
     * @return Response
     */
    public function create()
    {
        return view('setups.create');
    }

    /**
     * Store a newly created Setup in storage.
     *
     * @param CreateSetupRequest $request
     *
     * @return Response
     */
    public function store(CreateSetupRequest $request)
    {
        $input = $request->all();

        $setup = $this->setupRepository->create($input);

        Flash::success('Setup saved successfully.');

        return redirect(route('setups.index'));
    }

    /**
     * Display the specified Setup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $setup = $this->setupRepository->findWithoutFail($id);

        if (empty($setup)) {
            Flash::error('Setup not found');

            return redirect(route('setups.index'));
        }

        return view('setups.show')->with('setup', $setup);
    }

    /**
     * Show the form for editing the specified Setup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $setup = $this->setupRepository->findWithoutFail($id);

        if (empty($setup)) {
            Flash::error('Setup not found');

            return redirect(route('setups.index'));
        }
        $setup->status = $id == 2 ? "danger" : "warning";
        return view('setups.edit')->with('setup', $setup);
    }

    /**
     * Update the specified Setup in storage.
     *
     * @param  int              $id
     * @param UpdateSetupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSetupRequest $request)
    {
        $setup = $this->setupRepository->findWithoutFail($id);
        $setups = $this->setupRepository->paginate(2);
        if (empty($setup)) {
            Flash::error('Setup not found');

            return redirect(route('setups.index'));
        }
        if($id == 1){
            if($request->sql_server_utilization >= $setups[1]->sql_server_utilization
                || $request->system_idle_process >= $setups[1]->system_idle_process
                || $request->other_process_cpu >= $setups[1]->other_process_cpu
                || $request->available_physical_memory >= $setups[1]->available_physical_memory)
            {
                Flash::error('The value of warning must be smaller than danger');

                return redirect(route('setups.index'));
            }
        }
        else{
            if($request->sql_server_utilization <= $setups[0]->sql_server_utilization
                || $request->system_idle_process <= $setups[0]->system_idle_process
                || $request->other_process_cpu <= $setups[0]->other_process_cpu
                || $request->available_physical_memory <= $setups[0]->available_physical_memory)
            {
                Flash::error('The value of danger must be greater than warning');

                return redirect(route('setups.index'));
            }
        }
        $setup = $this->setupRepository->update($request->all(), $id);

        Flash::success('Setup updated successfully.');

        return redirect(route('setups.index'));
    }

    /**
     * Remove the specified Setup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $setup = $this->setupRepository->findWithoutFail($id);

        if (empty($setup)) {
            Flash::error('Setup not found');

            return redirect(route('setups.index'));
        }

        $this->setupRepository->delete($id);

        Flash::success('Setup deleted successfully.');

        return redirect(route('setups.index'));
    }
}
