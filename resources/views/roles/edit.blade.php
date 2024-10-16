@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Profile Update'])
    @include('partials.head-css')
@endsection

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">الصلاحيات</h5>
                            <p class="card-title-desc">الصلاحيات</p>
                            <form class="form-horizontal" action="{{ route('roles.update',$role->id) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <fieldset class="content-group">
                                    <legend class="text-bold"></legend>
                                    <div class="col-lg-12">




                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label for="profile-ar[title]" class="control-label col-lg-2">اسم الصلاحيه</label>
                                                <div class="col-lg-10" id="cp2" style="border: none">
                                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                        type="text" name="name" value="{{ $role->name }}"
                                                        required>


                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label for="profile-services" class="control-label col-lg-2"> الصلاحيات</label>
                                                <div class="col-lg-10">
                                                    <ul id="treeview1">
                                                        <th><input name="select_all" id="delete_all" type="checkbox" onclick="CheckAll('box1', this)" /></th>

                                                        @foreach($permission as $value)
                                                            <br>
                                                            <label
                                                                style="font-size: 16px;">

                                                                <td><input id="cat-box" type="checkbox" name="permission[]" value="{{$value->id}}" class="box1" ></td>

                                                                {{ $value->name }}
                                                            </label>
                                                        @endforeach


                                                </ul>
                                                    <span
                                                        class="select2 select2-container select2-container--default select2-container--below"
                                                        dir="rtl" style="width: 100%;">
                                                        <span class="selection"><span
                                                                class="select2-selection select2-selection--single" role="combobox"
                                                                aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                                aria-labelledby="select2-profile-services-container">
                                                                <span class="select2-selection__rendered"
                                                                    id="select2-profile-services-container" title=""></span><span
                                                                    class="select2-selection__arrow" role="presentation"><b
                                                                        role="presentation"></b>
                                                                </span></span></span><span class="dropdown-wrapper" aria-hidden="true">
                                                        </span></span>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="clearfix"></div>
                                        <hr />
                                        <div class="text-right">

                                            <button type="submit" class="btn btn-primary">
                                                حفظ
                                                <i class="icon-arrow-left13 position-right"></i>
                                            </button>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function previewImage(event) {
        const previewContainer = document.getElementById('imagePreviewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewContainer.style.display = 'block'; // Show the preview container
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none'; // Hide the preview if no file is selected
        }
    }

    // Prepopulate image preview if the user already has an image
    document.addEventListener('DOMContentLoaded', function() {
        const userImage = "{{ auth()->user()->image_url }}"; // Ensure this holds the correct image path
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const imagePreview = document.getElementById('imagePreview');

        if (userImage) {
            imagePreview.src = userImage;
            imagePreviewContainer.style.display = 'block'; // Show the preview container
        } else {
            imagePreviewContainer.style.display = 'none'; // Hide the container if no image exists
        }
    });
</script>
@endsection
<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>

@endsection
