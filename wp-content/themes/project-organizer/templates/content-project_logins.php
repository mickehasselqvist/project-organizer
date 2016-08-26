<?php if( have_rows('project_logins') ): ?>

    <table class="logins-table">

        <?php while ( have_rows('project_logins') ) : the_row(); ?>
            <tr>
                <th class="project_login_header"><?php the_sub_field('project_login_header'); ?></th>

                <?php while ( have_rows('project_login_info') ) : the_row(); ?>
                    <th class="project_login_label"><?php the_sub_field('project_login_label'); ?></th>
                <?php endwhile; ?>

            </tr>
            <tr>
                <td></td>
                <?php while ( have_rows('project_login_info') ) : the_row(); ?>
                    <td><?php the_sub_field('project_login_value'); ?></td>
                <?php endwhile; ?>
            </tr>
        <?php endwhile; ?>

    </table>

<?php else : ?>
    <div class="empty">
        <div class="content">
            <p>
                <?php _e('You have no logins for this project.'); ?>
            </p>
        </div>
    </div>
<?php endif; ?>