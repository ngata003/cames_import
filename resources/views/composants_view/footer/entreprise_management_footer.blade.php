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
    function openEditModal(button) {
        var id = button.getAttribute('data-id');
        var nom = button.getAttribute('data-nom');
        var localisation = button.getAttribute('data-localisation');
        var fax = button.getAttribute('data-fax');
        var email = button.getAttribute('data-email');
        var site_web = button.getAttribute('data-site');
        var logo = button.getAttribute('data-image');

        document.getElementById('editModalLabel').textContent = 'Modifier Votre Entreprise ';
        document.getElementById('editForm').action = '/entreprise_edit/' + id;
        document.getElementById('nom_entreprise').value = nom;
        document.getElementById('localisation').value = localisation;
        document.getElementById('email_entreprise').value = email;
        document.getElementById('fax_entreprise').value = fax;
        document.getElementById('site_web').value = site_web;
        document.getElementById('editImage').src="assets/images/"+ logo;

        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    }
</script>
<script>
    $(document).ready(function () {
        @if ($errors->any())
            $("#errorModal").modal("show");
        @endif
    });
</script>
</body>
</html>
