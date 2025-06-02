# PHP-tags

 1. Recommended way to start PHP code blocks  `<?php //PHP CODE ?>`
 
 2. You can use the short echo tag to `<?= 'print this string' ?>`, It's
            equivalent to `<?php echo 'print this string' ?>`.
            
 3. `<?  ?>`, The short tags are not recommended for use in production code, as `short_open_tag` may not be enabled on all servers.

 4. As short tags can be disabled it is recommended to only use the
    normal tags ("<?php ?> and <?= ?>") to maximise compatibility.
    
 5. When a PHP file ends with pure PHP (no HTML), remove the ?> tag , This avoids accidentally outputting whitespace, It’s a common best practice in WordPress, Laravel, and other PHP frameworks.
