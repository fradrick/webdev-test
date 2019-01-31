@extends('layouts.app')

@section('title') Webdev Test - Home @endsection

@section('content')

    <div class="mt-4 pt-5">
        <h3><i class="fas fa-users"></i> Persons</h3>
        <hr>
        <a href="{{url("persons/create")}}" class="btn bg-teal text-white ml-3 my-3"><i class="fas fa-user-plus"></i> Add Person</a>
        @include('errors._list')
        <persons-component></persons-component>
    </div>

@endsection