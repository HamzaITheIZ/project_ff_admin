<!-- Modal -->
<div class="modal fade" id="update_livreur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel">Modifier Livreur</h4>
            </div>
            <div class="modal-body">
                <form id="update_livreur_form" onsubmit="return false">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value=""/>
                        <label>Le nom Complet</label>
                        <input type="text" class="form-control" name="unom_livreur" id="unom_livreur" placeholder="Entrer le nom de Livreur">
                        <small id="unl_error" class="form-text text-muted"></small>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Le CIN</label>
                                <input type="text" class="form-control" name="ucin_livreur" id="ucin_livreur">
                                <small id="ucinl_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" class="form-control" name="utele_livreur" id="utele_livreur">
                                <small id="utl_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control" name="uadresse_livreur" id="uadresse_livreur" placeholder="Entrer L'Adresse de Livreur">
                        <small id="ual_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Etat</label>
                        <select name="etat_livreur" class="form-control" id="etat_livreur">
                            <option value="">Sélectionner l'Etat de Livreur</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Indisponible">Indisponible</option>
                        </select>
                        <small id="el_error" class="form-text text-muted"></small>
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

