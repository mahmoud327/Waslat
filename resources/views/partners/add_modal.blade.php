<!-- Add Banner Modal -->
<div class="modal fade" id="bannerAddModal" tabindex="-1" aria-labelledby="bannerAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerAddModalLabel">@lang('lang.Add Banner')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('partners.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.Title (EN)')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="title_en" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleAr" class="form-label">@lang('lang.Title (AR)')</label>
                        <input type="text" class="form-control" id="bannerTitleAr" name="title_ar" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerImage" class="form-label">@lang('lang.Image')</label>
                        <input type="file" class="form-control" id="bannerImage" name="image" onchange="previewImage(event)" required>
                        <img id="imagePreview" alt="Banner Image Preview" class="img-thumbnail mt-2" style="display: none;" width="100">
                      </div>

                    {{-- <div class="mb-3">
                        <label for="bannerActive" class="form-label">@lang('lang.Active')</label>
                        <select class="form-control" id="bannerActive" name="active">
                            <option value="1">@lang('lang.Yes')</option>
                            <option value="0">@lang('lang.No')</option>
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
