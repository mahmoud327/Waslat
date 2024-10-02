<!-- Add Banner Modal -->
<div class="modal fade" id="bannerAddModal" tabindex="-1" aria-labelledby="bannerAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerAddModalLabel">@lang('lang.Add Admin')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.name')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.phone')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.password')</label>
                        <input type="password" class="form-control" id="bannerTitleEn" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.email')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="email" required>
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
