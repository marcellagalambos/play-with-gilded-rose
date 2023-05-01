# The Gilded Rose Kata

## Introduction

Hi and welcome to team Gilded Rose. As you know, we are a small inn with a prime location in a prominent city ran by a friendly innkeeper named Allison. We also buy and sell only the finest bread and cheese. Unfortunately, our goods are constantly degrading in quality as they approach their sell by date. We have a system in place that updates our inventory for us. It was developed by a no-nonsense type named Leeroy, who has moved on to new adventures.

First an introduction to our system:

- All items have a SellIn value which denotes the number of days we have to sell the item
- All items have a Quality value which denotes how valuable the item is
- At the end of each day our system lowers both values for every item

Pretty simple, right? Well this is where it gets interesting:

- Once the sell by date has passed, Quality degrades twice as fast
- The Quality of an item is never negative
- "Aged Brie" actually increases in Quality the older it gets
- The Quality of an item is never more than 50

We have recently signed a supplier of "Mana Drink" items. This requires an update to our system:

"Mana Drink" items degrade in Quality twice as fast as Bread items

## Assignment

This repository includes the initial setup for this Kata, including the unit tests.

Your job is to either:

- Refactor the monstrous code in the `GildedRose.php` class **or**
- Add a new item type, "Mana Drink". The tests for this item have been added to the `GildedRoseTest.php` file but will obviously currently fail.

Please use the test suite in order to ensure that the functionality works as expected and nothing breaks.

## Running the tests

### Run with Docker
```
docker-compose run intermediate
```

### Manually
```
cd backend/Intermediate
composer install
vendor/bin/phpunit src/Test
```
