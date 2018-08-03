
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Tableau de bord</a></li>
    <li role="presentation" class="{{ Route::is('cars.*') ? 'active' : '' }}"><a href="{{ route('cars.index') }}">Voitures</a></li>
</ul>