

<p><?php echo getCartCount(); ?>  items in cart</p>

<?php if ( isset($allCategories) ) : ?>
<ul>    
    <?php foreach ($allCategories as $row): ?>
        <li><a href="?cat=<?php echo $row['category_id']; ?>"><?php echo $row['category']; ?></a></li>    
    <?php endforeach; ?> 
        <?php $current_url = explode('?', $_SERVER['REQUEST_URI']); ?>

        <li><a href="<?php echo $current_url[0]; ?>">Clear Category Search</a></li>
</ul>
<?php endif; ?>

       