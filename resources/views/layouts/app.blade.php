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

  @yield("css")

</head>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    @include("layouts.partials.header")

    <div class="content-wrapper">
      <div class="container">
        <section class="content-header">
          <h1>
            @yield("title_breadcrumb")
          </h1>
          
          @yield("breadcrumb")

        </section>

        <section class="content">
          @yield("content")
        </section>
      </div>
    </div>

    @include("layouts.partials.footer")

  </div>

  @include("layouts.js.style")

  @yield("js")

</body>
</html>
