### What will be the output of the following PHP code?

```php
$arrayNumbers = [1, 2, 3];
foreach($arrayNumbers as $arrayNumber){
  echo $arrayNumber + 1;
}
```

### What can we call to return `"Joe Bloggs"` from the User class
```php
class User {
  protected $fname;
  protected $lname;

  public function __construct($fname, $lname) {
    $this->fname = $fname;
    $this->lname = $lname;
  }

  public function get($field) {
    return $this->$field;
  }
}

$user = new User('Joe', 'Bloggs')
```

### What will be the output of each of the statements below?

```php
echo 0123 == 123 ? 'True' : 'False';

echo ('123' == 123);

var_dump('0123' === 123);
```

### What does the follow code echo?

```php
$a = "PHP";
$a = $a + 1;
echo $a;
```

### Bonus

### What will be the values of $a and $b after the code below is executed?

```php
$a = '1';
$b = &$a;
$b = "2$b";
```

### What are Traits?
