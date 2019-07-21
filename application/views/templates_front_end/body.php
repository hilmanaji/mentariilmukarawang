<!DOCTYPE html>
<html lang="en">

<?php echo $_head; ?>

<body id="page-top">


        <!-- ===== Top-Navigation ===== -->
        <?php echo $_navbar; ?>
        <!-- ===== Top-Navigation-End ===== -->

        <!-- Page Content -->
        <?php echo $_content; ?>
        <!-- Page Content - End -->

        <!-- Footer -->
        <?php echo $_footer; ?>
        <!-- Footer - End-->

     <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url(); ?>assets/front_end/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/front_end/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
	    $(window).scroll(function() {
        if($(document).scrollTop() > 100) {
                $('#nav').addClass('shrink');
        }
        else {
            $('#nav').removeClass('shrink');
        }
        });
        });
    </script>

</body>

</html>