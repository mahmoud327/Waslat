<!-- Add Banner Modal -->
<div class="modal fade" id="bannerAddModal" tabindex="-1" aria-labelledby="bannerAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerAddModalLabel">@lang('lang.Add Blog')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
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
                        <label for="bannerDescriptionEn" class="form-label">@lang('lang.Description (EN)')</label>
                        <textarea class="form-control" id="bannerDescriptionEn" name="description_en" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="bannerDescriptionAr" class="form-label">@lang('lang.Description (AR)')</label>
                        <textarea class="form-control" id="bannerDescriptionAr" name="description_ar" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="bannerImage" class="form-label">@lang('lang.Image')</label>
                        <input type="file" class="form-control" id="bannerImage" name="image"
                            onchange="previewImage(event)" required>
                        <img id="imagePreview" alt="Banner Image Preview" class="img-thumbnail mt-2"
                            style="display: none;" width="100">
                    </div>

                    <div class="tab-pane" id="videos" role="tabpanel">
                        <div class="form-group">
                            <label for="videoLinks">@lang('lang.Upload Videos Links')</label>
                            <div id="videoLinksContainer">
                                <div class="video-link-group mb-2">
                                    <input type="text" class="form-control" placeholder="Enter video link" name="videos[]">
                                    <button type="button" class="btn btn-danger remove-video-link" style="margin-top: 5px;">-</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary add-video-link mt-2">+</button>
                            <small class="form-text text-muted">You can add multiple links separated by commas.</small>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">@lang('lang.Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
