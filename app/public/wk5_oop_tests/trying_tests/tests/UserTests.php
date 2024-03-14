<?php declare(strict_types=1);
include "/var/www/html/public/wk5_oop_tests/trying_tests/src/User.php";
use PHPUnit\Framework\TestCase;
final class UserTests extends TestCase
{
    public function testClassConstructor(){
        $user = new User(18,'John');
        $this->assertSame('John',$user->name);
        $this->assertSame(18, $user->age);
        $this->assertEmpty($user->favorite_movies);
    }

    public function testNameIsJohn(){
        $user = new User(18, 'John');
        $this->assertEquals('John', $user->name);
    }

    public function testTellName(){
        $user = new User(18, 'John');
        $this->assertIsString($user->tellName());
        $this->assertStringContainsStringIgnoringCase('John', $user->tellName());
    }

    public function testCheckOutputMatchesJohn(){
        $user = new User(18, 'John');
        $this->assertEqualsIgnoringCase("My name is John.", $user->tellName());
    }

    public function testAgeIs18(){
        $user = new User(18, 'John');
        $this->assertEquals(18, $user->getAge());
    }

    public function testTellAge(){
        $user = new User(18, 'John');
        $this->assertIsString($user->tellAge());
        $this->assertStringContainsStringIgnoringCase('18', $user->tellAge());
    }

    public function testAddFavoriteMovie(){
        $user = new User(18, 'John');
        $this->assertTrue($user->addFavoriteMovie('Maverick'));
        $this->assertContains('Maverick', $user->getMovieList());
        $this->assertCount(1, $user->getMovieList());
    }

    public function testFavoriteMovieIsMaverick(){
        $user = new User(18, 'John');
        $user->addFavoriteMovie("Maverick");
        $this->assertEquals(["Maverick"], $user->getMovieList());
    }

    public function testFavoriteMovies(){
        $user = new User(18, 'John');
        $user->addFavoriteMovie("Maverick");
        $user->addFavoriteMovie("Top Gun");
        $this->assertEquals(['Maverick', 'Top Gun'], $user->getMovieList());
    }

    public function testRemoveFavoriteMovie(){
        $user = new User(18, 'John');
        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertTrue($user->addFavoriteMovie('Justice League'));
        $this->assertTrue($user->removeFavoriteMovie('Avengers'));
        $this->assertNotContains('Avengers', $user->getMovieList());
        $this->assertCount(1, $user->getMovieList());
    }

    public function testEnsureAgeIsAtleastOneYear(){
        $user = new User(-5, 'John');
        $this->assertSame(1, $user->age, "User's age should be set to 1 when a negative age is provided");

        $user1 = new User(0, 'Jane');
        $this->assertSame(1, $user1->age, "User's age should be set to 1 when an age of 0 is provided");
    }
}
