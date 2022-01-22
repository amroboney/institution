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
            <h4 class="title">{{$studant->name}}</h4>
            <p class="category">{{$type->name}} / {{$section->name}} </p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover"> 
            	@foreach($fninces as $fnince)
                    <tr>
                       <th class="text-right">القسط  {{$loop->iteration}}</th>
	                   <td>{{$fnince->paid}}</td>
                       <th class="text-right">تاريخ الدفع</th>
	                   <td>{{$fnince->created_at}}</td>
                       <th class="text-right hidden-print"><a href="/detials_fnince/{{$fnince->id}}" class= "btn-info" title="التفاصيل"><i class="pe-7s-note2"></i></a></th>
                       <td></td>
                    </tr>
            	@endforeach
                    <tr>
                        <th class="text-right">المجموع</th> 
                        <td>{{$result}}</td>
                        <th class="text-right">الرسوم الكلية</th>
                        <td>{{$section->salary}}</td>
                        <th class="text-right">المتبقي</th>
                        <td>{{$section->salary - $result}}</td>
                    </tr>     
            </table>

            <div class="content hidden-print" dir="rtl" >
    {{-- <div class="container-fluid"> --}}
        <div class="row">
            <div class="col-md-10 col-md-offset-1 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title font-style">دفع الرسوم</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/fnince">
                            {{ csrf_field() }}
                            
                            <div class="row">
                                <div class="col-md-8 pull-right ">
                                    <div class="form-group">
                                        <label>الرسوم الدراسية</label>
                                        <input type="number" name="paid" class="form-control" placeholder="الرسوم الدراسية"  required="" <?php if ($section->salary - $result == 0) {
                                            echo "disabled=''";
                                        }?> >
                                        <input type="hidden" name="studant_id" value="{{$studant->id}}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label></label>
                                        <button type="submit" class="btn btn-info btn-fill  form-control">دفع</button>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    {{-- </div> --}}
</div>

        </div>
    </div>
</div>

@endsection