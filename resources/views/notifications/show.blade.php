@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => __('lang.view_real_estate')])
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
                            <h5 class="card-title">{{ __('lang.view_real_estate_details') }}</h5>
                            <p class="card-title-desc">{{ __('lang.details_description') }}</p>

                            <form>
                                {{-- Form Fields (Read-Only) --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $real_estate->type }}" disabled>
                                            <label>{{ __('lang.type') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" value="{{ $real_estate->price }}" disabled>
                                            <label>{{ __('lang.price') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $real_estate->phone }}" disabled>
                                            <label>{{ __('lang.phone') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" value="{{ $real_estate->number_of_rooms }}" disabled>
                                            <label>{{ __('lang.number_of_rooms') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" value="{{ $real_estate->bathrooms_of_rooms }}" disabled>
                                            <label>{{ __('lang.number_of_bathrooms') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $real_estate->street }}" disabled>
                                            <label>{{ __('lang.street') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label>{{ __('lang.description') }}</label>
                                    <textarea class="form-control" rows="4" disabled>{{ $real_estate->description }}</textarea>
                                </div>

                                {{-- Existing Media Preview --}}
                                <div class="mb-3">
                                    <h6>{{ __('lang.media_files') }}</h6>
                                    <div class="d-flex flex-wrap">

                                        {{-- Images Preview --}}
                                        @foreach ($real_estate->getMedia('images') as $image)
                                            <div class="position-relative m-2">
                                                <img src="{{ $image->getUrl() }}" class="img-thumbnail" style="max-width: 150px;">
                                            </div>
                                        @endforeach

                                        {{-- Videos Preview --}}
                                        @foreach ($real_estate->getMedia('videos') as $video)
                                            <div class="position-relative m-2">
                                                <video src="{{ $video->getUrl() }}" controls style="max-width: 150px;"></video>
                                            </div>
                                        @endforeach

                                        {{-- Plan Preview --}}
                                        @if ($plan = $real_estate->getFirstMediaUrl('plans'))
                                            <div class="position-relative m-2">
                                                <img src="{{ $plan }}" class="img-thumbnail" style="max-width: 150px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('View-only mode loaded.');
    });
</script>
@endsection
@endsection
