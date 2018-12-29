@extends('admin.master')
@section('title', 'Category')
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
                            Add New Category
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="category_name">Category Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Category Name">
                                </div>
                            </div>
                            <label for="image">Category Image</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <br>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-danger m-t-15 waves-effect"> BACK </a>
                            <button type="submit" class="btn btn-lg btn-success m-t-15 waves-effect">SAVE </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
</section>
@endpush
