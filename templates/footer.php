<?php
$server_name = $_SERVER['SERVER_NAME'];
$base_url = "http://" . $server_name . "/leave-management-system";
?>

<!-- Vendor JS Files -->
<script src="<?php echo $base_url; ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo $base_url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $base_url; ?>assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?php echo $base_url; ?>assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo $base_url; ?>assets/vendor/quill/quill.js"></script>
<script src="<?php echo $base_url; ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo $base_url; ?>assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo $base_url; ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo $base_url; ?>assets/js/main.js"></script>

</body>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-4 border-top border-bottom" style="position:relative; bottom:0; width:100%;">
    <div class="col-md-6 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
            <svg class="bi" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">Copyright © 2024. All rights reserved.</span>
    </div>
    <div class="col-md-6 d-flex align-items-end justify-content-end px-5">
        <span class="mb-3 mb-md-0 text-body-secondary">
            Sanjay Ghodawat Inst. (by:
            <a href="#" class="fw-bold" style="text-decoration: none;">Kunal Khude</a>
            ) v1.0
        </span>
    </div>
</footer>
</html>
