<pre>
<?php

abstract class Animal {
	public $id;

	public function __construct($id) {
		$this->id = $id;
	}
}

class Cow extends Animal {
	public $type = 'cow';
	public $productType = 'milk';
}

class Chicken extends Animal {
	public $type = 'chicken';
	public $productType = 'egg';
}

class Farm {
	public $animals = [];
	public $productTypes = [];
	public $animalTypes = [];
	public $products = [];
	
	public function setProductTypes() {
		foreach ($this->animals as $animal) {
			if (!(in_array($animal->productType, $this->productTypes))) {
				$this->productTypes[] = $animal->productType;
			}
		}
	}

	public function setAnimalTypes() {
		foreach ($this->animals as $animal) {
			if (!(in_array($animal->type, $this->animalTypes))) {
				$this->animalTypes[] = $animal->type;
			}
		}
	}

	public function getAmount() {
		foreach ($this->animalTypes as $type) {
			$amount[$type] = 0;
			foreach ($this->animals as $animal) {
				if ($animal->type == $type) {
					$amount[$type]++;
				}
			}
		}
		return $amount;
	}

	public function getSum() {
		foreach ($this->productTypes as $type) {
			$sum[$type] = 0;
			foreach ($this->products as $product) {
				if ($product[0] == $type) {
					$sum[$type] += $product[1];
				}
			}
		}
		return $sum;
	}
}

$farm = new Farm;

for ($i = 1; $i <= 10; $i++) {
	$farm->animals[] = new Cow('cow_' .  $i);
}
for ($i = 1; $i <= 20; $i++) {
	$farm->animals[]  = new Chicken('chick_' .  $i);
}
$farm->setAnimalTypes();
$farm->setProductTypes();
$animalsOnFarm = $farm->getAmount(); 
echo "На ферме " . $animalsOnFarm['cow'] . " коров и " . $animalsOnFarm['chicken'] . " кур" . "<br>";

for ($i = 1; $i <= 7; $i++) {
	foreach ($farm->animals as $animal) {
		switch ($animal->type) {
			case "cow":
				$farm->products[] = ['milk', rand(8, 12)];
				continue 2;
			case "chicken":
				$farm->products[] = ['egg', rand(0, 1)];
				continue 2;
		}
	}
}
$productsForWeek = $farm->getSum();
echo "За неделю собрали " . $productsForWeek['milk'] . " литров молока и " . $productsForWeek['egg'] . " яиц" . "<br>";

$farm->animals[] = new Cow('cow_' .  $i + $animalsOnFarm['cow']);

for ($i = 1; $i <= 5; $i++) {
	$farm->animals[]  = new Chicken('chick_' .  $i + $animalsOnFarm['chicken']);
}
$animalsOnFarm = $farm->getAmount(); 
echo "На ферме теперь " . $animalsOnFarm['cow'] . " коров и " . $animalsOnFarm['chicken'] . " кур" . "<br>";
$farm->products = []; // если хотим узнать общее количество молока и яиц за две недели,то эту строку пропускаем
for ($i = 1; $i <= 7; $i++) {
	foreach ($farm->animals as $animal) {
		switch ($animal->type) {
			case "cow":
				$farm->products[] = ['milk', rand(8, 12)];
				continue 2;
			case "chicken":
				$farm->products[] = ['egg', rand(0, 1)];
				continue 2;
		}
	}
}
$productsForWeek = $farm->getSum();
echo "За новую неделю собрали " . $productsForWeek['milk'] . " литров молока и " . $productsForWeek['egg'] . " яиц" . "<br>";
?>
</pre>



















