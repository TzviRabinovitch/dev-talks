<?php

namespace Tests\DependencyInjection\Mock;

class A {
    public function __construct( B $dep ) {
        $this->b = $dep;
    }
}

class B {
    public function __construct( C $dep ) {
        $this->c = $dep;
    }
}

class C {
    public function __construct( SomeContract $dep ) {
        $this->sc = $dep;
    }
}

class D {
    public function __construct( $name = 'mock' ) {
        $this->name = $name;
    }
}

interface SomeContract {}

class ContractImpl implements SomeContract {}
