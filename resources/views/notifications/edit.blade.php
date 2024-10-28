@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => __('lang.edit_real_estate')])
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
                                <h5 class="card-title">{{ __('lang.edit_real_estate') }}</h5>
                                <p class="card-title-desc">{{ __('lang.update_details') }}</p>

                                <form enctype="multipart/form-data" action="{{ route('auctions.update', $real_estate->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="type"
                                                    value="{{ $real_estate->type }}" required>
                                                <label>{{ __('lang.type') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="price"
                                                    value="{{ $real_estate->price }}" required>
                                                <label>{{ __('lang.price') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ $real_estate->phone }}">
                                                <label>{{ __('lang.phone') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="number_of_rooms"
                                                    value="{{ $real_estate->number_of_rooms }}">
                                                <label>{{ __('lang.number_of_rooms') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="bathrooms_of_rooms"
                                                    value="{{ $real_estate->bathrooms_of_rooms }}">
                                                <label>{{ __('lang.number_of_bathrooms') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="hall_number"
                                                    value="{{ $real_estate->hall_number }}">
                                                <label>{{ __('lang.number_of_halls') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="number_of_council_rooms"
                                                    value="{{ $real_estate->number_of_council_rooms }}">
                                                <label>{{ __('real_estate.number_of_council_rooms') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="land_area"
                                                    value="{{ $real_estate->land_area }}">
                                                <label>{{ __('real_estate.land_area') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="street"
                                                    value="{{ $real_estate->street }}">
                                                <label>{{ __('lang.street') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="number_of_streets"
                                                    value="{{ $real_estate->number_of_streets }}">
                                                <label>{{ __('lang.number_of_streets') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="street_area"
                                                    value="{{ $real_estate->street_area }}">
                                                <label>{{ __('lang.street_area') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="street_facing"
                                                    value="{{ $real_estate->street_facing }}">
                                                <label>{{ __('lang.street_facing') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="electricity"
                                                    value="{{ $real_estate->electricity }}">
                                                <label>{{ __('lang.electricity') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="water"
                                                    value="{{ $real_estate->water }}">
                                                <label>{{ __('lang.water') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>{{ __('lang.city') }}</label>
                                            <select class="form-control" name="city_id">
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ $city->id == $real_estate->city_id ? 'selected' : '' }}>
                                                        {{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>{{ __('lang.category') }}</label>
                                            <select class="form-control" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $real_estate->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>{{ __('lang.description') }}</label>
                                        <textarea class="form-control" rows="4" name="description">{{ $real_estate->description }}</textarea>
                                    </div>

                                    {{-- Existing Media Preview --}}
                                    <div class="mb-3">
                                        <h6>{{ __('lang.existing_media') }}</h6>
                                        <div class="d-flex flex-wrap">
                                            @foreach ($real_estate->getMedia('images') as $image)
                                                <img src="{{ $image->getUrl() }}" class="img-thumbnail m-2"
                                                    style="max-width: 150px;">
                                            @endforeach

                                            @foreach ($real_estate->getMedia('videos') as $video)
                                                <video src="{{ $video->getUrl() }}" class="m-2" controls
                                                    style="max-width: 150px;"></video>
                                            @endforeach

                                            @if ($plan = $real_estate->getFirstMediaUrl('plans'))
                                                <img src="{{ $plan }}" class="img-thumbnail m-2"
                                                    style="max-width: 150px;">
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Upload New Media --}}
                                    <div class="mb-3">
                                        <label>{{ __('lang.upload_new_images') }}</label>
                                        <input type="file" class="form-control" name="images[]" multiple
                                            accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label>{{ __('lang.upload_new_videos') }}</label>
                                        <input type="file" class="form-control" name="videos[]" multiple
                                            accept="video/*">
                                    </div>

                                    <div class="mb-3">
                                        <label>{{ __('lang.upload_new_plan') }}</label>
                                        <input type="file" class="form-control" name="plan" accept="image/*">
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">{{ __('lang.update_real_estate') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
