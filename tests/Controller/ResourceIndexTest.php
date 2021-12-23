<?php

namespace SertxuDeveloper\Lyra\Tests\Controller;

use SertxuDeveloper\Lyra\Tests\IntegrationTest;
use SertxuDeveloper\Lyra\Tests\Lyra\Resources\Users;
use SertxuDeveloper\Lyra\Tests\Models\User;

class ResourceIndexTest extends IntegrationTest {

  /**
   * Setup the test environment.
   *
   * @return void
   */
  public function setUp(): void {
    parent::setUp();

    $this->authenticate();
  }

  public function test_can_list_a_resource() {
    User::factory(2)->create();
    $user = User::factory()->create();

    $userCount = User::count();

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users']));

    $response->assertOk();

    $this->assertIsArray($response->json('header'));
    $this->assertIsArray($response->json('data'));
    $this->assertIsArray($response->json('meta'));
    $this->assertIsArray($response->json('labels'));
    $this->assertIsArray($response->json('perPageOptions'));
    $this->assertIsArray($response->json('actions'));
    $this->assertIsArray($response->json('meta'));

    $this->assertEquals(Users::label(), $response->json('labels.plural'));
    $this->assertEquals(Users::singular(), $response->json('labels.singular'));

    $this->assertEquals($userCount, $response->json('meta.total'));
    $this->assertEquals(Users::$perPageOptions, $response->json('perPageOptions'));

    $this->assertEquals($user->id, $response->json('data.0.key'));

    $fields = $response->json('data.0.fields');
    $nameField = collect($fields)->where('key', 'name')->first();
    $this->assertEquals($user->name, $nameField['value']);

    $response->assertJsonCount($userCount, 'data');
  }

  public function test_can_search_for_resources() {
    User::factory(2)->create();
    $user = User::factory()->create();

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users', "q=$user->email"]));

    $response->assertOk();

    $this->assertEquals(1, $response->json('meta.total'));
    $this->assertEquals($user->id, $response->json('data.0.key'));
    $response->assertJsonCount(1, 'data');
  }

  public function test_hides_resources_that_are_soft_deleted() {
    User::factory(2)->create();
    $user = User::factory()->create();
    $deletedUser = User::factory()->create();
    $deletedUser->delete();

    $userCount = User::count();

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users']));

    $response->assertOk();

    $this->assertIsArray($response->json('header'));
    $this->assertIsArray($response->json('data'));
    $this->assertIsArray($response->json('meta'));
    $this->assertIsArray($response->json('labels'));
    $this->assertIsArray($response->json('perPageOptions'));
    $this->assertIsArray($response->json('actions'));
    $this->assertIsArray($response->json('meta'));

    $this->assertEquals(Users::label(), $response->json('labels.plural'));
    $this->assertEquals(Users::singular(), $response->json('labels.singular'));

    $this->assertEquals($userCount, $response->json('meta.total'));
    $this->assertEquals(Users::$perPageOptions, $response->json('perPageOptions'));

    $this->assertEquals($user->id, $response->json('data.0.key'));

    $response->assertJsonCount($userCount, 'data');
  }

  public function test_includes_soft_deleted_resources_when_requested() {
    User::factory(2)->create();
    $deletedUser = User::factory()->create();
    $deletedUser->delete();

    $userCount = User::withTrashed()->count();

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users', 'withTrashed=include']));

    $response->assertOk();

    $this->assertEquals($userCount, $response->json('meta.total'));
    $this->assertEquals($deletedUser->id, $response->json('data.0.key'));
    $response->assertJsonCount($userCount, 'data');
  }

  public function test_show_only_soft_deleted_resources_when_requested() {
    User::factory(2)->create();
    $deletedUser = User::factory()->create();
    $deletedUser->delete();

    $userCount = User::onlyTrashed()->count();

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users', 'withTrashed=only']));

    $response->assertOk();

    $this->assertEquals($userCount, $response->json('meta.total'));
    $this->assertEquals($deletedUser->id, $response->json('data.0.key'));
    $response->assertJsonCount($userCount, 'data');
  }

  public function test_can_order_resources() {
    $userA = User::factory()->create(['email' => 'user_a@example.com']);
    $userB = User::factory()->create(['email' => 'user_b@example.com']);
    $userC = User::factory()->create(['email' => 'user_c@example.com']);

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users', 'sortBy=email', 'sortOrder=asc']));

    $response->assertOk();

    $header = $response->json('header');
    $emailHeader = collect($header)->where('key', 'email')->first();
    $this->assertEquals('asc', $emailHeader['order']);

    $response->assertJsonCount(3, 'data');
    $this->assertEquals($userA->id, $response->json('data.0.key'));

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users', 'sortBy=email', 'sortOrder=desc']));

    $response->assertOk();

    $header = $response->json('header');
    $emailHeader = collect($header)->where('key', 'email')->first();
    $this->assertEquals('desc', $emailHeader['order']);

    $response->assertJsonCount(3, 'data');
    $this->assertEquals($userC->id, $response->json('data.0.key'));
  }

  public function test_can_limit_resources_per_page() {
    User::factory(6)->create();

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users', 'perPage=2']));

    $response->assertOk();

    $response->assertJsonCount(2, 'data');

    $this->assertEquals(1, $response->json('meta.current_page'));
    $this->assertEquals(1, $response->json('meta.from'));
    $this->assertEquals(2, $response->json('meta.to'));
    $this->assertEquals(2, $response->json('meta.per_page'));
    $this->assertEquals(6, $response->json('meta.total'));
  }


  public function test_can_navigate_resources_per_page() {
    User::factory(6)->create();

    $response = $this->withExceptionHandling()
      ->getJson(route("$this->API_PREXIX.resources.index", ['users', 'perPage=2', 'page=2']));

    $response->assertOk();

    $response->assertJsonCount(2, 'data');

    $this->assertEquals(2, $response->json('meta.current_page'));
    $this->assertEquals(3, $response->json('meta.from'));
    $this->assertEquals(4, $response->json('meta.to'));
    $this->assertEquals(2, $response->json('meta.per_page'));
    $this->assertEquals(6, $response->json('meta.total'));
  }

}
