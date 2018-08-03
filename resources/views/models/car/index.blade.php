@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.default.vertical-menu')
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('cars.create') }}" class="btn btn-success btn-xs pull-right"><i class="fas fa-plus"></i> Nouvelle voiture</a>
                    Liste des voitures
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Modèle</th>
                                <th width="110" class="text-right">Kilométrage</th>
                                <th width="110" class="text-center">Date dernier<br/>Kilométrage</th>
                                <th width="220"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( Car::all() as $item )
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ trim($item->marque.' '.$item->modele) }}</td>
                                    <td class="text-right">{{ $item->kilometrage }} Km</td>
                                    <td class="text-center">{{ $item->dateKilometrage->format('d/m/Y') }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal--addKm-{{ $item->id }}"><i class="fas fa-plus"></i> Km</button>
                                            <a href="{{ route('cars.edit', $item) }}" class="btn btn-default btn-xs"><i class="fas fa-edit"></i> Modifier</a>
                                            <a href="{{ route('cars.destroy', $item) }}" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Supprimer</a>
                                        </div>
                                    </td>
                                </tr>
                                @include('models.car.modal--add-km')
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
