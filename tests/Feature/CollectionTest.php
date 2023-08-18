<?php

namespace Tests\Feature;

use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\LazyCollection;
use PhpParser\ErrorHandler\Collecting;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class CollectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // ForEach Test
    public function testForEach()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);
        foreach($collection as $key => $value){
            $this->assertEquals($key + 1, $value);
        }
    }

    // Collection Test
    public function testCreateCollection()
    {
        $collection = collect([1,2,3]);
        $this->assertEqualsCanonicalizing([1,2,3], $collection->all());
    }

    // TestCrud
    public function testCrud()
    {
        $collection = collect([]);
        $collection->push(1,2,3);
        $this->assertEqualsCanonicalizing([1,2,3], $collection->all());

        $result = $collection->pop();
        $this->assertEquals(3, $result);
        $this->assertEqualsCanonicalizing([1,2], $collection->all());
    }

    // Mapping Operations
    public function testMap()
    {
        $collection = collect([1,2,3]);
        $result = $collection->map(function ($item){
            return $item * 2;
        });
        $this->assertEquals([2,4,6], $result->all());
    }

    public function testMapInto()
    {
        $collection = collect(["Emul"]);
        $result = $collection->mapInto(Person::class);
        $this->assertEquals([new Person("Emul")], $result->all());
    }

    public function testMapSpread()
    {
        $collection = collect([
            ["Aress", "Gemoy"],
            ["Emul", "Gemoy"]
        ]);

        $result = $collection->mapSpread(function ($firstname, $lastname)
        {
            $fullname = $firstname . " " . $lastname;
            return new Person($fullname);
        });

        assertEquals([
            new Person("Aress Gemoy"),
            new Person("Emul Gemoy")
        ], $result->all());
    }


    public function testMapToGroup()
    {
        $collection = collect([
            [
                "name" => "Emul",
                "posisi" => "HR"
            ],
            [
                "name" => "Ares",
                "posisi" => "IT"
            ],
            [
                "name" => "Wawan",
                "posisi" => "IT"
            ],
            ]);

            $result = $collection->mapToGroups(function ($item){
                return [
                    $item['posisi'] => $item['name']
                ];
            });

            $this->assertEquals([
                "IT" => collect(["Ares" , "Wawan"]),
                "HR" => collect(["Emul"])
            ], $result->all());
    }


    // Zipping
    public function testZip()
    {
        $collection1 = collect([1,2,3]);
        $collection2 = collect([4,5,6]);
        $collection3 = $collection1->zip($collection2);

        $this->assertEquals([
            collect([1,4]),
            collect([2,5]),
            collect([3,6])
        ], $collection3->all());
    }

    public function testConcat()
    {
        $collection1 = collect([1,2,3]);
        $collection2 = collect([4,5,6]);
        $collection3 = $collection1->concat($collection2);

        $this->assertEquals([1,2,3,4,5,6], $collection3->all());
    }

    public function testCombine()
    {
        $collection1 = collect(["name", "country"]);
        $collection2 = collect(["Emul", "Indonesia"]);
        $collection3 = $collection1->combine($collection2);

        $this->assertEqualsCanonicalizing([
            "name" => "Emul",
            "country" => "Indonesia"
        ], $collection3->all());
    } 

    public function testCollapse()
    {
        $array = collect([
            [1,2,3],
            [4,5,6],
            [7,8,9]
        ]);
        $hasil = $array->collapse();

        $this->assertEqualsCanonicalizing([1,2,3,4,5,6,7,8,9], $hasil->all());
    }

    public function testFlatMap()
    {
        $collection = collect([
            [
                "name" => "Emul",
                "hoby" => ["Gaming","Singing"]
            ],
            [
                "name" => "Aresss",
                "hoby" => ["Write", "Calming"]
            ]
            ]);

            $hasil = $collection->flatMap(function ($item){
                $hoby = $item["hoby"];
                return $hoby;
            });

            $this->assertEqualsCanonicalizing(["Gaming", "Singing", "Write", "Calming"], $hasil->all());
    }

    public function testJoin()
    {
        $collection = collect(["Resna", "Mulya", "Lesmana"]);

        $this->assertEquals("Resna-Mulya-Lesmana", $collection->join("-"));
        $this->assertEquals("Resna-Mulya_Lesmana", $collection->join("-","_"));
        $this->assertEquals("Resna, Mulya and Lesmana", $collection->join(", " , " and "));
    }

    public function testFilter()
    {
        $collection = collect([
            "budi" => 100,
            "dimes" => 70,
            "joko" => 90
        ]);

        $result = $collection->filter(function ($value, $key){
            return $value >=70;
        });

        assertEquals([
            "budi" => 100,
            "joko" => 90,
            "dimes" => 70
        ], $result->all());
    }

    public function testFilterIndex()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9,10]);
        $filter = $collection->filter(function ($value, $key){
            return $value % 2 == 0;
        });

        $this->assertEqualsCanonicalizing([2,4,6,8,10], $filter->all());
    }

    public function testPartition()
    {
        $collection = collect([
            "budi" => 100,
            "dimes" => 70,
            "joko" => 90
        ]);

        [$result1,$result2] = $collection->partition(function ($value, $key){
            return $value >= 90;
        });

        assertEquals([
            "budi" => 100,
            "joko" => 90
        ], $result1->all());
        
        assertEquals([
            "dimes" => 70
        ], $result2->all());
    }

    public function testTesting()
    {
        $collection = collect(["Resna", "Mulya", "Lesmana"]);
        $this->assertTrue($collection->contains("Resna"));
        $this->assertTrue($collection->contains(function ($value, $key){
            return $value == "Resna";
        }));
    }

    public function testGrouping()
    {
        $collection = collect([
            [
                "name" => "Emul",
                "department" => "IT"
            ],
            [
                "name" => "Budi",
                "department" => "IT"
            ],
            [
                "name" => "Lagos",
                "department" => "HR"
            ]
        ]);

        $result = $collection->groupBy("department");

        assertEquals([
            "IT" => collect([
                [
                    "name" => "Emul",
                    "department" => "IT"
                ],
                [
                    "name" => "Budi",
                    "department" => "IT"
                ],
            ]),
            "HR" => collect([
                [
                    "name" => "Lagos",
                    "department" => "HR"
                ]
            ])
                ], $result->all());

        $result = $collection->groupBy(function($value,$key){
            return strtolower($value["department"]);
        });
        
        assertEquals([
            "it" => collect([
                [
                    "name" => "Emul",
                    "department" => "IT"
                ],
                [
                    "name" => "Budi",
                    "department" => "IT"
                ],
            ]),
            "hr" => collect([
                [
                    "name" => "Lagos",
                    "department" => "HR"
                ]
            ])
                ], $result->all());
    }

    public function testSlice()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->slice(3);
        $this->assertEqualsCanonicalizing([4,5,6,7,8,9], $result->all());

        $result = $collection->slice(3,2);
        $this->assertEqualsCanonicalizing([4,5],$result->all());
    }

    public function testTake()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->take(3);
        $this->assertEqualsCanonicalizing([1,2,3], $result->all());

        $result = $collection->takeUntil(function ($value,$key){
            return $value == 3;
        });
        $this->assertEqualsCanonicalizing([1,2], $result->all());

        $result = $collection->takeWhile(function($value,$key){
            return $value < 5;
        });
        $this->assertEqualsCanonicalizing([1,2,3,4], $result->all());
    }

    public function testSkip()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);
        
        $result = $collection->skip(3);
        $this->assertEqualsCanonicalizing([4,5,6,7,8,9], $result->all());
    
        $result = $collection->skipUntil(function($value,$key){
            return $value == 3;
        });
        $this->assertEqualsCanonicalizing([3,4,5,6,7,8,9], $result->all());
    
        $result = $collection->skipWhile(function($value,$key){
            return $value < 3;
        });
        $this->assertEqualsCanonicalizing([3,4,5,6,7,8,9], $result->all());
    }

    public function testChunk()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->chunk(3);
        $this->assertEqualsCanonicalizing([1,2,3], $result->all()[0]->all());
        $this->assertEqualsCanonicalizing([4,5,6], $result->all()[1]->all());
        $this->assertEqualsCanonicalizing([7,8,9], $result->all()[2]->all());
    }

    public function testFirst()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->first();
        $this->assertEquals(1, $result);

        $result = $collection->first(function ($value, $key){
            return $value > 3;
        });
        $this->assertEquals(4, $result);
    }

    public function testLast()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->last();
        $this->assertEquals(9,$result);

        $result = $collection->last(function ($value, $key){
            return $value = 8;
        });
        $this->assertEquals(9, $result);
    }

    public function testRandom()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->random();
        $this->assertTrue(in_array($result , [1,2,3,4,5,6,7,8,9]));
    
        // $result = $collection->random(5);
        // $this->assertEqualsCanonicalizing([1,2,3,4,5], $result);
    }

    public function testChecking()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);
        
        $this->assertTrue($collection->isNotEmpty());
        $this->assertFalse($collection->isEmpty());
        $this->assertTrue($collection->contains(1));
        $this->assertFalse($collection->contains(10));
        $this->assertTrue($collection->contains(function ($value,$key){
            return $value == 9;
        }));
        
    }

    public function testOrdering()
    {
        $collection = collect([1,3,2,6,7,8,9,4,5]);

        $result = $collection->sort();
        $this->assertEqualsCanonicalizing([1,2,3,4,5,6,7,8,9],$result->all());
        $result = $collection->sortDesc();
        $this->assertEqualsCanonicalizing([9,8,7,6,5,4,3,2,1], $result->all());
    }

    public function testAggregation()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->sum();
        $this->assertEquals(45, $result);

        $result = $collection->avg();
        $this->assertEquals(5, $result);
        
        $result = $collection->min();
        $this->assertEquals(1, $result);

        $result = $collection->max();
        $this->assertEquals(9, $result);
    }

    public function testReduce()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);

        $result = $collection->reduce(function ($carry, $item){
            return $carry + $item;
        });
        $this->assertEquals(45,$result);

        // reduce(1,2) = 3
        // reduce(3,3) = 6
        // reduce(6,4) = 10
        // reduce(10,5) = 15
        // reduce(15,6) = 21
        // reduce(21,7) = 28
    }

    public function testLazyCollection()
    {
        $collection = LazyCollection::make(function (){
            $value = 0;

            while(true){
                yield $value;
                $value++;
            }
        });

        $result = $collection->take(10);
        $this->assertEqualsCanonicalizing([0,1,2,3,4,5,6,7,8,9],$result->all());
    }
}
