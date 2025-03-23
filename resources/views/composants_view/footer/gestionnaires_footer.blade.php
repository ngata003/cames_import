
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    function openEditModal(button) {
        var id = button.getAttribute('data-id');
        var nom = button.getAttribute('data-nom');
        var residence = button.getAttribute('data-residence');
        var contact = button.getAttribute('data-contact');
        var email = button.getAttribute('data-email');
        var role = button.getAttribute('data-role');
        var image = button.getAttribute('data-image');

        document.getElementById('editModalLabel').textContent = 'Editer une agence ';
        document.getElementById('editForm').action = '/gestionnaires_edit/' + id;
        document.getElementById('name').value = nom;
        document.getElementById('email').value = email;
        document.getElementById('residence').value = residence;
        document.getElementById('role').value = role;
        document.getElementById('contact').value = contact;
        document.getElementById('newImage').src = "assets/images/" + image;

        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('gestionnaire_updated'))
        var editeModal = new bootstrap.Modal(document.getElementById('editeModal'));
        editeModal.show();
    @endif
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session(''))
        var deleterModal = new bootstrap.Modal(document.getElementById('deleterModal'));
        deleterModal.show();
    @endif
    });
</script>
<script>
    function openDeleteModal(button) {
    var id = button.getAttribute('data-id');
    document.getElementById('deleteForm').action = '/gestionnaires_delete/' + id;

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('gestionnaires_deleted'))
        var deleterModal = new bootstrap.Modal(document.getElementById('deleterModal'));
        deleterModal.show();
    @endif
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('gestionnaire_added'))
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
<script>
    let form = document.getElementById('formulaire');
    let bouton = document.getElementById('bouton');
    let loader = '<span class="spinner-border spinner-border-sm text-light me-2"></span>';

    form.addEventListener("submit", function(){
        bouton.disabled = true;
        bouton.innerHTML = loader + "sauvegarde en cours...";
    })
</script>
</body>
</html>
