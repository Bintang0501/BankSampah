<script src="{{ url('') }}/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{ url('') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>