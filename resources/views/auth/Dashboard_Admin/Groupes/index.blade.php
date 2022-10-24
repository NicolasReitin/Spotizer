@extends('layouts.app')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')
        <div class="mainAdmin">
            <h1 class="mb-5 text-center">Liste des utilisateurs</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Nationalité</th>
                    <th scope="col">Lien de l'image</th>
                    <th scope="col">Fichier upload</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupes as $groupe)
                    <tr>
                        <th scope="row">{{ $groupe->id }}</th>
                        <td>{{ ucfirst($groupe->name) }}</td>
                        <td>{{ $groupe->date_creation }}</td>
                        <td>{{ $groupe->nationalite }}</td>
                        <td>{{ $groupe->photo }}</td>
                        <td>{{ $groupe->upload }}</td>
                        <td>
                            <a href="" class="btn btn-warning"><img src="{{ asset('assets/icones/edit.svg') }}" alt="Edit" style="background: 0%"></a>
                        </td>
                        <td>
                            <form action="" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce groupe?')"><img src="{{ asset('assets/icones/trash.svg') }}" alt="Delete" style="background: 0%"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="paginate">
                {!! $groupes->links() !!} 
            </div>
        </div>
    </div>
@endsection