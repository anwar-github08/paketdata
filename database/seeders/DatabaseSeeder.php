<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'name' => 'Khoirul Anwar',
            'email' => 'playmakeranwar08@gmail.com',
            'password' => Hash::make('anwardata08'),
        ]);

        // Produk::create([
        //     'kategori' => 'PLN',
        //     'brand' => 'PLN',
        //     'nama_produk' => 'PLN 10.000',
        //     'kode_produk' => 'pln10',
        //     'harga' => '11000',
        //     'multi' => true,
        //     'deskripsi' => 'token listrik pln 10K, valid 100%'
        // ]);

        // Produk::create([
        //     'kategori' => 'PLN',
        //     'brand' => 'PLN',
        //     'nama_produk' => 'PLN 20.000',
        //     'kode_produk' => 'pln20',
        //     'harga' => '21000',
        //     'multi' => true,
        //     'deskripsi' => 'token listrik pln 20K, valid 100%'
        // ]);

        // Produk::create([
        //     'kategori' => 'PLN',
        //     'brand' => 'PLN',
        //     'nama_produk' => 'PLN 50.000',
        //     'kode_produk' => 'pln50',
        //     'harga' => '51000',
        //     'multi' => true,
        //     'deskripsi' => 'token listrik pln 50K, valid 100%'
        // ]);

        // Produk::create([
        //     'kategori' => 'Data',
        //     'brand' => 'TELKOMSEL',
        //     'nama_produk' => 'Flash 1Gb',
        //     'kode_produk' => 'flash1',
        //     'harga' => '15000',
        //     'multi' => true,
        //     'deskripsi' => 'Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.'
        // ]);

        // Produk::create([
        //     'kategori' => 'Data',
        //     'brand' => 'TELKOMSEL',
        //     'nama_produk' => 'Flash 2Gb',
        //     'kode_produk' => 'flash2',
        //     'harga' => '25000',
        //     'multi' => true,
        //     'deskripsi' => 'Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.'
        // ]);

        // Produk::create([
        //     'kategori' => 'Data',
        //     'brand' => 'TRI',
        //     'nama_produk' => 'Aon 1Gb',
        //     'kode_produk' => 'aon1',
        //     'harga' => '54000',
        //     'multi' => true,
        //     'deskripsi' => 'Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.'
        // ]);

        // Produk::create([
        //     'kategori' => 'Data',
        //     'brand' => 'TRI',
        //     'nama_produk' => 'Aon 2Gb',
        //     'kode_produk' => 'aon2',
        //     'harga' => '87000',
        //     'multi' => true,
        //     'deskripsi' => 'Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.'
        // ]);

        // Produk::create([
        //     'kategori' => 'Masa Aktif',
        //     'brand' => 'TRI',
        //     'nama_produk' => 'Masa Aktif 4 Bulan',
        //     'kode_produk' => 'maktif4',
        //     'harga' => '3500',
        //     'multi' => true,
        //     'deskripsi' => 'Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.'
        // ]);
    }
}
