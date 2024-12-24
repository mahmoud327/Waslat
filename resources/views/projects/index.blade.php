@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'home'])
    @include('partials.head-css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-12">
                        <a type="button" class="btn btn-primary" href="{{ route('projects.create') }}">
                            @lang('lang.Add Project')
                        </a>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('lang.Projects')</h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.Image')</th>
                                                <th>@lang('lang.Title')</th>
                                                <th>@lang('lang.Description')</th>
                                                <th>@lang('lang.Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as $banner)
                                                <tr>
                                                    <td><img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"
                                                            class="img-fluid" style="width: 50px; height: auto;"></td>
                                                    <td>{{ $banner->getTranslation('title', app()->getLocale()) }}</td>
                                                    <td>{{ $banner->getTranslation('description', app()->getLocale()) }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            {{-- <button type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#bannerEditModal{{ $banner->id }}">
                                                                @lang('lang.Edit')
                                                            </button> --}}

                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#bannerDeleteModal{{ $banner->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @include('projects.delete_modal', ['banner' => $banner])
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
        </div>
    </div>

    <!-- Modal for Add/Edit Category -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();


        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle adding a new video link input for both new and editing banners
            $(document).on('click', '.add-video-link, .add-video', function() {
                let targetContainer = $(this).hasClass('add-video-link') ? '#videoLinksContainer' :
                '#video';
                $(targetContainer).append(`
            <div class="video-link-group mb-2">
                <input type="text" class="form-control" placeholder="Enter video link" name="videos[]">
                <button type="button" class="btn btn-danger remove-video-link" style="margin-top: 5px;">-</button>
            </div>
        `);
            });

            // Handle removing a video link input for both new and editing banners
            $(document).on('click', '.remove-video-link', function() {
                $(this).closest('.video-link-group').remove();
            });

            // Image preview function (works for both Add and Edit modals)
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
        });
    </script>
@endpush
