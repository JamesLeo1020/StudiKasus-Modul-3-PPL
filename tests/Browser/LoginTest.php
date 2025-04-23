<?php

namespace Tests\Browser;

// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/') // Mengunjungi halaman utama aplikasi
                ->assertSee('Modul 3') // Memastikan teks 'Modul 3' muncul di halaman utama
                ->clickLink('Log in') // Mengklik link 'Log in' untuk menuju ke halaman login
                ->assertPathIs('/login') // Memastikan saat ini berada di path '/login'
                ->type('email', 'userbaru@gmail.com') // Mengisi input bernama 'email' dengan 'admin@gmail.com'
                ->type('password', 'password') // Mengisi input bernama 'password' dengan 'password'
                ->press('LOG IN') // Menekan tombol 'LOG IN'
                ->assertPathIs('/dashboard'); // Memastikan diarahkan ke halaman dashboard setelah login
        });
    }
}
