<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #fff;
        }
        .invoice-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #000;
        }
        .header {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .invoice-details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-details th, .invoice-details td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }
        .address-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }
        .address-box {
            flex: 1;
            padding: 10px;
            border: 1px solid #000;
            min-width: 48%;
        }
        .address-box h3 {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: center;
        }
        .total-box {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">Order Invoice</div>

        <table class="invoice-details">
            <tr>
                <th>Order ID</th>
                <td>{{ $order->order_number }}</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $order->customer_email }}</td>
            </tr>
        </table>

        <div class="address-container">
            <div class="address-box">
                <h3>Billing Address</h3>
                <p>{{ $order->billing_address }}<br>
                {{ $order->billing_city }}, {{ $order->billing_state }} - {{ $order->billing_zip }}</p>
            </div>
            <div class="address-box">
                <h3>Shipping Address</h3>
                <p>{{ $order->shipping_address }}<br>
                {{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_zip }}</p>
            </div>
        </div>

        <div class="total-box">
            Total Amount: ${{ number_format($order->total_amount, 2) }}
        </div>
    </div>
</body>
</html>
