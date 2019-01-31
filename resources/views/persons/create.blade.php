@extends('layouts.app')

@section('title') Create Persons | Webdev Test @endsection

@section('content')

    <div class="mt-4 pt-5">
        <h3><i class="fas fa-user-plus"></i> New Person</h3>
        <hr>
        @include('errors._list')
        @include('persons._form', ['url'=>url('/persons')])

    </div>

@endsection

@push('scripts')
<script src="{{asset('js/form-config.js')}}"></script>
@endpush