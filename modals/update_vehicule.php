<!-- Modal -->
<div class="modal fade" id="update_vehicule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel">Modifier Vehicule</h4> 
            </div>
            <br>
            <div class="modal-body">
                <form id="update_vehicule_form" onsubmit="return false">

                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value=""/>
                        <label>Numero de Vehicule : </label>
                        <input type="text" class="form-control" id="num_vehicule" name="num_vehicule" >
                        <small id="vn_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Etat de Livraison : </label>
                        <select class="form-control" id="select_vetat" name="select_vetat"/>
                        <option value="Disponible">Disponible</option>
                        <option value="Indisponible">Indisponible</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>