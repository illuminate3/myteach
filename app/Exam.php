<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model {

    protected $fillable = ['course_id','title','date','high_score'];

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

    public function students(){
        return $this->belongsToMany('App\Student')->withPivot('grade');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function exam_student(){
        return $this->hasMany('App\Exam_Student');
    }




}
