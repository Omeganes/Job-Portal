<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('skills')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('applications', function (Blueprint $table) {
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
            $table->primary(['job_id','applicant_id']);
            $table->foreignId('resume_id')->constrained()->onDelete('cascade');
            $table->enum('status',['Applied','Rejected','Accepted'])->default('applied');
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
        Schema::dropIfExists('job');
        Schema::dropIfExists('applications');
    }
}
