<!-- Modal -->
<div class="modal fade" id="update_commande" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel">Modifier Commande</h4> 
            </div>
            <br>
            <div class="modal-body">
                <form id="update_commande_form" onsubmit="return false">

                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value=""/>
                        <label>Nom de Livreur : </label>
                        <select class="form-control" id="select_liv" name="select_liv"/>



                        </select>
                        <small id="l_error" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label>Vehicule Utiliser : </label>
                        <select class="form-control" id="select_veh" name="select_veh"/>



                        </select>
                        <small id="v_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Etat de Livraison : </label>
                        <select class="form-control" id="select_etat" name="select_etat"/>
                            <option value="Pas Encore">Pas Encore</option>
                            <option value="Sous Livraison">Sous Livraison</option>
                            <option value="Livré">Livré</option>
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