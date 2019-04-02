<!-- Modal -->
<div class="modal fade" id="ajouter_livreur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel">Ajouter Livreur</h4>
            </div>
            <div class="modal-body">
                <form id="ajouter_livreur_form" onsubmit="return false">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Le nom</label>
                                <input type="text" class="form-control" name="nom_livreur" id="nom_livreur" placeholder="Entrer le nom de Livreur">
                                <small id="nl_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Le prenom</label>
                                <input type="text" class="form-control" name="prenom_livreur" id="prenom_livreur" placeholder="Entrer le prenom de Livreur">
                                <small id="pl_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Le CIN</label>
                                <input type="text" class="form-control" name="cin_livreur" id="cin_livreur">
                                <small id="cinl_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" class="form-control" name="tele_livreur" id="tele_livreur">
                                <small id="tl_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control" name="adresse_livreur" id="adresse_livreur" placeholder="Entrer L'Adresse de Livreur">
                        <small id="al_error" class="form-text text-muted"></small>
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

