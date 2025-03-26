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
</body>
<script>
    function openReadModal(button) {
        var description = button.getAttribute("data-description");
        var id = button.getAttribute("data-id");
        document.getElementById("modalDescription").innerText = description;

        document.getElementById("ActiveForm").action = "/lu_notif/" + id;

        var myModal = new bootstrap.Modal(document.getElementById("activeModal"));
        myModal.show();
    }
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
    document.getElementById('deleteForm').action = '/notifications_delete/' + id;

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
    }
</script>

</html>
