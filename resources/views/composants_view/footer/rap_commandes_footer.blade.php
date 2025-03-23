
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
    function openDeleteModal(button) {
    var id = button.getAttribute('data-id');
    document.getElementById('deleteForm').action = '/delete_commandes/' + id;

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('status_deleted'))
        var deletedModal = new bootstrap.Modal(document.getElementById('deletedModal'));
        deletedModal.show();
    @endif
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('save_succeed'))
        var deletedModal = new bootstrap.Modal(document.getElementById('successModal'));
        deletedModal.show();
    @endif
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    @if(session('success_edit'))
        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    @endif
    });
</script>
</body>
</html>
