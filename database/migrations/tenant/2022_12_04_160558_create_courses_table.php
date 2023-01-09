<?php

use App\Models\Course;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('full_description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('learning_model')->default("online")->nullable();

            $table->integer('price')->default(0);
            $table->integer('sale_price')->default(0)->nullable();
            $table->datetime('sale_price_effective_starts')->nullable();
            $table->datetime('sale_price_effective_ends')->nullable();
            $table->integer("duration")->default(0)->nullable();
            $table->string("duration_unit")->nullable();
            $table->json('data')->nullable();
            
            $table->foreignId('created_by')->on('users')->nullable();

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
        Schema::dropIfExists('courses');
    }
};
