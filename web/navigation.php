<nav class="sticky top-0 bg-blue-500 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
      <a href='<?php echo SITE_URL; ?>'>
        <img src="./assets/img/main_logo_white.svg" alt="Codesohoj" style="height: 50px" /></a><button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('example-collapse-navbar')">
        <i class="text-white fas fa-bars"></i>
      </button>
    </div>
    <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden" id="example-collapse-navbar">
      <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
        <li class="p-2" data-te-nav-item-ref>
          <a class="text-white disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href='<?php echo SITE_URL; ?>'>Dashboard</a>
        </li>
        <li class="p-2" data-te-nav-item-ref>
          <a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="<?php echo SITE_URL; ?>/problems.php">Problems</a>
        </li>
        <li class="p-2" data-te-nav-item-ref>
          <a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="<?php echo SITE_URL; ?>/contests.php">Contests</a>
        </li>

        <li class="p-2" data-te-nav-item-ref>
          <a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="<?php echo SITE_URL; ?>/ranking.php">Ranking</a>
        </li>

        <li class="p-2" data-te-nav-item-ref>
          <a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="#">Learn</a>
        </li>

        <li class="p-2" data-te-nav-item-ref>
          <a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="#">Blogs</a>
        </li>

        <?php if (isset($_SESSION["loggedin"])) { ?>
          <div id="account-button" class="ml-10 flex items-center justify-center text-gray-100 space-x-4">
            <img class="w-10 h-10 rounded-full" src="./assets/img/user.png" alt="user image">
            <div class="mr-3 font-medium dark:text-white">
              <div><?php echo $_SESSION["Users"]["username"]; ?></div>

            </div>
          </div>

          <div id="account-modal" tabindex="-1" aria-hidden="true" class="fixed top-10 left-10 right-0 z-50 hidden w-48 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="close-account" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="account-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal header -->
                <div class="px-12 py-1 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                    Account Action
                  </h3>
                </div>
                <!-- Modal body -->
                <div class="p-2">
                  <ul class="my-2 space-y-1">

                    <?php if (
                      $_SESSION["Users"]["status"] == "Admin"
                    ) { ?>

                      <li>
                        <a href='<?php echo SITE_URL; ?>/adminjudge.php' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Judge Settings</span>
                        </a>
                      </li>
                      <li>
                        <a href='<?php echo SITE_URL; ?>/admin_problems.php' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Problem Settings</span>
                        </a>
                      </li>

                      <li>
                        <a href='<?php echo SITE_URL; ?>/admin_contests.php' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Contest Settings</span>
                        </a>
                      </li>
                      <li>
                        <a href='<?php echo SITE_URL; ?>/adminteam.php' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Team Settings</span>
                        </a>
                      </li>

                      <li>
                        <a href='<?php echo SITE_URL; ?>/adminclar.php' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Clarifications</span>
                        </a>
                      </li>
                      <li>
                        <a href='<?php echo SITE_URL; ?>/adminbroadcast.php' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Notifications</span>
                        </a>
                      </li>

                      <li>
                        <a href='<?php echo SITE_URL; ?>/adminlog.php' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Logs</span>
                        </a>
                      </li>
                      <li>
                        <a href='<?php echo SITE_URL; ?>/process.php?logout' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Log out</span>
                        </a>
                      </li>

                    <?php } else { ?>

                      <li>
                        <a href='/edit' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Account Setting</span>
                        </a>
                      </li>
                      <li>
                        <a href='<?php echo SITE_URL; ?>/process.php?logout' class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                          <span class="flex-1 ml-3 whitespace-nowrap">Log out</span>
                        </a>
                      </li>

                    <?php } ?>

                  </ul>

                </div>
              </div>
            </div>
          </div>

          <script>
            const modalButton = document.getElementById('account-button');
            const modal = document.getElementById('account-modal');
            const closeModalButton = document.getElementById('close-account');

            modalButton.addEventListener('click', () => {
              modal.classList.remove('hidden');
            });

            closeModalButton.addEventListener('click', () => {
              modal.classList.add('hidden');
            });
          </script>


        <?php } else { ?>
          <li class="flex items-center">
            <button class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button" style="transition: all 0.15s ease 0s">
              <a href='<?php echo SITE_URL; ?>/login.php'>
                <i class="fas fa-regular fa-right-to-bracket"></i> Sign In
              </a>
            </button>
          </li>

          <li class="flex items-center">
            <button class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button" style="transition: all 0.15s ease 0s">
              <a href='<?php echo SITE_URL; ?>/register.php'>
                <i class="fas fa-regular fa-right-to-bracket"></i> Sign Up
              </a>
            </button>
          </li>
        <?php } ?>

        <?php  ?>
      </ul>
    </div>
  </div>
</nav>