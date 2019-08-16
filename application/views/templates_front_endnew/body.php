<!DOCTYPE HTML>
<html>
	<?php echo $_head; ?>
	<body>		
	<div class="fh5co-loader"></div>	
	<div id="page">	
        <?php echo $_navbar; ?>	
        <?php echo $_content; ?>
        <?php echo $_footer; ?>
	
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/front_end_new/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?= base_url() ?>assets/front_end_new/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>assets/front_end_new/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?= base_url() ?>assets/front_end_new/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="<?= base_url() ?>assets/front_end_new/js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="<?= base_url() ?>assets/front_end_new/js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="<?= base_url() ?>assets/front_end_new/js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="<?= base_url() ?>assets/front_end_new/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="<?= base_url() ?>assets/front_end_new/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>assets/front_end_new/js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="<?= base_url() ?>assets/front_end_new/js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="<?= base_url() ?>assets/front_end_new/js/main.js"></script>
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>
	</body>
</html>

