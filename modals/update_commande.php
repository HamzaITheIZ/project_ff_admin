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
                    <div id="updateinfo" class="row" style="display: none;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label class="text-info">Vous pouvez modifier les informations de livraison</label>&nbsp;<a class="btn btn-info showup">Click ici</a>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value=""/>
                        <input type="hidden" name="employe" id="employe" value="<?php echo $_SESSION["userid"]; ?>"/>
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
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button id="md" type="submit" class="btn btn-primary" style="display: none;">Modifier les Données</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="form-group">
                        <label>Etat de Livraison : </label>
                        <select class="form-control" id="select_etat" name="select_etat"/>
                        <option value="Pas Encore">Pas Encore</option>
                        <option value="Sous Livraison">Sous Livraison</option>
                        <option value="Livré">Livré</option>
                        </select>
                    </div>
                    <button id="mj" type="submit" class="btn btn-primary">Mis à Jour</button>
                    <button id="mje" type="submit" class="btn btn-primary" style="display: none;">Mettre à jour l'État</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>