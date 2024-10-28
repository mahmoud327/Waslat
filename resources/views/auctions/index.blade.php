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
                        <a href="{{ route('auctions.create') }}" type="button" class="btn btn-primary" >
                            @lang('lang.Add real estates')
                        </a>
                        <br>
                        <br>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('lang.real estates')</h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.ID')</th>
                                                <th>@lang('lang.Description')</th>
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
                                                    <td>{{ $auction->description }}</td>
                                                    <td>{{ $auction->type }}</td>
                                                    <td>{{ $auction->price }}</td>
                                                    <td>{{ $auction->phone }}</td>
                                                    <td>{{ $auction->number_of_rooms }}</td>
                                                    <td>{{ $auction->bathrooms_of_rooms }}</td>
                                                    <td>





                                                        <div class="d-flex flex-column flex-md-row" style="gap: 10px;">
                                                            <form action="{{ route('auctions.toggleStatus', $auction->id) }}" method="POST" class="w-100">
                                                                @csrf
                                                                <button type="submit" class="btn {{ $auction->is_active ? 'btn-danger' : 'btn-success' }} w-100">
                                                                    {{ $auction->is_active ? __('lang.Deactivate') : __('lang.Activate') }}
                                                                </button>
                                                            </form>

                                                            <a href="{{ route('auctions.show', $auction->id) }}" class="btn btn-primary w-100">
                                                                @lang('lang.Show')
                                                            </a>

                                                            <a href="{{ route('auctions.edit', $auction->id) }}" class="btn btn-primary w-100">
                                                                @lang('lang.Edit')
                                                            </a>

                                                            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#bannerDeleteModal{{ $auction->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>

                                                @include('auctions.delete_modal', ['auction' => $auction])
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
