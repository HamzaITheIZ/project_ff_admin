<!-- Modal -->
<div class="modal fade" id="ajouter_vehicule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel">Ajouter Vehicule</h4> 
            </div>
            <br>
            <div class="modal-body">
                <form id="ajouter_vehicule_form" onsubmit="return false">
                    <div class="form-group">
                        <label>Nom de Vehicule : </label>
                        <input type="text" class="form-control" id="modal_vehicule" name="modal_vehicule" >
                        <small id="nv_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>