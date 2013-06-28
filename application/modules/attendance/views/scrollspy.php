<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Javascript · Bootstrap</title>

    <!-- Le styles -->
   <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link rel="stylesheet" href=<?php echo base_url('css/jqPagination.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/docs.css') ?> />
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">
      <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="http://localhost/attendence_system/index.php/Homecontroller" ><h4>3 Hammers Attendance Management System</h4></a>
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>

                    </a>


                    
                        <ul class="nav nav-pills">
                            <li class="dropdown">
                                <a class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   href="" href style="">
                                    Check Out
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" href style=""><li>
                                        <a href="http://localhost/attendence_system/index.php/auth/logout">Check Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    
                </div>
            </div>
        </div>
      <div>
        <ul class="nav nav-pills ">
            <li class="dropdown">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   href="" href style="margin-top:45px;margin-left: 40px; ">
                    ATTENDANCE DATE
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu"  href style="margin-left: 40px;">

                    <?php
                    foreach ($records as $rec) {

                        echo '<table class="table">';
                        echo'<li><a href="http://localhost/attendence_system/index.php/HomeController/manage/' . $rec->date . '"/>';
                        echo $rec->date . "   " . "";
                        echo '</a></li>';
                        echo'</table>';
                    }
                    ?>

                </ul>
            </li>
        </ul>
    </div>
    <a class="brand">
    <div class="nav-collapse collapse">
        <div class="navbar-search pull-left">
            <?php echo form_open('Homecontroller/search', array('method' => 'post', 'name' => 'search')); ?>
            <input type="text"  name="search" class="search-query" placeholder="Search"/>
        </div>
        <?php echo form_close(); ?>
    </div></a>
    <div class="container">
        <div class="row">



<!--<input class="btn" name="search" type=submit value='Search' />--></a>

            <div  class="span3 bs-docs-sidebar">
                <ul class="nav nav-list bs-docs-sidenav affix">
                    <h3>Manage user</h3>
                    <li class="active"><a href="#anything"><i class="icon-chevron-right"></i> Overview</a></li>
                    <li><a href="#nothing"><i class="icon-chevron-right"></i>Describe</a></li>
                    <li ><a href="#everything"><i class="icon-chevron-right"></i>Download</a></li>
                </ul>

            </div>
            <div class="span10">


  <!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>

<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#home">Home</a></li>
  <li><a href="#profile">Profile</a></li>
  <li><a href="#messages">Messages</a></li>
  <li><a href="#settings">Settings</a></li>
</ul>
 
<div class="tab-content">
  <div class="tab-pane active" id="home">...</div>
  <div class="tab-pane" id="profile">...</div>
  <div class="tab-pane" id="messages">...</div>
  <div class="tab-pane" id="settings">...</div>
</div>


                <section id="anything">
                    fsfhsfhskl
                    <br/>
                    fskfslfslfls
                    <br/>
                    sfsjfs;fjlsf
                    <br/>
                    sfksfsjfsjf
                    <br/>
                    slfsf;ljs;f
                    <br/>
                    sfslkfs;f
                    <br/>
                    sflsjfs;fjs
                    <br/>
                    slfjsf;sjfs
                    <br/>
                    sfslfsjf;ljs
                    <br/>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                </section>
                <section id="nothing">
                    <h5>workout</h5>
                    <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        hj;j;kj';<br/>
                        kjgkgjkgj<br/>
                        hjfkjfk<br/>
                        ruasrsufr<br/>
                        hdhdhdh<br/>
                        hjfjfjhfjf<br/>
                        fjjgfjhjhgghjg<br/>
                        fjfkjghkgkgklglkg<br/>
                        jdfjfjgfkjgkgv
                        <br/>
                        fjgjhkjlk;
                        fjgjhkjlk<br/>
                        fyyuuiki<br/>


                    </p>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                </section>
                <section id="everything">
                    <h5>attempt</h5>
                    <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                       <p>kasfhakgfakgfakgffkaffkfkaffff<br/>
                        ffskhsfskhfkshffsfk<br/>
                        sfusfsfsf<br/>
                        fsfsfksf<br/>
                        adadada
                    </p>
                </section>
            </div>           
        </div>
    </div>
      <div class="pagination"  >
    <ul>
        <?php echo $this->pagination->create_links(); ?>
    </ul>
</div>
    

<script type="text/javascript" src="<?php echo base_url('js/jQuery.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/bootstrap-scrollspy.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/bootstrap-affix.js') ?>"></script>
<script src="<?php echo base_url('js/application.js') ?>"></script>
  </body>
</html>