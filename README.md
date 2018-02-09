##Rail Fence Cipher
##Encryption Algorithm

The Rail Fence cipher is a form of transposition cipher that gets its name from the way in which it's encoded. It was already used by the ancient Greeks.

In the Rail Fence cipher, the message is written downwards on successive "rails" of an imaginary fence, then moving up when we get to the bottom (like a zig-zag). Finally the message is then read off in rows.

For example, using three "rails" and the message "WE ARE DISCOVERED FLEE AT ONCE", the cipherer writes out:
```
W . . . E . . . C . . . R . . . L . . . T . . . E
. E . R . D . S . O . E . E . F . E . A . O . C .
. . A . . . I . . . V . . . D . . . E . . . N . .
```

Then reads off:
```
WECRLTEERDSOEEFEAOCAIVDEN
```

To decrypt a message we take the zig-zag shape and fill the ciphertext along the rows.
```
? . . . ? . . . ? . . . ? . . . ? . . . ? . . . ?
. ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? .
. . ? . . . ? . . . ? . . . ? . . . ? . . . ? . .
```
The first row has seven spots that can be filled with "WECRLTE".
```
W . . . E . . . C . . . R . . . L . . . T . . . E
. ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? .
. . ? . . . ? . . . ? . . . ? . . . ? . . . ? . .
```
Now the 2nd row takes "ERDSOEEFEAOC".
```
W . . . E . . . C . . . R . . . L . . . T . . . E
. E . R . D . S . O . E . E . F . E . A . O . C .
. . ? . . . ? . . . ? . . . ? . . . ? . . . ? . .
```
Leaving "AIVDEN" for the last row.
```
W . . . E . . . C . . . R . . . L . . . T . . . E
. E . R . D . S . O . E . E . F . E . A . O . C .
. . A . . . I . . . V . . . D . . . E . . . N . .
```

Taken from:
http://exercism.io/exercises/php/rail-fence-cipher/readme
and
https://en.wikipedia.org/wiki/Transposition_cipher#Rail_Fence_cipher

##How to run
dependencies:

* [PHP 7.1](http://php.net/downloads.php)

##Usage

There are two scripts (encode.php and decode.php) to be executed in the root directory:
      
      php encode.php $stringToBeDecoded $numberOfRails
      php decode.php $stringToBeEncoded $numberOfRails

with two input parameters for each script:
       
      string $stringToBeEncoded
      int $numberOfRails

The output will be displayed in the command line after the script was executed.

##How to test
dependencies:

* [phpspec 4.3.0](http://www.phpspec.net/en/stable/)

execute in root directory
      
      ./bin/phpspec run

##Notes on design
I implemented the functionality of this task into a class although I don't consider an object oriented abstraction necessarily useful in this case for the following reasons:

In the current implementation, there is no state or property that the methods need to manipulate or maintain. 
Consequently, all methods are declared static. Besides, this implementation does not make use of either inheritance or polymorphism.

###Author Contact
[alexandra.julius@gmail.com](mailto:alexandra.julius@gmail.com)
