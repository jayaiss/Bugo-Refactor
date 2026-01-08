<!DOCTYPE html>
<html>
<head>
    <title>Resident Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2>Barangay Resident Index</h2>
        
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Purok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($residents as $resident)
                    <tr>
                        <td>{{ $resident['id'] }}</td>
                        <td>{{ $resident['name'] }}</td>
                        <td>{{ $resident['purok'] }}</td>
                    </tr>
                @endforeach
                </tbody>
        </table>
        
        @if(count($residents) == 0)
            <p class="text-danger">No residents found.</p>
        @endif
    </div>
</body>
</html>