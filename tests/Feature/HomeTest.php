<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_is_woring()
    {
        $response = $this->get('/');
        
        $response->assertSeeText('Home Page');
    }

    public function test_contact_page_is_working()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('Contacts');
    }
}
