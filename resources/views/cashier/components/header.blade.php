<!-- Start Header -->
<header class="sticky top-0 z-40 flex h-18 w-full border-b border-default-200/95 bg-white/95 backdrop-blur-sm dark:bg-default-50/95 print:hidden">
    <nav class="flex w-full items-center gap-4 px-6">
        <!-- Navigation Toggle (in Small Screen) -->
        <div class="flex lg:hidden">
            <button type="button" class="text-default-500 hover:text-default-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
                <i data-lucide="align-justify" class="h-6 w-6"></i>
            </button>
        </div>

        <!-- Logo -->
        <div class="flex lg:hidden">
            <a href="">
                <img src="{{asset('Hanguk_super/assets/img/logo/logo_fav_02.png')}}" alt="logo" class="flex h-10 w-full dark:hidden">
                <img src="{{asset('Hanguk_super/assets/img/logo/logo_fav_02.png')}}" alt="logo" class="hidden h-10 w-full dark:flex">
            </a>
        </div>

        <!-- Topbar Link and Dropdown Button -->
        <div class="ms-auto flex items-center gap-4">
            <button class="relative inline-flex h-10 w-10 flex-shrink-0 items-center justify-center gap-2 overflow-hidden rounded-full bg-default-100 align-middle font-medium text-default-700 transition-all hover:text-primary">
                <i class="ti ti-sun text-xl after:absolute after:inset-0" id="light-theme"></i>
                <i class="ti ti-moon text-xl after:absolute after:inset-0" id="dark-theme"></i>
            </button>

            <!-- Fullscreen Button -->
            <div class="hidden lg:flex">
                <button data-toggle="fullscreen" class="inline-flex h-10 w-10 flex-shrink-0 items-center justify-center gap-2 rounded-full bg-default-100 align-middle font-medium text-default-700 transition-all hover:text-primary">
                    <i class="ti ti-maximize flex text-xl group-[-fullscreen]:hidden"></i>
                    <i class="ti ti-minimize hidden text-xl group-[-fullscreen]:flex"></i>
                </button>
            </div>

            <!-- Profile Dropdown -->
            <div class="flex">
                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-with-header" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 items-center justify-center gap-2 rounded-md align-middle text-xs font-medium text-default-700 transition-all">
                        <img class="inline-block h-10 w-10 rounded-full" src="{{asset('Hanguk_super/assets/img/profile_images/ex_image.jpg')}}">
                        <div class="hidden text-start lg:block">
                            <p class="text-xs font-semibold text-default-700">Mary Hopkins</p>
                            <p class="mt-1 text-xs text-default-500">Cashier</p>
                        </div>
                    </button>

                    <div class="hs-dropdown-menu duration mt-2 hidden min-w-[12rem] rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">
                        <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-red-500 hover:bg-red-400/10" href="auth-login.html">
                            <i class="h-4 w-4" data-lucide="log-out"></i>
                            Log out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->
