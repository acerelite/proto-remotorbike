</div>
</div>

<!-- Footer -->
<footer class="page-footer font-small text-white bg-info" style="margin-bottom:0">
    <div class="footer-copyright text-center py-3">&copy; 2020 Copyright: Re-Motorbike</div>
    <div class="col col-md-2 text-center container-fluid">

    </div>
</footer>

<script>
    jQuery(window).scroll(function() {
        var vscroll = jQuery(this).scrollTop();
    });

    function detailsmodal(id) {
        var data = {
            "id": id
        };
        jQuery.ajax({
            url: '/remotorbike/includes/detailsmodal.php',
            method: "POST",
            data: data,
            success: function(data) {
                jQuery('body').append(data);
                jQuery('#modal-details').modal('toggle');
            },
            error: function() {}
        });
    }
</script>
</body>

</html>