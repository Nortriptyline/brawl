@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<page-dashboard></page-dashboard>


<div class="container">
    <div class="card">
        <div class="card-content">
            <table class="table highlight">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Ville</th>
                        <th>Terrain</th>
                        <th>Genre</th>
                        <th class="center">Format</th>
                        <th class="center">Places</th>
                        <th class="center">Inscrits</th>
                        <th>Date</th>
                        <th class="center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tournaments as $tournament)
                    <tr>
                        <td>{{ $tournament->name }}</td>
                        <td>{{ $tournament->city->name }}</td>
                        <td>{{ $tournament->tsetting->field ?? '-' }}</td>
                        <td>{{ $tournament->tsetting->genre ?? '-' }}</td>
                        <td class="center">{{ $tournament->tsetting->team_size ?? '-'}}</td>
                        <td class="center">{{ $tournament->tsetting->size ?? '-' }}</td>
                        <td class="center">0</td>
                        <td>{{ $tournament->starting_date }}</td>
                        <td class="center">
                            <!-- Edit new -->
                            <tooltip-button path="{{ route('tournaments.edit', ['tournament' => $tournament]) }}"
                                color="blue" text_color="white-text" btn_style="btn-flat" position="top" data="Édition">
                                <i class="large material-icons">edit</i>
                            </tooltip-button>
                            <!-- End edit -->

                            <tooltip-button color="red" text_color="white-text" btn_style="btn-flat" position="top"
                                data="Corbeille"
                                onclick="document.getElementById('trash_{{$tournament->id}}').submit()">
                                <i class="large material-icons">delete</i>
                            </tooltip-button>

                            <form id="trash_{{$tournament->id}}"
                                action="{{ route('tournaments.trash', ['tournament' => $tournament]) }}"
                                style="display: none;" method="POST">
                                @method('PUT')
                                @csrf
                            </form>
                            <!-- End Trash -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <ul class="pagination">
                {{ $tournaments->links('pagination') }}
            </ul>
            {{-- <list-tournaments entries="5" pagination="true" csrf="{{ csrf_token() }}"></list-tournaments>
            --}}
        </div>
    </div>
</div>
@endsection
