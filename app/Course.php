<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $fillable = ['book_id','year','semester'];
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
    public function book(){
        return $this->belongsTo('App\Book');
    }

    public function students(){
        return $this->hasMany('App\Student');
    }

    public function exams(){
        return $this->hasMany('App\Exam');
    }

}
