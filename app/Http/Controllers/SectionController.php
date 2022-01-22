<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Section;
use Validator;
class SectionController extends Controller
{
    public function add($type_id){
    	$types = $this->all_types();
    	$type  = $this->one_type($type_id);
    	$arr = array('types' => $types ,'type' => $type );
    	return view('section.add',$arr);
    }

    public function add_post(Request $request){
    	$validator = Validator::make($request->all(),[
        'type_id'   =>'required',
        'name'      =>'required',
        'date'      =>'required',
        // 'started'   =>'required',
        ]);

        if ($validator->fails()) {
            return Response()->json(['error'=>$validator->errors()],401);
        }
        $section = new Section();
        $section->type_id  =$request->type_id;
        $section->name     =$request->name;
        $section->date     =$request->date;
        $section->started  =$request->started;
        $section->ended    =$request->ended;
        $section->salary   =$request->salary;
        $save_section = $section->save();
        if ($save_section) {
    			session()->flash('alert-success', 'تم الحفظ بنجاح !');
    	}else{
    		session()->flash('alert-warning', ' لم يتم الحفظ !');
    	}	
	    return redirect('/type/'.$request->type_id);
    }

    public function edit($section_id){
        $section = $this->find_section($section_id);
        $types = $this->all_types();
        $type  = $this->one_type($section->type_id);

        $arr = array('section' =>$section,'types'=>$types,'type'=>$type );
        return view('section.edit',$arr);
    }

    public function edit_post(Request $request){
        $validator = Validator::make($request->all(),[
        'type_id'   =>'required',
        'name'      =>'required',
        'date'      =>'required',
        // 'started'   =>'required',
        ]);

        if ($validator->fails()) {
            return Response()->json(['error'=>$validator->errors()],401);
        }
        $section = Section::find($request->section_id);
        $section->type_id  =$request->type_id;
        $section->name     =$request->name;
        $section->date     =$request->date;
        $section->started  =$request->started;
        $section->ended    =$request->ended;  
        $section->salary   =$request->salary;
        $update_section = $section->update();
        if ($update_section) {
                session()->flash('alert-success', 'تم التعديل بنجاح !');
        }else{
            session()->flash('alert-warning', ' لم يتم التعديل !');
        }   
        return redirect('/type/'.$request->type_id);
    }

    public function active($section_id){
        $section = $this->find_section($section_id);
        $section->active = 1;
        $section->update();
        return redirect('/type/'.$section->type_id);
    }







    public function all_types(){
        $types = Type::all();
        return $types;
    }

    public function one_type($type_id){
        $type = Type::find($type_id);
        return $type;
    }

    public function find_section($section_id){
        $section = Section::find($section_id);
        return $section;
    }

}
