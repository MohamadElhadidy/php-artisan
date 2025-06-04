
# Comments

## PHP supports 3 comment styles:

Type | Syntax | Example 
|--|--|--
C-style (multi-line) |`/* ... */`|`/* This is a multi-line comment */` 
C++-style (single) |`//` | `// This is a single-line comment` 
Shell-style (single)| `#` |`# Another single-line comment`







### ⚠️ **Important Gotchas**

🔸 1. **PHP closes at `?>`, comments don’t continue into HTML**

    <?php # echo "hidden"; ?> visible
Even though `#` comments out `echo`, the `?>` ends PHP mode — and `visible` is **plain HTML**, so it **will be shown**.


🔸 2. **Don't nest C-style (`/* */`) comments**
This will break:
`/*
echo 'test'; /* inner comment */`

`*/`

✅ Fix: Use multiple `//` or toggle styles like this:
`//*
echo 'test';`
`// */`

Switch the opening line to `/*` to comment out the block.


🔸 3. **New in PHP 8: `#[` starts attributes**

This will throw a **syntax error**:

`#[This is a comment]  // ❌ Not valid in PHP 8+`

✅ Always prefer `//` for inline comments unless you're defining attributes.


🔸 4. **Regex or code with `?>` inside `//` comments may break**

Example:
`// preg_match('/^(?>cat|dog)/', $string);`

The parser sees `?>` and ends PHP prematurely.  
✅ Fix: Use `/* */` for such lines.


🔸 5. **HTML comments (`<!-- -->`) don’t block PHP execution**

This:

    <!--
    <?php echo "Hello"; ?>
    -->
    
   ✅ Will **still print "Hello"**, because PHP is executed on the server before HTML comments are interpreted by the browser.

