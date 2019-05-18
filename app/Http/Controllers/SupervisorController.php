<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Training;

class SupervisorController extends Controller
{
    public function myhndel(){
        if (Auth::user()->permession != 1) {
            return redirect('/');
        }
        
    }
    public function profile()
    {
        $this->myhndel();
        $trains = Training::where('added_by' , Auth::user()->id)->orderBy('id', 'desc')->paginate(4);;
        return view('supervisor_profile' , ['trainings' => $trains]);
    }
    public function add_get_training ()
     {
        $this->myhndel();
         return view('new_training' , ['pos_url' => 'supervisor/training/add']);
     }

     public function add_post_training(Request $request)
     {
        
        $training_id =DB::table('trainings')->insertGetId(
            [
                'title' => $request->title,
                'company' => $request->company,
                'address' => $request->address,
                'description' => $request->description,
                'img' =>'http://127.0.0.1:8000/img/train.png',
                'added_by' => Auth::user()->id,
                'created_at' => now(),
                 ]
        );
        $requirments = explode('-' , $request->requirments);
        for ($i=0; $i <count($requirments) ; $i++)
         { 
            DB::table('training_requirments')->insertGetId(
                [
                    'requirment' => $requirments[$i],
                    'training_id' => $training_id,
                    'created_at' => now(),
                     ]
            );
        }
        return view('message' , ['message' => 'Training Data has been Saved Successfully']);
     }
     public function get_training_students($id)
     {
        $studens_ids = DB::table('training_students')->where('training' , $id)->get();
        
     }
}
