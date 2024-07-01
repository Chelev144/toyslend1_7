<!-- resources/views/suppliers/index.blade.php -->
<h1>רשימת ספקים</h1>

@foreach ($suppliers as $supplier)
    <h2>{{ $supplier->name }}</h2>

    <h3>תשלומים:</h3>
    <table>
        <thead>
            <tr>
                <th>סכום</th>
                <th>תאריך תשלום</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier->payments as $payment)
                <tr>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach
