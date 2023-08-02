<?php

namespace Tests\Feature;

use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
