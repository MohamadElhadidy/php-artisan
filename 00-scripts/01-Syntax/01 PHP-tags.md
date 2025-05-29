## This file demonstrates the different PHP tags that can be used in scripts.


// It is the most portable and recommended way to start PHP code blocks.
<?php echo 'if you want to serve PHP code in XHTML or XML documents, use these tags'; ?>


You can use the short echo tag to <?= 'print this string' ?.

It's equivalent to <?php echo 'print this string' ?>.

<!--  The short tags are not recommended for use in production code, as they may not be enabled on all servers. -->
<? echo 'this code is within short tags, but will only work '. if short_open_tag is enabled'; ?>

Note:
As short tags can be disabled it is recommended to only use the normal tags ("<?php ?> and <?= ?>") to maximise compatibility.


🧠 Summary
    When a PHP file ends with pure PHP (no HTML), remove the ?> tag.
    This avoids accidentally outputting whitespace.
    It’s a common best practice in WordPress, Laravel, and other PHP frameworks.
