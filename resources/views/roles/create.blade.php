@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => __('lang.title')])
    @include('partials.head-css')
@endsection

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('lang.permissions') }}</h5>
                            <p class="card-title-desc">{{ __('lang.permissions') }}</p>
                            <form class="form-horizontal" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="content-group">
                                    <legend class="text-bold"></legend>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="profile-ar[title]" class="control-label col-lg-2">{{ __('lang.permission_name') }}</label>
                                                <div class="col-lg-10" id="cp2" style="border: none">
                                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                        type="text" name="name" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="profile-services" class="control-label col-lg-2">{{ __('lang.select_permissions') }}</label>
                                                <div class="col-lg-10">
                                                    <ul id="treeview1">
                                                        <th>
                                                            <input name="select_all" id="delete_all" type="checkbox" onclick="CheckAll('box1', this)" />
                                                        </th>

                                                        @foreach($permission as $value)
                                                            <br>
                                                            <label style="font-size: 16px;">
                                                                <td>
                                                                    <input id="cat-box" type="checkbox" name="permission[]" value="{{ $value->id }}" class="box1">
                                                                </td>
                                                                {{ $value->name }}
                                                            </label>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <hr />
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('lang.save') }}
                                                <i class="icon-arrow-left13 position-right"></i>
                                            </button>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Your existing scripts
</script>
@endsection

<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>

@endsection
