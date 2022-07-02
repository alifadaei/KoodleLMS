<div class="toast-container position-fixed start-50 translate-middle-x mt-1" style="z-index: 11; top: 80px;">
    <div id="liveToast-s" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="bi bi-check-square me-2" alt="..."></i>
            <strong class="me-auto">Koodle</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">

        </div>
    </div>
    <div id="liveToast-f" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <i class="bi bi-exclamation-circle me-2" alt="..."></i>
            <strong class="me-auto">Koodle</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">

        </div>
    </div>
    <div id="liveToast-a" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-warning text-white">
            <i class="bi bi-exclamation-circle me-2" alt="..."></i>
            <strong class="me-auto">Koodle</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">

        </div>
    </div>
</div>
<script>
    function showToast(type, msg) {
        let toastLiveExample = document.getElementById('liveToast-' + type);
        if (type == 's') { //success
            $('#liveToast-s').find('.toast-body').text(msg);

        } else if (type == 'f') { //failure
            $('#liveToast-f').find('.toast-body').text(msg);
        } else if (type == 'a') { //alert
            $('#liveToast-a').find('.toast-body').text(msg);
        }
        let toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
    }
</script>