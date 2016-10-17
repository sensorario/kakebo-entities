# Doctrine's entity for kakebo application

## Install

Install sensorario/kakebo-entites via composer

```json
prompt> composer require sensorario/kakebo-entities
```

## Configure

```php
namespace Path\To\Your\Entity\Namespace;

use Doctrine\ORM\Mapping as ORM;
use Sensorario\KakeboEntities\Movement as KakeboMovement;

/**
 * Movement
 *
 * @ORM\Table(name="your_movement_table")
 * @ORM\Entity(repositoryClass="Path\To\Your\Repository\Class")
 */
class Movement extends KakeboMovement
{
    // change your Movement if needed
}
```

## Tests

```bash
prompt> ./runtests
```

## Coverage

```bash
prompt> ./coverage
```
