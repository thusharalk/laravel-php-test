<?php

namespace Tests\Route;

use App\Errors;
use Tests\TestCase;

class UserRouteTest extends TestCase
{
  /**
   * Test the user route returns a 200 status.
   *
   * @return void
   */
  public function testGetUserReturns200()
  {
    $response = $this->get(route('get.users'));
    $this->assertEquals(200, $response->status());
  }

  /**
   * Test the user route returns only 10 records by default.
   *
   * @return void
   */
  public function testGetUserReturns10UsersByDefault()
  {
    $response = $this->get(route('get.users'));

    $this->assertJson($response->getContent());
    $this->assertEquals(10, count($response->decodeResponseJson()), 'Expected only 10 results');
  }

  /**
   * Test the user route returns the amount of users based on a passed limit.
   *
   * @return void
   */
  public function testGetUserLimitsUsers()
  {
    $limit = 15;
    $response = $this->get(route('get.users', ['limit' => $limit]));
    $responseContent = $response->decodeResponseJson();
    $firstResult = $responseContent[0];
    $lastResult = $responseContent[count($responseContent)-1];

    $this->assertJson($response->getContent(), 'Expected JSON back from API');
    $this->assertEquals(1, $firstResult['id'], 'Expected first result to have ID 1');
    $this->assertEquals(15, $lastResult['id'], 'Expected last result to have ID 15');
    $this->assertEquals($limit, count($responseContent), 'Expected 15 results back');
  }

  /**
   * Test the user route returns the amount of users based on a passed limit and offset.
   *
   * @return void
   */
  public function testGetUserLimitsWithOffsetUsers()
  {
    $limit = 15;
    $offset = 15;
    $response = $this->get(route('get.users', ['limit' => $limit, 'offset' => $offset]));
    $responseContent = $response->decodeResponseJson();
    $firstResult = $responseContent[0];

    $this->assertJson($response->getContent(), 'Expected JSON back from API');
    $this->assertEquals(16, $firstResult['id']);
  }

  /**
   * Test the user route will only accept a MAX limit of 50, if more than 50 is requested, return 500 status with error message.
   *
   * @return void
   */
  public function testGetUserLimitsWithAMaxOf50UsersReturn500ErrorMessage()
  {
    $message = Errors::ERROR_MAX_LIMIT_MESSAGE;
    $limit = 60;
    $offset = 0;
    $response = $this->get(route('get.users', ['limit' => $limit, 'offset' => $offset]));
    $responseContent = $response->decodeResponseJson();

    $this->assertJson($response->getContent(), 'Expected JSON back from API');
    $this->assertEquals(500, $response->status(), 'Expected back status code 500');
    $this->assertEquals($message, $responseContent['message'], 'Wrong message sent back from API');
  }
}
