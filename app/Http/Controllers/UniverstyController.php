<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
class UniverstyController extends Controller
{
    public function myhndel(){
        if (Auth::user()->permession != 0) {
            return redirect('/');
        }
        
    }
    public function create(Request $request)
    {
        $NewAdmin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
            'permession' => 0
        ];
        return User::create($NewAdmin);
    }
    public function AddSupervaisor(Request $request)
    {
        $NewSuperVisor = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permession' => 1
        ];
        return User::create($NewSuperVisor);
    }
    public function profile()
    {
        $this->myhndel();
        $sample_supervaisors = User::where('permession' , 1)->orderBy('id', 'desc')->paginate(5);
        $sample_students = User::where('permession' , 2)->orderBy('id', 'desc')->paginate(5);
        return view('admin_profile' , ['sample_supervaisors'=>$sample_supervaisors,
        'sample_students'=>$sample_students]);
    }
    public function update_password(Request $request){
        $user =  User::where('id' , Auth::user()->id)->update(['password' =>Hash::make($request->password)]);
        if ($user) {
            return view('message' , ['message' => "Your Password has been Updated Successfully"]);
        }
        return redirect('/');
    }
    public function add_get_supervisor()
    {
        return view('add_supervisor');
    }
    public function add_post_supervisor( Request $request)
    {
        $request->validate(['name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],]);
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'permession' => 1,
            'password' => Hash::make($request->password),
        ]);
        return view('message' , ['message' => 'New Supervaisor has been added Successfully']);
    }
    public function delete_supervaisor($id){
        $u = DB::table('users')->where(['id' => $id])->delete();
         if (!$u) {
             return abort('404');
         }
             return view('message' , ['message' => 'Supervaisor has been Deleted Successfully']);
     }
     public function delete_student($id)
     {
        $u = DB::table('users')->where(['id' => $id])->delete();
         if (!$u) {
             return abort('404');
         }
            return view('message' , ['message' => 'Student has been Deleted Successfully']);
     }
     public function add_get_training ()
     {
        $this->myhndel();
         return view('new_training' , ['pos_url' => 'admin/training/add']);
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
}
