<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatedocumentRequest;
use App\Http\Requests\UpdatedocumentRequest;
use App\Repositories\documentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Category;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Input;
use RobbieP\CloudConvertLaravel\CloudConvert;

class documentController extends AppBaseController
{
    /** @var  documentRepository */
    private $documentRepository;

    public function __construct(documentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }

    /**
     * Display a listing of the document.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
        $this->documentRepository->pushCriteria(new RequestCriteria($request));
        $documents = $this->documentRepository->all();
        return view('admin.documents.index')
            ->with('documents', $documents);
    }

    /**
     * Show the form for creating a new document.
     *
     * @return Response
     */
    public function create()
    {
        $categories = category::all()->pluck('name', 'id');
        return view('admin.documents.create')->with('categories', $categories);
    }

    /**
     * Store a newly created document in storage.
     *
     * @param CreatedocumentRequest $request
     *
     * @return Response
     */
    public function store(CreatedocumentRequest $request)
    {
        $input = $request->all();
        $file = $request->file('type');
        //set value file upload
        $size = $file->getSize();
        $input['size'] = $size;
        $input['status'] = 1;
        $input['view_count'] = 0;
        $input['dowload_count'] = 0;
        $input['tags'] = 0;
        $input['user_id'] =  \Auth::id();
        $ext_file = $file->getClientOriginalExtension();
        $input['type'] = $ext_file;
        
        //Move file from location uploads
        
        $file_name = "document-" . time() . "." . $ext_file;
        $file_convert_name = "document-" . time();

        $input['file_name'] = $file_convert_name;

        $destinationPath = 'uploads';
        $file->move($destinationPath, $file_name);
        if($ext_file != 'pdf')
        {
            $cloudConvert = new CloudConvert(['api_key' => 'HanwUHsGImRUf0nro5yEpnV_qaMSFPvMb5yjY18ykfNtOEgvUjKDGWHOvjH6dlsSVgZ4hj2MeUrNHsPL8ox9AA']);
            $cloudConvert->file($destinationPath."/".$file_name)->pageRange(1,10)->to($destinationPath."/".$file_convert_name.'.pdf');
        }
        $file_name = $file_name.".pdf";
        //Create image to file upload (file pdf)
        $loc = public_path($destinationPath."\\");
        $pdf = $file_convert_name.".pdf";
        $format = "png";
        $dest = "$loc$pdf.$format";
        $im = new \Imagick($loc.$pdf.'[0]');
        $im->setImageFormat($format);
        $width = $im->getImageheight();
        $im->cropImage($width, $width, 0, 0);
        $im->scaleImage(140, 150, true);
        $im->writeImage($dest);
        header( "Content-Type: image/png" );

        $document = $this->documentRepository->create($input);
        Flash::success('Document saved successfully.');
        return redirect(route('documents.index'));
    }
    
    public function getDownload($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $document = $this->documentRepository->findWithoutFail($id);
        $file= public_path(). "/uploads/".$document->file_name.'.'.$document->type;

        $headers = array(
                  'Content-Type: application/pdf',
                );
//        dd($document->file_name.$document->type);
        return Response::download($file, $document->file_name.'.'.$document->type, $headers);
    }

    /**
     * Display the specified document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);
        
        $file_path= url("/uploads/".$document->file_name.'.pdf');
//        dd($file_path);
        if (empty($document)) {
            Flash::error('Document not found');
            return redirect(route('documents.index'));
        }

        return view('admin.documents.show', compact('document','file_path'));
    }

    /**
     * Show the form for editing the specified document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        $categories = category::all()->pluck('name', 'id');
        
        if (empty($document)) {
            Flash::error('Document not found');
            return redirect(route('documents.index'));
        }
        
        return view('admin.documents.edit', compact('document', 'categories'));
    }

    /**
     * Update the specified document in storage.
     *
     * @param  int              $id
     * @param UpdatedocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedocumentRequest $request)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $document = $this->documentRepository->update($request->all(), $id);

        Flash::success('Document updated successfully.');

        return redirect(route('documents.index'));
    }

    /**
     * Remove the specified document from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $this->documentRepository->delete($id);

        Flash::success('Document deleted successfully.');

        return redirect(route('documents.index'));
    }
    
    public function getDemo($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);
        $file= url("/uploads/".$document->file_name);
        return view('admin.documents.view_demo', compact('file'));
    }

}
