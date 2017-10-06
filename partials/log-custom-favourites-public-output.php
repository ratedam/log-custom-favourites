<?php if( count( $posts ) > 0 ) : ?>
    <?php foreach( $posts as $post ) : ?>
            <a href="<?php echo $post['permalink']; ?>">
                <?php echo $post['thumbnail']; ?>
                <h1><?php echo $post['title']; ?></h1>
            </a>
    <?php endforeach; ?>
<?php endif; ?>
