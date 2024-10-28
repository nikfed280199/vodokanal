<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>История показаний</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Счетчик</th>
                <th>Значение</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            @foreach($readings as $reading)
                <tr>
                    <td>{{ $reading->id }}</td>
                    <td>{{ $reading->meter->number ?? 'N/A' }}</td>
                    <td>{{ $reading->value }}</td>
                    <td>{{ $reading->date->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
