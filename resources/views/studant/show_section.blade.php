@extends('layouts.app')
 
@section('page_name','الطلاب')
@section('content')

	<div class="flash-message" dir="rtl">
    	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    	  	@if(Session::has('alert-' . $msg))
      			<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      		@endif
    	@endforeach
  	</div> <!-- end .flash-message -->

  	<div class="content" dir="rtl">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title font-style"> {{$section->name}} <div class="pull-left"> <a href="/add_studant/{{$section->id}}"><i class="pe-7s-add-user"></i></a></div></h4>
                            <!-- <p class="category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th class="text-right">ID</th>
                                	<th class="text-right">الاسم</th>
                                	<th class="text-right">العنوان </th>
                                	<th class="text-right">رقم الهاتف</th>
                                    <th class="text-right">تاريخ التسجيل</th>
                                    <th class="text-right">سجل بواسطة</th>
                                    <th class="text-right hidden-print">تعديل</th>
                                    <th class="text-right hidden-print">الرسوم</th>
                                	<th class="text-right hidden-print">حذف</th>
                                </thead>
                                <tbody>
                                	@foreach($studants as $key =>$studant)
                                        <tr>
                                        	<td>{{$loop->iteration}}</td>
                                            <td>{{$studant['name']}}</td>
                                            <td>{{$studant['address']}}</td>
                                        	<td>{{$studant['phone']}}</td>
                                            <td>{{$studant['date']}}</td>
                                            <td>{{$studant['user_name']}}</td>
                                            <td class="hidden-print"><a href="/edit_studant/{{$studant['id']}}/{{$section->id}}"><button class="btn btn-warning"><i class="pe-7s-config"></i></button></a></td> 
                                            <td class="hidden-print"><a href="/fnince/{{$studant['id']}}"><button class="btn btn-success"><i class="pe-7s-cash"></i></button></a></td>
                                        	<td class="hidden-print"><a href="/delete_student/{{$studant['id']}}"><button class="btn btn-danger"><i class="pe-7s-close"></i></button></a></td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection