@extends('template.template')
@section('title', 'Listagem de URL')

@section('body')
    <div class="container-fluid d-flex justify-content-center mt-5 mb-5">
        <h1> URL Cadastradas</h1>
    </div>
    <div class="container-fluid">
        @include('message.flash-message')
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Detalhes</th>
                    <th>Atualizar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ways as $way): ?>
                <tr>
                    <td>{{ $way->id }}</td>
                    <td>{{ $way->user->name }}</td>
                    <td>{{ $way->url }}</td>
                    <td> {{ $way->active ? 'Ativo' : 'Inativo' }} </td>
                    <td> <button type="submit" class="btn btn-outline-dark">🔍</button> </td>

                    <td> <button class="btn btn-warning d-inline-block "><a style="text-decoration: none;color:black"
                                href="{{ route('ways.edit', $way->id) }}">Atualizar</a></button></td>
                    <td>
                        <form action="{{ route('way.delete', $way->id) }}" method="get">
                            <button class="btn btn-danger d-inline-block"><a
                                    style="text-decoration: none;">Excluir</a></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

@endsection
