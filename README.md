# The Dictionary of Obscure Sorrows API

This project is an API of the [Dictionary of Obscure Sorrows](http://www.dictionaryofobscuresorrows.com/) created by [John Koenig](https://twitter.com/obscuresorrows). Accessing this API would allow your project to retrieve any word from the dictionary in a variety of ways.

## Tests

To setup this project on your own machine, you would need to setup a local server using MAMP, XAMPP, or something similar and setup the database with a table with these values:

1. id (auto increment)
2. title (the word itself)
3. definition (defining the word)
4. author (almost always John Koenig)
5. authorPicture (included in repo resources)
6. speech (details the part of speech of the word)
7. video (whether or not there is a video associated with word)
8. entry (where the word ranks in alphabetical order)

Make sure the database name and tables are changed to whatever name you choose.

## Issues

If there's a problem, you can submit an issue [here](https://github.com/lazaryo/obscure/issues).

## Contributors

By all means if you would like to contribute do so while submitting a [pull request](https://github.com/lazaryo/obscure/pulls).

## License

This project is under the [MIT License](https://github.com/lazaryo/obscure/blob/master/LICENSE). Copyright (c) 2017 [Malik Hemphill](https://github.com/lazaryo)