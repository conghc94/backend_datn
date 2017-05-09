<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\CustomerKey;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CustomerKeyRepository;
use App\Repositories\UserRepository;
use Webpatser\Uuid\Uuid;
use Laracasts\Flash\Flash;


class UserController extends Controller
{
    private $customerKeyRepository;
    private $userRepository;
    public function __construct(CustomerKeyRepository $customerKeyRepo, UserRepository $userRepo){
        $this->customerKeyRepository = $customerKeyRepo;
        $this->userRepository = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::select('*')->whereHas('roles', function($query) {
		    	$query->where('name', '<>', 'admin');
			})->orderBy('id','DESC')->paginate(5);
//        dd($users);
        
        return view('admin.users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->attachRole(2);

        $data['customer_id'] = $user->id;
        $data['key'] = Uuid::generate()->string;

        $this->customerKeyRepository->create($data);

        Flash::success('User created successfully');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->where('id', $id)->first();
        return view('admin.users.show',compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.users.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        Flash::success('User updated successfully');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Server::where('customer_id', $id)->delete();
        CustomerKey::where('customer_id', $id)->delete();
        User::find($id)->delete();

        Flash::success('User deleted successfully');

        return redirect()->route('admin.users.index');
    }
}