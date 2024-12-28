@component('mail::message')

    {{ $message }}

    {{ trans('general.thanks') }},<br>
    {{ config('app.name') }}
@endcomponent
