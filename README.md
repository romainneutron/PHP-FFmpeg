#PHP FFmpeg

[![Build Status](https://secure.travis-ci.org/alchemy-fr/PHP-FFmpeg.png?branch=master)](http://travis-ci.org/alchemy-fr/PHP-FFmpeg)

An Object Oriented library to convert video/audio files with AVConv / FFmpeg.

##Documentation

Read The Documentation at http://readthedocs.org/docs/ffmpeg-php/ !

##Usage Example

```php
<?php
$x264 = new X264();
$x264->setDimensions(320, 240);

$ffmpeg->open('Video.mpeg')
    ->encode($new WebM(), 'file.webm')
    ->encode($x264, 'file.mp4')
    ->encode($new Ogg(), 'file.ogv')
    ->close();
```

##License

This project is licensed under the [MIT license](http://opensource.org/licenses/MIT).






[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/romainneutron/php-ffmpeg/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

