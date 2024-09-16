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
                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo_fav_02.png')}}" alt="logo" class="flex h-10 w-full dark:hidden">
                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo_fav_02.png')}}" alt="logo" class="hidden h-10 w-full dark:flex">
            </a>
        </div>

{{--        <!-- Search Input -->--}}
{{--        <div class="hidden lg:flex">--}}
{{--            <label for="icon" class="sr-only">Search</label>--}}
{{--            <div class="relative hidden lg:flex">--}}
{{--                <input type="search" class="block rounded-full border-default-200 bg-default-50 py-2.5 pe-4 ps-12 text-sm text-default-800 focus:border-primary focus:ring-primary lg:w-64" placeholder="Search for items...">--}}
{{--                <i class="ti ti-search absolute start-4 top-1/2 -translate-y-1/2 text-lg text-default-600"></i>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Topbar Link and Dropdown Button -->
        <div class="ms-auto flex items-center gap-4">
            <button class="relative inline-flex h-10 w-10 flex-shrink-0 items-center justify-center gap-2 overflow-hidden
            rounded-full bg-default-100 align-middle font-medium text-default-700 transition-all hover:text-primary">
                <i class="ti ti-sun text-xl after:absolute after:inset-0" id="light-theme"></i>
                <i class="ti ti-moon text-xl after:absolute after:inset-0" id="dark-theme"></i>
            </button>

            <!-- Language -->
{{--            <div class="hidden lg:flex">--}}
{{--                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">--}}
{{--                    <button id="hs-dropdown-with-header" type="button" class="hs-dropdown-toggle inline-flex h-10 w-10 flex-shrink-0 items-center justify-center gap-2 rounded-full bg-default-100 align-middle font-medium text-default-700 transition-all hover:text-primary">--}}
{{--                        <i class="ti ti-language text-xl"></i>--}}
{{--                    </button>--}}

{{--                    <div class="hs-dropdown-menu duration mt-2 hidden min-w-[12rem] rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">--}}
{{--                        <a class="flex items-center gap-x-3.5 rounded px-3 py-2 text-sm font-medium transition-all hover:bg-default-100" href="javascript:void(0)">--}}
{{--                            <IMG src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpENEQyQjUxRTYxM0IxMUU3QThGRDlFNzgyMDM4RjBCQyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpENEQyQjUxRjYxM0IxMUU3QThGRDlFNzgyMDM4RjBCQyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkQ0RDJCNTFDNjEzQjExRTdBOEZEOUU3ODIwMzhGMEJDIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkQ0RDJCNTFENjEzQjExRTdBOEZEOUU3ODIwMzhGMEJDIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAHkAAQEBAAMAAAAAAAAAAAAAAAABBgIFBwEBAAIDAQAAAAAAAAAAAAAAAAEFAgQGBxAAAQIBDQADAQAAAAAAAAAAAAECAzFRkRKi0qPjVAVVFhchQYEyEQEAAAMHBQEAAAAAAAAAAAAA4WKiUaGx0QJSFgEDBBQVMf/aAAwDAQACEQMRAD8A82fFive573uc9yqrnKqqqqvyqqqmwhKzp1JCs6dQFZ06gKzp1AVnTqArOnUCsixWPa9j3Ne1UVrkVUVFT5RUVCB2XWd701uHeNb3O1biuePebsq05nWd701uHeHudq3E495uyrTmdZ3vTW4d4e52rcTj3m7KtOZ1ne9Nbh3h7natxOPebsq05nWd701uHeHudq3E495uyrTmdZ3vTW4d4e52rcTj3m7KtOZ1ne9Nbh3h7natxOPebsq05nWd701uHeHudq3E495uyrTm3RRvTgAAAAAAADd+XpyeBmFJ9iS+Dm+QyVQPL05PAzB9iS+ByGSqB5enJ4GYPsSXwOQyVQPL05PAzB9iS+ByGSqB5enJ4GYPsSXwOQyVQPL05PAzB9iS+ByGSqB5enJ4GYPsSXwOQyVQPL05PAzB9iS+ByGSqDdlI5sAAAAAAAA5O/pZJfqT8M9f71/EdEoMQoAUAKAFACgCt/pJJfuT9MtH70/Dq//Z" alt="user-image" class="h-4">--}}
{{--                            <span class="align-middle">German</span>--}}
{{--                        </a>--}}
{{--                        <a class="flex items-center gap-x-3.5 rounded px-3 py-2 text-sm font-medium transition-all hover:bg-default-100" href="javascript:void(0)">--}}
{{--                            <IMG src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowMUM1QUQyRDYxM0MxMUU3QTE2RkM2RkVEMTY1NUZGQiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowMUM1QUQyRTYxM0MxMUU3QTE2RkM2RkVEMTY1NUZGQiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjAxQzVBRDJCNjEzQzExRTdBMTZGQzZGRUQxNjU1RkZCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjAxQzVBRDJDNjEzQzExRTdBMTZGQzZGRUQxNjU1RkZCIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAHsAAAMBAQEBAAAAAAAAAAAAAAAGBwQBAgMBAAIDAQEBAAAAAAAAAAAAAAAGBAUHAwECEAABAwEGBAYDAAAAAAAAAAAAAQIDBxExsTN0NiFRMrJhQpI0RBZxcgQRAQABAwUBAAMAAAAAAAAAAAABwTI0coIDBAYxEYEC/9oADAMBAAIRAxEAPwDc573OVznKrlW1VVbVVVMnmZlWuWrzAHKlKr9mk4/Fk72F/wCcyJ0zR24LldHlMABGqsqv2pOPxo8XFZ272ieYxd00Jdq8yKYvw6172uRzXK1zVtRUWxUVAeTES0CIwgADnSnc0mlk72F95zInTNHbguV0ekwAEZqzutNNHi4rO3e0TzGLumhMIpiABpERg4AHOlO5pNLJ3sL7zmROmaO3Bcro9JgAIzVndaaaPFxWdu9onmMXdNCYRTEADSIjBwAOdKdzSaWTvYX3nMidM0duC5XR6TAARmrO6000eLis7d7RPMYu6aEwimIAGkRGDgAc6U7mk0snewvvOZE6Zo7cFyuj0mAAjNWd1ppo8XFZ272ieYxd00JhFMQAN8+fJl9S5fRf5fDkI/8Af2fjB5ePSfIONKtzSXe2ku/ZhfecyJ0zR24LldHlMABGqsbqS720d/5cVnbvaH5jF3TQmekimF9P58+PL6m5nRf5vDmew+f7tn7+vr//2Q==" alt="user-image" class="h-4">--}}
{{--                            <span class="align-middle">Italian</span>--}}
{{--                        </a>--}}
{{--                        <a class="flex items-center gap-x-3.5 rounded px-3 py-2 text-sm font-medium transition-all hover:bg-default-100" href="javascript:void(0)">--}}
{{--                            <IMG src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoyODQ3Mjc2MTYxM0MxMUU3ODJENDgwMDE3MDIxNjRGOCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoyODQ3Mjc2MjYxM0MxMUU3ODJENDgwMDE3MDIxNjRGOCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjI4NDcyNzVGNjEzQzExRTc4MkQ0ODAwMTcwMjE2NEY4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjI4NDcyNzYwNjEzQzExRTc4MkQ0ODAwMTcwMjE2NEY4Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAI4AAQACAgMAAAAAAAAAAAAAAAAEBQEDAgYHAQEAAgMBAQAAAAAAAAAAAAAAAgYDBAUBBxAAAQMBBgMFCAMAAAAAAAAAAQIDBAAREpMFVQZR0RYyktIzFTFBIkJiExQ0YXGREQACAQEGBQMDBQAAAAAAAAAAAQIDETGRUhMUIUFREgRxoSJhgTLwscHRBf/aAAwDAQACEQMRAD8ApFOOLUVKUVKUbVKJJJJ95rln0xIxeVxNALyuJoBeVxNALyuJoBeVxNALyuJoDKXHEKCkqKVJNqVAkEEe8UDR7x6BkWnRcFvw1R9zVzSxZXdafV4nFeS7babW7Ihw2GGkqW46tlsJSlItJPw1m8edarNRU2rfqzx1qnJybKyBL2JNnrhNxGmXb9xhciGGkOKtu3bxT8JvggBVnD2105+FUsfbVeN/D1/SJz14xUndzslbYWvoGRadFwW/DXG3NXNLFkdafV4j0DItOi4LfhpuauaWLGtPq8R6BkWnRcFvw03NXNLFjWn1eI9AyLTouC34abmrmlixrT6vEegZFp0XBb8NNzVzSxY1p9XiT6wGM6vuF8QkFMWJLiflvoVmMlX47iS2oFF5KG1POAKCRZeb/wAqwLxYqEJW2vstSfX6Xe7Njxvm+Li+26/+bFgzOxsz2q4p9qQuL+XFlqBelXY6xHKQEFJIZBVeCrRZaKsFD/LhoRlWj+azP+zR8rynOpKFNy+KuSt+XuXMERVyHpbUKQw7IN2Q+6uOptZaN1ASGnHFAhJ+YCqr53jqnRptO3jL0v5cLfW37Gbul+LaaXrbx9V+xOrkgUAoBQCgKSREczGG9CGVpyq8QtUkfaV91YcCiVhtRUSeJrt1/JppU7JqXarOCljxSRHx6s1NuSl92vYhP7FQiOlMaW0VvtluaS0oG0qcsWiwi8brtnxe8A/xWat51Hsj8pSceXLl1uuNil5Vkm3CzD3LmKsmXc9ITF+2lSDmFrRW6kKF0KuEr/q2tTy6sJUIRU4uUeSUrePHmrOF15pwlPudttnqrPtx5k+uSZhQCgFAeFdUbj1OVjL51dtnRyRwLDoU8qHVG49TlYy+dNnRyRwGhTyodUbj1OVjL502dHJHAaFPKh1RuPU5WMvnTZ0ckcBoU8qHVG49TlYy+dNnRyRwGhTyodUbj1OVjL502dHJHAaFPKh1RuPU5WMvnTZ0ckcBoU8qHVG49TlYy+dNnRyRwGhTyohyf2XfK7avK7Ht+T6eFbTJRuV5r7teEh3aAd2gHdoB3aAd2gNkb9lryu2nzex7fn+njXqIyud5/9k=" alt="user-image" class="h-4">--}}
{{--                            <span class="align-middle">Spanish</span>--}}
{{--                        </a>--}}
{{--                        <a class="flex items-center gap-x-3.5 rounded px-3 py-2 text-sm font-medium transition-all hover:bg-default-100" href="javascript:void(0)">--}}
{{--                            <IMG src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0MjI1RDJEQjYxM0MxMUU3ODE3M0YwMkM1MjgyRTVFMiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0MjI1RDJEQzYxM0MxMUU3ODE3M0YwMkM1MjgyRTVFMiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjQyMjVEMkQ5NjEzQzExRTc4MTczRjAyQzUyODJFNUUyIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQyMjVEMkRBNjEzQzExRTc4MTczRjAyQzUyODJFNUUyIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAHUAAQEBAQAAAAAAAAAAAAAAAAADBggBAQADAQEAAAAAAAAAAAAAAAABAgYEAxAAAQAHBwUBAAAAAAAAAAAAAAHio9MEVKQykjNVFgcXMVFhAkIDEQEAAAQHAQADAAAAAAAAAAAAAaLiY6HRUgMTFRYxgQIy/9oADAMBAAIRAxEAPwDpwAAAAAAAABiOats85pop0dnX72nGGanJA5q2zzmminQ6/e04wzOSBzVtnnNNFOh1+9pxhmckDmrbPOaaKdDr97TjDM5IHNW2ec00U6HX72nGGZyQOats85pop0Ov3tOMMzkgc1bZ5zTRTodfvacYZnJA5q2zzmminQ6/e04wzOSDlg0rnAAAAAAAANHpFE0zWMx6O3NS3HjLslRpFE0zWHo7c1J4y7JUaRRNM1h6O3NSeMuyVGkUTTNYejtzUnjLslRpFE0zWHo7c1J4y7JUaRRNM1h6O3NSeMuyVGkUTTNYejtzUnjLslRpFE0zWHo7c1J4y7JU0RmG5AAAAAAAALRGP+mHa9sOx1+fHYmLz/T+Yffz9TukLF0BdAXQF0BdApD4/wCeHa9cSx1+vHcmCv7/AMx+/j6//9k=" alt="user-image" class="h-4">--}}
{{--                            <span class="align-middle">Russian</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Fullscreen Button -->
            <div class="hidden lg:flex">
                <button data-toggle="fullscreen" class="inline-flex h-10 w-10 flex-shrink-0 items-center justify-center
                gap-2 rounded-full bg-default-100 align-middle font-medium text-default-700 transition-all hover:text-primary">
                    <i class="ti ti-maximize flex text-xl group-[-fullscreen]:hidden"></i>
                    <i class="ti ti-minimize hidden text-xl group-[-fullscreen]:flex"></i>
                </button>
            </div>

            <!-- Notification Dropdown -->
{{--            <div class="hidden md:flex">--}}
{{--                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">--}}
{{--                    <button id="hs-dropdown-with-header" type="button" class="hs-dropdown-toggle inline-flex h-10 w-10 flex-shrink-0 items-center justify-center gap-2 rounded-full bg-default-100 align-middle text-xs font-medium text-default-700 transition-all hover:text-primary">--}}
{{--                        <i class="ti ti-bell animate-ring text-xl"></i>--}}
{{--                        <!-- <span class="absolute top-0 end-1 h-4 w-4 bg-red-500 rounded-full animate-ping"></span> -->--}}
{{--                        <!-- <span class="absolute top-0 end-1 h-4 w-4 flex justify-center items-center bg-red-500 text-[11px] font-semibold text-white rounded-full">2</span> -->--}}
{{--                    </button>--}}

{{--                    <div class="hs-dropdown-menu duration mt-2 hidden min-w-[20rem] rounded-lg border border-default-200 bg-white opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">--}}
{{--                        <div class="flex items-center justify-between px-4 py-2">--}}
{{--                            <h6 class="text-sm font-medium">Notification</h6>--}}
{{--                            <a href="javascript: void(0);" class="text-default-500">--}}
{{--                                <small>Clear All</small>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div class="h-80 border-y border-dashed border-default-200 p-4" data-simplebar="">--}}
{{--                            <h5 class="mb-2 text-xs text-default-700">Today</h5>--}}

{{--                            <a href="javascript:void(0);" class="mb-4 flex items-center">--}}
{{--                                <IMG src="assets/1-f1564e7c.png" class="h-10 w-10 rounded-full">--}}
{{--                                <div class="ms-2 flex-grow truncate">--}}
{{--                                    <div class="flex items-center justify-between">--}}
{{--                                        <h5 class="text-sm font-medium text-default-800">--}}
{{--                                            Datacorp--}}
{{--                                        </h5>--}}
{{--                                        <small class="inline-flex text-xs text-default-500">1 min ago</small>--}}
{{--                                    </div>--}}
{{--                                    <small class="text-default-400">Caleb Flakelar commented on Admin</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="javascript:void(0);" class="mb-4 flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <IMG src="assets/2-cb0540ba.png" class="h-10 w-10 rounded-full">--}}
{{--                                </div>--}}
{{--                                <div class="ms-2 flex-grow truncate">--}}
{{--                                    <div class="flex items-center justify-between">--}}
{{--                                        <h5 class="text-sm font-medium text-default-800">Admin</h5>--}}
{{--                                        <small class="inline-flex text-xs text-default-500">1 hr ago</small>--}}
{{--                                    </div>--}}
{{--                                    <small class="text-default-400">New user registered</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}

{{--                            <a href="javascript:void(0);" class="mb-4 flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <IMG src="assets/3-7b02f585.png" class="h-10 w-10 rounded-full">--}}
{{--                                </div>--}}
{{--                                <div class="ms-2 flex-grow truncate">--}}
{{--                                    <div class="flex items-center justify-between">--}}
{{--                                        <h5 class="text-sm font-medium text-default-800">--}}
{{--                                            Cristina Pride--}}
{{--                                        </h5>--}}
{{--                                        <small class="inline-flex text-xs text-default-500">1 day ago</small>--}}
{{--                                    </div>--}}
{{--                                    <small class="text-default-400">Hi, How are you? What about our next meeting</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}

{{--                            <h5 class="mb-2 text-xs text-default-700">Yesterday</h5>--}}

{{--                            <a href="javascript:void(0);" class="mb-4 flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <IMG src="assets/4-2345eb04.png" class="h-10 w-10 rounded-full">--}}
{{--                                </div>--}}
{{--                                <div class="ms-2 flex-grow truncate">--}}
{{--                                    <h5 class="mb-1 text-sm font-semibold">Datacorp</h5>--}}
{{--                                    <small class="text-default-400">Caleb Flakelar commented on Admin</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}

{{--                            <a href="javascript:void(0);" class="flex">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <IMG src="assets/5-0368e7b5.png" class="h-10 w-10 rounded-full">--}}
{{--                                </div>--}}
{{--                                <div class="ms-2 flex-grow truncate">--}}
{{--                                    <h5 class="mb-1 text-sm font-semibold">Karen Robinson</h5>--}}
{{--                                    <small class="text-default-400">Wow ! this admin looks good and awesome design</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <a href="javascript:void(0);" class="block px-4 py-2 text-center text-sm font-medium text-primary">--}}
{{--                            View All--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Profile Dropdown -->
            <div class="flex">
                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-with-header" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0
                    items-center justify-center gap-2 rounded-md align-middle text-xs font-medium text-default-700 transition-all">
                        <img class="inline-block h-10 w-10 rounded-full" src="{{asset('Hanguk_super/assets/IMG/profile_images/ex_image.jpg')}}">
                        <div class="hidden text-start lg:block">
                            <p class="text-xs font-semibold text-default-700">{{$user->first_name}}</p>
                            <p class="mt-1 text-xs text-default-500">Admin</p>
                        </div>
                    </button>

                    <div class="hs-dropdown-menu duration mt-2 hidden min-w-[12rem] rounded-lg border border-default-200
                    bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">
                        <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-800
                        transition-all hover:bg-default-100" href="{{ route('owner.profile') }}">
                            <i class="ti ti-browser text-base"></i>
                            Profile
                        </a>

                        <hr class="-mx-2 my-2 border-default-200">

                        <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-red-500 hover:bg-red-400/10" href="{{route('owner.logout')}}">
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
