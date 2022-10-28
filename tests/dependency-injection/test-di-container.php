<?php

namespace Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Src\DependencyInjectio\DiContainer;
use Tests\DependencyInjection\Mock\A;
use Tests\DependencyInjection\Mock\B;
use Tests\DependencyInjection\Mock\C;
use Tests\DependencyInjection\Mock\D;
use Tests\DependencyInjection\Mock\SomeContract;
use Tests\DependencyInjection\Mock\ContractImpl;

require_once __DIR__ . '/../../src/dependency-injection/di-container.php';
require_once __DIR__ . '/mock/mock-classes.php';

class DiContainerTest extends TestCase
{
	public function testBindWithDefaultResolver(){
		// Arrange.
		$diContainer = new DiContainer();

		// Act.
		$diContainer->bind( D::class );

		// Assert.
		$this->assertEquals( 
			new D(), 
			$diContainer->make( D::class ) 
		);
	}

	public function testBind(){
		// Arrange.
		$diContainer = new DiContainer();

		// Act.
		$diContainer->bind( D::class, function ( DiContainer $container, $args ) {
			return 'mock-d';
		} );

		// Assert.
		$this->assertEquals( 
			'mock-d',
			$diContainer->make( D::class )
		);
	}

	public function testMakeWithoutBind(){
		// Arrange.
		$diContainer = new DiContainer();

		// Act & Assert.
		$this->assertEquals( 
			new D(),
			$diContainer->make( D::class ) 
		);
	}

	public function testMakeWithArgs(){
		// Arrange.
		$diContainer = new DiContainer();

		// Act.
		$d = $diContainer->make( D::class, [ 
			'name' => 'test',
		] );

		// Assert.
		$this->assertEquals( new D( 'test' ), $d );
	}

	public function testMakeWithArgsAndDefaultResolver(){
		// Arrange.
		$diContainer = new DiContainer();

		$diContainer->bind( D::class );

		// Act.
		$d = $diContainer->make( D::class, [ 
			'name' => 'test',
		] );

		// Assert.
		$this->assertEquals( new D( 'test' ), $d );
	}

	public function testMakeWithAutoWiredDependencies(){
		// Arrange.
		$diContainer = new DiContainer();

		$diContainer->bind( SomeContract::class, function ( DiContainer $container, $args ) {
			return new ContractImpl();
		} );

		// Act.
		$a = $diContainer->make( A::class ); 

		// Assert.
		$expectedA = new A( new B( new C( new ContractImpl() ) ) );

		$this->assertEquals(  $expectedA, $a );
	}

	public function testSingletonWithArgs(){
		// Arrange.
		$diContainer = new DiContainer();

		// Act.
		$diContainer->singleton( D::class );

		// Assert.
		$d = $diContainer->make( D::class, [ 
			'name' => 'test',
		] );
		
		$this->assertEquals( new D( 'test' ), $d );
	}
	
	public function testSingleton(){
		// Arrange.
		$diContainer = new DiContainer();

		// Act.
		$diContainer->singleton( D::class );

		// Assert.
		$singleton = $diContainer->make( D::class );
		$singleton2 = $diContainer->make( D::class );

		$this->assertSame( $singleton, $singleton2 );
	}

	public function testHas(){
		// Arrange.
		$diContainer = new DiContainer();

		$diContainer->bind( A::class );

		// Act & Assert.
		$this->assertTrue( $diContainer->has( A::class ) );
		$this->assertFalse( $diContainer->has( B::class ) );
	}
}

