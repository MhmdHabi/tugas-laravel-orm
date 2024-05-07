<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profiles;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function getProfil()
    {
        //membuat user baru
        $user = new User();
        $user->name = 'Admin Amandemy';
        $user->email = 'Admin.amanah@gmail.com';
        $user->gender = 'male';
        $user->umur = '23 tahun';
        $user->tgl_lahir = '1986-05-20';
        $user->alamat = 'Jalan Urun Pandang Blok 11 No. 57, RT 06 / RW 12, Kecamatan Bulakamba, keluarahan Situ jajar, Bandung, Jawa Barat';
        $user->save();

        //membuat profile baru
        $profile = new Profiles();
        $profile->user_id = $user->id;
        $profile->name = 'Amandemy Play';
        $profile->rate = 3;
        $profile->produk_terbaik = 'Kucing ceria';
        $profile->deskripsi = 'Toko ini hanya menjual mainan-mainan berkualitas dengan harga yang terjangkau dan pas dikantong';
        $profile->save();
    }

    public function index($user_id)
    {
        // $users = User::latest()->get();
        $user = User::find($user_id);
        return view('profile', compact('user'));
    }
}
