<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**   project_title  project_intoduction project_detail_description  project_thumbnail 'project_img-1' 'project_img-2' 'project_img-3' 'project_video' 'user_indeed_link' 'user_indeed_link' 'category_id'
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_title');
            $table->longText('project_intoduction');
            $table->longText('project_detail_description');
            $table->string('project_thumbnail');
            $table->string('project_img_1');
            $table->string('Project_img_2')->nullable();
            $table->string('Project_img_3')->nullable();
            $table->string('project_video');
            $table->string('user_indeed_link')->nullable();
            $table->string('project_pdf')->nullable();
            $table->string('student_name');
            $table->string('student_course');
            $table->string('student_gmail');
            $table->string('student_image');

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
        Schema::dropIfExists('projects');
    }
};
