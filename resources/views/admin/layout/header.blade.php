 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

 <head>
   <!-- <title>Adminizio Lite</title> -->
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />

   <!-- Title -->
   <title>Tea House - Tea Shope</title>

   <!-- Favicon -->
   <link rel="icon" href="{{ url('admin/user/img/favicon.png')}}">


   <link rel="stylesheet" media="screen,projection" type="text/css" href="{{ url('admin/css/reset.css')}}" />
   <link rel="stylesheet" media="screen,projection" type="text/css" href="{{ url('admin/css/main.css')}}" />
   <link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css')}}" title="2col" />
   <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="{{ url('admin/css/1col.css')}}" title="1col" />
   <!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
   <link rel="stylesheet" media="screen,projection" type="text/css" href="{{ url('admin/css/style.css')}}" />
   <link rel="stylesheet" media="screen,projection" type="text/css" href="{{ url('admin/css/mystyle.css')}}" />
   <script type="text/javascript" src="{{ url('admin/js/jquery.js')}}"></script>
   <script type="text/javascript" src="{{ url('admin/js/switcher.js')}}"></script>
   <script type="text/javascript" src="{{ url('admin/js/toggle.js')}}"></script>
   <script type="text/javascript" src="{{ url('admin/js/ui.core.js')}}"></script>
   <script type="text/javascript" src="{{ url('admin/js/ui.tabs.js')}}"></script>
   <script type="text/javascript">
     $(document).ready(function() {
       $(".tabs > ul").tabs();
     });
   </script>
   <link rel="icon" href="{{ url('admin/img/favicon.png')}}">

 </head>

 <body>
   @include('sweetalert::alert');
   <!-- Tray -->
   <div id="tray" class="box">
     <p class="f-left box">
       <!-- Switcher -->
       <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a> <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="" /></a> </span> Project: <strong>Your Project</strong>
     </p>
     <p class="f-right">User: <strong><a href="profile">shrusti patel</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="login" id="logout">Log out</a></strong></p>
   </div>
   <!--  /tray -->
   <hr class="noscreen" />
   <div id="menu" class="box1">
     <ul class="box1 f-right">
       <li><a href=""><span><strong>Visit Site &raquo;</strong></span></a></li>
     </ul>
   </div>
   <!-- Menu -->
   <div id="menu" class="box">
     <ul class="box">
       <li id="menu-active"><a href="dashboard"><span> DASHBOARD </span></a></li>
       <!-- Active -->
       <!-- <li><a href="#"><span> TEAM</span></a></li> -->
       <li><a href="add_blog"><span> BLOG</span></a></li>
       <li><a href="add_feature"><span> FEATURE</span></a></li>
       <li><a href="add_product"><span> PRODUCTS</span></a></li>
       <li><a href="add_store"><span> STORE</span></a></li>
       <li><a href="add_testimonial"><span> TESTIMONIAL</span></a></li>
       <li><a href="manage_contact"><span>MANAGE CONTACT</span></a></li>
       <li><a href="manage_users"><span>MANAGE USERS</span></a></li>
     </ul>
   </div>
   <!-- /header -->