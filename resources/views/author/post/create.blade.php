@extends('admin.master')
@section('title', 'Category')
@push('css')
<!-- Multi Select Css -->
    <link href="{{ asset('assets/backend') }}/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <form action="{{ route('author.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Post
                            </h2>
                        </div>
                        <div class="body">
                            <label for="category_name">Post Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="title" class="form-control" placeholder="Enter Your Post Title">
                                </div>
                            </div>
                            <label for="image">Fuature Image</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <input type="checkbox" name="status" value="1" id="md_checkbox_30" class="filled-in chk-col-green">
                            <label for="md_checkbox_30"> Publish</label>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> Category And Tags </h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <div class="form-line">
                                    <p><b>Select Category</b></p>
                                    <select class="form-control show-tick" name="categories[]" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                    <p><b>Select Tags</b></p>
                                    <select class="form-control show-tick" name="tags[]" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <a href="{{ route('author.post.index') }}" class="btn btn-danger waves-effect"> BACK </a>
                            <button type="submit" class="btn btn-success waves-effect"> Publish</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Post Description</h2>
                        </div>
                        <div class="body">
                            <textarea id="tinymce" name="body">
                                
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- #END# Vertical Layout -->
    </div>
</section>
@endsection
@push('js')
    <script src="{{ asset('assets/backend') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/multi-select/js/jquery.multi-select.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/tinymce/tinymce.js"></script>
    <script type="text/javascript">
        //TinyMCE
        tinymce.init({
            selector: "textarea#tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = '{{ asset('assets/backend') }}/plugins/tinymce';    
    </script>
@endpush
