# Crossword Module

> The Streams Platform Addon

A backend implementation of words suggesting API. It is useful for help solving words for crossword puzzles.

## Features

- Masked queries
- Two languages support (RU/EN)
- Separately gets counts and data for each query
- ...

## Install

Coming soon...

## Usage

### CORS disabled mounts:

---

##### **`GET crossword/words/count/{mask}`**
##### **`GET crossword/words/en/count/{mask}`**

Receives a count of words matched with a given mask.
  
| Parameter | Type   | Default | Description                                                  |
| --------- | ------ | ------- | ------------------------------------------------------------ |
| `mask`    | string |         | Mask of a word, where all unknown letters replaced by underscores `_` |

---

##### **`GET crossword/words/find/{page}/{mask}`**
##### **`GET crossword/words/en/find/{page}/{mask}`**

Receives a list of words suggested to a given mask.
  
| Parameter | Type   | Default | Description                                                  |
| --------- | ------ | ------- | ------------------------------------------------------------ |
| `mask`    | string |         | Mask of a word, where all unknown letters replaced by underscores `_` |
| `page`    | number | 0       | Page number                                                  |

---

##### **`GET crossword/clues/find/{word}`**
##### **`GET crossword/clues/en/find/{word}`**

Receives a list of clues related with a given word.
  
| Parameter | Type   | Default | Description |
| --------- | ------ | ------- | ----------- |
| `word`    | string |         | A full word |

---

##### **`GET crossword/grids`**

Receives a list of available grids.

---

##### **`POST crossword/grids/create`**

Save a given grid to the database.

---

##### (WIP!!!) **`POST crossword/create`**

Creates a new empty crossword instance.

---
