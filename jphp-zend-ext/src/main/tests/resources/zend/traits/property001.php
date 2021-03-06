--TEST--
Potentially conflicting properties should result in a strict notice. Property use is discorage for traits that are supposed to enable maintainable code reuse. Accessor methods are the language supported idiom for this.
--FILE--
<?php
error_reporting(E_ALL);

trait THello1 {
    private $foo;
}

trait THello2 {
    private $foo;
}

echo "PRE-CLASS-GUARD-TraitsTest\n";

class TraitsTest {
    use THello1;
    use THello2;
}

echo "PRE-CLASS-GUARD-TraitsTest2\n";

class TraitsTest2 {
    use THello1;
    use THello2;
}

var_dump(property_exists('TraitsTest', 'foo'));
var_dump(property_exists('TraitsTest2', 'foo'));
?>
--EXPECTF--
Strict Standards: 'THello1' and 'THello2' define the same property ($foo) in the composition of TraitsTest. This might be incompatible, to improve maintainability consider using accessor methods in traits instead. Class was composed in %s on line %d at pos %d
Strict Standards: 'THello1' and 'THello2' define the same property ($foo) in the composition of TraitsTest2. This might be incompatible, to improve maintainability consider using accessor methods in traits instead. Class was composed in %s on line %d at pos %d
PRE-CLASS-GUARD-TraitsTest
PRE-CLASS-GUARD-TraitsTest2
bool(true)
bool(true)