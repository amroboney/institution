@extends('layouts.app')
 
@section('page_name','الطلاب')
@section('content')


<div class="content" dir="rtl">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 pull-right">
                <div class="card">
                    <div class="header">
                        <h4 class="title font-style">إضافة طالب</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/add_studant">
                        	{{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="form-group">
                                        <label>الدورة التدريبية </label>
                                        <input type="text" class="form-control" disabled placeholder="Company" value="{{$type->name}}">
                                        <input type="hidden" name="section_id" value="{{$section->id}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" name="name" class="form-control" placeholder="الاسم"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 ">
                                    <div class="form-group">
                                        <label>العنوان</label>
                                        <input type="text" name="address" class="form-control" placeholder="العنوان"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pull-right"></div>
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="number" name="phone" class="form-control" placeholder="رقم الهاتف"  required="">
                                    </div>
                                </div>

                                <div class="col-md-4 col-md-offset-2 pull-right ">
                                    <div class="form-group">
                                        <label>تاريخ التسجيل</label>
                                        <input type="date" name="date" class="form-control" placeholder="تاريخ التسجسيل" required="">
                                    </div>
                                </div>
                            </div>
                         
                            

                            
                            <button type="submit" class="btn btn-info btn-fill pull-right">إضافة</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection