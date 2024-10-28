@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'real estates'])
    @include('partials.head-css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <br>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('lang.real estates')</h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.ID')</th>
                                                <th>@lang('lang.Type')</th>
                                                <th>@lang('lang.Phone')</th>
                                                <th>@lang('lang.Note')</th>
                                                <th>@lang('lang.userName')</th>
                                                <th>@lang('lang.Name RealEstate')</th>
                                                <th>@lang('lang.Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookings as $booking)
                                                <tr>
                                                    <td>{{ $booking->id }}</td>
                                                    <td>{{ $booking->type }}</td>
                                                    <td>{{ $booking->phone }}</td>
                                                    <td>{{ $booking->note }}</td>
                                                    <td>{{ optional($booking->user)->name }}</td>
                                                    <td>{{ optional($booking->realEstate)->name }}</td>
                                                    <td>

                                                        <div class="d-flex flex-column flex-md-row">
                                                            <button type="button" class="btn btn-danger w-50" data-bs-toggle="modal" data-bs-target="#bannerDeleteModal{{ $booking->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>

                                                @include('bookings.delete_modal', ['booking' => $booking])
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
            $('#datatable').DataTable();
        });
    </script>
@endpush
