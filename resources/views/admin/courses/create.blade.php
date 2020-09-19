@extends('admin.layouts.app')
@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastro de Curso')
        @slot('url', route('courses.store'))
        @slot('form')
            @include('admin.courses.form')
        @endslot
    @endcomponent
@endsection
