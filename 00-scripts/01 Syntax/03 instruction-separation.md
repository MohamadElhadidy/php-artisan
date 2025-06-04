# Instruction Separation


### 🟡 **Semicolons in PHP**

 1. Just like **C** or **Perl**, **PHP requires each instruction
    (statement) to end with a semicolon (`;`)** .
    `echo  "Hello";`
    
 2. However, when you **close the PHP block using `?>`**, **the closing
    tag implies the end of the last statement**, so you **don’t have to
    add a semicolon if it’s the last line** in the block.
`<?php  echo  "Some text"  ?>`

🟡 **Example #1 Explanation:**

    <?php echo "Some text"; ?>No newline
    <?= "But newline now" ?>

  -   If there’s a **newline right after `?>`**, that newline becomes part of the **output**.
   -   If there is **no newline**, the output is continuous.
   
   - **So the output is:**
  ` Some textNo newline`
	`But newline now`
	
🟡 **Example #2 Explanation:**

    <?php
        echo "This is a test\n";
    ?>
    
    <?php echo "This is a test\n" ?>
    
    <?php echo "We omitted the last closing tag\n";

-   First and second blocks are valid (with or without semicolon before `?>`)
    
-   The **third block omits the closing tag (`?>`)** — which is fine **if it’s the last part of the file**
    
-   **It’s even recommended** to omit the closing tag at the end of PHP-only files.

🟡 **Why Omit the `?>` Closing Tag?**

If you include a file using `include` or `require`, and that file ends like this:

    <?php
    echo "Hello";
    ?>
   
   But there’s **whitespace or a blank line after `?>`**, it will be sent as output — which can **break things** like:

-   Sending **headers** (`header("Location: ...")`)
    
-   Starting **output buffering**
    

So if the file ends in PHP and there’s **no HTML after it**, you should **leave off the closing tag** like

    <?php
    echo "Hello";
    
This ensures **no accidental whitespace is sent**.

🟡 **Don’t misinterpret  this**

 `<?php  echo  'Ending tag excluded';`
 
With

    <?php echo 'Ending tag excluded';
    <p>But html is still visible</p>


-   The **first one is okay** (if it's at the end of the file).
    
-   The **second will cause an error**, because you're mixing PHP without closing `?>` **and writing HTML after it** — PHP doesn’t know where the code ends.
    

If you want to mix HTML after PHP, you **must close** the PHP block.
