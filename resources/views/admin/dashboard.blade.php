@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row ">
        @component('admin.components.card')
        @slot('title', 'Usuários')
        @slot('icon', 'fas fa-users')
        @slot('textInfo', '')
        @endcomponent
        @component('admin.components.card')
        @slot('title', 'Categorias')
        @slot('icon', 'fas fa-folder-open')
        @slot('textInfo', '')
        @endcomponent
        @component('admin.components.card')
        @slot('title', 'Cursos')
        @slot('icon', 'fas fa-book-reader')
        @slot('textInfo', '')
        @endcomponent
    </div>
</div>
@endsection
