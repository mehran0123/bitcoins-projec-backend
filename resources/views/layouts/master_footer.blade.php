 <!-- copyright -->
 <footer class="auth-footer"> Bitcoins © 2021-22 All Rights Reserved.
    {{-- <a href="#">Privacy</a> and <a href="#">Terms</a> --}}
</footer>
</main><!-- /.auth -->
<!-- BEGIN BASE JS -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/popper.js/umd/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
<!-- BEGIN PLUGINS JS -->
<script src="assets/vendor/particles.js/particles.js"></script>
<script>
/**
 * Keep in mind that your scripts may not always be executed after the theme is completely ready,
 * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
 */
$(document).on('theme:init', () =>
{
  /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
  particlesJS.load('auth-header', '{{ URL::to("public/admin/assets/javascript/pages/particles.json") }}');
})
</script> <!-- END PLUGINS JS -->
<!-- BEGIN THEME JS -->
<script src="{{ URL::to('/public/admin/assets/javascript/theme.js') }}"></script> <!-- END THEME JS -->
