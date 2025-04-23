<?php

namespace Tests\Browser;

// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class RegistrasiTest extends DuskTestCase
{
    /** 
     * @group registrasi
     * 
    */
    public function testRegistrasi(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/') // Mengunjungi halaman utama aplikasi
                ->assertSee('Modul 3') // Memastikan halaman utama menampilkan teks 'Modul 3'
                ->clickLink('Register') // Menekan tautan 'Register'
                ->assertPathIs('/register') // Memastikan path sekarang adalah '/register'
                ->type('name', 'User Baru') // Mengisi input bernama 'name' dengan 'User Baru'
                ->type('email', 'userbaru@gmail.com') // Mengisi input bernama 'email' dengan alamat email
                ->type('password', 'password') // Mengisi input bernama 'password'
                ->type('password_confirmation', 'password') // Mengisi input konfirmasi password
                ->press('REGISTER') // Menekan tombol 'REGISTER'
                ->assertPathIs('/dashboard'); // Memastikan setelah registrasi berhasil diarahkan ke '/dashboard'
        });
    }
}
