@extends('layout')

@section('header')
    Séries
@endsection

@section('content')
    @if(!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
    @endif

    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$serie->name}}
                <form method="post" action="/series/{{$serie->id}}" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
