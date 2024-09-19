<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<h2>Daily Profit Report</h2>
<p>Date: {{ date('Y-m-d') }}</p>
<table>
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Selling Price (Rs.)</th>
        <th>Profit (Rs.)</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($profits as $profit)
        <tr>
            <td>{{ $profit->product_name }}</td>
            <td>{{ $profit->quantity }}</td>
            <td>{{ $profit->selling_price }}</td>
            <td>{{ $profit->profit }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h3>Total Profit: Rs. {{ $totalProfit }}</h3>
<h3>Total Expenses: Rs. {{ $totalExpenses }}</h3>
<h3>Net Profit: Rs. {{ $netProfit }}</h3>
</body>
</html>
