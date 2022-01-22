@extends('layouts.app')
 
@section('page_name','المجموعات')
@section('content')


<div class="content" dir="rtl">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="header">
                        <h4 class="title font-style">اضافة مجموعة</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/add_section" >
                        	{{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>اسم الكورس</label>
                                        <input type="text" class="form-control" disabled placeholder="Company" value="{{$type->name}}">
                                        <input type="hidden" name="type_id" value="{{$type->id}}">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label>اسم المجموعه</label>
                                        <input type="text" name="name" class="form-control" placeholder="المجموعة" required=""  >
                                    </div>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label>الرسوم الدراسية</label>
                                        <input type="text" name="salary" class="form-control" placeholder="الرسوم الدراسية" required="" >
                                    </div>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label>بداية التسجيل</label>
                                        <input type="date" name="date" class="form-control" placeholder="بداية التسجيل"  required="">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">بداية الدراسة</label>
                                        <input type="date" name="started" class="form-control" placeholder="بداية الدراسة" >
                                    </div>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">نهاية الدراسة</label>
                                        <input type="date" name="ended" class="form-control" placeholder="نهاية الدراسة" >
                                    </div>
                                </div>
                            </div>

                           

                            

                        
                            <!-- <input type="submit" name="" value="اضافة"> -->
                            <button type="submit" class="btn btn-info btn-fill pull-right">اضافة</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>

@endsection