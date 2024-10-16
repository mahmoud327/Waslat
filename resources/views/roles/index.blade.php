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
                                <h4 class="card-title">@lang('lang.Roles')</h4>
                                <a type="button" class="btn btn-primary" href="{{ route('roles.create') }}"  >
                                    @lang('lang.Add Role')
                                </a>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.Title')</th>
                                                <th>@lang('lang.Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td>
                                                        {{ $role->name }}
                                                    </td>
                                                    <td>

                                                        <div class="d-flex flex-column flex-md-row" style="gap: 10px;">

                                                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary ">
                                                                @lang('lang.Show')
                                                            </a>

                                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary ">
                                                                @lang('lang.Edit')
                                                            </a>

                                                            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#bannerDeleteModal{{ $role->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>

                                                @include('roles.delete_modal', ['role' => $role])
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
