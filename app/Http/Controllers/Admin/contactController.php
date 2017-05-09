<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatecontactRequest;
use App\Http\Requests\UpdatecontactRequest;
use App\Repositories\contactRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class contactController extends AppBaseController
{
    /** @var  contactRepository */
    private $contactRepository;

    public function __construct(contactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;
    }

    /**
     * Display a listing of the contact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contactRepository->pushCriteria(new RequestCriteria($request));
        $contacts = $this->contactRepository->all();

        return view('admin.contacts.index')
            ->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param CreatecontactRequest $request
     *
     * @return Response
     */
    public function store(CreatecontactRequest $request)
    {
        $input = $request->all();

        $contact = $this->contactRepository->create($input);

        Flash::success('Contact saved successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('admin.contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('admin.contacts.edit')->with('contact', $contact);
    }

    /**
     * Update the specified contact in storage.
     *
     * @param  int              $id
     * @param UpdatecontactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecontactRequest $request)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        $contact = $this->contactRepository->update($request->all(), $id);

        Flash::success('Contact updated successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified contact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        $this->contactRepository->delete($id);

        Flash::success('Contact deleted successfully.');

        return redirect(route('contacts.index'));
    }
}
