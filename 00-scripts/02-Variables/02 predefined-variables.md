 #  Predefined Variables

 - Superglobals cannot be used as variable variables inside functions or class methods.
 - superglobals which means they are available in all scopes throughout a script.  
	 - $GLOBALS :
		 - An associative array containing references to all variables which are currently defined in the global scope of the script. The variable names are the keys of the array.
		 - As of PHP 8.1.0, write access to the entire $GLOBALS array is no longer supported
		 - As of PHP 8.1.0, $GLOBALS is now a read-only copy of the global [symbol table](https://www.php.net/manual/en/features.gc.refcounting-basics.php).
		 - That is, global variables cannot be modified via its copy. Previously, $GLOBALS array is excluded from the usual by-value behavior of PHP arrays and global variables can be modified via its copy.
		 - `Before PHP Version 8.1  

		    <?php  
		    $a = 1;  
		    $globals = $GLOBALS;  
		    $globals['a'] = 2;  
		    echo $a; // 2  
		    echo $globals['a']; // 2  
		    echo $GLOBALS['a']; // 2  
		    ?>  
		      
		    After PHP Version 8.1  
		      
		    <?php  
		    $a = 1;  
		    $globals = $GLOBALS;  
		    $globals['a'] = 2;  
		    echo $a; // 1  
		    echo $globals['a']; // 2  
		    echo $GLOBALS['a']; // 1  
		    ?>`

		 - In older versions of PHP, the `$GLOBALS` array **does not
		   automatically include other superglobal arrays** such as `$_POST`,
		   `$_GET`, `$_COOKIE`, `$_SESSION`, `$_FILES`, `$_ENV`, `$_REQUEST`, or
		   `$_SERVER`.   It only contains references to **global variables**
		   explicitly declared in the global scope.
		   
		   If you're working with legacy code, keep in mind that you'll need to
		   access superglobals directly (e.g., `$_POST['name']`) instead of
		   expecting them to appear inside `$GLOBALS`.

	 - $_SERVER
		 - $_SERVER is an array containing information such as headers, paths, and script locations. The entries in this array are created by the web server, therefore there is no guarantee that every web server will provide any of these;

		 - When running PHP on the command line most of these entries will not be available or have any meaning.

	 - $_GET
		 - associative array of variables passed to the current script via the URL parameters (aka. query string). Note that the array is not only populated for GET requests, but rather for all requests with a query string.
		 
	 - $_POST
		 - n associative array of variables passed to the current script via the HTTP POST method when using `application/x-www-form-urlencoded` or `multipart/form-data` as the HTTP Content-Type in the request.
		 - I think it is very important to note that PHP will automatically replace dots ('.') AND spaces (' ') with underscores ('_') in any incoming POST or GET (or REQUEST) variables.
		


