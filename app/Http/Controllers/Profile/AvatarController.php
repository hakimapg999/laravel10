<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest; 
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{

    public function update(UpdateAvatarRequest $request) 
    {

       // $request->validate();

        //dd($request->input('all'));
        //dd($request->all());
        //dd($request->file('avatar'));
        

        //redirect to profile
         //return response()->redirectTo('/profile');
         //return response()->redirectTo(route('profile.edit'));
         //return back()->with('message', 'Avatar is uploadae bro');
         //return redirect(route('profile.edit'));


        //$path = $request->file('avatar')->store('avatars','public');

        $path = Storage::disk('public')->put('avatars',$request->file('avatar'));

        

        if ($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar' => $path]);
 
         

         return redirect(route('profile.edit'))->with('message','Avatar is uploaded');
    }
}
