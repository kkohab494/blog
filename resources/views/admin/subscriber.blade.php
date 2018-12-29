@extends('admin.master')
@section('title', 'Subscripber')
@push('css')
       <link href="{{ asset('assets/backend') }}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Subscriber List <button class="btn btn-lg btn-success m-t-15 waves-effect">{{ $subscribers->count() }}</button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th class="text-center"> # </th>
                                        <th class="text-center"> Email </th>
                                        <th class="text-center"> Subscription Date </th>
                                        <th class="text-center"> Actions </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center"> # </th>
                                        <th class="text-center"> Email </th>
                                        <th class="text-center"> Subscription Date </th>
                                        <th class="text-center"> Actions </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($subscribers as $key=>$subscriber)
                                        <tr>
                                        <td class="text-center"> {{ $key + 1 }} </td>
                                        <td> {{ $subscriber->email }} </td>
                                        <td> {{ $subscriber->created_at }} </td>
                                        <td class="text-center">
                                            <button onclick="deleteSubscriber({{$subscriber->id}})" class="btn btn-danger waves-effect"><i class="material-icons">delete</i></button>
                                            <form id="delete-form" action="{{ route('admin.subscriber.destroy', $subscriber->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                
                                            </form>
                                        </td>
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
        function deleteSubscriber(id){
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
                    document.getElementById('delete-form').submit();
                  } else {
                    swal("Your imaginary file is safe!");
                  }
                });
        }
    </script>

@endpush
