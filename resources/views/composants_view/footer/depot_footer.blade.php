<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="assets/vendors/chart.js/chart.umd.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="assets/js/dashboard.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    @if(session('status_save'))
        var succesModal = new bootstrap.Modal(document.getElementById('succesModal'));
        succesModal.show();
    @endif
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    @if(session('updated_status'))
        var editerModal = new bootstrap.Modal(document.getElementById('editerModal'));
        editerModal.show();
    @endif
    });
</script>

<script>
    function openDeleteModal(button) {
    var id = button.getAttribute('data-id');
    document.getElementById('deleteForm').action = '/delete_colis/' + id;

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
    }
</script>

<div class="modal fade" id="editerModal" tabindex="-1" aria-labelledby="editerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dediterModalLabel"> depot modifié avec succès. </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditModal(button) {
        var id = button.getAttribute('data-id');
        var nom_client = button.getAttribute('data-nom');
        var nom_agence = button.getAttribute('data-nom_agence');
        var duree_trajet = button.getAttribute('data-duree_trajet');
        var couleur_colis = button.getAttribute('data-couleur_colis');
        var moyen_transport = button.getAttribute('data-moyen_transport');
        var date_depart  = button.getAttribute('data-date_depart');
        var image_colis = button.getAttribute('data-image_colis');

        document.getElementById('editModalLabel').textContent = 'Editer un depot  ';
        document.getElementById('editForm').action = '/edit_depots/' + id;
        document.getElementById('client').value = nom_client;
        document.getElementById('agence').value = nom_agence;
        document.getElementById('depart').value = date_depart;
        document.getElementById('couleur').value = couleur_colis;
        document.getElementById('Mtransport').value = moyen_transport;
        document.getElementById('duree').value = duree_trajet;
        document.getElementById('newImage').src = "assets/images/" + image_colis;

        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    }
</script>
</body>
</html>
