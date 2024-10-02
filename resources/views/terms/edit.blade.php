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

                                <form method="post" action="{{ route('terms.update') }}">
                                    @method('put')
                                    @csrf
                                    <!-- Hidden field to store the selected language -->
                                    <input type="hidden" name="selectedLanguage" id="selectedLanguage" value="en">

                                    <!-- English Description Editor -->
                                    <div class="form-group" id="description_en">
                                        <label for="description_en_editor">Terms and Conditions (English)</label>
                                        <div id="description_en_editor" style="height: 300px;">
                                            {!! $term->getTranslation('description', 'en') !!}
                                        </div>
                                        <input type="hidden" name="description_en" id="hidden_description_en">
                                    </div>

                                    <!-- Arabic Description Editor (Hidden by default) -->
                                    <div class="form-group" id="description_ar" style="display: none;">
                                        <label for="description_ar_editor">الشروط والأحكام (عربي)</label>
                                        <div id="description_ar_editor" style="height: 300px;">
                                            {!! $term->getTranslation('description', 'ar') !!}
                                        </div>
                                        <input type="hidden" name="description_ar" id="hidden_description_ar">
                                    </div>

                                    <button type="submit" id="save-content" class="btn btn-success mt-3">Save</button>
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
        var quillEn = new Quill('#description_en_editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'image'],
                ]
            }
        });

        var quillAr = new Quill('#description_ar_editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
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
                    $('#description_ar').show();
                    $('#description_en').hide();
                } else {
                    // Switch to English: show English fields and hide Arabic fields
                    $('#description_en').show();
                    $('#description_ar').hide();
                }
            });

            // Initialize form with English description visible
            $('#description_en').show();
            $('#description_ar').hide();

            // Handle form submission to include Quill content
            $('form').on('submit', function() {
                // Get the HTML content of the Quill editors
                $('#hidden_description_en').val(quillEn.root.innerHTML);
                $('#hidden_description_ar').val(quillAr.root.innerHTML);
            });
        });
    </script>
@endpush
