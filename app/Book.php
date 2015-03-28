<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $fillable = ['title','intro','description'];

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

    public function courses(){
        return $this->hasMany('App\Course');
    }

}
