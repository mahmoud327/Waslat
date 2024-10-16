<!-- Edit Banner Modal -->
<div class="modal fade" id="bannerEditModal{{ $admin->id }}" tabindex="-1"
    aria-labelledby="bannerEditModalLabel{{ $admin->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerEditModalLabel{{ $admin->id }}">@lang('lang.Edit Admin')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admins.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.name')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="name" value="{{ $admin->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.phone')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="phone"  value="{{ $admin->phone }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.password')</label>
                        <input type="password" class="form-control" id="bannerTitleEn" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="bannerTitleEn" class="form-label">@lang('lang.email')</label>
                        <input type="text" class="form-control" id="bannerTitleEn" name="email"  value="{{ $admin->email }}" required>
                    </div>


                    <div class="mb-3">
                        <label for="roles" class="form-label">@lang('lang.Roles')</label>
                        <select multiple class="form-control" id="roles" name="roles[]" required>
                            @foreach(\App\Models\User::getRoles() as $role)
                                <option  @if (in_array($role->id, $admin->roles)) selected @endif  value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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
