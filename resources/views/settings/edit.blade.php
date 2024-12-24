@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Terms and Conditions'])
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <div class="form-group col-lg-2">
                                    <select id="language-select" class="form-select">
                                        <option value="en" selected>English</option>
                                        <option value="ar">عربي</option>
                                    </select>
                                </div>

                                <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <!-- Hidden field to store the selected language -->
                                    <input type="hidden" name="selectedLanguage" id="selectedLanguage" value="en">

                                    <!-- Title Arabic -->
                                    <div class="form-group">
                                        <label for="title_ar">Project Title (Arabic)</label>
                                        <input type="text" class="form-control" name="title_ar" id="title_ar"
                                               value="{{ $setting->getTranslation('title', 'ar') }}" required>
                                    </div>

                                    <!-- Title English -->
                                    <div class="form-group">
                                        <label for="title_en">Project Title (English)</label>
                                        <input type="text" class="form-control" name="title_en" id="title_en"
                                               value="{{ $setting->getTranslation('title', 'en') }}" required>
                                    </div>

                                    <!-- Description Arabic -->
                                    <div class="form-group" id="description_ar" style="display: none;">
                                        <label for="description_ar_editor">وصف المشروع (عربي)</label>
                                        <div id="description_ar_editor" style="height: 200px;">
                                            {!! $setting->getTranslation('description', 'ar') !!}
                                        </div>
                                        <input type="hidden" name="description_ar" id="hidden_description_ar">
                                    </div>

                                    <!-- Description English -->
                                    <div class="form-group" id="description_en">
                                        <label for="description_en_editor">Project Description (English)</label>
                                        <div id="description_en_editor" style="height: 200px;">
                                            {!! $setting->getTranslation('description', 'en') !!}
                                        </div>
                                        <input type="hidden" name="description_en" id="hidden_description_en">
                                    </div>

                                    <!-- English About Us -->
                                    <div class="form-group" id="about_us_en">
                                        <label for="about_us_en_editor">About us (English)</label>
                                        <div id="about_us_en_editor" style="height: 300px;">
                                            {!! $setting->getTranslation('about_us', 'en') !!}
                                        </div>
                                        <input type="hidden" name="about_us_en" id="hidden_about_us_en">
                                    </div>

                                    <!-- Arabic About Us -->
                                    <div class="form-group" id="about_us_ar" style="display: none;">
                                        <label for="about_us_ar_editor">من نحن (عربي)</label>
                                        <div id="about_us_ar_editor" style="height: 300px;">
                                            {!! $setting->getTranslation('about_us', 'ar') !!}
                                        </div>
                                        <input type="hidden" name="about_us_ar" id="hidden_about_us_ar">
                                    </div>

                                    <!-- Other Fields -->
                                    <div class="form-group">
                                        <label for="email">{{ __('lang.Email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="{{ $setting->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{ __('lang.Phone') }}</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               value="{{ $setting->phone }}" required>
                                    </div>
                                    <!-- Add other fields as necessary -->

                                    <!-- Submit Button -->
                                    <button type="submit" id="save-content"
                                            class="btn btn-success mt-3">{{ __('lang.Save') }}</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Initialize Quill editors
        var quillEn = new Quill('#about_us_en_editor', { theme: 'snow' });
        var quillAr = new Quill('#about_us_ar_editor', { theme: 'snow' });
        var quillDescriptionEn = new Quill('#description_en_editor', { theme: 'snow' });
        var quillDescriptionAr = new Quill('#description_ar_editor', { theme: 'snow' });

        // Language toggle
        $('#language-select').change(function () {
            var lang = $(this).val();
            $('#selectedLanguage').val(lang);
            if (lang === 'ar') {
                $('#description_ar, #about_us_ar').show();
                $('#description_en, #about_us_en').hide();
            } else {
                $('#description_en, #about_us_en').show();
                $('#description_ar, #about_us_ar').hide();
            }
        });

        $('form').on('submit', function () {
            $('#hidden_about_us_en').val(quillEn.root.innerHTML);
            $('#hidden_about_us_ar').val(quillAr.root.innerHTML);
            $('#hidden_description_en').val(quillDescriptionEn.root.innerHTML);
            $('#hidden_description_ar').val(quillDescriptionAr.root.innerHTML);
        });
    </script>
@endpush
