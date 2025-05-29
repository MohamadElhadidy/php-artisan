## Everything outside of a pair of opening and closing tags is ignored by the PHP parser which allows PHP files to have mixed content. This allows PHP to be embedded in HTML documents.

Example #1 Embedding PHP in HTML

<code>
<p>This is going to be ignored by PHP and displayed by the browser.</p>
<?php echo 'While this is going to be parsed.'; ?>
<p>This will also be ignored by PHP and displayed by the browser.</p>
</code>


<code>
<html><body>
<p<?php if ($highlight): ?> class="highlight"<?php endif;?>>This is a paragraph.</p>
</body></html>
</code>

Using this method, you can have HTML tags with optional attributes, depending on some PHP condition. Extremely flexible and useful!


Using structures with conditions

Example #2 Advanced escaping using conditions

<code>
<?php if ($expression == true): ?>
  This will show if the expression is true.
<?php else: ?>
  Otherwise this will show.
<?php endif; ?>
</code>

<code>
<?php for ($i = 0; $i < 5; ++$i): ?>
Hello, there!
<?php endfor; ?>
</code>

note: the PHP interpreter will jump over blocks contained within a condition that is not met. 

note: For outputting large blocks of text, dropping out of PHP parsing mode is generally more efficient than sending all of the text through echo or print

note: This means that when you're writing a lot of HTML or plain text, it's better to close the PHP tag (?>) and just write the text normally instead of outputting everything with echo or print.


note: 
Never use ?> inside a // comment — it will end PHP execution!
Use /* */ comments instead when the line contains ?>.
Or break the string into parts to avoid writing ?> directly


PHP ignores the // comment when it sees ?>, and drops out of PHP mode, treating everything after ?> as HTML output.
<code>
<?php
// $file_contents = '<?php die(); ?>' . "\n";

?>' . "\n";
</code>


The fix 
<code>
<?php
/* $file_contents = '<?php die(); ?>' . "\n"; */

$file_contents = '<' . '?php die(); ?' . '>' . "\n";

</code>