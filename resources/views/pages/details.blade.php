@extends('template.template')
@section('title', 'Detalhes da URL')

@section('body')
    <div class="container-fluid d-flex justify-content-center mt-5 mb-5">
        <h1>Detalhes</h1>
    </div>
    <div class="container-fluid">
        @include('message.flash-message')
        <table class="table table-stripped">
            <?php foreach ($dataWays as $data): ?>
            <tr>
                <th>Status</th>
                <td>{{ $data->status_code }}</td>
            </tr>
            <tr>
                <th>Acessado</th>
                <td>{{ $data->created_at }}</td>
            </tr>
            <tr>
                <th>Body</th>

                <td >{{ $data->body_response }}</td>
            <tr>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
@endsection
