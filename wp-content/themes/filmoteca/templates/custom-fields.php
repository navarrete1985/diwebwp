<?php

    function extra_profile_fields($user) {?>
        <h3>Profile Picture</h3>
        <table class="form-table">
            <tr>
                <th><label for="userprofile">User picture url</label></th>
                <td>
                    <input type="url" name="userprofile" id="userprofile" value="<?php echo esc_attr( get_the_author_meta( 'userprofile', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your picture url.</span>
                </td>
            </tr>
        </table>
        <h3>Social Media</h3>
        <table class="form-table">
            <tr>
                <th><label for="twitter">Twitter</label></th>
                <td>
                    <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your Twitter username.</span>
                </td>
            </tr>
            <tr>
                <th><label for="facebook">Facebook</label></th>
                <td>
                    <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your Facebook page.</span>
                </td>
            </tr>
            <tr>
                <th><label for="instagram">Instagram</label></th>
                <td>
                    <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your Instagram page.</span>
                </td>
            </tr>
            <tr>
                <th><label for="linkedin">Linkedin</label></th>
                <td>
                    <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your Linkedin page.</span>
                </td>
            </tr>
        </table>
        <h3>User skill information</h3>
        <table class="form-table">
            <tr>
                <th><label for="skill1">Skill1</label></th>
                <td>
                    <input type="text" name="skill1" id="skill1" value="<?php echo esc_attr( get_the_author_meta( 'skill1', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-1 description.</span>
                </td>
                <th><label for="skill1v">Skill1 value</label></th>
                <td>
                    <input type="text" name="skill1v" id="skill1v" value="<?php echo esc_attr( get_the_author_meta( 'skill1v', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-1 value.</span>
                </td>
            </tr>
            <tr>
                <th><label for="skill2">Skill2</label></th>
                <td>
                    <input type="text" name="skill2" id="skill2" value="<?php echo esc_attr( get_the_author_meta( 'skill2', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-1 description.</span>
                </td>
                <th><label for="skill2v">Skill2 value</label></th>
                <td>
                    <input type="text" name="skill2v" id="skill2v" value="<?php echo esc_attr( get_the_author_meta( 'skill2v', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-1 value.</span>
                </td>
            </tr>
            <tr>
                <th><label for="skill3">Skill3</label></th>
                <td>
                    <input type="text" name="skill3" id="skill3" value="<?php echo esc_attr( get_the_author_meta( 'skill3', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-1 description.</span>
                </td>
                <th><label for="skill3v">Skill3 value</label></th>
                <td>
                    <input type="text" name="skill3v" id="skill3v" value="<?php echo esc_attr( get_the_author_meta( 'skill3v', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-2 value.</span>
                </td>
            </tr>
            <tr>
                <th><label for="skill4">Skill4</label></th>
                <td>
                    <input type="text" name="skill4" id="skill4" value="<?php echo esc_attr( get_the_author_meta( 'skill4', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-3 description.</span>
                </td>
                <th><label for="skill4v">Skill4 value</label></th>
                <td>
                    <input type="text" name="skill4v" id="skill4v" value="<?php echo esc_attr( get_the_author_meta( 'skill4v', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description">Please enter your skill-4 value.</span>
                </td>
            </tr>
        </table>
    <?php }
    
    add_action('show_user_profile', 'extra_profile_fields');
    add_action('edit_user_profile', 'extra_profile_fields');
    
    
    function save_extra_profile_fields( $user_id ) {
        if ( !current_user_can( 'edit_user', $user_id ) ) return false;
        update_usermeta( $user_id, 'userprofile', $_POST['userprofile'] );
        
        update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
        update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
        update_usermeta( $user_id, 'instagram', $_POST['instagram'] );
        update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
        
        update_usermeta( $user_id, 'skill1', $_POST['skill1'] );
        update_usermeta( $user_id, 'skill1v', $_POST['skill1v'] );
        
        update_usermeta( $user_id, 'skill2', $_POST['skill2'] );
        update_usermeta( $user_id, 'skill2v', $_POST['skill2v'] );
        
        update_usermeta( $user_id, 'skill3', $_POST['skill3'] );
        update_usermeta( $user_id, 'skill3v', $_POST['skill3v'] );
        
        update_usermeta( $user_id, 'skill4', $_POST['skill4'] );
        update_usermeta( $user_id, 'skill4v', $_POST['skill4v'] );
    }
    
    add_action( 'personal_options_update', 'save_extra_profile_fields' );
    add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );
?>