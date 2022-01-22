<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Section;
use App\Studant;
use App\Fnince;
use Yajra\Datatables\Datatables;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $types    = $this->all_types();
        $arr = array('types' =>$types);
        return view('home',$arr);
    }

    public function get_studant(){
        $stu= [];
        $types    = $this->all_types();
        $studants = $this->all_studants();
        $sections = "";
        // $stu['paid']= 0;
        foreach ($studants as $key => $studant) {
            $stu['paid']= 0;
            $stu['id']          = $studant->id;
            $stu['name']        = $studant->name;
            $stu['address']     = $studant->address;
            $stu['phone']       = $studant->phone;
            $stu['date']        = $studant->date;
            $section = $this->find_section($studant->section_id);
            $stu['section']     = $section->name;
            $stu['salary']     = $section->salary;
            $type   = $this->find_type($section->type_id);
            $stu['type']        = $type->name;
            $fninces  = $this->find_fninces($studant->id);
            if ($fninces != null) {
                foreach ($fninces as $key => $fnince) {
                    $stu['paid'] += $fnince->paid;
                }

            }else{
                $stu['paid'] = 0;
            }
            $stu['remainder'] = $stu['salary'] - $stu['paid'] ;
            

            $stus[] = $stu;
        }
        // $active   = $this->active();
        // $unactive = $this->unactive();
        // $arr = array('types' =>$types,'stus'=>$stus);
       return DataTables::of($stus)->addColumn('action', function ($stu) {
                return '<a href="/fnince/'.$stu['id'].'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> الرسوم</a>';
            })->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }





    public function all_types(){
        $types = Type::all();
        return $types;
    }

    public function all_studants(){
        $studants = Studant::all();
        return $studants;
    }

    public function all_sections(){
        $section = Section::all();
        return $section;
    }

    public function find_sections($type_id){
        $sections = Section::where('type_id',$type_id)->get();
        return $sections;
    }

    public function find_section($section_id){
        $section = Section::find($section_id);
        return $section;
    }    

    public function find_type($type_id){
        $type = Type::find($type_id);
        return  $type;
    }

    public function find_studant_by_section($section_id){
        $studants = Studant::where('section_id',$section_id)->get();
        return $studants;
    }

    public function find_section_by_active($active){
        $sections = Section::where('active',$active)->get();
        return $sections;
    }

    public function find_fninces($studant_id){
        $fninces = Fnince::where('studant_id',$studant_id)->get();   
        return $fninces;
    }
    public function active(){
        $active = $this->find_section_by_active(0);
        return $active;
    }

    public function unactive(){
        $unactive = $this->find_section_by_active(1);
        return $unactive;
    }

    public function about(){
        // $about = [];
        $types = Type::all();
        foreach ($types as $key => $type) {
            $about[$type->name] = $type->name;
            $sections = Section::where('type_id', $type->id)->where('active',0)->get();
            foreach ($sections as $key => $section) {
                // $about[$type->id] = $section->name;
                $i = 1; 
                $studants = Studant::where('section_id',$section->id)->get();
                foreach ($studants as $key => $studant) {
                    $about[] = $i++;
                }
            }
            // $about[$type->name] = $type->name;  
        }
        $abouts[] = $about;
        
        return $abouts;
    }

}
