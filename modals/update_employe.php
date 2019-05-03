<!-- Modal -->
<div class="modal fade" id="update_employe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel">Modifier l'Employe</h4> 
            </div>
            <br>
            <div class="modal-body">
                <form id="update_employe_form" onsubmit="return false">

                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value=""/>
                        <label>Nom Complet d'employé : </label>
                        <input type="text" class="form-control" id="modal_enom" name="modal_enom">
                        <small id="mn_error" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label>CIN : </label>
                        <input type="text" class="form-control" id="modal_ecin" name="modal_ecin"/>
                        <small id="mcin_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Adresse : </label>
                        <input type="text" class="form-control" id="modal_eadresse" name="modal_eadresse">
                        <small id="ma_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Telephone : </label>
                        <input type="text" class="form-control" id="modal_etele" name="modal_etele">
                        <small id="mt_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Role : </label>
                        <select class="form-control" id="urole" name="urole">
                            <option value="">Choisissez un Rôle</option>
                            <option value="Admin">Admin</option>
                            <option value="Employe">Employe</option>
                        </select>
                        <small id="ur_error" class="form-text text-muted"></small>
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