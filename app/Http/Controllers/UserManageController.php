<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Acces;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

class UserManageController extends Controller
{
    // Create First Account
    public function firstAccount(Request $req)
    {
    	$users = new User;
    	$users->nama = $req->nama;
    	$users->role = $req->role;
        //dd($req->images);
        $images = array();
        $arr = 0;
        /*foreach ($req->images as $image) {
            $images[$arr] = $image;
            $arr++;
        }*/

       /* var_dump($images);
        echo "<br><br>";

        dd($req->file('images'));*/

        //Identitas
        if (isset($req->images[0]) ) {
            $identitas = $req->file('images')[0];
            $users->identitas = $identitas->getClientOriginalName();
            $identitas->move(public_path('images/identitas/'),urlencode($identitas->getClientOriginalName()) );
        }else{
            $users->identitas = null;
        }   
        //Ijin
        if (isset($req->images[1]) ) {
            $ijin = $req->file('images')[1];
            $users->ijin_usaha = $ijin->getClientOriginalName();
            $ijin->move(public_path('images/ijin/'),urlencode($ijin->getClientOriginalName()));
        }else{
            $users->ijin_usaha = null;
        }

        $digits = 5;
        $pass = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

    	$users->foto = 'default.jpg';
    	$users->email = $req->email;
    	$users->username = $req->username_2;
    	$users->password = (isset($req->password_2)) ? Hash::make($req->password_2) : $pass;
    	$users->remember_token = Str::random(60);
    	$users->save();
        if ($req->role != 'admin') {
            
            $access = new Acces;
            $access->user = $users->id;
            $access->kelola_akun = 0;
            $access->kelola_barang = ($req->role == 'pengusaha') ? 1 : 0 ;
            $access->transaksi = 1;
            $access->kelola_laporan = ($req->role == 'pengusaha') ? 1 : 0 ;
            $access->save();
            
        }

    	Session::flash('create_success', 'Akun baru berhasil dibuat');

    	return back();
    }

    // Show View Account
    public function viewAccount()
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){
            $users = User::all();

            return view('manage_account.account', compact('users'));    
        }else{
            return back();
        }
    }

    // Show View Verify
    public function viewVerify()
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){
            $users = User::where('email_verified_at','=', null)->get();
            $verify = true;

            return view('manage_account.account', compact('users','verify'));    
        }else{
            return back();
        }
    } 

    public function verifyData($id)
    {
        $user = User::find($id);
        //dd($user);
        $pass = $user->password; 
        Mail::to($user->email)->send(new sendMail($user->nama, $pass, $user->username, url('/login') ));
        $user->password = Hash::make($pass);
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();
        Session::flash('update_success', 'Akun Verifikasi');
        return back();
    }

    // Show View New Account
    public function viewNewAccount()
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){
        	return view('manage_account.new_account');
        }else{
            return back();
        }
    }

    // Filter Account Table
    public function filterTable($id)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){
        	$users = User::orderBy($id, 'asc')
            ->get();

        	return view('manage_account.filter_table.table_view', compact('users'));
        }else{
            return back();
        }
    }

    // Create New Account
    public function createAccount(Request $req)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){

        	$check_email = User::all()
        	->where('email', $req->email)
        	->count();
        	$check_username = User::all()
        	->where('username', $req->username)
        	->count();

        	if($check_email == 0 && $check_username == 0)
        	{
        		$users = new User;
                $users->kode_market = 0 ;
    	    	$users->nama = $req->nama;
    	    	$users->role = $req->role; 

                //Identitas
                if (isset($req->images[0])) {
                    $identitas = $req->file('images')[0];
                    $users->identitas = $identitas->getClientOriginalName();
                    $identitas->move(public_path('images/identitas/'), $identitas->getClientOriginalName());
                }else{
                    $users->identitas = null;
                }   

                //Ijin
                if (isset($req->images[1]) ) {
                    $ijin = $req->file('images')[1];
                    $users->ijin_usaha = $ijin->getClientOriginalName();
                    $ijin->move(public_path('images/ijin/'), $ijin->getClientOriginalName());
                }else{
                    $users->ijin_usaha = null;
                }

                //foto
                //$foto = (isset($req->images[2])) ? $req->images[2] : $req->foto ;
                if ( isset($req->images[2]) ) {
                    $foto =  (isset($req->images[2])) ? $req->file('images')[2] : $req->file('foto');
                    $users->foto = $foto[2]->getClientOriginalName();
                    $foto->move(public_path('pictures/'), $foto->getClientOriginalName());
                }else{
                    $users->foto = 'default.jpg';
                }
                $users->email = $req->email;
    	    	$users->username = $req->username;
    	    	$users->password = Hash::make($req->password);
    	    	$users->remember_token = Str::random(60);
    	    	$users->save();
                if($req->role == 'admin'){
                    $access = new Acces;
                    $access->user = $users->id;
                    $access->kelola_akun = 1;
                    $access->kelola_barang = 1;
                    $access->transaksi = 1;
                    $access->kelola_laporan = 1;
                    $access->save();
                }elseif($req->role == 'pengusaha'){
                    $access = new Acces;
                    $access->user = $users->id;
                    $access->kelola_akun = 0;
                    $access->kelola_barang = 1;
                    $access->transaksi = 1;
                    $access->kelola_laporan = 1;
                    $access->save();
                }else{
                    $access = new Acces;
                    $access->user = $users->id;
                    $access->kelola_akun = 0;
                    $access->kelola_barang = 0;
                    $access->transaksi = 1;
                    $access->kelola_laporan = 0;
                    $access->save();
                }

    	    	Session::flash('create_success', 'Akun baru berhasil dibuat');

    	    	return redirect('/account');
        	}
        	else if($check_email != 0 && $check_username != 0)
        	{
        		Session::flash('both_error', 'Email dan username telah digunakan, silakan coba lagi');

        		return back();
        	}
        	else if($check_email != 0)
        	{
        		Session::flash('email_error', 'Email telah digunakan, silakan coba lagi');

        		return back();
        	}
        	else if($check_username != 0)
        	{
        		Session::flash('username_error', 'Username telah digunakan, silakan coba lagi');

        		return back();
        	}
        }else{
            return back();
        }
    }

    // Edit Account
    public function editAccount($id)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){
            $user = User::find($id);

            return response()->json(['user' => $user]);
        }else{
            return back();
        }
    }

    // Update Account
    public function updateAccount(Request $req)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){
            $user_account = User::find($req->id);
            $check_email = User::all()
            ->where('email', $req->email)
            ->count();
            $check_username = User::all()
            ->where('username', $req->username)
            ->count();

            if(($req->foto != '' && $check_email == 0 && $check_username == 0) || ($req->foto != '' && $user_account->email == $req->email && $user_account->username == $req->username) || ($req->foto != '' && $check_email == 0 && $user_account->username == $req->username) || ($req->foto != '' && $user_account->email == $req->email && $check_username == 0))
            {
                $user = User::find($req->id);
                $user->nama = $req->nama;
                $user->role = $req->role;
                $foto = $req->file('foto');
                $user->foto = $foto->getClientOriginalName();
                $foto->move(public_path('pictures/'), $foto->getClientOriginalName());
                $user->email = $req->email;
                $user->username = $req->username;
                $user->save();

                Session::flash('update_success', 'Akun berhasil diubah');

                return redirect('/account');
            }
            else if(($req->foto == '' && $check_email == 0 && $check_username == 0) || ($req->foto == '' && $user_account->email == $req->email && $user_account->username == $req->username) || ($req->foto == '' && $check_email == 0 && $user_account->username == $req->username) || ($req->foto == '' && $user_account->email == $req->email && $check_username == 0))
            {
                if($req->nama_foto == 'default.jpg')
                {
                    $user = User::find($req->id);
                    $user->nama = $req->nama;
                    $user->role = $req->role;
                    $user->foto = $req->nama_foto;
                    $user->email = $req->email;
                    $user->username = $req->username;
                    $user->save();
                }else{
                    $user = User::find($req->id);
                    $user->nama = $req->nama;
                    $user->role = $req->role;
                    $user->email = $req->email;
                    $user->username = $req->username;
                    $user->save();
                }

                Session::flash('update_success', 'Akun berhasil diubah');

                return redirect('/account');
            }
            else if($check_email != 0 && $check_username != 0 && $user_account->email != $req->email && $user_account->username != $req->username)
            {
                Session::flash('both_error', 'Email dan username telah digunakan, silakan coba lagi');

                return back();
            }
            else if($check_email != 0 && $user_account->email != $req->email)
            {
                Session::flash('email_error', 'Email telah digunakan, silakan coba lagi');

                return back();
            }
            else if($check_username != 0 && $user_account->username != $req->username)
            {
                Session::flash('username_error', 'Username telah digunakan, silakan coba lagi');

                return back();
            }
        }else{
            return back();
        }
    }

    // Delete Account
    public function deleteAccount($id)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if($check_access->kelola_akun == 1){
            User::destroy($id);
            Acces::where('user', $id)->delete();

            Session::flash('delete_success', 'Akun berhasil dihapus');

            return back();
        }else{
            return back();
        }
    }
}
