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
<h2>Stock Report</h2>
<table>
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Stock Price (Rs.)</th>
        <th>Selling Price (Rs.)</th>
        <th>Discount Price (Rs.)</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($stock as $item)
        <tr>
            <td>{{ $item->product ? $item->product->product_name : 'N/A' }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->unit }}</td>
            <td>{{ $item->stock_price }}</td>
            <td>{{ $item->selling_price }}</td>
            <td>{{ $item->discount_price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
