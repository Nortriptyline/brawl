@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <ul>
            {{ $region->name }} | {{ $region->code }}

            @foreach ($region->cities as $city)
                <li>{{ $city->name }} | {{ $city->department->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
