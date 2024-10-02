<div class="modal fade" id="categoryModal{{$item->id}}" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">@lang('lang.Edit Category')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" id="categoryId" value="{{ $item->id }}">

                    <!-- Title English -->
                    <div class="mb-3">
                        <label for="categoryTitleEn" class="form-label">@lang('lang.Title (English)')</label>
                        <input type="text" class="form-control" id="categoryTitleEn" name="title_en"
                            value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
                    </div>

                    <!-- Title Arabic -->
                    <div class="mb-3">
                        <label for="categoryTitleAr" class="form-label">@lang('lang.Title (Arabic)')</label>
                        <input type="text" class="form-control" id="categoryTitleAr" name="title_ar"
                            value="{{ old('title.ar', $item->getTranslation('title', 'ar')) }}">
                    </div>

                    <!-- Description English -->
                    <div class="mb-3">
                        <label for="categoryDescriptionEn" class="form-label">@lang('lang.Description (English)')</label>
                        <textarea class="form-control" id="categoryDescriptionEn" name="description_en">{{ old('description.en', $item->getTranslation('description', 'en')) }}</textarea>
                    </div>

                    <!-- Description Arabic -->
                    <div class="mb-3">
                        <label for="categoryDescriptionAr" class="form-label">@lang('lang.Description (Arabic)')</label>
                        <textarea class="form-control" id="categoryDescriptionAr" name="description_ar">{{ old('description.ar', $item->getTranslation('description', 'ar')) }}</textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">@lang('lang.Image')</label>
                        <input type="file" class="form-control" id="bannerImage{{ $item->id }}" name="image" onchange="previewImage(event, {{ $item->id }})">
                        <img id="imagePreview{{ $item->id }}" src="{{ $item->image_url }}" alt="Banner Image" class="img-thumbnail mt-2" width="100">
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
