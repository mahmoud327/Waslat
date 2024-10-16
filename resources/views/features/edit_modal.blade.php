<div class="modal fade" id="categoryModal{{$item->id}}" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">@lang('lang.Edit Category')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('features.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" id="categoryId" value="{{ $item->id }}">

                    <!-- Title English -->
                    <div class="mb-3">
                        <label for="categoryTitleEn" class="form-label">@lang('lang.Title (English)')</label>
                        <input type="text" class="form-control" id="categoryTitleEn" name="name_en"
                            value="{{ old('name.en', $item->getTranslation('name', 'en')) }}">
                    </div>

                    <!-- Title Arabic -->
                    <div class="mb-3">
                        <label for="categoryTitleAr" class="form-label">@lang('lang.Title (Arabic)')</label>
                        <input type="text" class="form-control" id="categoryTitleAr" name="name_ar"
                            value="{{ old('name.ar', $item->getTranslation('name', 'ar')) }}">
                    </div>


                    <!-- Image -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.Close')</button>
                <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
            </div>
        </form>
        </div>
    </div>
</div>
