@extends('layouts.appAdmin')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')
        <div class="mainAdmin">
            <h1 class="mb-5 text-center">Liste des titres</h1>
            <div class="boutonCentral mt-5">
                <a href="{{ route('titres.create') }}"><button class="btn btn-outline-light ">Créer un nouveau titre</button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Durée ( en secondes)</th>
                    <th scope="col">Filepath</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($titres as $titre)
                    <tr>
                        <th scope="row">{{ $titre->id }}</th>
                        <td>{{ ucfirst($titre->titre) }}</td>
                        <td>{{ $titre->duree_secondes }}</td>
                        <td>{{ $titre->filepath }}</td>
                        <td>{{ $titre->created_at }}</td>
                        <td>{{ $titre->updated_at }}</td>
                        <td>
                            <a href="{{ route('titres.edit', ['titre' => $titre->id]) }}" class="btn btn-warning"><img src="{{ asset('assets/icones/edit.svg') }}" alt="Edit" style="background: 0%"></a>
                        </td>
                        <td>
                            <form action="{{ route('titres.delete', ['titre' => $titre->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')"><img src="{{ asset('assets/icones/trash.svg') }}" alt="Delete" style="background: 0%"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="paginate">
                {!! $titres->links() !!} 
            </div>
        </div>
    </div>
@endsection