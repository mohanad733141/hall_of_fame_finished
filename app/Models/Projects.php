<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Projects extends Model
{
    protected $fillable = [
        'project_title',  'project_intoduction', 'project_detail_description', 'project_thumbnail', 'project_img_1', 'project_img_2', 'project_img_3', 'project_video', 'user_indeed_link', 'project_category', 'student_name', 'student_course', 'student_gmail', 'project_pdf', 'student_image', 'user_id'
    ];

    public function category(){
        //each project belongs to a particular cat (laravel model relationships) each project belongs to a specific cat
        return $this->belongsTo('app\Models\project_categories');
    }

    public function Users(){
        //each project belongs to a particular cat (laravel model relationships) each project belongs to a specific cat
        return $this->belongsTo(User::class);
    }
}
