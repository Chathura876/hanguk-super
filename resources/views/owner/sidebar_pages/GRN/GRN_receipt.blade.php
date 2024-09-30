<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset("Hanguk_super/assets/IMG/logo/logo_fav_02.png")}}">
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
                <td>: {{ $bill->created_at->format('Y-m-d') }}</td> <!-- Format as Year-Month-Day -->
            </tr>

            <tr>
                <td class="font-bold">බිල් අංකය </td>
                <td>: {{$bill->id}}</td>
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
                <td class="font-bold">වේලාව</td>
                <td>: {{ $bill->created_at->format('H:i:s') }}</td> <!-- Format as Hours:Minutes:Seconds -->
            </tr>

        </table>
    </div>

    <hr class="border-t-2 border-dashed border-gray-600 mt-4">
    <!-- Items Table -->
    <table class="w-full text-sm border-collapse">
        <thead>
        <tr>
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
        @php
            $count = 1; // Initialize the counter outside the loop
            $total=0;
            $totalDiscount=0;
        @endphp

        @foreach($billItem as $item)
            <tr>
                <td class="border-0" style="text-align: left;" colspan="4">{{ $count }}.{{ $item->product_name }}</td> <!-- Product name -->
            </tr>
            <tr>
                <td class="border-0 px-2 py-1">{{$item->quantity}}</td>
                <td class="border-0 px-2 py-1">{{$item->price}}</td>
                <td class="border-0 px-2 py-1">{{$item->price-$item->discount_price}}</td>
                <td class="border-0 px-2 py-1">{{$item->sub_total}}</td>
            </tr>

            @php
                $count++; // Increment the counter after each loop iteration
            $total=$total+($item->price * $item->quantity);
            $totalDiscount= $totalDiscount+($item->discount_price * $item->quantity);
            @endphp
        @endforeach

        <!-- Add more rows as needed -->
        </tbody>
    </table>

    <hr class="border-t-2 border-dashed border-gray-600 mt-4">
    <!-- Totals and Summary -->
    <div class="mt-4">
        <div class="flex justify-between">
            <span>සිල්ලර එකතුව</span>
            <span>{{$total}}</span>
        </div>
        <div class="flex justify-between">
            <span>වට්ටම්</span>
            <span>{{$totalDiscount}}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-bold">මුළු එකතුව</span>
            <span>{{$total- $totalDiscount}}</span>
        </div>
        <div class="flex justify-between">
            <span>මුදල් ගෙවීම</span>
            <span>{{$bill->pay_amount}}</span>
        </div>
        <div class="flex justify-between">
            <span>ඉතිරි මුදල</span>
            <span>{{$bill->balance}}</span>
        </div>

    </div>

    <hr class="border-t-2 border-dashed border-gray-600 mt-4">

    <h2 class="text-center font-bold border-2 border-black mt-4">ඔබට ලැබුණු ලාභය රුපියල් {{$totalDiscount}}</h2>
    <!-- Footer -->
    <div class="mt-4 text-center text-sm">
        <p>භාණ්ඩ සංඛ්‍යාව {{$count}}</p>
        <p>වාසි සපිරි සුපිරි තැන</p>
        <p class="mt-2">අවසන් වේලාව : {{ $bill->created_at->format('H:i:s') }}</p>
        <p class="mt-4 font-bold">** CodeXpress Technologies +94 77 767 4308**</p>
    </div>
</div>

</body>
</html>
