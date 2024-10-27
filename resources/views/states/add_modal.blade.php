<!-- Add Banner Modal -->
<div class="modal fade" id="bannerAddModal" tabindex="-1" aria-labelledby="bannerAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerAddModalLabel">@lang('lang.Add City')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('states.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.Title (EN)')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="name_en" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleAr" class="form-label">@lang('lang.Title (AR)')</label>
                        <input type="text" class="form-control" id="bannerTitleAr" name="name_ar" required>
                    </div>

                    <div class="col-md-12">
                        <label>{{ __('lang.city') }}</label>
                        <select class="form-control" name="city_id">
                            @foreach ($cites as $city)
                                <option value="{{ $city->id }}"
                                    {{ $city->id == $city->city_id ? 'selected' : '' }}>
                                    {{ $city->name }}</option>
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
