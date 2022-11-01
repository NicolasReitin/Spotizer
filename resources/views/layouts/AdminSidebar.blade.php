<div class="d-block">

    <div class="sidebarAdmin">
        <h4><u></u></h4>
        <ul class="nav flex-column">
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}">Liste des utilisateurs</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminGroupes') }}">Liste des Groupes</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminArtistes') }}">Liste des Artistes</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminTitres') }}">Liste des Titres</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminAlbums') }}">Liste des Albums</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="">Panel des droits</a>
            </li>
            <hr>
        </ul>
    </div>

</div>