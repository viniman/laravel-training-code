@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('title', 'Listagem de cursos')
        @can('create', Auth::user())
            @slot('create', route('courses.create'))
        @endcan
        @slot('head')
            <th>Nome</th>
            <th>Categoria</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($courses as $course)
                @can('view', Auth::user())
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->category->name }}</td>
                        <td class="options"> 
                            @can('enroll', Auth::user())
                                <a href="{{ route('courses.enroll', $course->id ) }}" class="btn btn-danger"><i class="fas fa-clipboard-check"></i></a>
                            @endcan
                            @can('update', Auth::user())
                                <a href="{{ route('courses.edit', $course->id ) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                            @endcan
                            @can('view', Auth::user())
                                <a href="{{ route('courses.show', $course->id ) }}" class="btn btn-dark"><i class="fas fa-search"></i></a>
                            @endcan
                            @can('delete', Auth::user())
                                <form action="{{ route('courses.destroy', $course->id) }}" class="form-delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endcan
            @endforeach
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $('.form-control').attr('readonly', true); // danger success
    </script>

    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
    