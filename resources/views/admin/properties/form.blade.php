@extends('admin.layout')
@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')
@section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h6 class="fw-bold">
                @yield('title')
            </h6>
        </div>

        <div class="card-body">
            <form class="vstack gap-2"
                action="{{ route($property->exists ? 'admin.properties.update' : 'admin.properties.store', $property) }}"
                method="POST">
                @csrf
                @method($property->exists ? 'PATCH' : 'POST')

                <div class="row">
                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Titre',
                            'name' => 'title',
                            'value' => $property->title,
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Surface',
                            'name' => 'surface',
                            'value' => $property->surface,
                            'type' => 'number',
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Prix',
                            'name' => 'price',
                            'value' => $property->price,
                            'type' => 'number',
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col-12">
                        @include('shared.textarea', [
                            'label' => 'Description',
                            'name' => 'description',
                            'value' => $property->description,
                        ])
                    </div>
                    {{-- col --}}


                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Pièce',
                            'name' => 'rooms',
                            'value' => $property->rooms,
                            'type' => 'number',
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Chambre',
                            'name' => 'bedrooms',
                            'value' => $property->bedrooms,
                            'type' => 'number',
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Etage',
                            'name' => 'floor',
                            'value' => $property->floor,
                            'type' => 'number',
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Adresse',
                            'name' => 'address',
                            'value' => $property->address,
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Ville',
                            'name' => 'city',
                            'value' => $property->city,
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Code postal',
                            'name' => 'postal_code',
                            'value' => $property->postal_code,
                            'type' => 'number',
                        ])
                    </div>
                    {{-- col --}}

                    <div class="col-12 mt-3 mb-2">
                        @include('shared.checkbox', [
                            'label' => 'Solde',
                            'name' => 'sold',
                            'value' => $property->sold,
                        ])
                    </div>
                    {{-- col --}}

                </div>
                {{-- row --}}

                <div>
                    <button type="submit" class="btn btn-dark wf-bold">
                        @if ($property->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
