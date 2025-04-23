<?php

namespace Tests\Browser;

// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group notes
     */
    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/login') // Login ulang
                ->type('email', 'userbaru@gmail.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')

                ->visit('/notes') // Ke halaman index
                ->clickLink('Edit') // Klik link Edit pertama (pastikan ada link Edit di view)
                ->assertSee('Edit Note') // Pastikan halaman edit tampil

                ->type('title', 'Catatan Dusk Test Updated') // Update judul
                ->type('description', 'Ini catatan test otomatis yang telah diupdate.') // Update deskripsi
                ->press('UPDATE') // Tekan tombol update
                ->assertPathIs('/notes') // Redirect ke index notes
                ->assertSee('Catatan Dusk Test Updated'); // Pastikan update muncul
        });
    }
}
