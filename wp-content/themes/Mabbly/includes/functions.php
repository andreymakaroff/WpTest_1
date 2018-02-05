<?php
/**
 * Fix phone number for links
 */
function nc_tel( $phone = '' ) {
  $patterns[0] = '/\ /';
  $patterns[1] = '/\./';
  $patterns[2] = '/\(/';
  $patterns[3] = '/\)/';
  $patterns[4] = '/\-/';

  return preg_replace( $patterns, '', $phone );
}


/**
 * Get YouTube Video ID
 * Source: http://code.runnable.com/VUpjz28i-V4jETgo/get-youtube-video-id-from-url-for-php
 */
function nc_get_youtube_id( $url ) {
  $video_id = false;
  $url      = parse_url( $url );

  if ( strcasecmp( $url['host'], 'youtu.be' ) === 0 ) {
    #### (dontcare)://youtu.be/<video id>
    $video_id = substr( $url['path'], 1 );
  } elseif ( strcasecmp( $url['host'], 'www.youtube.com' ) === 0 ) {
    if ( isset( $url['query'] ) ) {
      parse_str( $url['query'], $url['query'] );

      if ( isset( $url['query']['v'] ) ) {
        #### (dontcare)://www.youtube.com/(dontcare)?v=<video id>
        $video_id = $url['query']['v'];
      }
    }

    if ( $video_id == false ) {
      $url['path'] = explode( '/', substr( $url['path'], 1 ) );

      if ( in_array( $url['path'][0], array( 'e', 'embed', 'v' ) ) ) {
        #### (dontcare)://www.youtube.com/(whitelist)/<video id>
        $video_id = $url['path'][1];
      }
    }
  }

  return $video_id;
}
// Translation URL

function transliterate_url( $text ) {
    $text = mb_strtolower( $text, 'UTF-8' );
    $symbol_table = array('а' => 'a',	'б' => 'b',	'в' => 'v',
        'г' => 'g',	'д' => 'd',	'е' => 'e',
        'ё' => 'yo',	'ж' => 'zh',	'з' => 'z',
        'и' => 'i',	'й' => 'j',	'к' => 'k',
        'л' => 'l',	'м' => 'm',	'н' => 'n',
        'о' => 'o',	'п' => 'p',	'р' => 'r',
        'с' => 's',	'т' => 't',	'у' => 'u',
        'ф' => 'f',	'х' => 'h',	'ц' => 'c',
        'ч' => 'ch',	'ш' => 'sh',	'щ' => 'shh',
        'ъ' => "",	'ы' => 'y',	'ь' => "",
        'э' => 'e',	'ю' => 'yu',	'я' => 'ya');
    $text = strtr( $text, $symbol_table );
    return $text;
}
add_filter( 'sanitize_title', 'transliterate_url', 1 );
add_filter( 'sanitize_file_name', 'transliterate_url', 1 );

//Theme's information

function register_menu_page_setting() {
    add_menu_page('Настройки Темы2', 'Настройки темы', 6, 'setings_page.php', 'themes_setings');
}

add_action('admin_menu', 'register_menu_page_setting');
function themes_setings(){
    ?>
    <div class="wrap">
    <h2>Настройки темы</h2>

    <form method="post" action="options.php" enctype="multipart/form-data">
        <?php settings_fields( 'nedw-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Логотип</th>
                <td><? if(get_option('logo')){?><img src="<?php echo get_option('logo'); ?>" alt="Logo" /><br><?}?><input type="file" name="logo"/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Копирайт</th>
                <td><input type="text" name="copy" value="<?php echo get_option('copy'); ?>"/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Твиттер</th>
                <td><input type="text" name="tw" value="<?php echo get_option('tw'); ?>"/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Facebook</th>
                <td><input type="text" name="fb" value="<?php echo get_option('fb'); ?>"/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Linkedin</th>
                <td><input type="text" name="ln" value="<?php echo get_option('ln'); ?>"/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Instagram</th>
                <td><input type="text" name="inst" value="<?php echo get_option('inst'); ?>"/></td>
            </tr>
        </table>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>

    </form>
    <?
}
add_action( 'admin_init', 'register_nedwsettings' );
function register_nedwsettings() {
    register_setting( 'nedw-settings-group', 'logo', 'validate_setting' );
    register_setting( 'nedw-settings-group', 'copy' );
    register_setting( 'nedw-settings-group', 'tw' );
    register_setting( 'nedw-settings-group', 'fb' );
    register_setting( 'nedw-settings-group', 'ln' );
    register_setting( 'nedw-settings-group', 'inst' );
}

function validate_setting($plugin_options) {
    $keys = array_keys($_FILES);
    $i = 0;
    foreach ( $_FILES as $image ) {   // if a files was upload
        if ($image['size']) {     // if it is an image
            if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {
                $override = array('test_form' => false);       // save the file, and store an array, containing its location in $file
                $file = wp_handle_upload( $image, $override );
                $plugin_options = $file['url'];     } else {       // Not an image.
                $options = get_option('logo');
                $plugin_options = $options;       // Die and let the user know that they made a mistake.
                wp_die('No image was uploaded.');     }   }   // Else, the user didn't upload a file.   // Retain the image that's already on file.
        else {     $options = get_option('logo');
            $plugin_options = $options;   }
        $i++; }
    return $plugin_options;
}