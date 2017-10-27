 <?php ?>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>AdminDesigns - A Responsive HTML5 Admin UI Framework</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin-tools/admin-forms/css/admin-forms.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url()?>assets/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>
<body class="admin-layout-page">
 
  <div id="main">

<style>
#main {
    
    padding-top: 10%;
	}
.form-module h2 {
    color: rgb(51, 181, 229);
    font-size: 18px;
    font-weight: 400;
    line-height: 1;
    margin: 0px 0px 20px;
}
.form-module input {
    display: block;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(217, 217, 217);
    border-image: initial;
    margin: 0px 0px 20px;
    padding: 10px 15px;
    transition: 0.3s ease;
}
.form-module button {
    cursor: pointer;
    background: #33b5e5;
    width: 100%;
    border: 0;
    padding: 10px 15px;
    color: #ffffff;
    -webkit-transition: 0.3s ease;
    transition: 0.3s ease;
}
.form-module .cta {
    background: #f2f2f2;
    width: 100%;
    padding: 15px 40px;
    box-sizing: border-box;
    color: #666666;
    font-size: 12px;
    text-align: center;
}
.form-module .cta a {
    color: #333333;
    text-decoration: none;
}
.pen-title h1 {
    font-size: 48px;
    font-weight: 300;
    margin: 0px 0px 20px;
}
.form-module {
    position: relative;
    max-width: 320px;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 3px;
    background: rgb(255, 255, 255);
    border-top: 5px solid rgb(51, 181, 229);
    margin: 0px auto;
}
.form-module .form:nth-child(2) {
    display: block;
}
 
.form-module .form {
    display: none;
    padding: 40px;
}
 {
    color: rgb(102, 102, 102);
    font-family: RobotoDraft, Roboto, sans-serif;
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    background: rgb(233, 233, 233);
}
</style>



 

<div class="module form-module">
  <div class="toggle"> 
    <div class="tooltip"></div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form id="form-ui" action="<?= base_url()?>index.php/admin/login_check/" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="Username"class="gui-input" name="user_name">
      <input type="password" placeholder="Password" class="gui-input" name="password">
      <button>Login</button>
    </form>
  </div>
   <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
</div>