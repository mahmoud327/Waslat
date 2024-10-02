@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Auctions'])
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
                                <h4 class="card-title">@lang('lang.Auctions')</h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.ID')</th>
                                                <th>@lang('lang.Type')</th>
                                                <th>@lang('lang.Price')</th>
                                                <th>@lang('lang.Phone')</th>
                                                <th>@lang('lang.Number of Rooms')</th>
                                                <th>@lang('lang.Bathrooms')</th>
                                                <th>@lang('lang.Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($auctions as $auction)
                                                <tr>
                                                    <td>{{ $auction->id }}</td>
                                                    <td>{{ $auction->type }}</td>
                                                    <td>{{ $auction->price }}</td>
                                                    <td>{{ $auction->phone }}</td>
                                                    <td>{{ $auction->number_of_rooms }}</td>
                                                    <td>{{ $auction->bathrooms_of_rooms }}</td>
                                                    <td>
                                                        <div class="d-flex flex-column flex-md-row" style="gap: 10px;">
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bannerDeleteModal{{ $auction->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @include('auctions.delete_modal', ['auction' => $auction])
                                            @endforeach

                                            @include('auctions.add_modal')
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
