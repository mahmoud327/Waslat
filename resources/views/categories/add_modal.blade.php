<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">@lang('lang.Add Category')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="categoryId">
                    <div class="mb-3">
                        <label for="categoryTitleEn" class="form-label">@lang('lang.Title (EN)')</label>
                        <input type="text" class="form-control" id="categoryTitleEn" name="title_en">
                    </div>
                    <div class="mb-3">
                        <label for="categoryTitleAr" class="form-label">@lang('lang.Title (AR)')</label>
                        <input type="text" class="form-control" id="categoryTitleAr" name="title_ar">
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescriptionEn" class="form-label">@lang('lang.Description (EN)')</label>
                        <textarea class="form-control" id="categoryDescriptionEn" name="description_en"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescriptionAr" class="form-label">@lang('lang.Description (AR)')</label>
                        <textarea class="form-control" id="categoryDescriptionAr" name="description_ar"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">@lang('lang.Image')</label>
                        <input type="file" class="form-control" id="categoryImage" name="image" onchange="previewImage(event)">
                        <!-- Image preview -->
                        <img id="imagePreview" alt="Category Image Preview" class="img-thumbnail mt-2" style="display: none;" width="100">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.Close')</button>
                <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
            </div>
        </form>
        </div>
    </div>
</div>
