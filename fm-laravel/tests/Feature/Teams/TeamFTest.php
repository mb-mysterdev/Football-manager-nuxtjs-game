<?php

use App\Models\Division;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetAllTeams(){
        $division = Division::factory()->create();

        Team::factory(3)->create(['team_division'=>$division->division_id]);

        $this->getJson("/api/teams")
            ->assertStatus(200)
        ->assertJsonCount(3);
    }
}
