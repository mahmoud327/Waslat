<!-- Edit Banner Modal -->
<div class="modal fade" id="bannerEditModal{{$city->id}}" tabindex="-1" aria-labelledby="bannerEditModalLabel{{$city->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerEditModalLabel{{$city->id}}">@lang('lang.Edit City')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('states.update', $city->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.Title (EN)')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="name_en" value="{{ $city->getTranslation('name', 'en') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleAr" class="form-label">@lang('lang.Title (AR)')</label>
                        <input type="text" class="form-control" id="bannerTitleAr" name="name_ar" value="{{ $city->getTranslation('name', 'ar') }}" required>
                    </div>

                    <div class="col-md-12">
                        <label>{{ __('lang.city') }}</label>
                        <select class="form-control" name="city_id">
                            @foreach ($cites as $state)
                                <option value="{{ $city->id }}"
                                    {{ $state->id == $city->city_id ? 'selected' : '' }}>
                                    {{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
