		<!-- ==============================================
		SCRIPTS
		=============================================== -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/waypoints.min.js"></script>
		<script src="../js/designr.js"></script>

        <script src="<?= SITE_URL; ?>js/tinymce/tinymce.min.js"></script>
        <script>
            (function($){

                $('#duplicatebtn').click(function(e){
                    e.preventDefault();
                    var $clone = $('#duplicate').clone().attr('id', '').removeClass('hidden');
                    $('#duplicate').before($clone);
                })

            })(jQuery);

            tinyMCE.init({
                // General options
                mode : "textareas"
            });
        </script>

	</body>
	
</html>