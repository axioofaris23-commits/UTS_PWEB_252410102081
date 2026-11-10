<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function menuKopi(): array
    {
        return [
            ['nama' => 'Espresso',              'kategori' => 'Kopi Hitam',  'harga' => 15000, 'stok' => 40],
            ['nama' => 'Americano',             'kategori' => 'Kopi Hitam',  'harga' => 18000, 'stok' => 35],
            ['nama' => 'Long Black',            'kategori' => 'Kopi Hitam',  'harga' => 20000, 'stok' => 30],
            ['nama' => 'Cafe Latte',            'kategori' => 'Kopi Susu',   'harga' => 24000, 'stok' => 28],
            ['nama' => 'Cappuccino',            'kategori' => 'Kopi Susu',   'harga' => 25000, 'stok' => 22],
            ['nama' => 'Flat White',            'kategori' => 'Kopi Susu',   'harga' => 26000, 'stok' => 20],
            ['nama' => 'Kopi Susu Gula Aren',   'kategori' => 'Kopi Susu',   'harga' => 22000, 'stok' => 50],
            ['nama' => 'Mocha',                 'kategori' => 'Kopi Susu',   'harga' => 28000, 'stok' => 18],
            ['nama' => 'Caramel Latte',         'kategori' => 'Kopi Susu',   'harga' => 29000, 'stok' => 15],
            ['nama' => 'Hazelnut Latte',        'kategori' => 'Kopi Susu',   'harga' => 30000, 'stok' => 14],
            ['nama' => 'Vanilla Latte',         'kategori' => 'Kopi Susu',   'harga' => 30000, 'stok' => 16],
            ['nama' => 'V60 Manual Brew',       'kategori' => 'Manual Brew', 'harga' => 28000, 'stok' => 12],
            ['nama' => 'Japanese Iced Coffee',  'kategori' => 'Manual Brew', 'harga' => 30000, 'stok' => 10],
            ['nama' => 'Vietnam Drip',          'kategori' => 'Manual Brew', 'harga' => 25000, 'stok' => 20],
            ['nama' => 'Tubruk Premium',        'kategori' => 'Manual Brew', 'harga' => 18000, 'stok' => 25],
            ['nama' => 'Affogato',              'kategori' => 'Signature',   'harga' => 32000, 'stok' => 12],
            ['nama' => 'Es Kopi Nusantara',     'kategori' => 'Signature',   'harga' => 27000, 'stok' => 24],
            ['nama' => 'Kopi Pandan',           'kategori' => 'Signature',   'harga' => 30000, 'stok' => 15],
            ['nama' => 'Chocolate Latte',       'kategori' => 'Non Kopi',    'harga' => 26000, 'stok' => 18],
            ['nama' => 'Matcha Latte',          'kategori' => 'Non Kopi',    'harga' => 28000, 'stok' => 17],
            ['nama' => 'Red Velvet Latte',      'kategori' => 'Non Kopi',    'harga' => 28000, 'stok' => 14],
            ['nama' => 'Taro Latte',            'kategori' => 'Non Kopi',    'harga' => 27000, 'stok' => 19],
            ['nama' => 'Thai Tea',              'kategori' => 'Non Kopi',    'harga' => 22000, 'stok' => 30],
            ['nama' => 'Lemon Tea',             'kategori' => 'Tea',         'harga' => 18000, 'stok' => 35],
            ['nama' => 'Peach Tea',             'kategori' => 'Tea',         'harga' => 22000, 'stok' => 25],
            ['nama' => 'Lychee Tea',            'kategori' => 'Tea',         'harga' => 22000, 'stok' => 23],
            ['nama' => 'Mineral Water',         'kategori' => 'Lainnya',     'harga' => 8000,  'stok' => 100],
            ['nama' => 'Croissant',             'kategori' => 'Snack',       'harga' => 18000, 'stok' => 20],
            ['nama' => 'French Fries',          'kategori' => 'Snack',       'harga' => 22000, 'stok' => 15],
            ['nama' => 'Cheese Cake',           'kategori' => 'Dessert',     'harga' => 30000, 'stok' => 10],
        ];
    }


    private const ADMIN_USERNAME = 'Faris';
    private const ADMIN_PASSWORD = 'Faris123';

    public function login()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (
            hash_equals(self::ADMIN_USERNAME, $credentials['username']) &&
            hash_equals(self::ADMIN_PASSWORD, $credentials['password'])
        ) {
            $request->session()->regenerate();
            $request->session()->put([
                'admin_logged_in' => true,
                'admin_username' => self::ADMIN_USERNAME,
            ]);

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(['login' => 'Username atau password yang kamu masukkan salah.'])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Kamu berhasil keluar.');
    }

    public function dashboard()
    {
        $menu = $this->menuKopi();

        return view('dashboard', [
            'username' => session('admin_username'),
            'totalMenu' => count($menu),
            'totalStok' => array_sum(array_column($menu, 'stok')),
            'menuTerlaris' => ['Kopi Susu Gula Aren', 'Cafe Latte', 'Americano'],
        ]);
    }

    public function pengelolaan()
    {
        return view('pengelolaan', [
            'username' => session('admin_username'),
            'menu' => $this->menuKopi(),
        ]);
    }

    public function profile()
    {
        return view('profile', [
            'username' => session('admin_username'),
            'info' => [
                'Peran' => 'Administrator',
                'Outlet' => 'Kopi Ilkom — Kampus Tegalboto',
                'Akses' => 'Pengelolaan website',
            ],
        ]);
    }
}
