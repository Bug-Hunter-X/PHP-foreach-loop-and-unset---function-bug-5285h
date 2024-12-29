function foo(array &$arr) {
  foreach ($arr as $key => $value) {
    if ($value === 'some_value') {
      unset($arr[$key]);
    }
  }
  return $arr;
}

$arr = ['a', 'b', 'some_value', 'c', 'some_value', 'd'];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => a [1] => b [3] => c [5] => d )

//This is still incorrect. The correct solution uses array_filter or similar

function foo(array $arr): array {
    return array_filter($arr, fn($value) => $value !== 'some_value');
}

$arr = ['a', 'b', 'some_value', 'c', 'some_value', 'd'];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => a [1] => b [3] => c [5] => d )