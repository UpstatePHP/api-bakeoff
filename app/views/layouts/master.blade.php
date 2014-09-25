<!DOCTYPE html>
<html lang="en" ng-app="todoApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bake Off</title>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/lodash/dist/lodash.min.js"></script>
    <script src="bower_components/angularjs/angular.min.js"></script>
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="js/todoapp.js"></script>
      
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/bakeoff.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" ng-include src="'views/navbar.html'">
      
    </div>

    <div class="container" ng-view>
        
      <div class="starter-template">
        <h1>Bakeoff Lists</h1>
        <p class="lead">Lists here.</p>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
