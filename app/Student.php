<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $fillable = ['course_id','name','family','email'];

    //

    static function activeAll($array){
        $cols = static :: whereIN('id',$array)->get();
        foreach($cols as $item){
            $item->active = ! $item->active;
            $item->save();
        }
        return 'true';
    }
    static function deleteAll($array){
        $cols = static :: whereIN('id',$array)->get();
        foreach($cols as $item){
            $item->delete();
        }
        return 'true';
    }

    public function exams(){
        return $this->belongsToMany('App\Exam')->withPivot('grade');
    }

}
