@extends('template.template')
@section('title', 'Listagem de URL')

@section('body')
    <div class="container-fluid d-flex justify-content-center mt-5 mb-5">
        <h1> URL Cadastradas</h1>
    </div>
    @if ($ways == null)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="d-flex justify-content-center">Não URL's para serem listados.</p>
        </div>
    @else
        <div class="container-fluid">
            <table class="table table-stripped">
                <thead>
                    <tr>
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
                        <td>{{ $way->url }}</td>
                        <td> {{ $way->active ? 'Ativo':'Inativo' }} </td>
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
    @endif
@endsection
