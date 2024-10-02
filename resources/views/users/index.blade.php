@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Users'])
    @include('partials.head-css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bannerAddModal">
                            @lang('lang.Add User')
                        </button> --}}
                        <br>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('lang.Users')</h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.ID')</th>
                                                <th>@lang('lang.Name')</th>
                                                <th>@lang('lang.Email')</th>
                                                <th>@lang('lang.Account Type')</th>
                                                <th>@lang('lang.Is Active')</th>
                                                <th>@lang('lang.Phone')</th>
                                                <th>@lang('lang.License')</th>
                                                <th>@lang('lang.Commercial Registration')</th>
                                                <th>@lang('lang.City ID')</th>
                                                <th>@lang('lang.Profile Image')</th>
                                                <th>@lang('lang.Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->account_type }}</td>
                                                    <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>{{ $user->val_license }}</td>
                                                    <td>{{ $user->commercial_registration_number }}</td>
                                                    <td>{{ $user->city_id }}</td>
                                                    <td>
                                                        @if($user->profileImage)
                                                            <img src="{{ asset('storage/' . $user->profileImage) }}" alt="Profile Image" style="width: 50px; height: 50px; object-fit: cover;">
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column flex-md-row" style="gap: 10px;">
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bannerDeleteModal{{ $user->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @include('users.delete_modal', ['user' => $user])
                                            @endforeach

                                            {{-- @include('admins.add_modal') --}}
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
