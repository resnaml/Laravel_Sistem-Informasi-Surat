<?php

namespace Tests\Feature;

use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

}
