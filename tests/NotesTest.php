<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Note;

class NotesTest extends TestCase
{
  use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_notes_list()
    {
      //Having
      Note::create(['text' => 'My first note']);
      Note::create(['text' => 'Second note']);
      //When
      $this->visit('notes')
        //Then
        ->see('My first note')
        ->see('Second note');
    }
    public function test_create_notes()
    {
      $this->visit('notes')
        ->click('Add a note')
        ->seePageIs('notes/create')
        ->see('Create a note')
        ->type('A new note', 'text')
        ->press('Create note')
        ->seePageIs('notes')
        ->see('A new note')
        ->seeInDatabase('notes', [
          'text' => 'A new note'
        ]);
    }
}
