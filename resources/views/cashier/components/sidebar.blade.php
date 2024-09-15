
<!-- Start Sidebar -->
<div id="application-sidebar" class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-64 -translate-x-full transform overflow-y-auto border-e border-default-200 bg-white transition-all duration-300 hs-overlay-open:translate-x-0 dark:bg-default-50 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden">
{{--    <button id="toggle-sidebar"><i class="ti-view-list text-xl"></i></button>--}}
{{--    <div class="flex lg:hidden">--}}
        <button type="button" id="toggle-sidebar" class="text-default-500 hover:text-default-600" >
            <i data-lucide="align-justify" class="h-6 w-6"></i>
        </button>
{{--    </div>--}}
    <div class="sticky top-0 flex h-18 items-center justify-start px-6">
        <a href="">
            <img src="{{asset('Hanguk_super/assets/img/logo/logo_fav_02.png')}}" alt="logo" class="flex h-9 dark:hidden">
            <img src="{{asset('Hanguk_super/assets/img/logo/logo_fav_02.png')}}" alt="logo" class="hidden h-10 dark:flex">
        </a>
    </div>

    <div class="hs-accordion-group h-[calc(100%-72px)] p-4" data-simplebar="">
        <ul class="admin-menu flex w-full flex-col gap-1.5">
            <li class="menu-item">
                <a class="flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100" href="admin-dashboard.html">
                    <i class="ti ti-smart-home text-xl"></i>
                    Dashboard
                </a>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)" class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-file-invoice text-xl"></i>
                    Invoice
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuInvoice" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="admin-invoice-list.html" class="flex items-center gap-x-3.5 rounded-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Invoices List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)" class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-brand-appgallery text-xl"></i>
                    Stock
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuInvoice" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="admin-invoice-list.html" class="flex items-center gap-x-3.5 rounded-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Stock List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)" class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-license text-xl"></i>
                    Reports
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuInvoice" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="admin-invoice-list.html" class="flex items-center gap-x-3.5 rounded-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Sales Reports
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)" class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-notebook text-xl"></i>
                    Expenses
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuInvoice" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="admin-invoice-list.html" class="flex items-center gap-x-3.5 rounded-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Today Expenses
                            </a>
                            <a href="admin-invoice-list.html" class="flex items-center gap-x-3.5 rounded-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                All Expenses
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
        </ul>
    </div>
</div>


<script>
    document.getElementById('toggle-sidebar').addEventListener('click', function () {
        document.getElementById('application-sidebar').classList.toggle('sidebar-collapsed');
        document.getElementById('main-content').classList.toggle('content-expanded');
    });
</script>


