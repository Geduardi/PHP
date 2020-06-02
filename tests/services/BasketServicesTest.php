<?php

namespace services;

use App\repositories\GoodRepository;
use App\services\BasketServices;
use App\services\Request;
use PHPUnit\Framework\TestCase;

class BasketServicesTest extends TestCase
{

    public function testAddEmptyId()
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $request->method('getId')
            ->willReturn(0);
        $goodRepository = $this->getMockBuilder(GoodRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $basketServices = new BasketServices();
        $result = $basketServices->add($request,$goodRepository);
        $this->assertFalse($result);
    }

    public function testAddEmptyGetOne()
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $request->method('getId')
            ->willReturn(1);
        $goodRepository = $this->getMockBuilder(GoodRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $goodRepository->method('getOne')
            ->willReturn(0);
        $basketServices = new BasketServices();
        $result = $basketServices->add($request,$goodRepository);
        $this->assertFalse($result);
    }

    public function testAddEmptyGoods()
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $request->method('getId')
            ->willReturn(1);
        $request->method('getSession')
            ->willReturn(null);
        $goodRepository = $this->getMockBuilder(GoodRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $goodRepository->method('getOne')
            ->willReturn(1);
        $basketServices = new BasketServices();
        $result = $basketServices->add($request,$goodRepository);
        $this->assertTrue($result);
    }

}
