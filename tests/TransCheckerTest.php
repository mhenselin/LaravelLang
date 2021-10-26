<?php

declare(strict_types=1);

namespace Arcanedev\LaravelLang\Tests;

use Arcanedev\LaravelLang\Contracts\TransChecker;

/**
 * Class     TransCheckerTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TransCheckerTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var \Arcanedev\LaravelLang\Contracts\TransChecker */
    private $checker;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->checker = $this->app->make(TransChecker::class);
    }

    public function tearDown(): void
    {
        unset($this->checker);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated(): void
    {
        $expectations = [
            TransChecker::class,
            \Arcanedev\LaravelLang\TransChecker::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->checker);
        }
    }

    /** @test */
    public function it_can_check(): void
    {
        $expected = [
            'es' => [
                'errors.404.title', 'errors.500.title', 'errors.503.title',
            ],
            'en' => [
                'validation-attributes.attributes.address',
                'validation-attributes.attributes.age',
                'validation-attributes.attributes.body',
                'validation-attributes.attributes.city',
                'validation-attributes.attributes.content',
                'validation-attributes.attributes.country',
                'validation-attributes.attributes.current_password',
                'validation-attributes.attributes.date',
                'validation-attributes.attributes.day',
                'validation-attributes.attributes.description',
                'validation-attributes.attributes.email',
                'validation-attributes.attributes.excerpt',
                'validation-attributes.attributes.first_name',
                'validation-attributes.attributes.gender',
                'validation-attributes.attributes.hour',
                'validation-attributes.attributes.last_name',
                'validation-attributes.attributes.message',
                'validation-attributes.attributes.minute',
                'validation-attributes.attributes.mobile',
                'validation-attributes.attributes.month',
                'validation-attributes.attributes.name',
                'validation-attributes.attributes.password',
                'validation-attributes.attributes.password_confirmation',
                'validation-attributes.attributes.phone',
                'validation-attributes.attributes.photo',
                'validation-attributes.attributes.price',
                'validation-attributes.attributes.role',
                'validation-attributes.attributes.second',
                'validation-attributes.attributes.sex',
                'validation-attributes.attributes.subject',
                'validation-attributes.attributes.terms',
                'validation-attributes.attributes.time',
                'validation-attributes.attributes.title',
                'validation-attributes.attributes.username',
                'validation-attributes.attributes.year',
                'validation.accepted_if',
                'validation.current_password',
                'validation.prohibits',
                'validation-attributes.attributes.available',
                'validation-attributes.attributes.size',
                'main.success',
            ],
            'fr' => [
                'errors.404.title', 'errors.500.title', 'errors.503.title',
            ],
        ];

        static::assertEquals($expected, $this->checker->check());
    }
}
