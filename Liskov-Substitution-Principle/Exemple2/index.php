<?php

interface Animal
{}

class Cat implements Animal
{}

// class Dog implements Animal
// {}

class ChildCat extends Cat
{}

// var_dump(is_subclass_of(Cat::class, Animal::class));
// var_dump(is_subclass_of(ChildCat::class, Cat::class));
// var_dump(is_subclass_of(ChildCat::class, Animal::class));

interface CatHelper
{
    public function takeIn(Cat $cat): void;
    public function giveOther(): Cat;
}

class ChildCatHelper implements CatHelper
{
    // public function takeIn(ChildCat $cat): void
    // {
    //     echo "Child of cat is helped by person" . PHP_EOL;
    // }

    // public function giveOther(): Animal
    // {
    //     return new Animal();
    // }

    // Child pre-conditions cannot be greater than parent function pre-conditions
    public function takeIn(Animal $cat): void
    {
        echo "Cat is helped by person" . PHP_EOL;
    }

    // Child post-conditions cannot be lesser than parent function post-conditions
    public function giveOther(): ChildCat
    {
        return new ChildCat();
    }
}

$person = new ChildCatHelper();
// take In
$person->takeIn(new ChildCat());
$person->takeIn(new Cat());
// give other person
var_dump($person->giveOther());
