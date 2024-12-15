<!-- Delete Banner Modal -->
<div class="modal fade" id="bannerDeleteModal{{$booking->id}}" tabindex="-1" aria-labelledby="bannerDeleteModalLabel{{$booking->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerDeleteModalLabel{{$booking->id}}">@lang('lang.Delete Banner')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>@lang('lang.Are you sure you want to delete this Request ?')</p>
                <p><strong>{{ $booking->name }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.Close')</button>
                <form action="{{ route('requests-real-estates.destroy', $booking->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">@lang('lang.Delete')</button>
                </form>
            </div>
        </div>
    </div>
</div>
