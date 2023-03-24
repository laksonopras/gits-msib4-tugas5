<?php
    $id = null;
?>  

@extends('layouts.app')

@section('content')
<div class="p-3" style="height: 100%;">
    <div class="card p-3 d-flex" style="height: 100%">
        <div class="row m-0">
            <div class="col-5 me-3 d-flex justify-content-center" style="height: 100%">
                <table style="width: 100%; height: 100%;">
                    <tbody>
                        <tr>
                            <td>Hari Tanggal</td>
                            <td><input type="" class="form-control" disabled value="{{date('d-m-y')}}"/></td>
                        </tr>
                        <tr>
                            <td>Jenis Pesanan</td>
                            <td>
                                <select id="disabledSelect" class="form-select">
                                    <option>Dine in</option>
                                    <option>Take Away</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col d-flex justify-content-center bg-dark-subtle p-3" style="height: 100%; width: 100%;">
                <table class="fs-1 text fw-bold"style="width: 100%;">
                    <tbody >
                        <tr >
                            <td>TOTAL</td>
                            <td>Rp.</td>
                            <td class="text-end">{{$tagihan}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <form action="/cart/add">
            <div class="row m-0 mt-3 " style="width: 100%">
                <div class="col p-0">
                    <select class="form-select " required style="width: 100%" name="product_id">
                        <option selected>Pilih Produk</option>
                        <table style="width: 100%">
                            <tbody style="width: 100%">
                                @foreach($products as $product)
                                <tr>
                                    <option value="{{ $product['id'] }}">
                                        <td>{{ $product['product_name'] }}</td>
                                        <td class="text-end">{{ $product['price'] }}</td>
                                    </option>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>            
                    </select>
                </div>
                <div class="col-2 px-3">
                    <input class="form-control" required type="number" placeholder="jumlah" name="count">
                </div>
                <div class="col-1 p-0">
                    <button class="btn btn-primary" type="submit" style="width: 100%">Tambahkan</button>
                </div>
            </div>
        </form>
        {{-- <button class="btn btn-primary mt-5">Cari produk</button> --}}
        <table class="mt-3 table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">id produk</th>
                    <th class="text-center">produk</th>
                    <th class="text-center">kategori</th>
                    <th class="text-center">jumlah</th>
                    <th class="text-center">harga</th>
                    <th class="text-center">diskon</th>
                    <th class="text-center">total harga</th>
                    <th class="text-center">hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{ $item->product->id }}</td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->product->category->category }}</td>
                        <td class="text-end" data-bs-toggle="modal" data-bs-target="#exampleModal" {{$id = $item['id']}} >{{ $item->count }}</td>
                        <td class="text-end">{{ $item->product->price }}</td>
                        <td class="text-end">{{ $item->product->discount }}</td>
                        <td class="text-end">{{ $item->price }}</td>
                        <td class="d-flex justify-content-center"><a class="btn btn-danger" href="/cart/delete/{{ $item['id'] }}" >hapus</a></td>
                    </tr>
                @endforeach   
            </tbody>
        </table>
        <div class="row m-0 mt-auto" style="width: 100%">
            <div class="col-4">
                <form action="/transaction/add">
                    <table style="width: 100% ">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>Rp.</td>
                                <td class="text-end">{{$jumlah}}</td>
                            </tr>
                            <tr>
                                <td>Pajak (Ppn)</td>
                                <td>Rp.</td>
                                <td class="text-end">{{$pajak}}</td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>Rp.</td>
                                <td class="text-end">{{$tagihan}}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Bayar</td>
                                <td>Rp.</td>
                                <td class="text-end"><input class="form-control" name="pay"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-success">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Jumlah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/cart/edit/{{$id}}" >
                <div class="modal-body">
                    <input class="form-control" required type="number" placeholder="jumlah" name="count">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection