<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $documents = Document::all();

        $newest_documents = Document::select('*')->orderBy('created_at','DESC')->take(3)->get();

        $count_documents_of_category = Document::select('*')->count();
        
        $pagination_all_documents  = Document::select('*')->paginate(5);
        
        return view('home',compact('categories','documents','newest_documents','count_documents_of_category','pagination_all_documents'));
    }
    
    public function showCategory($id)
    {
        $categories = Category::all();
        
        $item_category = Category::find($id);
        
        $newest_documents = Document::select('*')->where('category_id',$id)->orderBy('created_at','DESC')->take(3)->get();

        $count_documents_of_category = Document::select('*')->where('category_id',$id)->count();
        
        $pagination_all_documents  = Document::select('*')->where('category_id',$id)->paginate(5);

        $documents = Document::all();
        
        $documents_of_category = Document::select('*')->where('category_id',$id)->get();
        
        $count_documents_of_category = Count(Document::select('*')->where('category_id',$id)->get());
        
        return view('category',compact('categories','item_category','documents','newest_documents','count_documents_of_category','pagination_all_documents'));
    }
    
    public function showDocument($id)
    {
        $categories = Category::all();
        
        $documents = Document::all();
        
        $document = Document::find($id);

        if (empty($document)) {
            Flash::error('Document not found');
            return redirect(route('show.document'));
        }
        
        $file_path= url("/uploads/".$document->file_name.'.pdf');
        
        $related_documents = Document::select('*')->where('category_id',$document->category->id)->take(3)->get();
        
        $user_token = null;
        if (Auth::check()) {
            // The user is logged in...
            $user_token = Auth::user()->remember_token;
        }
        
        return view('document',compact('categories','document','related_documents','file_path','user_token'));
    }
    
    public function downloadDocument($id)
    {
//        dd('vodayroi');
        $document = Document::find($id);
        $file= public_path(). "/uploads/".$document->file_name.'.'.$document->type;

        $headers = array(
                  'Content-Type: application/pdf',
                );
//        dd($document->file_name.$document->type);
        return Response::download($file, $document->file_name.'.'.$document->type, $headers);
    }
}
