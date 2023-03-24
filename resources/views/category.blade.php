<?php
    $kategori['id'] = null;
    $kategori['category'] = null;
?>

@extends('layouts.app')
@section('content')
<!-- content -->
<div style="padding: 25px;" >
    <div style="background: white;  padding: 25px;">
        <h1 class="text-center fw-bold">Daftar Kategori Produk</h1>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Kategori Produk</button>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Kode Kategori</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['category'] }}</td>
                        <td> </td>
                        <td><a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal" {{ $kategori = $category }} >ubah</a></td>
                        <td><a class="btn btn-danger" href="/category/delete/ {{ $category['id'] }} " >hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/category/add" >
                <div class="modal-body">
                    <table style="width: 100%;">
                        <tr>
                            <td>Nama Kategori</td>
                            <td><input class="form-control my-3" type="text" placeholder="Kategori" name="category"></td>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/category/edit/{{ $kategori['id'] }}" >
                <div class="modal-body">
                    <table style="width: 100%;">
                        <tr>
                            <td>Nama Kategori</td>
                            <td><input class="form-control my-3" type="text" placeholder=" {{ $kategori['category'] }} " name="category"></td>
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