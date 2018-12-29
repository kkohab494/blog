@extends('admin.master')
@section('title', 'Dashboard')
@push('css')
    {{-- expr --}}
@endpush
@section('content')

@endsection
@push('js')
<section class="content">
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EDIT TAG
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.tag.update', $tags->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="name">TAG NAME</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" value="{{ $tags->name }}" class="form-control" placeholder="Enter Your Tag Name">
                                </div>
                            </div>
                            <br>
                            <a href="{{ route('admin.tag.index') }}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                            <button type="submit" class="btn btn-success m-t-15 waves-effect"> UPDATE </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
</section>
@endpush