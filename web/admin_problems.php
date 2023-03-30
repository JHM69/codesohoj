<?php
require_once "config.php";
require_once "components.php";
if (
  isset($_SESSION["loggedin"]) &&
  $_SESSION["Users"]["status"] == "Admin"
) { ?>
       <html>

<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />


    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
</head>

<body class="text-gray-800 antialiased">

<div class="w-full m-20 rounded w-full">

<a href='<?php echo SITE_URL; ?>/add_problem.php' ><button class="bg-indigo-500 text-white rounded block p-2 m-10 text-lg font-bold">Add Problems</button></a>

</div>
No Problems Found
</body>

       <?php } ?>
