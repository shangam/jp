<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->string('job_title');
            $table->string('job_description')->nullable();
            $table->string('no_of_vacancy')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('job_location')->nullable();
            $table->string('offered_salary')->nullable();
            $table->string('deadline')->nullable();
            $table->string('education_level')->nullable();
            $table->string('experienced_required')->nullable();
            $table->string('job_requirements')->nullable();
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
        Schema::dropIfExists('company_jobs');
    }
}
