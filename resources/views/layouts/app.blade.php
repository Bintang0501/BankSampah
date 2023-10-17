<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    @yield("title") - Bank Sampah
  </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  @include("layouts.css.style")

</head>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    @include("layouts.partials.header")

    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Top Navigation
            <small>Example 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Top Navigation</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
              sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
          </div>
          <div class="callout callout-danger">
            <h4>Warning!</h4>

            <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
          </div>
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Blank Box</h3>
            </div>
            <div class="box-body">
              The great content goes here
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.18
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
        reserved.
      </div>
      <!-- /.container -->
    </footer>
  </div>

  @include("layouts.js.style")

</body>
</html>
