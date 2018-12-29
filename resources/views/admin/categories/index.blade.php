@extends('admin.master')
@section('title', 'Dashboard')
@push('css')
       <link href="{{ asset('assets/backend') }}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="header">
            <h1><a href="{{ route('admin.category.create') }}" class="btn btn-success m-t-15 waves-effect">
                <i class="material-icons">add</i>
                <span>ADD NEW CATEGORY</span>
            </a></h1>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TAGS LIST <button class="btn btn-lg btn-success m-t-15 waves-effect">{{ $categories->count() }}</button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th class="text-center"> # </th>
                                        <th class="text-center"> CATEGORY NAME </th>
                                        <th class="text-center"> TOTAL POST </th>
                                        <th class="text-center"> Image </th>
                                        <th class="text-center"> Actions </th>
                                        <th class="text-center"> Crated Date </th>
                                        <th class="text-center"> Last Updated Date </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center"> # </th>
                                        <th class="text-center"> CATEGORY NAME </th>
                                        <th class="text-center"> TOTAL POST </th>
                                        <th class="text-center"> Image </th>
                                        <th class="text-center"> Actions </th>
                                        <th class="text-center"> Crated Date </th>
                                        <th class="text-center"> Last Updated Date </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($categories as $key=>$category)
                                        <tr>
                                        <td class="text-center"> {{ $key + 1 }} </td>
                                        <td> {{ $category->name }} </td>
                                        <td> {{ $category->posts->count() }} </td>
                                        <td><img src="{{asset('storage/category/'.$category->image)}}" width="100" height="60"></td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-success waves-effect"><i class="material-icons">edit</i></a>
                                            <button onclick="deleteFrom({{$category->id}})" class="btn btn-danger waves-effect"><i class="material-icons">delete</i></button>
                                            <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                
                                            </form>
                                        </td>
                                        <td class="text-center">{{ $category->created_at}}</dh>
                                        <td class="text-center">{{ $category->updated_at}}</dh>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
</section>
@endsection
@push('js')
   <!-- Jquery Core Js -->
    <script src="{{ asset('assets/backend') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets/backend') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('assets/backend') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets/backend') }}/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/backend') }}/js/admin.js"></script>
    <script src="{{ asset('assets/backend') }}/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="{{ asset('assets/backend') }}/js/demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function deleteFrom(id){
            swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                  } else {
                    swal("Your imaginary file is safe!");
                  }
                });
        }
    </script>

@endpush