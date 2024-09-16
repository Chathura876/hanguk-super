<!-- Start Sidebar -->
<div id="application-sidebar"
     class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-64 -translate-x-full transform overflow-y-auto border-e border-default-200 bg-white transition-all duration-300 hs-overlay-open:translate-x-0 dark:bg-default-50 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden">

    <button type="button" id="toggle-sidebar" class="text-default-500 hover:text-default-600" >
        <i data-lucide="align-justify" class="h-6 w-6"></i>
    </button>

    <div class="sticky top-0 flex h-18 items-center justify-start px-6">
        <a href="">
            <img src="{{asset('Hanguk_super/assets/IMG/logo/logo_fav_02.png')}}" alt="logo" class="flex h-10 dark:hidden">
            <img src="{{asset('Hanguk_super/assets/IMG/logo/logo_fav_02.png')}}" alt="logo" class="hidden h-10 dark:flex">
        </a>
    </div>

    <div class="hs-accordion-group h-[calc(100%-72px)] p-4" data-simplebar="">
        <ul class="admin-menu flex w-full flex-col gap-1.5">
            <li class="menu-item">
                <a class="flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100"
                   href="{{route('owner.dashboard')}}">
                    <i class="ti ti-smart-home text-xl"></i>
                    Dashboard
                </a>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-ticket text-xl"></i>
                    Product
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuProduct" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route('product.create') }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Product
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('product.index')}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Product List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('product.type')}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Product Type
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('product-type.index')}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Product Type List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-list-check text-xl"></i>
                    Category
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuCategory" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{route("category.create")}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Category
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route("category.index")}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Category List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-list-check text-xl"></i>
                    Sub Category
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuSubCategory" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{route("Sub_category.create")}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Sub Category
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('sub_category.index')}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Sub Category List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-list-check text-xl"></i>
                    Brand
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuBrand" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{route("brand.create")}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Brand
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('brand.index')}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Brand List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-box text-xl"></i>
                    Stock
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuSale" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("stock.index") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Stock List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("stock.create") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Stock
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-box text-xl"></i>
                    Sale
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuSale" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("owner.sale") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Sale
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("owner.profit") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Profit
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("owner.return_items") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Return Item
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-box text-xl"></i>
                    Damage Items
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuSale" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("damage_items.index") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Damage Items
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("damage_items.create") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Damage Item
                            </a>
                        </li>
{{--                        <li class="menu-item">--}}
{{--                            <a href="{{ route("damage_items.update") }}"--}}
{{--                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">--}}
{{--                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>--}}
{{--                                Edit Damage Items--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-credit-card text-xl"></i>
                    Expenses
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuExpenses" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("owner.expenses_list") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Expenses List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("owner.add_expenses") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Expenses
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-credit-card text-xl"></i>
                    Bills
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuExpenses" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("owner.issued_bills") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Issued Bill List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-credit-card text-xl"></i>
                    Cheques
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuExpenses" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("cheque.index") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Cheque List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("cheque.create") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Cheque
                            </a>
                        </li>
{{--                        <li class="menu-item">--}}
{{--                            <a href="{{ route("cheque.update") }}"--}}
{{--                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">--}}
{{--                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>--}}
{{--                                Edit Cheque--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </li>

            <li class="px-6 py-2 text-sm font-medium text-default-600">People</li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-user text-xl"></i>
                    Admin
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuPeople" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("admin.index") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Admin List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("admin.add") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Add Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-user text-xl"></i>
                    Cashier
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuPeople" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("owner-cashier-index") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Cashier List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route("owner-cashier-add")}}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Cashier
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-user text-xl"></i>
                    Customer
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuPeople" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("customer.index") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Membership List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("owner.add_customer") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Membership
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item hs-accordion">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle flex items-center gap-x-3.5 rounded-full px-5 py-3 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i class="ti ti-user text-xl"></i>
                    Manger
                    <i class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></i>
                </a>

                <div id="menuPeople" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 flex flex-col gap-2">
                        <li class="menu-item">
                            <a href="{{ route("manager.index") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                Manager List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("manager.create") }}"
                               class="flex items-center gap-x-3.5 rounded-full px-8 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                New Manager
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
        const sidebar = document.getElementById('application-sidebar');
        const content = document.getElementById('main-content');

        sidebar.classList.toggle('sidebar-collapsed');
        content.classList.toggle('content-expanded');
    });


</script>

<!-- End Sidebar -->

