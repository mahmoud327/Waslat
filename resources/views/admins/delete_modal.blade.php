<!-- Delete Banner Modal -->
<div class="modal fade" id="bannerDeleteModal{{$admin->id}}" tabindex="-1" aria-labelledby="bannerDeleteModalLabel{{$admin->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerDeleteModalLabel{{$admin->id}}">@lang('lang.Delete Banner')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>@lang('lang.Are you sure you want to delete this banner?')</p>
                <p><strong>{{ $admin->name }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.Close')</button>
                <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">@lang('lang.Delete')</button>
                </form>
            </div>
        </div>
    </div>
</div>
