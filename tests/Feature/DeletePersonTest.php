<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeletePersonTest extends TestCase
{
    public function test_should_delete_person()
    {
        $person=Person::create([
            'firstname'=>'Arman',
            'lastname'=>'Masangkay'
        ]);

        $response=$this->delete(route('person.destroy',$person));

        $response->assertRedirect(route('person.index'));
        $response->assertSessionHasAll([
            'deleted'=>true,
            'message'=>'Information deleted successfully!'
        ]);
        $this->assertDatabaseCount('people',0);

    }
}
