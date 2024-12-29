function foo(array $arr) {
  foreach ($arr as $key => $value) {
    if ($value === 'some_value') {
      unset($arr[$key]); // This is where the bug is 
    }
  }
  return $arr;
}

$arr = ['a', 'b', 'some_value', 'c', 'some_value', 'd'];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => a [1] => b [3] => c [5] => d )

// The above code is incorrect. It will skip every other element with the value 'some_value'.