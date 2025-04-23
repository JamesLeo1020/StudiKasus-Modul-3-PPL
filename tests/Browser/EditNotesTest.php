<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group edittest
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/login')
                ->type('email', 'userbaru@gmail.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->clickLink('Notes')
                ->click('@edit-1')
                ->type('title', 'Note Sudah Diubah') // Ubah title
                ->type('description', 'Isi baru setelah diedit') // Ubah deskripsi
                ->press('Update') // Submit form edit
                ->assertPathIs('/notes') // Redirect ke index
                ->assertSee('Note Sudah Diubah'); // Pastikan hasil edit muncul
        });
    }
}
