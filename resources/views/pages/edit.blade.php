@extends('template.template')
@section('title', 'Atualizar URL')

@section('body')

    <div class="container mt-4 mb-4">
        <div class="container-fluid d-flex justify-content-center">
            <h1>Atualizar URL</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                @foreach ($errors->all() as $error)
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                @endforeach

            </div>
        @endif
        <div class="container d-flex mt-4 justify-content-center">
            <form action="{{ route('way.update',$way->id) }}" method="post">
                @csrf
                <label class="form-label" for="url">URL: </label>
                <input type="text" name="url" id="url" style="width: 35vw" value="{{$way->url}}">

                <button type="submit" class="btn btn-outline-dark">Atualizar</button>

            </form>
        </div>

    </div>



@endsection
