<div class="modal fade" id="modal--addKm-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajout de kilométrage</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('cars.addMileage', $item) }}" method="POST">
                    <div class="form-group">
                        <label for="">Valeur</label>
                        <input type="number" class="form-control" id="" name="value" />
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="text" class="form-control" id="" name="date" value="{{ Carbon::now()->toDateString() }}" />
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                nothing
            </div>
        </div>
    </div>
</div>