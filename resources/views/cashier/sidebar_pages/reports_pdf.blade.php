<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .summary {
            margin-top: 20px;
            font-size: 16px;
        }
        .summary div {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Stock Report</h1>
    <p>Period: {{ $startDate->format('d M Y') }} to {{ $endDate->format('d M Y') }}</p>

    <table>
        <thead>
        <tr>
            <th>Stock Id</th>
            <th>Product Name</th>
            <th>Stock Price</th>
            <th>Quantity</th>
            <th>Selling Price</th>
            <th>Discount Price</th>
            <th>Total (Rs.)</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($stock as $item)
            <tr>
                <td>#{{ $item->id }}</td>
                <td>{{ $item->product ? $item->product->product_name : 'N/A' }}</td>
                <td>{{ number_format($item->stock_price, 2) }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ number_format($item->selling_price, 2) }}</td>
                <td>{{ number_format($item->discount_price, 2) }}</td>
                <td>{{ number_format($item->qty * $item->stock_price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div><strong>Sales Amount:</strong> Rs. {{ number_format($stock->sum(function($item) { return $item->qty * $item->selling_price; }), 2) }}</div>
        <div><strong>Total Expenses:</strong> Rs. {{ number_format($stock->sum(function($item) { return $item->qty * $item->stock_price; }), 2) }}</div>
        <div><strong>Net Profit:</strong> Rs. {{ number_format($stock->sum(function($item) { return ($item->qty * $item->selling_price) - ($item->qty * $item->stock_price); }), 2) }}</div>
    </div>
</div>
</body>
</html>
