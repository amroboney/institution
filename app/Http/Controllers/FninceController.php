<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studant;
use App\Type;
use App\Fnince;
use App\Section;
use Validator;
use Auth;

class FninceController extends Controller
{
    public function fnince($studant_id){
        $types    = $this->all_types();
        $studant  = $this->find_studant($studant_id);
        $fninces  = $this->find_fnince($studant_id);
        $result   = $this->result_fnince($studant_id);
        $section  = $this->find_section($studant->section_id);
        $type     = $this->find_type($section->type_id);
        $arr = array('types'=>$types ,'type'=>$type ,'studant'=>$studant ,'fninces'=>$fninces ,'section'=>$section,'result'=>$result);
        return view('fnince.add',$arr);
    }

    public function add_post(Request $request){
        $validator = Validator::make($request->all(),[
        'paid'   =>'required',
        ]);
        if ($validator->fails()) {
            return Response()->json(['error'=>$validator->errors()],401);
        }
        $echo = $this->condition_paid($request->studant_id, $request->paid);
        if (!$echo) {
            return Response()->json(['error'=>'الرسوم المدخلة اكبر من الرسوم المتبقية'],401);
        } else {
            $fnince = new Fnince();
            $fnince->studant_id  = $request->studant_id;
            $fnince->paid        = $request->paid;
            $fnince->user_id     = Auth::user()->id;
            
            $save_fnince = $fnince->save();
            if ($save_fnince) {
                    session()->flash('alert-success', 'تم الحفظ بنجاح !');
            }else{
                session()->flash('alert-warning', ' لم يتم الحفظ !');
            }   
            return redirect('/fnince/'.$request->studant_id);
        }
        
    }

    public function details($fnince_id){
        $fnince  = $this->one_fnince($fnince_id);
        $studant = $this->find_studant($fnince->studant_id);
        $section = $this->find_section($studant->section_id);
        $type    = $this->find_type($section->type_id);
        $types   = $this->all_types();
        $arr = array('types'=>$types ,'type'=>$type ,'studant'=>$studant ,'fnince'=>$fnince ,'section'=>$section);
        
        return view('fnince.details',$arr);
    }

    









    public function condition_paid($studant_id , $paid){
        $studant = $this->find_studant($studant_id);
        $result  = $this->result_fnince($studant_id);
        $section = $this->find_section($studant->section_id);
        $all_paid = $result + $paid;
        if ($all_paid > $section->salary) {
            return false;
        } else {
            return true;
        }
        
    }


    public function result_fnince($studant_id){
        $fninces  = $this->find_fnince($studant_id);
        $res = 0;
        foreach ($fninces as $key => $fnince) {
            $res = $res + $fnince->paid;
        }
        return $res;
    }

    public function all_types(){
        $types = Type::all();
        return $types;
    }

    public function find_studant($studant_id){
        $studant = Studant::find($studant_id);
        return $studant;
    }

	public function find_fnince($studant_id){
        $fnince = Fnince::where('studant_id',$studant_id)->get();
        return $fnince;
    }    

    public function find_section($section_id){
        $section = Section::find($section_id);
        return $section;
    }

     public function find_type($type_id){
        $type = Type::find($type_id);
        return $type;
    }

    public function one_fnince($fnince_id){
        $fnince = Fnince::find($fnince_id);
        return $fnince;
    }
    
}
