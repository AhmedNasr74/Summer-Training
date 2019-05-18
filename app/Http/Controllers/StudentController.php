<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Training;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function myHandle()
    {
        if (Auth::user()->permession != 2) {
            return redirect('/');
        }
    }
    public function profile(){
        $this->myHandle();
        $enrolledTraining = DB::table('training_students')->where('user_id' ,Auth::user()->id)->first();
        if ($enrolledTraining) {
            return view('student_profile' , ['training' => Training::find($enrolledTraining->training) 
            , 'enrolled_at'=> date("F j, Y, g:i a",strtotime($enrolledTraining->created_at))]);
        }
        return view('student_profile' , ['training' =>array()]);
    }
    public function enroll($id){
        $training = Training::find($id);
        if(!$training)
            return abort(404);
        if (Auth::user()->permession != 2) {
            return redirect('/');
        }
        else if(DB::table('training_students')->where('user_id' ,Auth::user()->id)->first()){
            return view('message' , ['message' => "Sorry But You Enrolled in Anthor Training , You are allowed To Enroll only one Training"]);
        }
        else 
        {
            DB::table('training_students')->insert([
                ['training' => $training->id, 'user_id' => Auth::user()->id , 'created_at'=>now()],
            ]);
            return view('student_profile' , ['training' => $training,
            'enrolled_at'=> date("F j, Y, g:i a",strtotime(now()))]);
        }
    }
    public function update_password(Request $request){
        $user =  User::where('id' , Auth::user()->id)->update(['password' =>Hash::make($request->password)]);
        if ($user) {
            return view('message' , ['message' => "Your Password has been Updated Successfully"]);
        }
        return redirect('/');
    }
    public function leave_training($id)
    {
        $this->myHandle();
        $enrolledTraining = DB::table('training_students')
        ->where(['user_id' => Auth::user()->id,'training'=>$id])->delete();
        if (!$enrolledTraining) {
            return abort('404');
        }
        else {
            return view('message' , ['message' => "You Leaved This Training Successfully"]);

        }
    }
}
