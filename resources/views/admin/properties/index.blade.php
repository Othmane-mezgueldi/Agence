@extends('admin.layout')

@section('title', 'Tous les biens')

@section('content')
    <h1>Les biens</h1>

    <div class="card">
        <div class="card-header">
            <h6 class="fw-bold">Les biens</h6>
        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.properties.create') }}" class="btn btn-dark btn-sm fw-bold">
                    Ajouter
                </a>

                <div>
                    <input type="search" class="form-control" placeholder="Rechercher:">
                </div>
            </div>
            {{-- d-flex --}}

            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="table-light">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Surface</th>
                            <th>Prix</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->id }}</td>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->surface }}</td>
                                <td>{{ number_format($property->price, 2, ',', ' ') }}</td>
                                <td>
                                    <a href="" class="btn btn-dark btn-sm fw-bold">
                                        Afficher
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $properties->links() }}
            </div>

        </div>
    </div>
@endsection
