<?php
/**
 * run it with phpunit --group git-pre-push
 */
namespace Rebolon\Tests;

use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Rebolon\Entity\ProjectBookCreation;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class to test Symfony Serializer with entity ProjectBookCreation
 *
 * Class SerializerProjectBookCreationTest
 * @package Rebolon\Tests
 */
class SerializerProjectBookCreationTest extends TestCase
{
    public $authorsOkSimple = <<<JSON
[{
    "job": {
        "translation": "writer"
    },
    "author": {
        "firstname": "Marc", 
        "lastname": "O'Brien"
    }
}]
JSON;

    /**
     * deserialize a simple array of author
     */
    public function testSeserializeSimpleArray()
    {
        $content = $this->authorsOkSimple;
        $expected = json_decode($content);

        //@todo test with: use ArrayDenormalizer when getting a list of books in json like described in slide 70 of https://speakerdeck.com/dunglas/mastering-the-symfony-serializer

        $classMetaDataFactory = new ClassMetadataFactory(
            new AnnotationLoader(
                new AnnotationReader()
            )
        );
        $objectNormalizer = new ObjectNormalizer($classMetaDataFactory, null, null, new PhpDocExtractor());
        $serializer = new Serializer([
            new ArrayDenormalizer(),
            $objectNormalizer,
        ], [
            new JsonEncoder(),
        ]);

        $format = sprintf('%s[]', ProjectBookCreation::class);
        $authors = $serializer->deserialize($content, $format, 'json');

        $this->assertCount(1, $authors);
        $this->assertEquals($expected[0]->job->translation, $authors[0]->getJob()->getTranslation());
        $this->assertEquals($expected[0]->author->firstname .  ' ' . $expected[0]->author->lastname, $authors[0]->getAuthor()->getName());
    }
}
