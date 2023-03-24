@extends('layouts.app')
@section('content')
<div style="padding: 25px;" >
    <div style="background: white;  padding: 25px;">
        <h1 class="text-center fw-bold">Daftar Kategori Produk</h1>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Kategori Produk</button>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Item</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Pajak</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Kembalian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction['transaction_id'] }}</td>
                        <td></td>
                        <td>{{ $transaction['item_total'] }}</td>
                        <td>{{ $transaction['pajak'] }}</td>
                        <td>{{ $transaction['sum_price'] }}</td>
                        <td>{{ $transaction['pay'] }}</td>
                        <td>{{ $transaction['change'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection