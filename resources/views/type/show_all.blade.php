@extends('layouts.app')
 
@section('page_name','المجموعات')
@section('active','active')
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
                                <h4 class="title font-style">المجموعات الخاصة ب {{$type->name}} <div class="pull-left"> <a href="/add_section/{{$type->id}}"><i class="pe-7s-plus"></i></a></div></h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th class="text-right">ID</th>
                                        <th class="text-right">المجموعة</th>
                                    	<th class="text-right">الرسوم</th>
                                    	<th class="text-right">بداية التسجيل</th>
                                        <th class="text-right">بداية الدورة</th>
                                    	<th class="text-right">نهاية الدورة</th>
                                        <th class="text-right">التفاصيل</th>
                                        <th class="text-right">تعديل</th>
                                    	<th class="text-right">نشطه</th>
                                    	<th class="text-right">حذف</th>
                                    </thead>
                                    <tbody>
                                    	@foreach($sections as $key =>$section)
	                                        <tr>
	                                        	<td>{{$loop->iteration}}</td>
                                                <td>{{$section->name}}</td>
	                                        	<td>{{$section->salary}}</td>
	                                        	<td>{{$section->date}}</td>
                                                <td>{{$section->started}}</td>
	                                        	<td>{{$section->ended}}</td>
                                                <td><a href="/show_student/{{$section->id}}"><button class="btn btn-success"><i class="pe-7s-users"></i></button></a></td>
                                                <td><a href="/edit_section/{{$section->id}}"><button class="btn btn-warning"><i class="pe-7s-config"></i></button></a></td>
                                                <td> <?php if ($section->active == 1) {
                                                echo '<button class="btn btn-info" disabled=""><i class="pe-7s-power" ></i></button>';
                                                }else{
                                                    echo '<a href="/active/'.$section->id.'" > <button class="btn btn-info" ><i class="pe-7s-play"></i></button></a>';
                                                }
                                                ?> </td>  
                                                <td><a id="delete"  ><button class="btn btn-danger"><i class="pe-7s-close"></i></button></a></td>	
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



        <script type="text/javascript">
        	$(document).ready(function(){
	        	$(document).on("click", '#delete', function(event) {
	                // var order_id = $(this).attr("value");
	                swal({
					  title: 'هل تريد حذف المجموعه ؟',
					  text: "You won't be able to revert this!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					  if (result.value) {
					    swal(
					      'Deleted!',
					      'Your file has been deleted.',
					      'success'
					    )
					  }
					}).catch(swal.noop);
	          	});
	        });
        	

        </script>

        
@endsection
