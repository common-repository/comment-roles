<?php
/*
Plugin Name: Comment Roles
Plugin URI: https://wordpress.org/plugins/comment-roles/
Description: Allows filering of comments by user role. The plugin adds a series of checkboxes for each user role above the comments template and allows users to define which comments show according to the role of the user who posted the comment. This plugin does not work with Jetpack Comments.
Version: 0.0.3
Author: Kendall Weaver
Author URI: http://kendallweaver.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: comment-roles
Domain Path: /languages

Comment Roles is free software: you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by the Free
Software Foundation, either version 2 of the License, or any later version.
 
Comment Roles is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
or FITNESS FOR A PARTICULAR PURPOSE. See theGNU General Public License
for more details.
 
You should have received a copy of the GNU General Public License along
with Comment Roles. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


// This creates a simple form with checkboxes above the comments template.
function comment_roles_form() {

    // First we need to get a list of all the roles in this WordPress instance.
    global $wp_roles;
    $roles = $wp_roles->roles;

    // Now we create the form.
    echo '<div class="comment-roles-wrap">';
    echo '<form class="comment-roles-form" method="get">';

    // Iterate through each role and add it as an option in the form.
    foreach($roles as $key => $value) {
        echo '<input type="checkbox" class="comment-roles-checkbox" name="comment-role[]" value="' . $key . '" /> ' . $value['name'] . '<br />';
    }

    // Finish the form with a submit button.
    echo '<input type="submit" class="comment-roles-submit" value="' . __('Filter', 'comment-roles') . '">';
    echo '</form>';
    echo '</div>';
}
add_action('comments_template', 'comment_roles_form');


// Here's where the magic happens. This function filters comments based on the GET data from the above form.
function comment_roles_filter($comments) {

    // First we need to access the GET data which contains the list of user roles we're filtering.
    $roles = $_GET["comment-role"];

    // We only want to filter comments if there is, in fact, GET data that tells us to.
    if ($roles != NULL) {

        // Create an empty array for later use where we'll store a list of users whose comments are not to be filtered out.
        $users = array();

        // Using the GET data, iterate through each role defined therein.
        foreach($roles as $role) {

            // Get a list of each user in each specified role.
            $userlist = get_users('role=' . $role);

            // For each user in the specified roles, add that user to the array we defined earlier so we know who not to filter out.
            foreach($userlist as $user) {
                $users[] = $user->ID;
            }
        }

        // Here we iterate through each comment.
        foreach($comments as $comment => $data) {

            // If the author of the comment is not in the previously defined array, remove their comment.
            if (!in_array($data->user_id, $users)) {
                unset($comments[$comment]);
            }
        }
    }

    // Return the potentially modified list of comments.
    return $comments;
}
add_filter('comments_array', 'comment_roles_filter');


?>
