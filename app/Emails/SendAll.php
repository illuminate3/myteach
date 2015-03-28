<?php namespace App\Emails;
class SendAll {

    public function sendAll($students,$title,$description){
        //return $students;
        foreach ($students as $student) {
            $msg = preg_replace(['/\$email/','/\$name/','/\$family/','/\$grade/'], [$student->email,$student->name,$student->family,$student->grade], $description);
            \Mail::send(['text' => 'admin.emails.gradesAll'], ['description'=>$msg], function($message) use ($student,$title){
                $message->to($student->email, $student->family)->subject($title);
            });
        }
        return 'true';

    }
}