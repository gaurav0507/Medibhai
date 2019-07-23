

<div class="footer-botm">
<div class="container">
<div class="agile-login">
<ul>
<li>© 2019 Medibhai. All rights reserved .</li>
</ul>
</div>

<div class="clearfix"> </div>
</div>
</div>

<script src="<?php echo base_url();?>frontend_css/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        /*
        	var defaults = {
        	containerID: 'toTop', // fading element id
        	containerHoverID: 'toTopHover', // fading element hover id
        	scrollSpeed: 1200,
        	easingType: 'linear' 
        	};
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>

<script src="<?php echo base_url();?>frontend_css/js/minicart.min.js"></script>
<script>
   
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>

<script src="<?php echo base_url();?>frontend_css/js/skdslider.min.js"></script>
<link href="<?php echo base_url();?>frontend_css/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#demo1').skdslider({
            'delay': 5000,
            'animationSpeed': 2000,
            'showNextPrev': true,
            'showPlayButton': true,
            'autoSlide': true,
            'animationType': 'fading'
        });

        jQuery('#responsive').change(function() {
            $('#responsive_wrapper').width(jQuery(this).val());
        });

    });
</script>
</body>
</html> 