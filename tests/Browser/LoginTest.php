<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    // use DatabaseMigrations;

    public function testLogin(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/')
                    ->assertSee('Modul 3') //melihat teks ‘started’ 
                    ->clickLink('Log in') //menekan tautan ‘Log in’
                    ->assertPathIs('/login') //memastikan url setelah menekan tautan sebelumnya
                    ->type('email', 'abc@gmail.com') //mengisi input yang memiliki atribut name email.
                    ->type('password', '123') //mengisi input yang memiliki atribut name password.
                    ->press('LOG IN') //menekan tombol submit dari form
                    ->assertPathIs('/dashboard'); //memastikan url mengarah ke dashboard
        });
    }
}
