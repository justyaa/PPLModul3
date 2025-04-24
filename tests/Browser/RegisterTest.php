<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group regis
     */
    // use DatabaseMigrations;

    public function testRegister(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/')
                    ->assertSee('Modul 3') //melihat teks ‘started’ 
                    ->clickLink('Register') //menekan tautan ‘Log in’
                    ->assertPathIs('/register') //memastikan url setelah menekan tautan sebelumnya
                    ->type('name', 'ye')
                    ->type('email', 'abc@gmail.com') //mengisi input yang memiliki atribut name email.
                    ->type('password', '123') //mengisi input yang memiliki atribut name password.
                    ->type('password_confirmation', '123') //mengisi input yang memiliki atribut name password.
                    ->press('REGISTER') //menekan tombol submit dari form
                    ->assertPathIs('/dashboard'); //memastikan url mengarah ke dashboard
        });
    }
}
