<table>
    <thead>
        <tr>
            <th>Id Transaksi</th>
            <th>Jasa</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Kasir / User</th>
            <th>Tanggal dan waktu</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($users as $user)
        <tr>
            <td>{{ $user->kode_transaksi }}</td>
            <td>{{ $user->nama_barang }}</td>
            <td>{{ $user->harga }}</td>
            <td>{{ $user->total }}</td>
            <td>{{ $user->kasir }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>