<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VacationController extends Controller
{
    public function create(){
        return view('vacation_create');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/vacation/create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $data=$request->all();

            $time_start = strtotime($data['startDate']);
            $time_end = strtotime($data['endDate']);

            if($time_start > $time_end){
                $validator->errors()->add('name', 'Дата конца отпуска должна быть позже начала отпуска');
                return redirect('/vacation/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $mytime = Carbon::now();
            $array=[
                'employee'=>Auth::user()->name,
                'date_start'=>$data['startDate'],
                'date_end'=>$data['endDate'],
                'confirmed'=>'0',
                'created_at'=>$mytime->toDateTimeString(),
                'updated_at'=>$mytime->toDateTimeString()
            ];
            Vacation::insert($array);
        }
        return redirect('/home');
    }

    public function edit(Request $request){

        $id=$request->route('id');

        $user=$request->user();
        $user_obj = User::find($user->id);
        $admin=false;
        if($user_obj->hasRole("admin")) {
            $admin=true;
        }

        $vacation=  Vacation::find($id);
        return view('vacation_update',compact('vacation','admin'));
    }

    public function update(Request $request){

        $id=$request->route('id');
        $validator = Validator::make($request->all(), [
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/vacation/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else{
            $data=$request->all();

            $time_start = strtotime($data['startDate']);
            $time_end = strtotime($data['endDate']);

            if($time_start > $time_end){
                $validator->errors()->add('name', 'Дата конца отпуска должна быть позже начала отпуска');
                return redirect('/vacation/'.$id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
            }


            $vacation= Vacation::find($id);//получили по id данные колонки

            if(isset($data['submit_admin'])){

            $confirmed=0;
            if($vacation->confirmed == '0'){
                $confirmed=1;
            }
                $array=[
                    'confirmed'=>$confirmed
                ];
            }else{
                $array=[
                    'date_start'=>$data['startDate'],
                    'date_end'=>$data['endDate']
                ];
            }

            $vacation->update($array);//обновили колонку
        }
        return redirect('/home');
    }

    public function destroy(Request $request){
        $id=$request->route('id');
        $Vacation= Vacation::find($id);
        $Vacation->delete();
        return redirect('/home');
    }

}
