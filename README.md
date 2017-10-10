# Doctrine ORM entity inheritance example (with Symfony Flex)

This is an example of using Doctrine ORM entity inheritance with the Symfony Flex framework.
It is mostly a reminder to myself, but others may find it useful as a reference.

More indepth information about Doctrine ORM inheritance:

 - <a href="http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/inheritance-mapping.html">Inheritance Mapping in Doctrine documentation</a>
 - <a href="https://blog.liip.ch/archive/2012/03/27/table-inheritance-with-doctrine.html">Table Inheritance with Doctrine</a>

## Structure and table overview

This package contains six Doctrine ORM entity classes in [src/Entity](https://github.com/janit/doctrine-inheritance-example/tree/master/src/Entity) that are configured via 
annotations. The included entities use inheritance with two methods (`SINGLE_TABLE` and `JOINED`).

There are two separate data structures:

 - Animal
   - id
   - color
     - Cat
       - name
     - Dog
        - kennel


 - Vehicle
   - id
   - color
     - Moped
       - tuning
     - Truck
       - wheelage

The relationships are configured using annotations in the parent class, for example:

```
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"animal" = "Animal", "cat" = "Cat", "dog" = "Dog"})
```

### Single table inheritance

The `Animal` base entity class is inherited using `SINGLE_TABLE` strategy by the `Cat` and `Dog`
sub entities. The generated schema when using this strategy contains a single table with all
the columns for each sub entity.

#### animal table 

| id | discr | color | name  | kennel         |
|----|-------|-------|-------|----------------|
| 1  | cat   | black | Jallu |                |
| 2  | cat   | grey  | Ossi  |                |
| 3  | dog   | brown |       | The Dogg Pound |
  

### Joined inheritance

The `Vehicle` base entity class is inherited using `JOINED` strategy by `Truck` and `Moped`
classes. With this strategy generated schema contains individual tables for each sub entity.

#### vehicle table

| id | color | discr |
|----|-------|-------|
| 1  | Blue  | truck |
| 2  | Red   | truck |
| 3  | Black | moped |

#### truck table

| id | wheelage |
|----|----------|
| 1  | 10       |
| 2  | 18       |

#### moped table

| id | tuning  |
|----|---------|
| 3  | Regular |

## Installation

Prerequisites for installation are PHP 7.1, Composer and a supported database (Postgres, MariaDB, MySQL, SQLite...).

The first step is to copy the `.env.dist` to `.env` and configure a working database connection.

Once this is done, proceed with installing packages and setting up the database:

```
$ composer install
$ ./bin/console doctrine:database:create
$ ./bin/console doctrine:schema:update --force
```

Once the the installation is complete, proceed with running the local devserver:

```
$ make serve
```

You can find the entity administration interface (using EasyAdminBundle) in http://localhost:8000/admin

Create some entities and observe the database schema and entities.
