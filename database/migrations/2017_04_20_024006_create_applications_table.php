<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('job_title');
            $table->string('recruiter_first_name');
            $table->string('recruiter_last_name');
            $table->string('recruiter_email')->unique();
            // FLOAT equivalent for Database, 2 digits in total and 1 after the decimal point
            $table->float('glassdoor_rating', 2, 1);
            // Integer value for average salary of this position
            $table->integer('average_salary');
            $table->enum('status', ['accepted, applied, in_progress, rejected']);
            $table->text('cover_letter');
            // should only be filled if applicant gets the offer
            $table->text('offer_details')->default(null);
            $table->timestamp('applied_on');
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
        Schema::dropIfExists('applications');
    }
}
