@extends('website.layouts.master')
@section('style')
    <style>
        .scroll-downs {
            margin: 10px auto;
            width: 20px;
            height: 40px;
            scale: .7;
        }

        .mousey {
            width: 3px;
            padding: 10px 15px;
            height: 35px;
            border: 2px solid #3A564F;
            border-radius: 25px;
            opacity: 0.75;
            box-sizing: content-box;
        }

        .scroller {
            width: 3px;
            height: 15px;
            border-radius: 25%;
            background-color: #3A564F;
            animation-name: scroll;
            animation-duration: 2.2s;
            animation-timing-function: cubic-bezier(.15, .41, .69, .94);
            animation-iteration-count: infinite;
        }

        @keyframes scroll {
            0% {
                opacity: 0;
            }

            10% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(25px);
                opacity: 1;
            }
        }
    </style>
@endsection
@section('content')




<livewire:filter-auction-search-component />

@endsection
@push('js')
    <script>
        function togglePopUp(popUpId) {
            document.getElementById('popUp').classList.toggle('hidden')
            document.getElementById(popUpId).classList.toggle('hidden')

        }
    </script>
@endpush
