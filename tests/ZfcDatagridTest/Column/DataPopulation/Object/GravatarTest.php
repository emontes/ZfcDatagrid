<?php
namespace ZfcDatagridTest\Column\DataPopulation\Object;

use PHPUnit_Framework_TestCase;
use ZfcDatagrid\Column\DataPopulation\Object\Gravatar;

/**
 * @group Column
 * @covers ZfcDatagrid\Column\DataPopulation\Object\Gravatar
 */
class GravarTest extends PHPUnit_Framework_TestCase
{

    public function testAll()
    {
        $gravatar = new Gravatar();
        
        // DEFAULT
        $this->assertEquals('http://www.gravatar.com/avatar/', $gravatar->toString());
        
        // valid email
        $gravatar->setParameterFromColumn('email', 'martin.keckeis1@gmail.com');
        $this->assertEquals('http://www.gravatar.com/avatar/' . md5('martin.keckeis1@gmail.com'), $gravatar->toString());
    }
    
    public function testException(){
        $gravatar = new Gravatar();
        
         $this->setExpectedException('InvalidArgumentException');
        $gravatar->setParameterFromColumn('invalidPara', 'someValue');
    }
}
