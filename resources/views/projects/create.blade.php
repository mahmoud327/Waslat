@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Add Project'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('lang.Add Project')</h5>
                                <p class="card-title-desc">Enter the details of the new property.</p>

                                <!-- Nav tabs -->



                                <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-6">
                                        <label for="bannerImage" class="form-label">@lang('lang.Image')</label>
                                        <input type="file" class="form-control" id="bannerImage" name="image"
                                            onchange="previewImage(event)" required>
                                        <img id="imagePreview" alt="Banner Image Preview" class="img-thumbnail mt-2"
                                            style="display: none;" width="100">
                                    </div>

                                    <div class="mb-3">
                                        <label for="bannerTitleEn" class="form-label">@lang('lang.Title (EN)')</label>
                                        <input type="text" class="form-control" id="bannerTitleEn" name="title_en"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bannerTitleAr" class="form-label">@lang('lang.Title (AR)')</label>
                                        <input type="text" class="form-control" id="bannerTitleAr" name="title_ar"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bannerDescriptionEn" class="form-label">@lang('lang.Description (EN)')</label>
                                        <textarea class="form-control" id="bannerDescriptionEn" name="description_en" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bannerDescriptionAr" class="form-label">@lang('lang.Description (AR)')</label>
                                        <textarea class="form-control" id="bannerDescriptionAr" name="description_ar" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="bannerDescriptionAr" class="form-label">@lang('lang.Pdf')</label>
                                        <input  type="file" name="plan" required></input>
                                    </div>


                                    <div class="dropzone" id="salonImageDropzone">
                                        <div class="dz-message needsclick text-center">
                                            <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                            <h4>Drop files here or click to upload</h4>
                                        </div>
                                    </div>

                                    <input type="hidden" id="uploadedImages" name="uploaded_images" value="[]">

                                    {{-- <div class="mb-3">
                                        <label for="bannerImage" class="form-label">@lang('lang.Image')</label>
                                        <input type="file" class="form-control" id="bannerImage{{ $banner->id }}"
                                            name="image" onchange="previewImage(event, {{ $banner->id }})">
                                    </div> --}}

                                    <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        // Initialize Quill editor for descriptions
        var quillEn = new Quill('#descriptionEn', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['link', 'image'],
                ]
            }
        });

        var quillAr = new Quill('#descriptionAr', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['link', 'image'],
                ]
            }
        });
    </script>
    <!-- Dropzone for image upload -->
    <script>
        function previewImage(event, bannerId = null) {
            var reader = new FileReader();
            reader.onload = function() {
                var outputId = bannerId ? 'imagePreview' + bannerId : 'imagePreview';
                var output = document.getElementById(outputId);
                output.src = reader.result;
                output.style.display = 'block'; // Show the image when file is selected
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        let uploadedImagePaths = []; // لتخزين مسارات الصور

        const salonImageDropzone = new Dropzone("#salonImageDropzone", {
            url: "{{ route('projects.uploadImages') }}",
            paramName: "images",
            maxFilesize: 2, // Max file size in MB
            acceptedFiles: "image/*",
            uploadMultiple: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function() {
                this.on("success", function(file, response) {
                    // حفظ مسارات الصور المرفوعة في المصفوفة
                    uploadedImagePaths = uploadedImagePaths.concat(response.paths);
                    console.log(uploadedImagePaths);


                    // تحديث الحقل المخفي داخل الفورم لإرسال المسارات
                    document.getElementById('uploadedImages').value = JSON.stringify(
                        uploadedImagePaths);
                });

                this.on("error", function(file, errorMessage) {
                    console.error("Upload error:", errorMessage);
                });

                this.on("removedfile", function(file) {
                    // إزالة مسار الصورة المحذوفة من المصفوفة
                    const index = uploadedImagePaths.indexOf(file.name);
                    if (index !== -1) {
                        uploadedImagePaths.splice(index, 1);
                    }
                    document.getElementById('uploadedImages').value = JSON.stringify(
                        uploadedImagePaths);
                });
            }
        });
    </script>
@endpush
