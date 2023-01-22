<?php

use App\Models\Enrollment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->on('users');
            $table->foreignId('course_id');
            $table->foreignId('batch_id')->nullable();
            $table->date('enrollment_start');
            $table->date('enrollment_ends');
            $table->string('remark',255)->nullable();
            $table->enum('frequency',['daily', 'weekly', 'monthly', 'yearly'])->default('monthly');

            $table->json('data')->nullable();
            
            $table->unique(['student_id','course_id'],'unique_student_course_enrollment');
            $table->unique(['student_id','batch_id'],'unique_student_batch_enrollment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
