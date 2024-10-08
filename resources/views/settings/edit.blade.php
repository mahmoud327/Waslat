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

                                <form method="post" action="{{ route('settings.update') }}">
                                    @method('put')
                                    @csrf

                                    <!-- Hidden field to store the selected language -->
                                    <input type="hidden" name="selectedLanguage" id="selectedLanguage" value="en">

                                    <!-- English about_us Editor -->
                                    <div class="form-group" id="about_us_en">
                                        <label for="about_us_en_editor">About us (English)</label>
                                        <div id="about_us_en_editor" style="height: 300px;">
                                            {!! $setting->getTranslation('about_us', 'en') !!}
                                        </div>
                                        <input type="hidden" name="about_us_en" id="hidden_about_us_en">
                                    </div>

                                    <!-- Arabic about_us Editor (Hidden by default) -->
                                    <div class="form-group" id="about_us_ar" style="display: none;">
                                        <label for="about_us_ar_editor">من نحن (عربي)</label>
                                        <div id="about_us_ar_editor" style="height: 300px;">
                                            {!! $setting->getTranslation('about_us', 'ar') !!}
                                        </div>
                                        <input type="hidden" name="about_us_ar" id="hidden_about_us_ar">
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">{{ __('lang.Email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $setting->email }}" required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="phone">{{ __('lang.Phone') }}</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ $setting->phone }}" required>
                                    </div>

                                    <!-- Address (with translation) -->


                                    <div class="form-group" id="address" style="display: none;">
                                        <label for="address">{{ __('lang.Address') }} (عربي)</label>
                                        <input type="text" class="form-control"  value={{ $setting->address }} name="address">
                                    </div>

                                    <!-- Social Media Links -->
                                    <div class="form-group">
                                        <label for="fb_link">{{ __('lang.Facebook') }}</label>
                                        <input type="text" class="form-control" name="fb_link" id="fb_link"
                                            value="{{ $setting->fb_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tw_link">{{ __('lang.Twitter') }}</label>
                                        <input type="text" class="form-control" name="tw_link" id="tw_link"
                                            value="{{ $setting->tw_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin_link">{{ __('lang.LinkedIn') }}</label>
                                        <input type="text" class="form-control" name="linkedin_link" id="linkedin_link"
                                            value="{{ $setting->linkedin_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inst_link">{{ __('lang.Instagram') }}</label>
                                        <input type="text" class="form-control" name="inst_link" id="inst_link"
                                            value="{{ $setting->inst_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="whatsapp">{{ __('lang.WhatsApp') }}</label>
                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                            value="{{ $setting->whatsapp }}">
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" id="save-content"
                                        class="btn btn-success mt-3">{{ __('lang.Save') }}</button>
                                </form>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        @include('partials.footer')
    </div>
@endsection

@push('scripts')
    <!-- Include Quill's JavaScript -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        // Initialize Quill editors for both English and Arabic
        var quillEn = new Quill('#about_us_en_editor', {
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

        var quillAr = new Quill('#about_us_ar_editor', {
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

        // Language switching functionality
        $(document).ready(function() {
            $('#language-select').change(function() {
                var lang = $(this).val();

                // Update the hidden input value based on the selected language
                $('#selectedLanguage').val(lang);

                if (lang === 'ar') {
                    // Switch to Arabic: show Arabic fields and hide English fields
                    $('#about_us_ar').show();
                    $('#about_us_en').hide();
                } else {
                    // Switch to English: show English fields and hide Arabic fields
                    $('#about_us_en').show();
                    $('#about_us_ar').hide();
                }
            });

            // Initialize form with English about_us visible
            $('#about_us_en').show();
            $('#about_us_ar').hide();

            // Handle form submission to include Quill content
            $('form').on('submit', function() {
                // Get the HTML content of the Quill editors
                $('#hidden_about_us_en').val(quillEn.root.innerHTML);
                $('#hidden_about_us_ar').val(quillAr.root.innerHTML);
            });
        });
    </script>
@endpush
