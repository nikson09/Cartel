@extends('layouts.app-opt')

@section('content')
    <opt-table :user="{{ $user }}" :products="{{ $products }}"/>
@endsection

@section('scripts')

@endsection
