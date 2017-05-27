<?php
error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Example 01 </title>
<link rel="stylesheet" href="../css/bootstrap.min.css?ver=3.3.7" type="text/css" media="all" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12" style="margin-top: 20px;">
        <button type="button" name="button1" id="button1" class="btn btn-primary">Show Product</button>
      </div>
      <div class="col-xs-12" id="product_list"></div>
    </div>
  </div>

  <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('#button1').on('click', function(event) {
        event.preventDefault();
        $.ajax({
          url: 'php-data.php',
          type: 'GET',
          dataType: 'json',
          data: {param1: 'getproductlist'}
        })
        .done(function(response) {
          // console.log("success");
          // console.log(response);
          for (var key in response) {
            var item = response[key];
            // console.log(response[key]);
            var html = '<div class="col-sm-4 item">';
            html += '<div class="image"><img src="'+ item.image +'" class="img-responsive" alt=""></div>';
            html += '<div class="content">';
            html += '<h3>'+ item.title +'</h3>';
            html += '<p>'+ item.description +'</p>';
            html += '<h3><span class="label label-danger">Price : '+ item.price +'</span></h3>';
            html += '<button type="submit" id="btn-addcart'+ key +'" name="btn-addcart" value="'+ key +'" class="btn btn-primary btn-addcart">Add Cart</button>';
            html += '</div></div>';

            $('#product_list').after(html);
          }
        })
        .fail(function(xhr, ajaxOptions, thrownError) {
          // console.log("error");
          // console.log(xhr);
          // console.log(ajaxOptions);
          console.log(thrownError);
        })
        .always(function() {
          // console.log("complete");
        });
      });
    });
  </script>
</body>
</html>
