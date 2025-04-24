<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editnotes
     */
    // use DatabaseMigrations;

    public function testeditnotes(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/')
                    ->assertSee('Modul 3') //melihat teks ‘started’ 
                    ->clickLink('Log in') //menekan tautan ‘Log in’
                    ->assertPathIs('/login') //memastikan url setelah menekan tautan sebelumnya
                    ->type('email', 'abc@gmail.com') //mengisi input yang memiliki atribut name email.
                    ->type('password', '123') //mengisi input yang memiliki atribut name password.
                    ->press('LOG IN') //menekan tombol submit dari form
                    ->assertPathIs('/dashboard') //memastikan url mengarah ke dashboard
                    ->clickLink('Notes') //menekan tautan ‘Log in’
                    ->clickLink('Create Note') //menekan tautan ‘Log in’
                    ->assertPathIs('/create-note') //memastikan url setelah menekan tautan sebelumnya
                    ->type('title', 'pulang') //mengisi input yang memiliki atribut name email.
                    ->type('description', '123') //mengisi input yang memiliki atribut name password.
                    ->press('CREATE') //menekan tombol submit dari form
                    ->assertPathIs('/notes') //memastikan url mengarah ke dashboard
                    ->clickLink('Edit')
                    ->type('title', 'pulang') //mengisi input yang memiliki atribut name email.
                    ->type('description', 'mau pulang') //mengisi input yang memiliki atribut name password.
                    ->press('UPDATE') //menekan tombol submit dari form
                    ->assertPathIs('/notes');
        });
    }
}
