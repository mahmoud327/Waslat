@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Contact Us'])
    @include('partials.head-css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Contact Us Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('lang.Contact Us Submissions')</h4>
                                <div class="table-responsive">
                                    <table id="datatable-contact" class="table table-bordered"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.Full Name')</th>
                                                <th>@lang('lang.Phone')</th>
                                                <th>@lang('lang.Email')</th>
                                                <th>@lang('lang.Notes')</th>
                                                <th>@lang('lang.Actions')</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->full_name }}</td>
                                                    <td>{{ $contact->phone }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->notes }}</td>
                                                    <td>
                                                        <div class="d-flex flex-column flex-md-row" style="gap: 10px;">
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bannerDeleteModal{{ $contact->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('contactUs.delete_modal', ['contact' => $contact])

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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable-contact').DataTable(); // Contact Us Table Initialization
        });
    </script>
@endpush
