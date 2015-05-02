<?php

class ExampleTest extends TestCase {

    /**
     * @test
     */
    public function it_displays_the_homepage()
    {
        $this->route('GET', 'home');

        $this->assertResponseOk();
    }

}
