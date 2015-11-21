<?php
require_once 'core/init.php';

if(Session::exists('success')){
    echo Session::flash('success');
}

$user = new User();
if($user->isLoggedIn()){
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agri world</title>
    <meta name="description" content="This was generated by the Codeply editor and responsive design playground." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
  </head>
  <body >
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Agri-World</a>
        </div>
        <div class="navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="index.php">View page</a></li>
            <li><a href="profile.php?user=<?php echo escape($user->data()->username);?>">Hello! <b><?php echo escape($user->data()->username);?></b></a></li>
            <li><a href="logout.php">
              <span class="glyphicon glyphicon-log-in"></span>
              Logout
            </a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
</nav>
<br><br>
<div class="container-fluid">
      <br>
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul id="side-bar" class="nav nav-sidebar">
              <li class="active"><a href="#">
                <span class="glyphicon glyphicon-tasks"></span>
                Overview
              </a></li>
              <li><a href="#">
                <span class="glyphicon glyphicon-edit"></span>
                Edits
              </a></li>
              <li><a href="addproduct.php">
                <span class="glyphicon glyphicon-pencil"></span>
                Add New Products
              </a></li>
              <li><a href="#">
                <span class="glyphicon glyphicon-shopping-cart"></span>
                Cart
              </a></li>
              <li><a href="#">
                <span class="glyphicon glyphicon-print"></span>
                Reports
              </a></li>
            </ul>
            <ul class="nav nav-sidebar">
              <li><a href="">Nav item again</a></li>
              <li><a href="">One more nav</a></li>
              <li><a href="">Another nav item</a></li>
            </ul>
          
        </div><!--/span-->
        
        <div class="col-sm-9 col-md-10 main">
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>

          <!-- <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div> -->
            <header>
              <h4 class="page_title">Products</h4>
            </header>
            <div class="content-inner">
              <div class="form-wrapper">
                <form>
                  <div class="row form-group">
                    <label class="sr-only">Title</label>
                    <div class="col-md-3">
                      <span class="">Title 1</span>
                      <input type="text" class="form-control" id="titles" placeholder="Article..1">
                    </div>
                    <div class="col-md-3">
                      <span class="">Title 2</span>
                      <input type="text" class="form-control" id="titles" placeholder="Article..2">
                    </div>
                    <div class="col-md-3">
                      <span class="">Title 3</span>
                      <input type="text" class="form-control" id="titles" placeholder="Article..3">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="checkbox">
                    <label>
                      <input type="checkbox"> Publish
                    </label>
                  </div>
                  </div>
                   <div class="clearfix">
                    <button type="submit" class="btn btn-primary">Publish</button>
                   </div>
                </form>
              </div>

          <div class="form-wrapper">
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                  </tr>
                  <tr>
                    <td>1,002</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>adipiscing</td>
                    <td>elit</td>
                  </tr>
                  <tr>
                    <td>1,003</td>
                    <td>Integer</td>
                    <td>nec</td>
                    <td>odio</td>
                    <td>Praesent</td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>

            </div>
            
            
      </div><!--/row-->
	</div>
</div><!--/.container-->

<footer>
  <p class="pull-right">Developer Thusitha thiyushan ©2015 4it</p>
</footer>

    <!--scripts loaded here-->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/scripts.js"></script>
  </body>
</html>
<?php
}else{
  Redirect::to('404.php');
}
?>