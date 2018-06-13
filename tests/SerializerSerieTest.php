<?php
/**
 * run it with phpunit --group git-pre-push
 */
namespace Rebolon\Tests;

use PHPUnit\Framework\TestCase;
use Rebolon\Entity\Serie;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class to test Symfony Serializer
 *  One of the first errors i did, came from the JSON input that had a main 'serie' property which is not required by the
 *  Serializer => if i remember i also don't need it in my Converter because i deserialize it once to select only the children
 *
 * Class SerializerSerieTest
 * @package Rebolon\Tests
 */
class SerializerSerieTest extends TestCase
{
    public $serie = <<<JSON
{
    "id": 4,
    "name": "whatever, it won't be read"
}
JSON;

    public $series = <<<JSON
[{
    "id": 4,
    "name": "whatever, it won't be read"
},
{
    "id": 5,
    "name": "another one"
}]
JSON;

    /**
     *
     */
    public function testDeserializeSimpleSerie()
    {
        $content = $this->series;
        $expected = json_decode($content);

        $serializer = new Serializer([
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ], [
            new JsonEncoder(),
        ]);

        $series = $serializer->deserialize($content, sprintf('%s[]', Serie::class), 'json');

        foreach ($expected as $k => $serie) {
            $this->assertEquals($serie->id, $series[$k]->getId());
            $this->assertEquals($serie->name, $series[$k]->getName());
        }
    }

    /**
     *
     */
    public function testDeserializeArrayOfSerie()
    {
        $content = $this->serie;
        $expected = json_decode($content);

        $serializer = new Serializer([
            new ObjectNormalizer(),
        ], [
            new JsonEncoder(),
        ]);

        $serie = $serializer->deserialize($content, Serie::class, 'json');

        $this->assertEquals($expected->name, $serie->getName());
    }
}
