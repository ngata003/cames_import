
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
        var contact = button.getAttribute('data-contact');
        var email = button.getAttribute('data-email');
        var site_web = button.getAttribute('data-site_web');

        document.getElementById('editModalLabel').textContent = 'Editer une agence ';
        document.getElementById('editForm').action = '/agences_edit/' + id;
        document.getElementById('nom_agence').value = nom;
        document.getElementById('localisation').value = localisation;
        document.getElementById('email_agence').value = email;
        document.getElementById('contact_agence').value = contact;
        document.getElementById('site_web').value = site_web;

        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    }
</script>

<script>
    function openDeleteModal(button) {
    var id = button.getAttribute('data-id');
    document.getElementById('deleteForm').action = '/agences_delete/' + id;

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
    }
</script>

 <script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('update_success'))
        var editeModal = new bootstrap.Modal(document.getElementById('editeModal'));
        editeModal.show();
    @endif
    });
 </script>

 <script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('agence_success'))
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    @endif
    });
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
