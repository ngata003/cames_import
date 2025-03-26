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
    document.getElementById('deleteForm').action = '/agences_delete/' + id;

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
    }
</script>

<script>
    function openDeleteModal(button) {
    var id = button.getAttribute('data-id');
    document.getElementById('ActiveForm').action = '/retraits_active/' + id;

    var activeModal = new bootstrap.Modal(document.getElementById('ActiveModal'));
    activeModal.show();
    }
</script>

</body>

</html>
