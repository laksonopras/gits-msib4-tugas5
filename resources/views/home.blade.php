<?php
    $produk['id'] = null;
    $produk['product_name'] = null;
    $produk['category_id'] = null;
    $produk['stock'] = null;
    $produk['price'] = null;
    $produk['discount'] = null;

?>  

@extends('layouts.app')
@section('content')
<!-- content -->
<div style="padding: 25px;" >
    <div style="background: white;  padding: 25px;">
        <h1 class="text-center fw-bold">Daftar Peserta Program</h1>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Produk</button>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Kode Menu</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['category']->category }}</td>
                        <td>{{ $product['product_name'] }}</td>
                        <td>{{ $product['stock'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['discount'] }}</td>
                        <td><a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal" {{ $produk = $product }}">ubah</a></td>
                        <td><a class="btn btn-danger" href="/product/delete/{{ $product['id'] }}" >hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/product/add" >
                <div class="modal-body">
                    <table style="width: 100%;">
                        <tr>
                            <td>Nama Produk</td>
                            <td><input class="form-control my-3" type="text" required placeholder="Nama Produk" name="product_name"></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <select class="form-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category['id']}}">{{ $category['category']}}</option>
                                    @endforeach
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><input class="form-control my-3" type="text" required placeholder="Stok" name="stock"></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><input class="form-control my-3" type="text" required placeholder="harga" name="price"></td>
                        </tr>
                        <tr>
                            <td>Diskon</td>
                            <td><input class="form-control my-3" type="text" required placeholder="diskon" name="discount"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/product/edit/{{ $produk['id'] }}" >
                <div class="modal-body">
                    <table style="width: 100%;">
                        <tr>
                            <td>Nama Produk</td>
                            <td><input class="form-control my-3" type="text" placeholder="{{ $produk['product_name'] }}" name="product_name"></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <select class="form-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category['id']}}">{{ $category['category']}}</option>
                                    @endforeach
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><input class="form-control my-3" type="text" placeholder="{{ $produk['stock'] }}" name="stock"></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><input class="form-control my-3" type="text" placeholder=" {{ $produk['price'] }} " name="price"></td>
                        </tr>
                        <tr>
                            <td>Diskon</td>
                            <td><input class="form-control my-3" type="text" placeholder=" {{ $produk['discount'] }} " name="discount"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection