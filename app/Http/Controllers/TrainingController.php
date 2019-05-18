<?php

namespace App\Http\Controllers;
use App\Training;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function show($id)
    {
        $am_i_joined = false;
        if (Auth::user()) {
         $am_i_joined = DB::table('training_students')->where(['user_id' => Auth::user()->id , 'training'=>$id])->first() ?true:false;
        }
        $training =  Training::find($id);
        return view('show_training' , ['training' =>$training ,'am_i_joined'=>$am_i_joined ,'requirments' => Training::find($id)->requirments]);
    }
    public function search(Request $request){
        $foundTrainings = Training::where('title' , 'like' ,'%'.$request->title.'%')->get();
        return view('index',['trainings' => $foundTrainings]);
    }
    public function get_training_students($id)
     {
         $tr = Training::find($id);
         if (Auth::user()->permession == 2 || !$tr) {
             return abort('404');
         }
         elseif(Auth::user()->permession == 1 && $tr->added_by != Auth::user()->id) {
            return view('message' , ['message' => 'You are Not Allowed To View This Page']);
         }
        $studens_ids = DB::table('training_students')->where('training' , $id)->get();
        if(count($studens_ids)==0)
        return view('message' , ['message' => 'There is no Student had Enrolled This Course yet']);
        $students = array();
        for ($i=0; $i < count($studens_ids); $i++) { 
            $students[] = User::find($studens_ids[$i]->user_id);
        }
        return view('training_students' , ['students' => $students , 'training' => Training::find($id)]);
     }
}
