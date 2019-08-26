<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;
use Intervention\Image\Facades\Image as Image;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();

        return view('users.index')->with(array(
            'users' => $users
        ));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show')->with(array(
            'user' => $user
        ));
    }

    //    /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
        public function edit($id)
        {
            $user = User::findOrFail($id);

            return view('users.edit')->with(array(
                'user' => $user
            ));
        }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $request->validate([
                'name' => 'required|max:191',
                'email' => 'required|max:191'
            ]);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            $session = $request->session()->flash('message', 'User updated successfully!');

            return redirect()->route('users.index');
        }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
        public function destroy($id)
        {
            $user = User::findOrFail($id);

            $user->delete();

            Session::flash('message', 'User deleted successfully!');

            return redirect()->route('users.index');
        }

        public function profile(){
            return view('profile', array('user' => Auth::user()));
        }

        public function update_avatar(Request $request){
        
            if($request->hasFile('avatar')){
               $avatar = $request->file('avatar');
               $filename = time() . '.' . $avatar->getClientOriginalExtension();
               Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename) );
               
               $user = Auth::user();
               $user->avatar = $filename;
               $user->save();
           }
           return view('profile', array('user' => Auth::user()) );
       }
}
