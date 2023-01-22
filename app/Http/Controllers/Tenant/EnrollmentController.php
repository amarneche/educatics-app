<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("list_enrollments");
        $enrollments=Enrollment::with(['student','course','batch'])->get();
        $students = User::role(Role::STUDENT)->get();
        $courses = Course::with('batches')->get();
        
        return view('tenant.enrollments.index',compact('enrollments','students','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create',Enrollment::class);
        return view('tenant.enrollments.create');
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
        $this->authorize('create',Enrollment::class);
        $course =Course::find($request->course_id);
        $enrollment= Enrollment::create([
            'status'=>'active',
            "payment_status"=>"unpaid",
            'payment_method'=>'COD',
            'course_id'=>$request->course_id,
            'student_id'=>$request->student_id,
            'enrollment_date'=>$request->enrollment_date,
        ]);
        
        $invoice= $enrollment->invoices()->create([
            'total_amount'=>$course->chosenPrice(),
            'due_amount'=>$course->chosenPrice(),
            'due_date'=>Carbon::today()->addDays(7),
            'invoice_date'=>Carbon::today(),
        ]);
        return redirect()->route('tenant.enrollments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        //
        $this->authorize('view',$enrollment);
        return view('tenant.enrollments.show',compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrollment)
    {
        //
        $this->authorize('edit',$enrollment);
        return view('tenant.enrollments.edit',compact('enrollment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
        $this->authorize('edit',$enrollment);
        session()->flash('success', __("Enrollment successfully updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        //
        $this->authorize('delete',$enrollment);
        session()->flash('success', __("Enrollment successfully updated"));
        return redirect()->route('tenant.enrollments.index');

    }
}
