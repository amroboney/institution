@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 " dir="rtl">
            <div class="panel panel-default"> 

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                        <div class="row">
                            <div class="col-md-12 " >
                                
                                    

                                    
                                <table class="table table-hover table-bordered table-striped datatable" style="width:100%" id="datatable">
                                    <thead>
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th class="text-right">الاسم</th>
                                            <th class="text-right">العنوان</th>
                                            <th class="text-right">رقم الهاتف</th>
                                            <th class="text-right">الدورة</th>
                                            <th class="text-right">المجموعه</th>
                                            <th class="text-right">تاريخ التسجيل</th>
                                            <th class="text-right">الرسوم</th>
                                            <th class="text-right">المدفوع</th>
                                            <th class="text-right">المتبقي</th>
                                            <th class="text-right">الرسوم</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                           <th class="text-right">الاسم</th>
                                            <th class="text-right">العنوان</th>
                                            <th class="text-right">رقم الهاتف</th>
                                            <th class="text-right">الدورة</th>
                                            <th class="text-right">المجموعه</th>
                                            <th class="text-right">تاريخ التسجيل</th>
                                            <th class="text-right">الرسوم</th>
                                            <th class="text-right">المدفوع</th>
                                            <th class="text-right">المتبقي</th>
                                            <th class="text-right">الرسوم</th> 
                                        </tr>
                                    </tfoot>
                                </table>
                                    
                               
                            </div>
                        </div>
                    


                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function(){
        // demo.initChartist();
        $.notify({
            icon: 'pe-7s-gift',
            message: " WELLCOME TO <b>ALIX</b> ."
        },{
            type: 'info',
            timer: 4000
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
    // $.fn.dataTable.ext.errMode = 'throw';
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("get_studant") }}',
        columns: [
            {data: 'name',    name: 'name'},
            {data: 'address', name: 'address'},
            {data: 'phone',   name: 'phone'},
            {data: 'type',    name: 'type'},
            {data: 'section', name: 'section'},
            {data: 'date',    name: 'date'},
            {data: 'salary',  name: 'salary'},
            {data: 'paid',    name: 'paid'},
            {data: 'remainder',name: 'remainder'},
            {data: 'action',  name: 'action', orderable: false, searchable: false}
            
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                input.style.cssText = 'width: 75px';
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
            });
        }
    });

});
</script>

@endsection
