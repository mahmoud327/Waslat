@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Add Real Estate'])
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
                                <h5 class="card-title">@lang('lang.Add Real Estate')</h5>
                                <p class="card-title-desc">Enter the details of the new property.</p>

                                <!-- Nav tabs -->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#basicInfo"
                                            role="tab">@lang('lang.Basic Info')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#prices"
                                            role="tab">@lang('lang.Prices')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#images"
                                            role="tab">@lang('lang.Images')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#videos"
                                            role="tab">@lang('lang.Videos')</a>
                                    </li>
                                </ul>


                                <form enctype="multipart/form-data"
                                    action="{{ route('auctions.update', $real_estate->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="tab-content pt-3">
                                        <!-- Basic Info Tab -->
                                        <div class="tab-pane active" id="basicInfo" role="tabpanel">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="bannerImage" class="form-label">@lang('lang.Image')</label>
                                                    <input type="file" class="form-control" id="bannerImage"
                                                        name="image" onchange="previewImage(event)">
                                                    <img id="imagePreview" alt="Banner Image Preview"
                                                        class="img-thumbnail mt-2" style="display: {{ $real_estate->getFirstMediaUrl('images') ? 'block' : 'none' }};"
                                                        src="{{ $real_estate->getFirstMediaUrl('images') }}"
                                                        width="100">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="realEstateNameEn" class="form-label">@lang('lang.Name EN')</label>
                                                    <input type="text" class="form-control" id="realEstateNameEn"
                                                        placeholder="Property Name (EN)" name="name_en"
                                                        value="{{ old('name_en', $real_estate->getTranslation('name', 'en')) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="realEstateNameAr" class="form-label">@lang('lang.Name AR')</label>
                                                    <input type="text" class="form-control" id="realEstateNameAr"
                                                        placeholder="اسم العقار" name="name_ar"
                                                        value="{{ old('name_ar', $real_estate->getTranslation('name', 'ar')) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="type" class="form-label">@lang('lang.Type')</label>
                                                    <select class="form-control" id="type" name="type" required>
                                                        <option value="rent" {{ $real_estate->type == 'rent' ? 'selected' : '' }}>
                                                            @lang('lang.Rent')</option>
                                                        <option value="sale" {{ $real_estate->type == 'sale' ? 'selected' : '' }}>
                                                            @lang('lang.Sale')</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="price" class="form-label">@lang('lang.Price')</label>
                                                    <input type="number" class="form-control" id="price"
                                                        placeholder="Price" name="price"
                                                        value="{{ old('price', $real_estate->price) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">@lang('lang.Phone')</label>
                                                    <input type="text" class="form-control" id="phone"
                                                        placeholder="Contact Phone" name="phone"
                                                        value="{{ old('phone', $real_estate->phone) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="numberOfRooms" class="form-label">@lang('lang.Number of Rooms')</label>
                                                    <input type="number" class="form-control" id="numberOfRooms"
                                                        placeholder="Number of Rooms" name="number_of_rooms"
                                                        value="{{ old('number_of_rooms', $real_estate->number_of_rooms) }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="bathrooms" class="form-label">@lang('lang.Bathrooms')</label>
                                                    <input type="number" class="form-control" id="bathrooms"
                                                        placeholder="Number of Bathrooms" name="bathrooms_of_rooms"
                                                        value="{{ old('bathrooms', $real_estate->bathrooms_of_rooms) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="landArea" class="form-label">@lang('lang.Land Area')</label>
                                                    <input type="number" class="form-control" id="landArea"
                                                        placeholder="Land Area (sq ft)" name="land_area"
                                                        value="{{ old('land_area', $real_estate->land_area) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="city" class="form-label">@lang('lang.City')</label>
                                                    <select class="form-control" id="city" name="city_id" required>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}" {{ $real_estate->city_id == $city->id ? 'selected' : '' }}>
                                                                {{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="features" class="form-label">@lang('lang.Features')</label>
                                                    <select class="form-control" id="features" name="features[]"
                                                        multiple>
                                                        @foreach ($features as $feature)
                                                            <option value="{{ $feature->id }}" {{ $real_estate->features->contains($feature->id) ? 'selected' : '' }}>
                                                                {{ $feature->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="form-text text-muted">Hold down the Ctrl (Windows) or
                                                        Command (Mac) button to select multiple options.</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="category" class="form-label">@lang('lang.Category')</label>
                                                    <select class="form-control" id="category" name="category_id"
                                                        required>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $real_estate->category_id == $category->id ? 'selected' : '' }}>
                                                                {{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="descriptionEn" class="form-label">@lang('lang.Description EN')</label>
                                                <textarea class="form-control" id="descriptionEn" name="description_en">{{ old('description_en', $real_estate->getTranslation('description', 'en')) }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="descriptionAr" class="form-label">@lang('lang.Description AR')</label>
                                                <textarea class="form-control" id="descriptionAr" name="description_ar">{{ old('description_ar', $real_estate->getTranslation('description', 'ar')) }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Videos Tab -->
                                        <div class="tab-pane" id="videos" role="tabpanel">
                                            <div class="form-group">
                                                <label for="videoLinks">@lang('lang.Upload Videos Links')</label>
                                                <div id="videoLinksContainer">
                                                    <div class="video-links">
                                                            <div class="video-link-group mb-2">
                                                                <input type="text" class="form-control" placeholder="Enter video link" name="videos[]" value="">
                                                                <button type="button" class="btn btn-danger remove-video-link" style="margin-top: 5px;">-</button>
                                                            </div>
                                                    </div>


                                                </div>
                                                <button type="button"
                                                    class="btn btn-primary add-video-link mt-2">+</button>
                                                <small class="form-text text-muted">You can add multiple links separated by
                                                    commas.</small>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="prices" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="whatsup" class="form-label">@lang('lang.WhatsApp')</label>
                                                    <input type="text" class="form-control" id="whatsup" placeholder="WhatsApp Number"
                                                           name="whatsup" value="{{ $real_estate->whatsup }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">@lang('lang.Email')</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                                           name="email" value="{{$real_estate->email}}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="marketerName" class="form-label">@lang('lang.Marketer Name')</label>
                                                    <input type="text" class="form-control" id="marketerName" placeholder="Marketer Name"
                                                           name="marketer_name" value="{{  $real_estate->marketer_name }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="licenseNumber" class="form-label">@lang('lang.License Number')</label>
                                                    <input type="text" class="form-control" id="licenseNumber" placeholder="License Number"
                                                           name="license_number" value="{{$real_estate->license_number }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Images Tab -->
                                        <div class="tab-pane" id="images" role="tabpanel">
                                            <div class="form-group">
                                                <label for="realEstateImages">@lang('lang.Upload Images')</label>
                                                <div class="dropzone" id="realEstateImageDropzone">
                                                    <div class="dz-message needsclick text-center">
                                                        <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                                        <h4>Drop files here or click to upload</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="uploadedImages" name="uploaded_images"
                                                value="[]">
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                                    </div>
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

    <script>
        // Dropzone with preloaded images
        const initDropzone = () => {
            const dropzone = new Dropzone("#realEstateImageDropzone", {
                url: "{{ route('realestates.uploadImages') }}",
                paramName: "uploaded_images",
                maxFilesize: 2,
                acceptedFiles: "image/*",
                uploadMultiple: true,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                init: function() {
                    let existingImages = @json($real_estate->getMedia('images')->map->getUrl());

                    existingImages.forEach((imageUrl) => {
                        let mockFile = {
                            name: "Existing Image",
                            size: 12345
                        };
                        this.emit("addedfile", mockFile);
                        this.emit("thumbnail", mockFile, imageUrl);
                        this.emit("complete", mockFile);
                        this.files.push(mockFile);
                    });
                }
            });
        };
        initDropzone();

        // Handle video links dynamically
        $(document).on('click', '.add-video-link', () => {
            $('#videoLinksContainer').append(
                `<div class="video-link-group mb-2"><input type="text" class="form-control" placeholder="Enter video link" name="videos[]"><button type="button" class="btn btn-danger remove-video-link" style="margin-top: 5px;">-</button></div>`
            );
        });
        $(document).on('click', '.remove-video-link', (e) => {
            $(e.currentTarget).closest('.video-link-group').remove();
        });

        // Image preview
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('imagePreview');
                preview.style.display = 'block';
                preview.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
