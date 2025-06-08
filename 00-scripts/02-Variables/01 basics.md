 # Basic
 
 - Variables in PHP are represented by a dollar sign followed by the
   name of the variable. The variable name is case-sensitive.
   
 - A valid variable name starts with a letter (`A-Z`, `a-z`, or the
   bytes from 128 through 255) or underscore, followed by any number of
   letters, numbers, or underscores. As a regular expression, it would
   be expressed thus: `^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$`
   
 - PHP doesn't support Unicode variable names, however, some character
   encodings (such as UTF-8) encode characters in such a way that all
   bytes of a multi-byte character fall within the allowed range, thus
   making it a valid variable name.
	### 📦 Example
	Let’s take the character `é`:
	-   In **UTF-8**, `é` is encoded as **two bytes**: `0xC3 0xA9`
	-   Both `0xC3` and `0xA9` are within the allowed byte range (`\x80–\xFF`) 

	So this works:
		`$éclair = "yum";
		echo $éclair; // Outputs: yum`

 - `$this` is a special variable that can't be assigned. Prior to PHP
   7.1.0, indirect assignment (e.g. by using [variable variables](https://www.php.net/manual/en/language.variables.variable.php))
   was possible.

 - PHP's parser **enforces naming rules** _only_ when you're writing
   variable names **statically** (i.e., directly in code like `$name`).
   But **at runtime**, you can create **invalid variable names** using
   _variable variables_ or the `${...}` syntax — including names that break all the rules (even spaces, symbols, etc.).

 - By default, variables are always assigned by value.

 - PHP also offers another way to assign values to variables: assign by
   reference. This means that the new variable simply references (in other words,
   "becomes an alias for" or "points to") the original variable. Changes
   to the new variable affect the original, and vice versa.
   `<?php  
$foo = 'Bob'; // Assign the value 'Bob' to $foo  `
`$bar = &$foo; // Reference $foo via $bar.  `
`$bar = "My name is $bar"; // Alter $bar...  `
`echo $bar;  `
`echo $foo; // $foo is altered too.  
?>`

 - One important thing to note is that only variables may be assigned by
   reference.

 - It is not necessary to declare variables in PHP, however, it is a
   very good practice. Accessing an undefined variable will result in an
   **E_WARNING**(prior to PHP 8.0.0,**E_NOTICE**). An undefined variable has a default value of **null**.
   The isset() language construct can be used to detect if a variable has already been initialized.

 - Extra Tip: Use `??` (Null coalescing operator)

    `echo $username ?? "Guest";`

 - **Autovivification** in PHP means that if you append to an undefined variable **as if it were an array**, PHP will automatically create
   that array for you — without throwing a warning.
	`$unset_array[] = 'value';`
	
	If someone includes `file1.php`, they might not even realize `$items` was defined there 	because:
	-   It wasn’t initialized explicitly (`$items = [];`)
	-   There was **no warning**
	-   It now silently affects `file2.php`
	This can lead to:
	-   Conflicts between includes
	-   Hard-to-trace bugs
	-   Overwritten data
	- ✅ Best Practice
		 - Always initialize variables explicitly, especially arrays, before
		   appending:
		  ` $unset_array = [];`
`$unset_array[] = 'value';`

 - A variable can be destroyed by using the
   [unset()](https://www.php.net/manual/en/function.unset.php) language
   construct.

