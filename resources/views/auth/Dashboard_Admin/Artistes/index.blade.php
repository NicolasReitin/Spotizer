@extends('layouts.appAdmin')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')
        <div class="mainAdmin">
            <h1 class="mb-5 text-center">Liste des utilisateurs</h1>
            <div class="boutonCentral mt-5">
                <a href="{{ route('artistes.create') }}"><button class="btn btn-outline-light ">Créer un nouvel artiste</button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">pseudo</th>
                    <th scope="col">name</th>
                    <th scope="col">First name</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Date de décès</th>
                    <th scope="col">Lien de la photo</th>
                    <th scope="col">Fichier upload</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($artistes as $artiste)
                    <tr>
                        <th scope="row">{{ $artiste->id }}</th>
                        <td>{{ ucfirst($artiste->pseudo) }}</td>
                        <td>{{ ucfirst($artiste->name) }}</td>
                        <td>{{ ucfirst($artiste->first_name) }}</td>
                        <td>{{ $artiste->date_naissance }}</td>
                        <td>{{ $artiste->date_deces }}</td>
                        <td>{{ $artiste->photo }}</td>
                        <td>{{ $artiste->upload }}</td>
                        <td>
                            <a href="{{ route('artistes.edit', ['artiste' => $artiste->id]) }}" class="btn btn-warning"><img src="{{ asset('assets/icones/edit.svg') }}" alt="Edit" style="background: 0%"></a>
                        </td>
                        <td>
                            <form action="{{ route('artistes.delete', ['artiste' => $artiste->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer cet artiste?')"><img src="{{ asset('assets/icones/trash.svg') }}" alt="Delete" style="background: 0%"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="imageCentral mt-4">
                <div class="paginate">
                    {{ $artistes->links() }} 
                </div>
            </div>
        </div>
    </div>
@endsection