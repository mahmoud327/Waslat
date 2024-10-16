@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'View Role'])
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
                            <h5 class="card-title">تفاصيل الصلاحية</h5>
                            <p class="card-title-desc">عرض تفاصيل هذه الصلاحية بما في ذلك الصلاحيات المرتبطة بها.</p>

                            <div class="form-group">
                                <label class="control-label">اسم الصلاحية:</label>
                                <p class="form-control-static">{{ $role->name }}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">الصلاحيات:</label>
                                <ul class="list-unstyled">
                                    @if($role->permissions->isEmpty())
                                        <li>لا توجد صلاحيات مرتبطة بهذه الصلاحية.</li>
                                    @else
                                        @foreach($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                            <div class="text-right">
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">العودة إلى القائمة</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
