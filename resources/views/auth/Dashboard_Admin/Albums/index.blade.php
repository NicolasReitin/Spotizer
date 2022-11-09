@extends('layouts.appAdmin')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')
        <div class="mainAdmin">
            <h1 class="mb-5 text-center">Liste des albums</h1>
            <div class="boutonCentral mt-5">
                <a href="{{ route('albums.create') }}"><button class="btn btn-outline-light ">Créer un nouvel album</button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date de sortie</th>
                    <th scope="col">Groupe_id</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Fichier upload</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                    <tr>
                        <th scope="row">{{ $album->id }}</th>
                        <td>{{ ucfirst($album->titre) }}</td>
                        <td>{{ ucfirst($album->date_de_sortie) }}</td>
                        <td>{{ ucfirst($album->groupe_id) }}</td>
                        <td>
                            @if ($album->cover)
                                {{ $album->cover }}
                            @endif
                        </td>
                        <td>
                            @if ($album->upload)
                                {{ $album->upload }}
                            @endif
                            
                        </td>
                        <td>
                            <a href="{{ route('albums.edit', ['album' => $album->id]) }}" class="btn btn-warning"><img src="{{ asset('assets/icones/edit.svg') }}" alt="Edit" style="background: 0%"></a>
                        </td>
                        <td>
                            <form action="{{ route('albums.delete', ['album' => $album->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer cet album?')"><img src="{{ asset('assets/icones/trash.svg') }}" alt="Delete" style="background: 0%"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="imageCentral mt-4">
                <div class="paginate">
                    {{ $albums->links() }} 
                </div>
            </div>
        </div>
    </div>
@endsection