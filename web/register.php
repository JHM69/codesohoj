<?php
require_once "config.php"; ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <title>Register | Codesohoj</title>
  </head>
  <body class="text-gray-800 antialiased">
      <main>
      <section class="absolute w-full h-full">
        <div
          class="absolute top-0 w-full h-full bg-gray-900"
          style="
            background-image: url(./assets/img/register_bg.svg);
            background-size: 100%;
            background-repeat: no-repeat;
          "
        ></div>
        <div class="container mx-auto px-4 h-full">
          <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
              >
                <div class="rounded-t mb-0 px-6 py-6">
                  <div class="text-center mb-3">
                    <h6 class="text-gray-600 text-sm font-bold">
                      Register with
                    </h6>
                  </div>
                  <div class="btn-wrapper text-center">
                    <button
                      class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
                      type="button"
                      style="transition: all 0.15s ease 0s"
                    >
                      <img
                        alt="..."
                        class="w-5 mr-1"
                        src="./assets/img/github.svg"
                      />Github</button
                    ><button
                      class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
                      type="button"
                      style="transition: all 0.15s ease 0s"
                    >
                      <img
                        alt="..."
                        class="w-5 mr-1"
                        src="./assets/img/google.svg"
                      />Google
                    </button>
                  </div>
                  <hr class="mt-6 border-b-1 border-gray-400" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <div class="text-gray-500 text-center mb-3 font-bold">
                    <small>Or Create an account with credentials</small>
                  </div>
                  <?php if (
                    isset($_SESSION["msg"]) &&
                    $_SESSION["msg"] != ""
                  ) { ?>
                    <div class="my-10 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Error!</strong>
  <span class="block sm:inline"><?php
  echo $_SESSION["msg"];
  unset($_SESSION["msg"]);
  ?></span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
                        
                        <?php } ?>
                  <form action = "<?php echo SITE_URL; ?>/process.php" method="post">

                  <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-name"
                        >Name</label
                      ><input
                        type="name"
                        name = "name"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="name"
                        style="transition: all 0.15s ease 0s"
                      />
                    </div>

                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-email"
                        >Email</label
                      ><input
                        type="email"
                        name = "email"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="email"
                        style="transition: all 0.15s ease 0s"
                      />
                    </div>

                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                        >Username</label
                      ><input
                        type="username"
                        name = "username"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Username"
                        style="transition: all 0.15s ease 0s"
                      />
                    </div>

                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                        >Password</label
                      ><input
                        type="password"
                        name = "password"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Password"
                        style="transition: all 0.15s ease 0s"
                      />
                    </div>

                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-current-password"
                        >Retype Password</label
                      ><input
                        type="repassword"
                        name = "repassword"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Repassword"
                        style="transition: all 0.15s ease 0s"
                      />
                    </div>

                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-number"
                        >Mobile Number</label
                      ><input
                        type="number"
                        name = "phone"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="number"
                        style="transition: all 0.15s ease 0s"
                      />
                    </div>
                    
                    <div class="text-center mt-6">
                      <button
                        class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                        type="submit"  name="register"
                        style="transition: all 0.15s ease 0s"
                      >
                        Register
                      </button>
                    </div>
                  </form>
                  
                <div class="text-gray-700 my-8 text-center mb-3 font-bold">
                   <a class=" text-center" href="<?php echo SITE_URL; ?>/login.php">or Sign In here</a>
                  </div>
          
                </div> 
               
            </div>
              </div>
             
          </div>
        </div>
      </section>
    </main>
  </body>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
</html>
