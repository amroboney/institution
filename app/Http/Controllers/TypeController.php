<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Type;
use Validator;
class TypeController extends Controller
{
   
    public function show_section($type_id){
    	$types = $this->all_types();
    	$type = $this->one_types($type_id);
    	$sections = $this->show_section_by_id($type_id);
    	$arr = array('types' => $types ,'type' => $type ,'sections' => $sections);
    	return view('type.show_all',$arr);
    }

    public function add_post(Request $request){
        $validator = Validator::make($request->all(),[
        'name'   =>'required',
        ]);

        if ($validator->fails()) {
            return Response()->json(['error'=>$validator->errors()],401);
        }
        $type = new Type();
        $type->name  = $request->name;
        $save_type      = $type->save();
        if ($save_type) {
                session()->flash('alert-success', 'تم الحفظ بنجاح !');
        }else{
            session()->flash('alert-warning', ' لم يتم الحفظ !');
        }   
        return redirect('/home');
    }





     public function show_section_by_id ($type_id){
        $sections = Section::where('type_id',$type_id)->get();
        return $sections;
    }

    public function all_types(){
        $types = Type::all();
        return $types;
    }

    public function one_types($type_id){
        $type = Type::find($type_id);
        return $type;
    }
    
}
