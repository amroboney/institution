<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Studant;
use App\Type;
use App\User;
use Validator;
use Auth;
 
class StudantController extends Controller
{
    public function show_by_section($section_id){
    	$section  = $this->find_section($section_id);
    	$types    = $this->all_types();
    	$studants = $this->studant_with_user($section_id);
    	$arr = array('section' => $section,'types'=>$types ,'studants'=>$studants );
    	return view('studant.show_section',$arr);
    }

    public function studant_with_user($section_id){
        $stu  =[];
        $stus =[];
        $studants = $this->studant($section_id);
        if (!$studants) {
            $stu['id']          = "";
            $stu['name']        = "";
            $stu['address']     = "";
            $stu['date']        = "";
            $stu['phone']       = "";
            $stu['user_name']   = "";
            $stus[] = $stu;
        }else{
            foreach ($studants as $key => $studant) {
                $user = User::find($studant->user_id);
                $stu['id']          = $studant->id;
                $stu['name']        = $studant->name;
                $stu['address']     = $studant->address;
                $stu['date']        = $studant->date;
                $stu['phone']       = $studant->phone;
                $stu['user_name']   = $user->name;
                $stus[] = $stu;
            }
        }
        return $stus;
    }

    public function add($section_id){
        $type_id  = $this->get_type_id($section_id);
        $section  = $this->find_section($section_id);
        $type     = $this->find_type($type_id);
        $types    = $this->all_types();
        $arr = array('section' => $section,'types'=>$types ,'type'=>$type);
        // dd($arr);
        return view('studant.add',$arr);
    }

    public function add_post(Request $request){
        $validator = Validator::make($request->all(),[
        'section_id'   =>'required',
        'name'      =>'required',
        'date'      =>'required',
        'phone'     =>'required',
        'address'   =>'required',
        ]);

        if ($validator->fails()) {
            return Response()->json(['error'=>$validator->errors()],401);
        }
        $studant = new Studant();
        $studant->section_id    = $request->section_id;
        $studant->name          = $request->name;
        $studant->address       = $request->address;
        $studant->phone         = $request->phone;     
        $studant->date          = $request->date;
        $studant->user_id       = Auth::user()->id;
        $save_studant = $studant->save();
        if ($save_studant) {
                session()->flash('alert-success', 'تم الحفظ بنجاح !');
        }else{
            session()->flash('alert-warning', ' لم يتم الحفظ !');
        }   
        return redirect('/show_student/'.$request->section_id);
    }

    public function delete($studant_id){

        $studant = $this->find_studant($studant_id);
        $delete_studant = $studant->delete();
        if ($delete_studant) {
                session()->flash('alert-success', 'تم الحذف بنجاح !');
        }else{
            session()->flash('alert-warning', ' لم يتم الحفظ !');
        }   
        return redirect('/show_student/'.$request->section_id);
    }

    public function edit($studant_id, $section_id){
        $type_id  = $this->get_type_id($section_id);
        $sections = $this->sections($type_id);
        $studant  = $this->find_studant($studant_id);
        $type     = $this->find_type($type_id);
        $types    = $this->all_types();
        $arr = array('studant' => $studant,'sections' => $sections,'types'=>$types ,'type'=>$type);
        return view('studant.edit',$arr);
    }

    public function edit_post(Request $request){
        $validator = Validator::make($request->all(),[
        'section_id'   =>'required',
        'name'      =>'required',
        'date'      =>'required',
        'phone'     =>'required',
        'address'   =>'required',
        ]);

        if ($validator->fails()) {
            return Response()->json(['error'=>$validator->errors()],401);
        }
        $studant = Studant::find($request->studant_id);
        $studant->section_id    = $request->section_id;
        $studant->name          = $request->name;
        $studant->address       = $request->address;
        $studant->phone         = $request->phone;     
        $studant->date          = $request->date;
        $studant->user_id       = Auth::user()->id;
        $update_studant = $studant->update();
        if ($update_studant) {
                session()->flash('alert-success', 'تم التعديل بنجاح !');
        }else{
            session()->flash('alert-warning', ' لم يتم التعديل !');
        }   
        return redirect('/show_student/'.$request->section_id);
    }

    public function delete_stu($studant_id){
        $studant = $this->find_studant($studant_id);
        $delete_studant = $studant->delete();
        if ($delete_studant) {
                session()->flash('alert-success', 'تم الحذف بنجاح !');
        }else{
            session()->flash('alert-warning', ' لم يتم الحذف !');
        }   
        return redirect('/show_student/'.$studant->section_id);
    }

    














    public function remote_section($type_id){
        $sections = $this->sections($type_id);
        $arr = array('sections' => $sections );
        return view('studant.remote',$arr);
    }

    public function all_types(){
        $types = Type::all();
        return $types;
    }

    public function find_section($section_id){
        $section = Section::find($section_id);
        return $section;
    }

    public function sections($type_id){
        $sections = Section::where('type_id',$type_id)->get();
        return $sections;
    }

    public function get_type_id($section_id){
        $section = Section::find($section_id);
        return $section->type_id;
    }

    public function find_type($type_id){
        $type = Type::find($type_id);
        return $type;
    }

    public function studant($section_id){
        $studants = Studant::where('section_id',$section_id)->get();
        return $studants;
    }

    public function find_studant($studant_id){
        $studant = Studant::find($studant_id);
        return $studant;
    }
}
