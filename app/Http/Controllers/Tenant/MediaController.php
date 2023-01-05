<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $tempMedia = new Media();
        $tempMedia->id =0;
        $tempMedia->exists =true;
        $media= $tempMedia->addMediaFromRequest('upload')->toMediaCollection('uploads');
      
       return response()->json([
        'url'=>$media->getUrl(),
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
    public function upload(Request $request){
        // upload that file into a temporary folder
        $filesArray=$request->file();
        if(is_array($filesArray)){
            
                //check either it's an arry or just one file .
                if(is_array($filesArray[array_key_first($filesArray)])){
                    $item=$filesArray[array_key_first($filesArray)];
                    
                    $filePath=  $item[array_key_first($item)]->store('public/temp'); 

                }else {
                    $filePath=  $request->file()[array_key_first($request->file())]->store('public/temp'); 

                }
                
                return $filePath;
            

        }
        return response(status:400);
       
    }
}
