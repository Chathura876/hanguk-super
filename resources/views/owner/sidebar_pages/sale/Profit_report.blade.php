
@extends('cashier.cashier_app')
@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profit Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h1, h2 {
            text-align: center;
            color: #007BFF; /* Bootstrap primary color */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Zebra striping */
        }
        tr:hover {
            background-color: #f1f1f1; /* Highlight row on hover */
        }
        .total {
            font-weight: bold;
            color: #007BFF;
        }
    </style>
</head>
<body>
<h1>Profit Report</h1>
<p>Report Period: {{ $startDate }} to {{ $endDate }}</p>

<h2>Total Profit Today: Rs. {{ $totalProfitToday }}</h2>
<h2>Total Sales Today: Rs. {{ $totalSaleToday }}</h2>
<h2>Total Cost Today: Rs. {{ $totalCostToday }}</h2>

<table>
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Selling Price (Rs.)</th>
        <th>Stock Price (Rs.)</th>
        <th>Discount Price (Rs.)</th>
        <th>Quantity</th>
        <th>Profit (Rs.)</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($profitsToday  as $profit)
        <tr>
            <td class="px-6 py-2 font-medium">{{$profit['barcode']}}</td>
            <td class="px-6 py-2 font-medium">{{$profit['product_name']}}</td>
            <td class="px-6 py-2 font-medium">{{$profit['selling_price']}}</td>
            <td class="px-6 py-2 font-medium">{{$profit['stock_price']}}</td>
            <td class="px-6 py-2 font-medium">{{$profit['discount_price']}}</td>
            <td class="px-6 py-2 font-medium">{{$profit['quantity']}}</td>
            <td class="px-6 py-2 font-medium">{{$profit['profit']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
@endsection
