<?php

namespace  Saverty\Lighter\Tests\Unit;

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Saverty\Lighter\LighterTrait;
use Illuminate\Database\Eloquent\Model;

class FakeObjectWithAppends extends Model
{
    use LighterTrait;

    protected $appends = ['fullname'];
    protected $fillable = ['firstname', 'lastname'];

    public function getFullnameAttribute(){
        return $this->firstname . ' ' .$this->lastname;
    }
}

class FakeObjectWithoutAppends extends Model
{
    use LighterTrait;

    protected $fillable = ['firstname', 'lastname'];
}

class TestOnModel extends TestCase
{
    /**
     * Test model with accessor
     *
     * @return void
     */
    public function testKeepWithFieldsOnModelWithAccessors()
    {
        $fakeObjectWithAppends = new FakeObjectWithAppends([
            'firstname' => 'joe',
            'lastname'  => 'doe'
        ]);

        $result = $fakeObjectWithAppends->lighter()->keep(['firstname', 'fullname'])->toArray();

        if(array_key_exists('firstname', $result) && array_key_exists('fullname', $result)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    /**
     * Test model without accessor
     *
     * @return void
     */
    public function testKeepWithFieldsOnModelWithoutAccessors()
    {
        $fakeObjectWithAppends = new FakeObjectWithoutAppends([
            'firstname' => 'joe',
            'lastname'  => 'doe'
        ]);

        $result = $fakeObjectWithAppends->lighter()->keep(['firstname', 'fullname'])->toArray();

        if(array_key_exists('firstname', $result)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}
