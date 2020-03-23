@extends('layouts.admin')

@section('content')
<table class="responsive-table highlight">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Format</th>
            <th>Genre</th>
            <th>Terrain</th>
            <th>Places</th>
            <th>Inscrits</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tournaments as $tournament)
        <tr>
            <td>{{ $tournament->name }}</td>
            <td>{{ $tournament->team_size }}</td>
            <td>{{ $tournament->genre }}</td>
            <td>{{ $tournament->field }}</td>
            <td>{{ $tournament->size }}</td>
            <td>0</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
