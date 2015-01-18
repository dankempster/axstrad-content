[![Latest Stable Version](https://poser.pugx.org/axstrad/content/v/stable.svg)](https://packagist.org/packages/axstrad/content) [![Total Downloads](https://poser.pugx.org/axstrad/content/downloads.svg)](https://packagist.org/packages/axstrad/content) [![Latest Unstable Version](https://poser.pugx.org/axstrad/content/v/unstable.svg)](https://packagist.org/packages/axstrad/content) [![License](https://poser.pugx.org/axstrad/content/license.svg)](https://packagist.org/packages/axstrad/content)

| Branch | Build                                                                                                                                                                                                                                                                                                                | Scrutinizer                                                                                                                                                                                        | VersionEye                                                                                                                                                                        |
|-------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Master |[![Build Status](https://travis-ci.org/dankempster/axstrad-content.svg?branch=master)](https://travis-ci.org/dankempster/axstrad-content)[![Coverage Status](https://coveralls.io/repos/dankempster/axstrad-content/badge.svg?branch=master)](https://coveralls.io/r/dankempster/axstrad-content?branch=master)    | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dankempster/axstrad-content/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dankempster/axstrad-content/?branch=master) | [![Dependency Status](https://www.versioneye.com/user/projects/54a32e84974275fa0a000019/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54a32e84974275fa0a000019) |
| Develop | [![Build Status](https://travis-ci.org/dankempster/axstrad-content.svg?branch=develop)](https://travis-ci.org/dankempster/axstrad-content)[![Coverage Status](https://coveralls.io/repos/dankempster/axstrad-content/badge.svg?branch=develop)](https://coveralls.io/r/dankempster/axstrad-content?branch=develop) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dankempster/axstrad-content/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/dankempster/axstrad-content/?branch=develop) | [![Dependency Status](https://www.versioneye.com/user/projects/54baf943879d517001000105/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54baf943879d517001000105) |

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8e21e6df-4779-4888-9d94-77f39d55f416/small.png)](https://insight.sensiolabs.com/projects/8e21e6df-4779-4888-9d94-77f39d55f416)

# Axstrad/Content

__namespace:__ Axstrad\Component\Content;

# Features

 - Various content related models & traits
    - Copy
    - Article
 - Provides ORM mapping in YAML format config/orm


# Installation

## Update composer.json
```
"require": {
    ...
    "axstrad/content": "0.2.*"
}
```

# Symfony Framework Usage
Add the mapping info to the DoctrineBundle
```yaml
# ./app/config/config.yml

# Doctrine Configuration
doctrine:
    # ...other doctrine config...
    orm:
        # ...other orm config...
        mappings:
            axstrad_content:
                type: yml
                prefix: Axstrad\Component\Content\Orm
                dir: "%kernel.root_dir%/../vendor/axstrad/content/config/Orm"
                alias: AxstradContent
                is_bundle: false
```
