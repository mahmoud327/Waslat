<!-- Edit Banner Modal -->
<div class="modal fade" id="bannerEditModal{{$banner->id}}" tabindex="-1" aria-labelledby="bannerEditModalLabel{{$banner->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerEditModalLabel{{$banner->id}}">@lang('lang.Edit Banner')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('blogs.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.Title (EN)')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="title_en" value="{{ $banner->getTranslation('title', 'en') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleAr" class="form-label">@lang('lang.Title (AR)')</label>
                        <input type="text" class="form-control" id="bannerTitleAr" name="title_ar" value="{{ $banner->getTranslation('title', 'ar') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerDescriptionEn" class="form-label">@lang('lang.Description (EN)')</label>
                        <textarea class="form-control" id="bannerDescriptionEn" name="description_en" required>{{ $banner->getTranslation('description', 'en') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="bannerDescriptionAr" class="form-label">@lang('lang.Description (AR)')</label>
                        <textarea class="form-control" id="bannerDescriptionAr" name="description_ar" required>{{ $banner->getTranslation('description', 'ar') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="bannerImage" class="form-label">@lang('lang.Image')</label>
                        <input type="file" class="form-control" id="bannerImage{{ $banner->id }}" name="image" onchange="previewImage(event, {{ $banner->id }})">
                        <img id="imagePreview{{ $banner->id }}" src="{{ $banner->image_url }}" alt="Banner Image" class="img-thumbnail mt-2" width="100">
                     </div>


                     <div class="tab-pane" id="videos" role="tabpanel">
                        <div class="form-group">
                            <label for="videoLinks">@lang('lang.Upload Videos Links')</label>
                            <div id="video">

                                @foreach ($banner->videos ?? [] as $video)
                                <div class="video-link-group mb-2">
                                    <input type="text" class="form-control" name="videos[]" value="{{ $video }}">
                                    <button type="button" class="btn btn-danger remove-video-link" style="margin-top: 5px;">-</button>
                                </div>
                            @endforeach


                            </div>
                            <button type="button" class="btn btn-primary add-video mt-2">+</button>
                            <small class="form-text text-muted">You can add multiple links separated by commas.</small>
                        </div>
                    </div>



{{--
                    <div class="mb-3">
                        <label for="bannerActive" class="form-label">@lang('lang.Active')</label>
                        <select class="form-control" id="bannerActive" name="active">
                            <option value="1" {{ $banner->active ? 'selected' : '' }}>@lang('lang.Yes')</option>
                            <option value="0" {{ !$banner->active ? 'selected' : '' }}>@lang('lang.No')</option>
                        </select>
                    </div> --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
