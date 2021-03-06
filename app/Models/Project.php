<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $fillable = ['name','description','start_date','estimate_time','user_id','project_status','pm_description','created_at','updated_at'];
    protected $table = 'projects';
//    public function project(){
////        return $this->belongsTo(Project::class,'project_id','id');
////    }
    public function developers(){
        return $this->hasMany(DevelopersProject::class,'project_id','id');
    }

    public function users(){
        return $this->belongsTo(User::class,'project_manager_id','id');
    }

    public function technologystack()
    {
        return $this->belongsToMany(TechnologyStack::class);
    }
    public function document()
    {
        return $this->hasMany(DocumentProject::class);
    }
//    public function developersproject(){
//        return $this->hasMany(DevelopersProject::class);
//    }

}
