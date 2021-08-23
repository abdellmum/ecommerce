<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
    <table>
        <ul>
            <li>Payment Id  : {{ $info->payment_id }}</li>
            <li>Total       : {{ $info->total }}</li>
            <li>STATUS Code : {{ $info->status_code }}</li>
        </ul>
    </table>
</body>
</html>