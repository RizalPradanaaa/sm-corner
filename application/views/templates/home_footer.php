        <!-- Footer-->
        <footer class="py-3 bg-custom-nav">
            <div class="container"><p class="m-0 text-center text-dark">Copyright &copy; SM - Corner <?= date('Y'); ?></p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('public/home') ?> /js/scripts.js"></script>



        <!-- Bootstrap core JavaScript-->
        <!-- AUTH/ADMIN -->
        <script src="<?= base_url('public/assets') ?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('public/assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('public/assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('public/assets') ?>/js/sb-admin-2.min.js"></script>
        <!-- AUTH/ADMIN -->

        <script>
        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
        </body>
</html>