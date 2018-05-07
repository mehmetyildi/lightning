<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Role;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Collection;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Contracts\Support\Arrayable;


class UsersController extends Controller
{
   public function __construct(){

    $this->middleware('auth')->except('show','showUserPost');

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        auth()->user()->authorizeRoles('superadmin');
        $users=User::latest()->get();
        return view('admin.users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function  paginate($items,$perPage,$page=null,$options=[]){
    //    $page=$page?:(Paginator::resolveCurrentPage()?:1);
    //    $items=$items instanceof Collection ? $items: Collection::make($items);
    //    return new LengthAwarePaginator($items->forPage($page,$perPage),$items->count(),$perPage,$page,$options);
    // }




    public function show($url)
    {
        //
        $user=User::where('url',$url)->firstOrFail();

        $posts=$user->collection();

        $posts=Controller::paginate($posts,5);

        return view('user.collection.collection',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        auth()->user()->authorizeRoles('superadmin');

        $user=User::find($id);

        $user->destroy($id);
        return redirect('/user/index');
    }

    public function upgrade(User $user){

        auth()->user()->authorizeRoles('superadmin');

        $role=Role::where('name','admin')->get();

        $user->roles()->attach($role);


        return redirect('/user/index');
    }

    public function downgrade(User $user){

        auth()->user()->authorizeRoles('superadmin');

        $role=Role::where('name','admin')->get();

        $user->roles()->detach($role);

        
        return redirect('/user/index');
    }
}
