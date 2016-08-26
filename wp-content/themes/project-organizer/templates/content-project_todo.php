<?php if( have_rows('project_to_do_list') ): ?>
    <div class="todo_list_container">
        <ul class="todo_list">
        <?php while ( have_rows('project_to_do_list') ) : the_row(); ?>

            <li>
                <?php the_sub_field('project_to_do'); ?>
            </li>

        <?php endwhile; ?>
        </ul>
    </div>
<?php else : ?>
    <div class="todo_list_container">
        <div class="content">
            <p><?php _e('You have nothing to do in this project! Hooooray!', 'project_organizer'); ?></p>
        </div>
    </div>
<?php endif; ?>
