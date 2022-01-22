@extends('layouts.app')
 
@section('page_name','الطلاب')
@section('content')


<div class="content" dir="rtl">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 pull-right">
                <div class="card">
                    <div class="header">
                        <h4 class="title font-style">تعديل الطالب</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/edit_studant">
                        	{{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="form-group">
                                        <label>الدورة التدريبية </label>
                                        <!-- <input type="text" class="form-control" disabled placeholder="Company" value="{{$type->name}}"> -->
                                        <select name="type" class="form-control">
                                            @foreach($types as $key =>$typ)
                                            <option <?php if($type->id == $typ->id) echo 'selected="selected"'; ?> value="{{$typ->id}}" >{{$typ->name}}</option>
                                            @endforeach
                                        </select>

                                        
                                        <input type="hidden" name="studant_id" value="{{$studant->id}}">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="form-group">
                                        <label>المجموعة </label>
                                        <!-- <input type="text" class="form-control" disabled placeholder="Company" value="{{$type->name}}"> -->
                                        <select name="section_id" id="section" class="form-control">
                                            @foreach($sections as $key =>$section)
                                            <option <?php if($section->id == $studant->section_id) echo 'selected="selected"'; ?> value="{{$section->id}}" >{{$section->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" name="name" class="form-control" placeholder="الاسم"  required="" value="{{$studant->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="form-group">
                                        <label>العنوان</label>
                                        <input type="text" name="address" class="form-control" placeholder="العنوان"  required="" value="{{$studant->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pull-right"></div>
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="number" name="phone" class="form-control" placeholder="رقم الهاتف"  required="" value="{{$studant->phone}}">
                                    </div>
                                </div>

                                <div class="col-md-4 col-md-offset-2 pull-right ">
                                    <div class="form-group">
                                        <label>تاريخ التسجيل</label>
                                        <input type="date" name="date" class="form-control" placeholder="تاريخ التسجسيل" required="" value="{{$studant->date}}">
                                    </div>
                                </div>
                            </div>
                         
                            

                            
                            <button type="submit" class="btn btn-info btn-fill pull-right">تعديل</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


    <script>
        //alert(1);
        $(document).ready(function(){
          $('select[name="type"]').change(function(){
            var type_id   = this.value;
           // alert(level_id);
              $.get("/remote_section/"+type_id , function(data, status){
                 $('#section').html(data) ;
              });
          });
        });
    </script>
@endsection