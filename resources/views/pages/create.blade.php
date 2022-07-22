@extends('template.template')
@section('title', 'Cadastro de URL')

@section('body')

    <div class="container mt-4 mb-4">
        <div class="container-fluid d-flex justify-content-center">
            <h1>Cadastro de URL</h1>
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
            <form action="{{ route('way.create') }}" method="post" class=" ">
                @csrf
                <label class="form-label" for="way">URL: </label>
                <input type="text" name="way" id="way" style="width: 35vw">

                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>

            </form>
        </div>

    </div>



@endsection
