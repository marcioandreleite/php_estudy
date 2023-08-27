SwiftMailer SparkPost Transport
===============================

[![Build Status](https://scrutinizer-ci.com/g/f500/swiftmailer-sparkpost/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/f500/swiftmailer-sparkpost/build-status/develop)
[![Code Coverage](https://scrutinizer-ci.com/g/f500/swiftmailer-sparkpost/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/f500/swiftmailer-sparkpost/?branch=develop)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/f500/swiftmailer-sparkpost/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/f500/swiftmailer-sparkpost/?branch=develop)

A [SwiftMailer][1] transport implementation for the [SparkPost API][2].

It uses the official [SparkPost PHP library][3].

It adds support for some SparkPost specific features to SwiftMailer messages.

Installation
------------

```txt
composer require f500/swiftmailer-sparkpost
```

Usage
-----

```php
$transport = SwiftSparkPost\Transport::newInstance('API-KEY');
$mailer    = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance()
    ->setFrom('me@domain.com', 'Me')
    ->setTo(['john@doe.com' => 'John Doe', 'jane@doe.com'])
    ->setSubject('...')
    ->setBody('...');

$sent = $mailer->send($message);
```

### Specialized messages

```php
$message = SwiftSparkPost\Message::newInstance()
    ->setFrom('me@domain.com', 'Me')
    ->setTo(['john@doe.com' => 'John Doe', 'jane@doe.com'])
    ->setSubject('...')
    ->setBody('...')
    
    ->setCampaignId('...')
    ->setPerRecipientTags('john@doe.com', ['...'])
    ->setMetadata(['...' => '...'])
    ->setPerRecipientMetadata('john@doe.com', ['...' => '...'])
    ->setSubstitutionData(['...' => '...'])
    ->setPerRecipientSubstitutionData('john@doe.com', ['...' => '...'])
    ->setOptions(['...']);
```

### Configuration

```php
$config    = SwiftSparkPost\Configuration::newInstance();
$transport = SwiftSparkPost\Transport::newInstance('API-KEY', $config);
$mailer    = Swift_Mailer::newInstance($transport);
```

### Override recipients

Override all `To`, `Cc` and `Bcc` addresses, but leave name and per-recipient properties intact.

`john@doe.com` becomes `override@domain.com`.

```php
$config = SwiftSparkPost\Configuration::newInstance()
    ->setRecipientOverride('override@domain.com');
```

#### Gmail style

`john@doe.com` becomes `override+john-doe-com@domain.com`.

```php
$config = SwiftSparkPost\Configuration::newInstance()
    ->setRecipientOverride('override@domain.com')
    ->setOverrideGmailStyle(true);
```

### Options for all messages

```php
$config = SwiftSparkPost\Configuration::newInstance()
    ->setOptions([
        SwiftSparkPost\Option::TRANSACTIONAL    => false,
        SwiftSparkPost\Option::OPEN_TRACKING    => false,
        SwiftSparkPost\Option::CLICK_TRACKING   => false,
        SwiftSparkPost\Option::SANDBOX          => true,
        SwiftSparkPost\Option::SKIP_SUPPRESSION => true,
        SwiftSparkPost\Option::INLINE_CSS       => true,
        SwiftSparkPost\Option::IP_POOL          => 'some-ip-pool',
    ]);
```

These options are also available for messages, where they take precedence over the configured options.

```php
$message = SwiftSparkPost\Message::newInstance()
    ->setOptions(['...']);
```

### IP pool probability

Add a probability factor to enable the IP pool only for a percentage of messages sent.
0 will never use the IP pool, 1 will always use it.

Can be used to facilitate an IP warming process.

```php
$config = SwiftSparkPost\Configuration::newInstance()
    ->setOptions([SwiftSparkPost\Option::IP_POOL => 'some-ip-pool'])
    ->setIpPoolProbability(0.5);
```

License
-------

[Copyright 2017 Future500 B.V.][4]

[1]: http://swiftmailer.org
[2]: https://developers.sparkpost.com/api
[3]: https://github.com/SparkPost/php-sparkpost
[4]: https://github.com/f500/swiftmailer-sparkpost/blob/master/LICENSE
