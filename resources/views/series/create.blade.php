@extends('layout')

@section('header')
    Adicionar Série
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome </label>
            <input type="text" name="name" class="form-control mb-4" >
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
@endsection
