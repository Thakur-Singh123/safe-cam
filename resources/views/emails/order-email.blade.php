<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Hello {{ $order->customer_name }},</h2>
    <p>Thank you for your order. Your order details are below:</p>

    <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
    <p><strong>Amount Paid:</strong> ${{ number_format($order->total_amount, 2) }}</p>
    
    <h3>Billing Details:</h3>
    <p>{{ $order->billing_address }}, {{ $order->billing_city }}, {{ $order->billing_state }}, {{ $order->billing_zip }}</p>
    
    <h3>Shipping Details:</h3>
    <p>{{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_state }}, {{ $order->shipping_zip }}</p>

    <p>We appreciate your business!</p>
</body>
</html>
