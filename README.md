# Symfony Serializer Samples

<p align="center">

  [![Build Status](https://travis-ci.org/Rebolon/SymfonySerializerSamples.svg?branch=master)](https://travis-ci.org/Rebolon/symfony-serializer-samples)
  [![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FRebolon%2FSymfonySerializerSamples.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2FRebolon%2FSymfonySerializerSamples?ref=badge_shield)
  [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Rebolon/SymfonySerializerSamples/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Rebolon/SymfonySerializerSamples/badges/quality-score.png?b=master)
  [![Code Coverage](https://scrutinizer-ci.com/g/Rebolon/SymfonySerializerSamples/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Rebolon/SymfonySerializerSamples/?branch=master)
  [![Code Intelligence Status](https://scrutinizer-ci.com/g/Rebolon/SymfonySerializerSamples/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
  
</p>

## requirements

You need PHP (7.x), composer, and Symfony 4

To get code coverage, don't forget that you need xDebug when you run PHPUnit or you will get this message: `Error:         No code coverage driver is available`
If xDebug is not in the php configuration registered as your default php, you can run it manually:

```
PathToYouPHPWithXDebug vendor\phpunit\phpunit\phpunit
```

## explanation

Working with Symfony and ApiPlatform, i wanted to optimized the usage of the Serializer. In fact, to go faster i first did my own system throught that component : [rebolon/api-json-param-converter](https://github.com/Rebolon/ApiJsonParamConverterComponent)
Because it seems hard to work with the Serializer i prefered to build this component. It allows to deserialize Json string and it also de-duplicate object from the Json. So it can prevent the creation of multiple same object (same footprint based on the json string).

But i don't like to lose versus code so i tryed again and again to use the Symfony Serializer. 

I wanted to be able to deserialize complex Json string (like the sample after), and send args to entity constructor if i need it.
And with the help of some slides from Kevin Dunglas, and Benoit Galati an old colleague that send me some important information, i succeed to do what i wanted.

In the source folder you will only find Entities i used for the sample (like for the original project i used a library model).
And in the tests folder you will have different use case that shows how i use the Serializer now.
If you have any question, come on, i'm on twitter: @rebolon

Here are some sample of json to be deserialized:

```
{
    "book": {
        "title": "Zombies in western culture",
        "authors": [{
            "role": {
                "translation_key": "WRITER"
            }, 
            "author": {
                "firstname": "Marc", 
                "lastname": "O'Brien"
            }
        }, {
            "role": {
                "translation_key": "WRITER"
            }, 
            "author": {
                "firstname": "Paul", 
                "lastname": "Kyprianou"
            }
        }],
        "serie": {
            "name": "Open Reports Series"
        },
        "reviews": [
        
        ]
    }
}
```

I hope that it will help you !

Related article is here: 

## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FRebolon%2FSymfonySerializerSamples.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2FRebolon%2FSymfonySerializerSamples?ref=badge_large)