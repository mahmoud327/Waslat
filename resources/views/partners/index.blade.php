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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bannerAddModal">
                            @lang('lang.Add Partner')
                        </button>
                        <br>




                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('lang.Partner')</h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.Image')</th>
                                                <th>@lang('lang.Title')</th>
                                                <th>@lang('lang.Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as $banner)
                                                <tr>
                                                    <td><img src="{{ $banner->image_url }}" alt="{{ $banner->title }}" class="img-fluid" style="width: 50px; height: auto;"></td>
                                                    <td>{{ $banner->getTranslation('title', app()->getLocale()) }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#bannerEditModal{{ $banner->id }}">
                                                                @lang('lang.Edit')
                                                            </button>

                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#bannerDeleteModal{{ $banner->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @include('partners.edit_modal', ['banner' => $banner])
                                                @include('partners.delete_modal', ['banner' => $banner])
                                            @endforeach

                                            @include('partners.add_modal')

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
    function previewImage(event, bannerId = null) {
        var reader = new FileReader();
        reader.onload = function() {
            // Determine which image preview element to update
            var outputId = bannerId ? 'imagePreview' + bannerId : 'imagePreview';
            var output = document.getElementById(outputId);
            output.src = reader.result;
            output.style.display = 'block'; // Show the image when file is selected
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
