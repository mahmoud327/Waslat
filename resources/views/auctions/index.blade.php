@extends('layouts.app')

@section('head-content')
    @include('partials.title-meta', ['title' => 'Auctions'])
    @include('partials.head-css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <br>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('lang.Auctions')</h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('lang.ID')</th>
                                                <th>@lang('lang.Type')</th>
                                                <th>@lang('lang.Price')</th>
                                                <th>@lang('lang.Phone')</th>
                                                <th>@lang('lang.Number of Rooms')</th>
                                                <th>@lang('lang.Bathrooms')</th>
                                                <th>@lang('lang.Hall Number')</th>
                                                <th>@lang('lang.Council Rooms')</th>
                                                <th>@lang('lang.Land Area')</th>
                                                <th>@lang('lang.Street')</th>
                                                <th>@lang('lang.Number of Streets')</th>
                                                <th>@lang('lang.Street Area')</th>
                                                <th>@lang('lang.Street Facing')</th>
                                                <th>@lang('lang.Electricity')</th>
                                                <th>@lang('lang.Water')</th>
                                                <th>@lang('lang.Depth')</th>
                                                <th>@lang('lang.Features and Facilities')</th>
                                                <th>@lang('lang.Description')</th>
                                                <th>@lang('lang.Real Estate Characteristics')</th>
                                                <th>@lang('lang.WhatsApp')</th>
                                                <th>@lang('lang.Email')</th>
                                                <th>@lang('lang.Marketer Name')</th>
                                                <th>@lang('lang.License Number')</th>
                                                <th>@lang('lang.City')</th>
                                                <th>@lang('lang.Category')</th>
                                                <th>@lang('lang.Category ID')</th>
                                                <th>@lang('lang.Images')</th>
                                                <th>@lang('lang.Plan')</th>
                                                <th>@lang('lang.Videos')</th>
                                                <th>@lang('lang.Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($auctions as $auction)
                                                <tr>
                                                    <td>{{ $auction->id }}</td>
                                                    <td>{{ $auction->type }}</td>
                                                    <td>{{ $auction->price }}</td>
                                                    <td>{{ $auction->phone }}</td>
                                                    <td>{{ $auction->number_of_rooms }}</td>
                                                    <td>{{ $auction->bathrooms_of_rooms }}</td>
                                                    <td>{{ $auction->hall_number }}</td>
                                                    <td>{{ $auction->number_of_council_rooms }}</td>
                                                    <td>{{ $auction->land_area }}</td>
                                                    <td>{{ $auction->street }}</td>
                                                    <td>{{ $auction->number_of_streets }}</td>
                                                    <td>{{ $auction->street_area }}</td>
                                                    <td>{{ $auction->street_facing }}</td>
                                                    <td>{{ $auction->electricity }}</td>
                                                    <td>{{ $auction->water }}</td>
                                                    <td>{{ $auction->depth }}</td>
                                                    <td>{{ $auction->features_facilities }}</td>
                                                    <td>{{ $auction->description }}</td>
                                                    <td>{{ $auction->real_estate_characteristics }}</td>
                                                    <td>{{ $auction->whatsup }}</td>
                                                    <td>{{ $auction->email }}</td>
                                                    <td>{{ $auction->marketer_name }}</td>
                                                    <td>{{ $auction->license_number }}</td>
                                                    <td>{{ optional($auction->city)->name ?? 'N/A' }}</td>
                                                    <td>{{ optional($auction->category)->name ?? 'N/A' }}</td>
                                                    <td>
                                                        @foreach ($auction->getMedia('images') as $image)
                                                            <img src="{{ $image->getUrl() }}" alt="Auction Image" style="width: 50px; height: 50px; object-fit: cover; margin: 2px;">
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        @if ($auction->getFirstMedia('plans'))
                                                            <img src="{{ $auction->getFirstMediaUrl('plans') }}" alt="Plan" style="width: 50px; height: 50px; object-fit: cover;">
                                                        @else
                                                            <span>No Plan</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($auction->getMedia('videos') as $video)
                                                            <a href="{{ $video->getUrl() }}" target="_blank">View Video</a>
                                                        @endforeach
                                                    </td>


                                                    <td>
                                                        <div class="d-flex flex-column flex-md-row" style="gap: 10px;">
                                                            {{-- Uncomment for Edit button
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bannerEditModal{{ $auction->id }}">
                                                                @lang('lang.Edit')
                                                            </button>
                                                            --}}
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bannerDeleteModal{{ $auction->id }}">
                                                                @lang('lang.Delete')
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                {{-- @include('auctions.edit_modal', ['auction' => $auction]) --}}
                                                @include('auctions.delete_modal', ['auction' => $auction])
                                            @endforeach

                                            @include('auctions.add_modal')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script>
        function previewImage(event, auctionId = null) {
            var reader = new FileReader();
            reader.onload = function() {
                // Determine which image preview element to update
                var outputId = auctionId ? 'imagePreview' + auctionId : 'imagePreview';
                var output = document.getElementById(outputId);
                output.src = reader.result;
                output.style.display = 'block'; // Show the image when file is selected
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
