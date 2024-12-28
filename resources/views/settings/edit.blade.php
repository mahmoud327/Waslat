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

                                                                            <!-- TikTok -->
                                        <div class="form-group">
                                            <label for="tiktok">{{ __('lang.TikTok') }}</label>
                                            <input type="text" class="form-control" name="tiktok" id="tiktok" value="{{ $setting->tiktok }}">
                                        </div>

                                        <!-- Snapchat -->
                                        <div class="form-group">
                                            <label for="snapchat">{{ __('lang.Snapchat') }}</label>
                                            <input type="text" class="form-control" name="snapchat" id="snapchat" value="{{ $setting->snapchat }}">
                                        </div>

                                        <!-- App Store Link -->
                                        <div class="form-group">
                                            <label for="link_appstore">{{ __('lang.App Store Link') }}</label>
                                            <input type="text" class="form-control" name="link_appstore" id="link_appstore" value="{{ $setting->link_appstore }}">
                                        </div>

                                        <!-- Google Play Link -->
                                        <div class="form-group">
                                            <label for="link_googleplay">{{ __('lang.Google Play Link') }}</label>
                                            <input type="text" class="form-control" name="link_googleplay" id="link_googleplay" value="{{ $setting->link_googleplay }}">
                                        </div>

                                        <!-- App Gallery Link -->
                                        <div class="form-group">
                                            <label for="link_appgallery">{{ __('lang.App Gallery Link') }}</label>
                                            <input type="text" class="form-control" name="link_appgallery" id="link_appgallery" value="{{ $setting->link_appgallery }}">
                                        </div>

                                        <!-- Facebook Link -->
                                        <div class="form-group">
                                            <label for="fb_link">{{ __('lang.Facebook Link') }}</label>
                                            <input type="text" class="form-control" name="fb_link" id="fb_link" value="{{ $setting->fb_link }}">
                                        </div>

                                        <!-- Twitter Link -->
                                        <div class="form-group">
                                            <label for="tw_link">{{ __('lang.Twitter Link') }}</label>
                                            <input type="text" class="form-control" name="tw_link" id="tw_link" value="{{ $setting->tw_link }}">
                                        </div>

                                        <!-- LinkedIn Link -->
                                        <div class="form-group">
                                            <label for="linkedin_link">{{ __('lang.LinkedIn Link') }}</label>
                                            <input type="text" class="form-control" name="linkedin_link" id="linkedin_link" value="{{ $setting->linkedin_link }}">
                                        </div>

                                        <!-- Instagram Link -->
                                        <div class="form-group">
                                            <label for="inst_link">{{ __('lang.Instagram Link') }}</label>
                                            <input type="text" class="form-control" name="inst_link" id="inst_link" value="{{ $setting->inst_link }}">
                                        </div>

                                        <!-- WhatsApp -->
                                        <div class="form-group">
                                            <label for="whatsapp">{{ __('lang.WhatsApp') }}</label>
                                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $setting->whatsapp }}">
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
