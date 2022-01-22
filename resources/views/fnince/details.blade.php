@extends('layouts.app')
 
@section('page_name','الطلاب')
@section('content')

<div class="col-md-12" dir="rtl">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card card-plain">
        <div class="header">
            <div class="row">
                <div class="col-md-3 col-xs-3"><img class="logo-fnince" src="/img/logo.png"></div>
                <div class="col-md-6 col-xs-6"><center>بسم الله الرحمن الرحيم<br><div class="name-header">مركز الكس لتدريب الحاسوب وتقنية المعلومات</div><br><div class="en-header">Alex Center for Computer Training and Information Technology</div></center></div>
                <div class="col-md-3 col-xs-3">{{-- <img class="logo-fnince" src="/img/logo.png"> --}}</div>
            </div>
            <br>
            
            <div>التاريخ / {{$fnince->created_at}}</div>
            <br>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <tr>
                        <th class="text-right">الاسم</th>
                        <td>{{$studant->name}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">الدورة التدريبية</th>
                        <td>{{$type->name}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">المبلغ</th>
                        <td>{{$fnince->paid}} جنية</td>
                    </tr>
                </table>
            </div>
            <div class="pull-left">التوقيع ....................</div> 
        </div>
    </div>
    <br>
    <hr>
    <br>

    <div class="card card-plain">
        <div class="header">
            <div class="row">
                <div class="col-md-3 col-xs-3"><img class="logo-fnince" src="/img/logo.png"></div>
                <div class="col-md-6 col-xs-6"><center>بسم الله الرحمن الرحيم<br><div class="name-header">مركز الكس لتدريب الحاسوب وتقنية المعلومات</div><br><div class="en-header">Alex Center for Computer Training and Information Technology</div></center></div>
                <div class="col-md-3 col-xs-3">{{-- <img class="logo-fnince" src="/img/logo.png"> --}}</div>
            </div>
            <br>
            
            <div>التاريخ / {{$fnince->created_at}}</div>
            <br>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <tr>
                        <th class="text-right">الاسم</th>
                        <td>{{$studant->name}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">الدورة التدريبية</th>
                        <td>{{$type->name}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">المبلغ</th>
                        <td>{{$fnince->paid}} جنية</td>
                    </tr>
                </table>
            </div>
            <div class="pull-left">التوقيع ....................</div> 
        </div>
    </div>
</div>

@endsection