<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\StoreCourseRequest;
use App\Models\Course;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize("list_courses");
        $courses= Course::orderBy('created_at','desc')->paginate(10);
        $courses=Course::filter();
        return view('tenant.courses.index' ,compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create',Course::class);
        $course =Course::create(['title'=>'Draft Course']);
        return redirect()->route('tenant.courses.edit',$course);
        return view('tenant.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        //
        $this->authorize('create',Course::class);
        $course =Course::create($request->all());
        //assign categories 
        
        if(isset($request->cover_photo)){
            $path =$request->cover_photo;         
            $course->addMedia(Storage::path($path))->toMediaCollection('cover_photo');
        }        
        session()->flash('success',__('Le cours a été crèe avec succès'));
        return redirect()->route('tenant.courses.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $this->authorize('view',$course);
        return view('tenant.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('update',$course);

        return view('tenant.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $this->authorize('update',$course);
        $course->update(  $request->all()  );
        if(isset($request->cover_photo)){
            $path =$request->cover_photo;  
            $course->clearMediaCollection('cover_photo');     
            $course->addMedia(Storage::path($path))->toMediaCollection('cover_photo');
        }   
        session()->flash('success',__("Course updated successfully"));
        return redirect()->route('tenant.courses.edit',$course);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $this->authorize('delete',$course);
        $course->delete();
        session()->flash('success', __("Course deleted successfully"));
        return redirect()->route('tenant.courses.index');
    }
}
