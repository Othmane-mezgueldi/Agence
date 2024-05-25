@extends('admin.layout')

@section('title', 'Tous les biens')

@section('content')
    <h3>Les biens</h3>

    <div class="card shadow-sm">
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
                            <th>Solde</th>
                            <th>Surface</th>
                            <th>Prix</th>
                            <th class="text-enda">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->id }}</td>
                                <td>{{ $property->title }}</td>
                                <td>
                                    @if ($property->sold)
                                        <span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Solde</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Non</span>
                                    @endif
                                </td>
                                <td>{{ $property->surface }}</td>
                                <td>{{ number_format($property->price, 2, ',', ' ') }}</td>
                                <td>
                                    <div class="d-flex gap-1 w-100 justify-content-enda">
                                        <a href="" class="btn btn-dark btn-sm fw-bold">
                                            Afficher
                                        </a>

                                        <a href="{{ route('admin.properties.edit', $property) }}"
                                            class="btn btn-dark btn-sm fw-bold">
                                            Editer
                                        </a>

                                        <form action="{{ route('admin.properties.destroy', $property) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm fw-bold">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
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
