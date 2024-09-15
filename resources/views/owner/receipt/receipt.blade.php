<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset("Hanguk_super/assets/img/logo/logo_fav_02.png")}}">
    <title>Purchase Receipt</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="max-w-sm bg-white shadow-lg rounded-lg p-4">
    <!-- Header -->
    <div class="items-center">
        <!-- Right Column: Text -->
        <div class="text-center">
            <h2 class="text-2xl font-bold mt-4">හන්ගුක් Super</h2>
            <p class="text-xs font-bold">එන්න ඔබේ සහන සෙවනට</p>
            <p class="text-xs font-bold">No. 23/1, Wadurawa, Veyangoda</p>
            <p class="text-xs font-bold mt-2">දු.ක. : 0332054327</p>
        </div>
    </div>

    <hr class="border-t-2 border-dashed border-gray-600 my-4">

    <!-- Receipt Details -->
    <div class="mt-4">
        <table class="text-sm">
            <tr>
                <td class="font-bold">දිනය </td>
                <td>: 2024.08.27</td>
            </tr>
            <tr>
                <td class="font-bold">බිල් අංකය </td>
                <td>: #7248</td>
            </tr>
            <tr>
                <td class="font-bold">අයකැමි </td>
                <td>: hanguksuper</td>
            </tr>
            <tr>
                <td class="font-bold">පාරිභෝගිකයා </td>
                <td>: Walk in Customer</td>
            </tr>
            <tr>
                <td class="font-bold">ආරම්භක වේලාව </td>
                <td>: 04.57.04 PM</td>
            </tr>
        </table>
    </div>

    <hr class="border-t-2 border-dashed border-gray-600 mt-4">
    <!-- Items Table -->
    <table class="w-full text-sm border-collapse">
        <thead>
        <tr>
            <th class="border-0 px-1 py-1"></th>
            <th class="border-0 px-1 py-1">ප්‍රමාණය</th>
            <th class="border-0 px-1 py-1" style="white-space: nowrap;">සිල්ලර මිල</th>
            <th class="border-0 px-1 py-1" style="white-space: nowrap;">අපේ මිල</th>
            <th class="border-0 px-1 py-1">වටිනාකම</th>
        </tr>
        <tr>
            <td colspan="5" class="border-0 p-0"><hr class="border-t-2 border-dashed border-gray-600 my-0"></td>
        </tr>
        </thead>
{{--        <hr class="border-t-2 border-dashed border-gray-600 my-4">--}}
        <tbody class="text-center">
        <tr>
            <td class="border-0 px-2 py-1">1.</td>
            <td class="border-0 px-2 py-1">Kotmale Fresh Milk</td>
        </tr>
        <tr>
            <td class="border-0 px-2 py-1"></td>
            <td class="border-0 px-2 py-1">1</td>
            <td class="border-0 px-2 py-1">500.00</td>
            <td class="border-0 px-2 py-1">500.00</td>
            <td class="border-0 px-2 py-1">500.00</td>
        </tr>
        <!-- Add more rows as needed -->
        </tbody>
    </table>

    <hr class="border-t-2 border-dashed border-gray-600 mt-4">
    <!-- Totals and Summary -->
    <div class="mt-4">
        <div class="flex justify-between">
            <span>සිල්ලර එකතුව</span>
            <span>500.00</span>
        </div>
        <div class="flex justify-between">
            <span>වට්ටම්</span>
            <span>0.00</span>
        </div>
        <div class="flex justify-between">
            <span class="font-bold">මුළු එකතුව</span>
            <span>500.00</span>
        </div>
        <div class="flex justify-between">
            <span>මුදල් ගෙවීම</span>
            <span>500.00</span>
        </div>
        <div class="flex justify-between">
            <span>ඉතිරි මුදල</span>
            <span>0.00</span>
        </div>

    </div>

    <hr class="border-t-2 border-dashed border-gray-600 mt-4">

    <h2 class="text-center font-bold border-2 border-black mt-4">ඔබට ලැබුණු ලාභය රුපියල් 0.00</h2>
    <!-- Footer -->
    <div class="mt-4 text-center text-sm">
        <p>භාණ්ඩ සංඛ්‍යාව 1</p>
        <p>වාසි සපිරි සුපිරි තැන</p>
        <p class="mt-2">අවසන් වේලාව : 04.58.04 PM</p>
        <p class="mt-4 font-bold">** CodeXpress Technologies +94 77 767 4308**</p>
    </div>
</div>

</body>
</html>
