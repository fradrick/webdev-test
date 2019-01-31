@extends('layouts.app')

@section('title') Edit Persons | Webdev Test @endsection

@section('content')

    <div class="mt-4 pt-5">
        <h3><i class="fas fa-pen"></i> Edit Person  - {{$person->full_name}}</h3>
        <hr>
        @include('errors._list')
        @include('persons._form', ['url'=>action('PersonsController@update', $person->id)])

    </div>

@endsection
@push('scripts')
    <script src="{{asset('js/form-config.js')}}"></script>
@endpush