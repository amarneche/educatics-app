<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function show(){
        $user =auth()->user();
        return view('admin.profile',compact('user'));
    }
    public function update(UpdateProfileRequest $request){
        

        if(!is_null($request->avatar)){
           $path= $request->file('avatar')->store('public');
           auth()->user()->clearMediaCollection('avatar');
           auth()->user()->addMedia(Storage::path($path))->toMediaCollection('avatar');
        }
        auth()->user()->update($request->validated());
        session()->flash('success',__("Profile has been updated"));
        return redirect()->back();
    }
}
